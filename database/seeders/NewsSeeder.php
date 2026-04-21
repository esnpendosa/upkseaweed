<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Article::create([
            'title' => 'Rumput Laut Pangkahkulon Go Internasional Berkat Kopdes Merah Putih',
            'slug' => 'rumput-laut-pangkahkulon-go-internasional',
            'excerpt' => 'Belum genap sebulan dibentuk, Koperasi Desa (Kopdes) Merah Putih Pangkahkulon berhasil mengantongi sertifikat HACCP dari KKP dan bersiap melakukan ekspor ke China.',
            'content' => 'GRESIK - Koperasi Desa (Kopdes) Merah Putih Pangkahkulon, Kecamatan Ujungpangkah, Gresik melalui hasil budidaya rumput laut sudah mengantongi sertifikat HACCP (Hazard Analysis and Critical Control Points) dari Kementerian Kelautan dan Perikanan (KKP). Sertifikat tersebut diserahkan langsung oleh perwakilan KKP Surabaya II bersama Bupati Gresik Fandi Akhmad Yani kepada Kepala Desa Pangkahkulon Ahmad Fauron.',
            'author' => 'Bumi Nusantara News',
            'published_at' => '2025-06-24 10:00:00',
        ]);

        \App\Models\Article::create([
            'title' => 'Baru 2 Bulan Dibentuk, Kopdes Merah Putih Pangkahkulon Kantongi Sertifikat HACCP',
            'slug' => 'kopdes-pangkahkulon-kantongi-sertifikat-haccp',
            'excerpt' => 'Koperasi Desa Merah Putih Pangkahkulon mencetak prestasi gemilang dengan resmi mengantongi sertifikat HACCP sebagai standar mutu keamanan pangan untuk ekspor.',
            'content' => 'Gresik - Baru dua bulan dibentuk, Koperasi Desa Merah Putih Pangkahkulon mencetak prestasi yang sangat gemilang. Koperasi ini resmi mengantongi sertifikat HACCP dari Badan Mutu KKP Surabaya II, menjadi Koperasi Desa Merah Putih se-Indonesia yang pertama kali memenuhi standar keamanan pangan untuk ekspor. Penyerahan sertifikat disaksikan oleh Bupati Gresik Fandi Akhmad Yani.',
            'author' => 'KabarBaik.co',
            'published_at' => '2025-06-24 11:00:00',
        ]);
    }
}
