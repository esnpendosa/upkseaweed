<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class MapSeeder extends Seeder
{
    public function run(): void
    {
        Setting::updateOrCreate(
            ['key' => 'google_maps_iframe'],
            ['value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.341416719139!2d112.54140307498668!3d-6.84958119314864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd80f785081045b%3A0xe543598583486c47!2sKOPERASI%20USAHA%20KOPERASI%20PERIKANAN%20BUDIDAYA%20RUMPUT%20LAUT!5e0!3m2!1sen!2sid!4v1713864000000!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>']
        );
    }
}
