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
            'site_name'         => ['KAMPUNG PERIKANAN BUDIDAYA RUMPUT LAUT', 'text'],
            'seo_title'         => ['KAMPUNG PERIKANAN BUDIDAYA RUMPUT LAUT — Budidaya & Ekspor Terpercaya', 'text'],
            'seo_description'   => ['Koperasi Kampung Perikanan Budidaya Rumput Laut Pangkahkulon Gresik. Ahli dalam budidaya, pengolahan, dan pemasaran produk rumput laut berkualitas tinggi (Gracilaria), Garam, dan Ikan Asin.', 'textarea'],
            'seo_keywords'      => ['kampung rumput laut, rumput laut gresik, pangkahkulon, budidaya rumput laut, gracilaria indonesia, koperasi perikanan', 'text'],
            
            'hero_title_1'      => ['Kampung Perikanan', 'text'],
            'hero_title_2'      => ['Budidaya Rumput Laut', 'text'],
            'hero_subtitle'     => ['Selamat datang di profil Koperasi Perikanan Budidaya Rumput Laut. Berkomitmen memberikan layanan terbaik dalam mendukung perkembangan ekonomi lokal.', 'textarea'],
            
            'about_title'       => ['Tentang Kami / About Us', 'text'],
            'about_description' => ['KOPERASI "KAMPUNG PERIKANAN BUDIDAYA RUMPUT LAUT" merupakan sebuah usaha bersama yang didirikan oleh sekelompok individu yang berkomitmen untuk mengembangkan potensi rumput laut. Kami fokus pada budidaya, pengolahan, dan pemasaran produk-produk berkualitas tinggi dari rumput laut. Dengan semangat kolaborasi, kami berusaha memberdayakan anggota koperasi melalui peningkatan keterampilan, akses pasar, dan pembangunan berkelanjutan.', 'textarea'],
            
            'vision'            => ['Mewujudkan kesejahteraan anggota melalui inovasi berkelanjutan, pemberdayaan komunitas, dan kemitraan strategis untuk pertumbuhan ekonomi yang berkelanjutan.', 'textarea'],
            'mission'           => ['Meningkatkan kesejahteraan anggota melalui pemberdayaan ekonomi, pendidikan kooperatif, dan keberlanjutan lingkungan, dengan berfokus pada transparansi, partisipasi aktif anggota, serta inovasi dalam layanan dan produk.', 'textarea'],
            'corporate_values'  => ['Inklusivitas, Partisipasi Demokratis, Keadilan Ekonomi, Solidaritas, dan Tanggung Jawab Sosial.', 'textarea'],

            'contact_email'      => ['adm@koperasikampungrumputlaut.com', 'text'],
            'contact_phone'      => ['+62 822 2821 4233', 'text'],
            'contact_address'    => ['Jl. Setro Barat, Desa/Kelurahan Pangkahkulon, Kec. Ujungpangkah, Kab. Gresik, Provinsi Jawa Timur', 'textarea'],
            'contact_whatsapp'   => ['6282228214233', 'text'],
        ];

        foreach ($settings as $key => $data) {
            \App\Models\Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $data[0], 'type' => $data[1]]
            );
        }
    }
}
