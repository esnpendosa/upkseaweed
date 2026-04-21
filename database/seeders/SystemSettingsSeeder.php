<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'site_name'         => ['UPK Seaweed', 'text'],
            'seo_title'         => ['UPK Seaweed — Premium Indonesian Seaweed Exporter', 'text'],
            'seo_description'   => ['Leading Indonesian B2B seaweed exporter. Premium Cottonii, Spinosum & Gracilaria. ISO & HACCP Certified. Global shipping to food and pharmaceutical industries.', 'textarea'],
            'seo_keywords'      => ['seaweed exporter, Indonesia seaweed, Cottonii supplier, Spinosum exporter, Gracilaria Indonesia, seaweed B2B', 'text'],
            
            'hero_title_1'      => ['Premium Indonesian', 'text'],
            'hero_title_2'      => ['Seaweed', 'text'],
            'hero_subtitle'     => ['Sustainably harvested from the pristine waters of East Java. We deliver premium dried seaweed to global industries worldwide.', 'textarea'],
            
            'about_title'       => ['From the Pristine Waters of East Java to the World', 'text'],
            'about_description' => ['UPK Seaweed (Ujungpangkah Kulon Marine) is a vertically-integrated seaweed company based in the coastal community of Pangkah Kulon, Gresik. With direct access to premium seaweed farming zones, we ensure full traceability from harvest to shipment.', 'textarea'],
            
            'contact_email'      => ['export@upkseaweed.id', 'text'],
            'contact_phone'      => ['+62 123 4567 890', 'text'],
            'contact_address'    => ['Pangkahkulon, Ujungpangkah, Gresik, East Java, Indonesia', 'textarea'],
            'contact_whatsapp'   => ['6281234567890', 'text'],
        ];

        foreach ($settings as $key => $data) {
            \App\Models\Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $data[0], 'type' => $data[1]]
            );
        }
    }
}
