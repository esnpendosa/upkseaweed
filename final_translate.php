<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Setting;
use Illuminate\Support\Facades\Http;

$apiKey = Setting::get('chatbot_openrouter_api_key');
$sourceLocale = 'en';
$targetLocales = ['nl', 'tr', 'vi', 'th', 'hi', 'ms'];

$messages = include "resources/lang/$sourceLocale/messages.php";
$jsonMessages = json_encode($messages, JSON_PRETTY_PRINT);

foreach ($targetLocales as $target) {
    $targetPath = "resources/lang/$target/messages.php";
    
    echo "AI Translating to $target (Using openrouter/free)...\n";
    
    $prompt = "Act as a professional translator. Translate the following JSON localization map for a premium maritime industry website into '{$target}'.
    Return ONLY valid JSON. No markdown. Maintain all keys.
    JSON:\n{$jsonMessages}";

    $response = Http::timeout(180)->withHeaders([
        'Authorization' => 'Bearer ' . $apiKey,
        'Content-Type' => 'application/json',
    ])->post('https://openrouter.ai/api/v1/chat/completions', [
        'model' => 'openrouter/free',
        'messages' => [['role' => 'user', 'content' => $prompt]],
        'temperature' => 0.1,
    ]);

    if ($response->successful()) {
        $content = $response->json()['choices'][0]['message']['content'];
        $content = trim($content);
        $content = preg_replace('/^```(json)?\s*/i', '', $content);
        $content = preg_replace('/\s*```$/', '', $content);
        
        $data = json_decode($content, true);
        
        if ($data && count($data) > 100) {
            $phpContent = "<?php\n\nreturn " . var_export($data, true) . ";\n";
            file_put_contents($targetPath, $phpContent);
            echo "Saved $target\n";
        } else {
            echo "Failed to parse $target. Snippet: " . substr($content, 0, 50) . "\n";
        }
    } else {
        echo "AI Request failed for $target\n";
    }
}
echo "AI Translation finished.\n";
unlink(__FILE__);
