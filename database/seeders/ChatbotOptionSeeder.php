<?php

namespace Database\Seeders;

use App\Models\ChatbotOption;
use Illuminate\Database\Seeder;

class ChatbotOptionSeeder extends Seeder
{
    public function run(): void
    {
        $options = [
            [
                'label' => 'Katalog Produk',
                'type' => 'gemini_prompt',
                'value' => 'Tampilkan daftar produk unggulan UPK Seaweed beserta spesifikasinya dalam format yang menarik.',
                'order' => 1,
            ],
            [
                'label' => 'Tentang Koperasi',
                'type' => 'message',
                'response' => 'UPK Seaweed (Ujungpangkah Seaweed Cooperative) adalah koperasi eksportir rumput laut premium asal Indonesia yang berfokus pada keberlanjutan dan kualitas tinggi.',
                'order' => 2,
            ],
            [
                'label' => 'Cara Pemesanan',
                'type' => 'gemini_prompt',
                'value' => 'Jelaskan alur pemesanan produk rumput laut untuk skala ekspor dan domestik.',
                'order' => 3,
            ],
            [
                'label' => 'Sertifikasi Kami',
                'type' => 'link',
                'value' => '/certifications',
                'order' => 4,
            ],
            [
                'label' => 'Bicara dengan Sales',
                'type' => 'link',
                'value' => 'https://wa.me/6282228214233',
                'order' => 5,
            ],
        ];

        foreach ($options as $option) {
            ChatbotOption::updateOrCreate(['label' => $option['label']], $option);
        }
    }
}
