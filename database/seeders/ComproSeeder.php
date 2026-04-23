<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use App\Models\TeamMember;
use App\Models\Regulation;
use App\Models\EducationModule;

class ComproSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Core Compro Settings
        $settings = [
            'compro_foreword' => 'SELAMAT DATANG DI PROFIL KOPERASI USAHA KOPERASI PERIKANAN BUDIDAYA RUMPUT LAUT. SEJAK BERDIRI, KAMI TELAH BERKOMITMEN UNTUK MEMBERIKAN LAYANAN TERBAIK DALAM MENDUKUNG PERKEMBANGAN EKONOMI LOKAL...',
            'compro_foreword_en' => 'WELCOME TO THE COOPERATIVE BUSINESS COOPERATIVE PROFILE SEAWEED CULTIVATION FISHERIES. SINCE ITS FOUNDING, WE HAVE COMMITTED TO DELIVER THE BEST SERVICE...',
            'compro_foreword_zh' => '欢迎浏览海藻养殖渔业合作社商业合作社简介。⾃成⽴以来，我们⼀直致⼒于提供为⽀持地⽅经济发展提供最好的服务...',
            
            'compro_history' => 'KOPERASI "KAMPUNG PERIKANAN BUDIDAYA RUMPUT LAUT" MERUPAKAN SEBUAH USAHA BERSAMA YANG DIDIRIKAN PADA 24 NOVEMBER 2023...',
            'compro_history_en' => 'COOPERATIVE "CULTIVATION FISHERIES VILLAGE SEAWEED" IS A BUSINESS JOINT VENTURE FOUNDED ON 24 NOVEMBER 2023...',
            
            'compro_vision' => 'MEWUJUDKAN KESEJAHTERAAN ANGGOTA MELALUI INOVASI BERKELANJUTAN, PEMBERDAYAAN KOMUNITAS, DAN KEMITRAAN STRATEGIS.',
            'compro_vision_en' => 'REALIZING MEMBER WELFARE THROUGH INNOVATION SUSTAINABILITY, COMMUNITY EMPOWERMENT, AND PARTNERSHIP STRATEGIC.',
            
            'compro_mission' => 'MENINGKATKAN KESEJAHTERAAN ANGGOTA MELALUI PEMBERDAYAAN EKONOMI, PENDIDIKAN KOOPERATIF, DAN KEBERLANJUTAN LINGKUNGAN...',
            'compro_mission_en' => 'IMPROVING THE WELFARE OF MEMBERS THROUGH ECONOMIC EMPOWERMENT, COOPERATIVE EDUCATION, AND ENVIRONMENTAL SUSTAINABILITY...',
            
            'compro_values' => 'INKLUSIVITAS, PARTISIPASI DEMOKRATIS, KEADILAN EKONOMI, SOLIDARITAS, DAN TANGGUNG JAWAB SOSIAL.',
            'compro_values_en' => 'INCLUSIVITY, PARTICIPATION DEMOCRACY, ECONOMIC JUSTICE, SOLIDARITY, AND SOCIAL RESPONSIBILITY.',

            'compro_expansion_plan' => '1. Evaluasi situasi saat ini. 2. Tetapkan tujuan SMART. 3. Identifikasi peluang pasar. 4. Tingkatkan SDM melalui pelatihan. 5. Investasi TI...',
            'compro_expansion_plan_en' => '1. Evaluate the current situation. 2. Set SMART goals. 3. Identify market opportunities. 4. Human resources training. 5. IT investment...',
            
            'office_address' => 'Jl. Setro Barat, Desa/Kelurahan Pangkahkulon, Kec. Ujungpangkah, Kab. Gresik, Provinsi Jawa Timur',
            'site_email' => 'adm@koperasikampungrumputlaut.com',
            'hero_title' => 'INDONESIA <span class="gradient-text">SEAWEED</span> INDUSTRIAL HUB',
            'hero_subtitle' => 'Connecting Sustainable Farmers with the Global Marine Industry. High-quality marine products processed with excellence.',
            'hero_cta' => 'Explore Catalogue',
            'whatsapp_number' => '6282228214233',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // 2. Team Members (Structure)
        TeamMember::updateOrCreate(
            ['name' => 'MUHAMMAD KHASIM'],
            ['position' => 'Chairman', 'address' => 'JL. DRUJU P.KULON', 'phone' => '+6281231617350', 'sort_order' => 1]
        );
        TeamMember::updateOrCreate(
            ['name' => 'ABDUR ROSYID'],
            ['position' => 'Secretary', 'address' => 'JL. KALUNGAPURI P.KULON', 'phone' => '+6282228214233', 'sort_order' => 2]
        );
        TeamMember::updateOrCreate(
            ['name' => 'FUAD MUZAKI'],
            ['position' => 'Treasurer', 'address' => 'JL. TEGALSARI P.KULON', 'phone' => '+6285806217111', 'sort_order' => 3]
        );
        TeamMember::updateOrCreate(
            ['name' => 'DIDIK FARIANTO'],
            ['position' => 'Supervisor', 'sort_order' => 4]
        );

        // 3. Products based on Compro list
        // I'll update existing or create new ones
        \App\Models\Product::updateOrCreate(['title' => 'Gracilaria Seaweed'], ['slug' => 'gracilaria-seaweed', 'grade_type' => 'Gracilaria', 'description' => 'High quality seaweed cultivation with over 100 hectares of land...', 'sort_order' => 1]);
        \App\Models\Product::updateOrCreate(['title' => 'Traditional Salt'], ['slug' => 'traditional-salt', 'grade_type' => 'Salt', 'description' => 'Salt processing system utilizing natural sea water evaporation...', 'sort_order' => 2]);
        \App\Models\Product::updateOrCreate(['title' => 'Salted Fish'], ['slug' => 'salted-fish', 'grade_type' => 'Fish', 'description' => 'Main livelihood of residents, processed with sun-drying or special machines...', 'sort_order' => 3]);
        \App\Models\Product::updateOrCreate(['title' => 'Processed Foods'], ['slug' => 'processed-foods', 'grade_type' => 'Food', 'description' => 'Sambal Cumi, Fish Chips, and Shreddred Meat by MSME members...', 'sort_order' => 4]);

        // 4. Legal Documents
        Regulation::updateOrCreate(['title' => 'Deed of Establishment'], ['category' => 'Legal Document', 'is_active' => true, 'sort_order' => 1]);
        Regulation::updateOrCreate(['title' => 'Business Registration Number'], ['category' => 'Legal Document', 'is_active' => true, 'sort_order' => 2]);
        Regulation::updateOrCreate(['title' => 'Inauguration Document'], ['category' => 'Legal Document', 'is_active' => true, 'sort_order' => 3]);
    }
}
