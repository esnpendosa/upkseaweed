<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Gallery::create([
            'title' => 'Panen Rumput Laut di Pangkahkulon',
            'description' => 'Petani lokal sedang melakukan proses panen rumput laut jenis Gracilaria yang melimpah.',
            'image_path' => 'gallery/harvest-1.jpg',
            'category' => 'Produksi',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        \App\Models\Gallery::create([
            'title' => 'Fasilitas Pengolahan Modern',
            'description' => 'Gudang penyimpanan dan area pengeringan yang memenuhi standar higienis internasional.',
            'image_path' => 'gallery/factory-1.jpg',
            'category' => 'Industri',
            'is_active' => true,
            'sort_order' => 2,
        ]);
    }
}
