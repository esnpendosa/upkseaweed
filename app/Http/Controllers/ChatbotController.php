<?php

namespace App\Http\Controllers;

use App\Models\ChatbotOption;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function getOptions()
    {
        $options = ChatbotOption::where('is_active', true)
            ->orderBy('order')
            ->get()
            ->map(function ($option) {
                return [
                    'id' => $option->id,
                    'label' => $option->getLocalizedLabel(),
                    'type' => $option->type,
                    'value' => $option->value,
                ];
            });

        return response()->json($options);
    }

    public function handleMessage(Request $request)
    {
        $message = $request->input('message');
        $optionId = $request->input('option_id');
        $locale = app()->getLocale();

        // 1. If it's a specific menu option
        if ($optionId) {
            $option = ChatbotOption::find($optionId);
            if ($option) {
                if ($option->type === 'message') {
                    return response()->json([
                        'response' => $option->getLocalizedResponse(),
                        'type' => 'text'
                    ]);
                }
                
                if ($option->type === 'gemini_prompt') {
                    return $this->askAI($option->value, $locale);
                }
            }
        }

        // 2. If it's a general text message, ask AI
        return $this->askAI($message, $locale);
    }

    private function askAI($prompt, $locale)
    {
        Log::debug("Chatbot: askAI called with prompt: " . $prompt);
        $apiKey = config('services.openrouter.api_key') ?: Setting::get('chatbot_openrouter_api_key');
        
        if (!$apiKey) {
            Log::error("Chatbot Error: OpenRouter API Key not found in config or settings.");
            return response()->json(['response' => "OpenRouter API Key tidak ditemukan. Harap hubungi administrator.", 'type' => 'text'], 200);
        }

        Log::debug("Chatbot: Using API Key starting with: " . substr($apiKey, 0, 12) . "...");

        $productText = \App\Models\Product::where('is_active', true)->limit(15)->pluck('title')->implode(', ');
        $address = Setting::get('contact_address', 'Jl. Setro Barat, Pangkahkulon, Ujungpangkah, Gresik, Jawa Timur');
        
        $systemPrompt = "You are 'Seaweed Intelligence', a premium assistant for UPK Seaweed.
        CONTEXT: We export premium seaweed from Indonesia. LOCATION: {$address}. PRODUCTS: {$productText}.
        GUIDELINES: Respond in {$locale}. Professional & concise. Use Markdown. Sales contact: +6282228214233.";

        // --- SESSION-BASED MEMORY ---
        $historyKey = 'chat_history_' . session()->getId();
        $history = session()->get($historyKey, []);
        
        // Add current message to history
        $history[] = ['role' => 'user', 'content' => $prompt];
        
        // Keep only last 10 messages for context
        if (count($history) > 10) {
            array_shift($history);
        }

        $models = [
            'openrouter/free',
            'mistralai/mistral-7b-instruct:free',
            'microsoft/phi-3-mini-128k-instruct:free',
            'qwen/qwen-2-7b-instruct:free',
        ];

        $lastError = 'Unknown connection error';

        foreach ($models as $currentModel) {
            try {
                $messages = array_merge([['role' => 'system', 'content' => $systemPrompt]], $history);
                
                $response = Http::timeout(30)
                    ->withOptions([
                        'force_ip_resolve' => 'v4', 
                        'connect_timeout' => 10,
                        'verify' => false, // Disable SSL verify temporarily
                    ])
                    ->withHeaders([
                        'Authorization' => 'Bearer ' . $apiKey,
                        'Content-Type' => 'application/json',
                        'HTTP-Referer' => 'https://upkseaweed.id',
                        'X-OpenRouter-Title' => 'UPK Seaweed Industrial Hub',
                    ])->post('https://openrouter.ai/api/v1/chat/completions', [
                        'model' => $currentModel,
                        'messages' => $messages,
                        'temperature' => 0.7,
                    ]);

                if (!$response->successful()) {
                    $errorData = $response->json();
                    $lastError = $errorData['error']['message'] ?? 'Status: ' . $response->status();
                    Log::error("OpenRouter model {$currentModel} failed. Status: {$response->status()}, Response: " . json_encode($errorData));
                    continue;
                }

                $text = $response->json()['choices'][0]['message']['content'] ?? null;
                if ($text) {
                    // Add AI response to history
                    $history[] = ['role' => 'assistant', 'content' => $text];
                    session()->put($historyKey, $history);
                    
                    return response()->json(['response' => $text, 'type' => 'markdown']);
                }

            } catch (\Exception $e) {
                $lastError = $e->getMessage();
                Log::error("OpenRouter model {$currentModel} connection failed: " . $lastError);
                continue;
            }
        }

        $fallbackMessage = __('messages.bot_error');

        if (config('app.debug')) {
            $fallbackMessage .= "\n\n**Debug Info:** " . $lastError;
        }

        return response()->json([
            'response' => $fallbackMessage,
            'type' => 'markdown'
        ], 200);
    }
}
