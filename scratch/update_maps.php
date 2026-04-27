<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Setting;

$iframe = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8417486177987!2d112.5444869!3d-6.9095182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77e10032c91e0d%3A0x764e8d0c71c16197!2sKoperasi%20Kampung%20Perikanan%20Budidaya%20Rumput%20Laut!5e0!3m2!1sid!2sid!4v1777116562694!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';

Setting::updateOrCreate(['key' => 'google_maps_iframe'], ['value' => $iframe]);

echo "Maps updated successfully without spaces.\n";
