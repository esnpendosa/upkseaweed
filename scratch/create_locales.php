<?php
$locales = ['en', 'id', 'zh', 'ja', 'ko', 'ar', 'fr', 'es', 'de', 'ru', 'it', 'pt', 'nl', 'tr', 'vi', 'th', 'hi', 'ms'];

foreach ($locales as $locale) {
    $path = "resources/lang/$locale";
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
        echo "Created directory: $path\n";
    }
}
echo "All locale directories verified.\n";
