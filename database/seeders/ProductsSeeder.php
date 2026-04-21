<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'title' => 'Raw Dried Gracilaria',
                'grade_type' => 'Gracilaria',
                'description' => 'Budidaya rumput laut ini memiliki potensi ekonomi yang signifikan dan memberikan manfaat ekologis karena dapat membantu menyaring nutrisi berlebih dari perairan, serta menyediakan habitat bagi berbagai organisme laut. Kami memiliki lahan sekitar 100 hektar untuk budidaya rumput laut jenis ini.',
                'moisture_content' => '≤18%',
                'impurity_content' => '≤3%',
                'packaging_details' => '50kg compressed bale',
                'is_active' => true,
            ],
            [
                'title' => 'Premium Sea Salt',
                'grade_type' => 'Other',
                'description' => 'Sistem pengolahan garam yang melibatkan serangkaian kolam air yang dirancang untuk memanfaatkan penguapan air laut. Diproduksi dari lahan kurang lebih 10 hektar dengan peningkatan kualitas berkala.',
                'moisture_content' => 'Low',
                'impurity_content' => 'Minimal',
                'packaging_details' => 'Bulk or Sacks',
                'is_active' => true,
            ],
            [
                'title' => 'Traditional Salted Fish',
                'grade_type' => 'Other',
                'description' => 'Mata pencarian utama warga adalah nelayan, sehingga salah satu produk utama kami adalah ikan asin. Dibuat melalui proses pembersihan, penggaraman, dan pengeringan higienis di bawah sinar matahari.',
                'moisture_content' => 'Dried',
                'impurity_content' => 'Clean',
                'packaging_details' => 'Vacuum or Plastic Wrap',
                'is_active' => true,
            ],
            [
                'title' => 'Processed Seafood Products',
                'grade_type' => 'Other',
                'description' => 'Produk UMKM anggota koperasi meliputi Sambel Cumi, Kripik Ikan, Terasi, Petis, Abon, dan makanan siap saji seperti Bonggolan/Otak-otak.',
                'moisture_content' => 'N/A',
                'impurity_content' => 'N/A',
                'packaging_details' => 'Retail Packaging',
                'is_active' => true,
            ]
        ];

        foreach ($products as $productData) {
            Product::updateOrCreate(
                ['slug' => Str::slug($productData['title'])],
                $productData
            );
        }
    }
}
