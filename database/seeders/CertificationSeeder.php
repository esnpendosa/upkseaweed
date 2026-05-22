<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Seeder;

class CertificationSeeder extends Seeder
{
    public function run(): void
    {
        Certification::updateOrCreate(
            ['name' => 'Sertifikat Kelayakan Pengolahan (Good Manufacturing Practices)'],
            [
                'description' => 'Sertifikat Kelayakan Pengolahan (SKP) No. 32512/35/SKP/KR/VII/2024 untuk Unit Pengolahan Ikan KOPERASI KAMPUNG PERIKANAN BUDIDAYA RUMPUT LAUT. Jenis Produk: Rumput Laut Kering.',
                'logo_path' => null,
                'is_active' => true,
                'sort_order' => 1,
            ]
        );
    }
}
