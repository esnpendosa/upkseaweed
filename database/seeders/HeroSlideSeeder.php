<?php

namespace Database\Seeders;

use App\Models\HeroSlide;
use Illuminate\Database\Seeder;

class HeroSlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Slide 1: Industrial Hub
        HeroSlide::updateOrCreate(
            ['title' => 'HUB INDUSTRI RUMPUT LAUT INDONESIA'],
            [
                'title_en' => 'INDONESIA SEAWEED INDUSTRIAL HUB',
                'subtitle' => 'Menghubungkan Petani Berkelanjutan dengan Industri Kelautan Global.',
                'subtitle_en' => 'Connecting Sustainable Farmers with the Global Marine Industry.',
                'cta_text' => 'Jelajahi Katalog',
                'cta_text_en' => 'Explore Catalog',
                'cta_link' => '/products',
                'image_path' => 'hero/industrial.jpg',
                'sort_order' => 1,
            ]
        );

        // Slide 2: Quality Excellence
        HeroSlide::updateOrCreate(
            ['title' => 'STANDAR KUALITAS TANPA KOMPROMI'],
            [
                'title_en' => 'UNCOMPROMISED QUALITY STANDARDS',
                'subtitle' => 'Sertifikasi HACCP, Halal, dan Sesuai Kebutuhan Industri Global.',
                'subtitle_en' => 'Certified HACCP, Halal, and Global Industrial Requirements.',
                'cta_text' => 'Standar Kami',
                'cta_text_en' => 'Our Standards',
                'cta_link' => '/certifications',
                'image_path' => 'hero/quality.jpg',
                'sort_order' => 2,
            ]
        );
    }
}
