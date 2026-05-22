<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Services\TranslationService;

$sourceLocale = 'en';
$targetLocales = ['it', 'nl', 'tr', 'vi', 'th', 'hi', 'ms', 'en', 'id', 'zh', 'ja', 'ko', 'ar', 'fr', 'es', 'de', 'ru', 'pt'];

$messages = include "resources/lang/$sourceLocale/messages.php";

foreach ($targetLocales as $target) {
    if ($target === $sourceLocale) continue;
    
    $targetPath = "resources/lang/$target/messages.php";
    if (file_exists($targetPath) && filesize($targetPath) > 1000) {
        echo "Skipping $target (already exists)...\n";
        continue;
    }
    
    $translated = [];
    echo "Translating to $target...\n";
    
    foreach ($messages as $key => $text) {
        // Simple progress indicator
        $translated[$key] = TranslationService::translate($text, $target, $sourceLocale);
    }
    
    $content = "<?php\n\nreturn " . var_export($translated, true) . ";\n";
    file_put_contents($targetPath, $content);
    
    echo "Saved: $targetPath\n";
}

echo "All translations completed.\n";
unlink(__FILE__);
