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
        $apiKey = Setting::get('chatbot_openrouter_api_key');
        
        if (!$apiKey) {
            return response()->json(['response' => "OpenRouter API Key tidak ditemukan.", 'type' => 'text'], 400);
        }

        $productText = \App\Models\Product::where('is_active', true)->limit(15)->pluck('title')->implode(', ');

        $address = Setting::get('contact_address', 'Jl. Setro Barat, Pangkahkulon, Ujungpangkah, Gresik, Jawa Timur');
        $systemPrompt = "You are 'Seaweed Intelligence', a premium assistant for UPK Seaweed.
        CONTEXT: We export premium seaweed from Indonesia. 
        LOCATION: {$address}.
        PRODUCTS: {$productText}.
        GUIDELINES: 
        1. Respond in {$locale}. 
        2. Professional & concise. 
        3. Use Markdown. 
        4. Sales contact: +6282228214233.";

        try {
            $response = Http::timeout(40)->withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
                'HTTP-Referer' => config('app.url'),
                'X-OpenRouter-Title' => 'UPK Seaweed Industrial Hub',
            ])->post('https://openrouter.ai/api/v1/chat/completions', [
                'model' => 'openrouter/free',
                'messages' => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $prompt]
                ],
                'temperature' => 0.7,
            ]);

            if ($response->successful()) {
                $text = $response->json()['choices'][0]['message']['content'] ?? null;
                if ($text) {
                    return response()->json(['response' => $text, 'type' => 'markdown']);
                }
            }

            $error = $response->json()['error'] ?? ['message' => 'Gagal terhubung ke OpenRouter (Status: ' . $response->status() . ')'];
            return response()->json(['response' => "OpenRouter Error: " . ($error['message'] ?? 'Unknown'), 'type' => 'text'], 500);

        } catch (\Exception $e) {
            return response()->json(['response' => "Error: " . $e->getMessage(), 'type' => 'text'], 500);
        }
    }
}
