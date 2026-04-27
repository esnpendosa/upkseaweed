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

// Only translate critical keys for these languages for now to ensure speed and stability
$criticalKeys = [
    'nav_home', 'nav_products', 'nav_trade', 'nav_news', 'nav_contact', 'nav_cta',
    'hero_badge', 'hero_cta_products', 'hero_cta_trade',
    'bot_online', 'bot_greeting', 'bot_placeholder', 'bot_error',
    'footer_subtitle', 'footer_rights'
];

$toTranslate = array_intersect_key($messages, array_flip($criticalKeys));
$jsonMessages = json_encode($toTranslate, JSON_PRETTY_PRINT);

foreach ($targetLocales as $target) {
    $targetPath = "resources/lang/$target/messages.php";
    
    echo "Translating Critical Keys to $target...\n";
    
    $prompt = "Translate these 15 maritime industry UI keys into '{$target}'. Return ONLY JSON.\n{$jsonMessages}";

    $response = Http::timeout(30)->withHeaders([
        'Authorization' => 'Bearer ' . $apiKey,
        'Content-Type' => 'application/json',
    ])->post('https://openrouter.ai/api/v1/chat/completions', [
        'model' => 'openrouter/free',
        'messages' => [['role' => 'user', 'content' => $prompt]],
        'temperature' => 0.1,
    ]);

    if ($response->successful()) {
        $content = $response->json()['choices'][0]['message']['content'];
        $content = preg_replace('/^```(json)?\s*/i', '', trim($content));
        $content = preg_replace('/\s*```$/', '', $content);
        $data = json_decode($content, true);
        
        if ($data) {
            $phpContent = "<?php\n\nreturn " . var_export($data, true) . ";\n";
            file_put_contents($targetPath, $phpContent);
            echo "Saved $target (Critical)\n";
        }
    }
}
echo "Critical translations finished.\n";
unlink(__FILE__);
