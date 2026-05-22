<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticlesSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Sejarah Singkat Kampung Perikanan Budidaya Rumput Laut',
                'author' => 'Admin',
                'content' => 'Pertumbuhan koperasi rumput laut terus berkembang seiring waktu, dengan fokus pada pengembangan teknologi pertanian rumput laut dan peningkatan efisiensi produksi. Koperasi ini melibatkan petani lokal dalam pengelolaan sumber daya alam secara berkelanjutan. Pada abad ke-21, koperasi usaha rumput laut semakin menonjol di berbagai negara, berkontribusi pada ekonomi lokal dan keberlanjutan lingkungan. Peran koperasi ini tidak hanya dalam aspek ekonomi tetapi juga dalam menjaga kelestarian ekosistem pesisir dan memberdayakan komunitas nelayan.',
                'image_path' => null,
                'published_at' => now(),
            ],
            [
                'title' => 'Rencana Pengembangan Usaha Koperasi',
                'author' => 'Admin',
                'content' => 'Berikut rencana pengembangan usaha koperasi: 1. Evaluasi situasi saat ini. 2. Tetapkan tujuan SMART jangka pendek dan jangka panjang. 3. Identifikasi peluang pengembangan pasar. 4. Tingkatkan sumber daya manusia melalui pelatihan. 5. Investasi dalam teknologi informasi. 6. Ekspansi pasar dan diversifikasi produk. 7. Jalin kemitraan dengan organisasi terkait. 8. Tetapkan metrik kinerja dan evaluasi secara berkala. 9. Komunikasi terbuka dan keterlibatan anggota. Dengan pendekatan ini, koperasi dapat mengalami pertumbuhan yang berkelanjutan dan meningkatkan layanan kepada anggota dan masyarakat.',
                'image_path' => null,
                'published_at' => now(),
            ]
        ];

        foreach ($articles as $articleData) {
            Article::updateOrCreate(
                ['slug' => Str::slug($articleData['title'])],
                $articleData
            );
        }
    }
}
