<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Setting;
use Illuminate\Support\Facades\Http;

$apiKey = Setting::get('chatbot_openrouter_api_key');
$sourceLocale = 'en';
$targetLocales = ['it', 'nl', 'tr', 'vi', 'th', 'hi', 'ms', 'ja', 'ko', 'ar', 'fr', 'es', 'de', 'ru', 'pt'];

$messages = include "resources/lang/$sourceLocale/messages.php";
$jsonMessages = json_encode($messages, JSON_PRETTY_PRINT);

foreach ($targetLocales as $target) {
    $targetPath = "resources/lang/$target/messages.php";
    if (file_exists($targetPath) && filesize($targetPath) > 5000) {
        echo "Skipping $target...\n";
        continue;
    }

    echo "AI Translating to $target...\n";
    
    $prompt = "Translate the following JSON localization map to language code '{$target}'. 
    Return ONLY the translated JSON. Maintain all keys exactly.
    JSON: \n{$jsonMessages}";

    $response = Http::timeout(60)->withHeaders([
        'Authorization' => 'Bearer ' . $apiKey,
        'Content-Type' => 'application/json',
    ])->post('https://openrouter.ai/api/v1/chat/completions', [
        'model' => 'openrouter/free',
        'messages' => [['role' => 'user', 'content' => $prompt]],
        'temperature' => 0.1,
    ]);

    if ($response->successful()) {
        $content = $response->json()['choices'][0]['message']['content'];
        // Strip markdown backticks if any
        $content = preg_replace('/^```json\s*|\s*```$/i', '', trim($content));
        $data = json_decode($content, true);
        
        if ($data) {
            $phpContent = "<?php\n\nreturn " . var_export($data, true) . ";\n";
            file_put_contents($targetPath, $phpContent);
            echo "Saved $target\n";
        } else {
            echo "Failed to parse AI response for $target\n";
        }
    } else {
        echo "AI Request failed for $target\n";
    }
}
echo "AI Translation finished.\n";
unlink(__FILE__);
