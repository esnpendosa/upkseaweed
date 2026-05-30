<?php

namespace Database\Seeders;

use App\Models\Certification;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::firstOrCreate(
            ['email' => 'admin@upkseaweed.id'],
            [
                'name' => 'UPK Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // Seed Products
        $products = [
            [
                'title' => 'Premium Dried Eucheuma Cottonii',
                'slug' => 'premium-dried-eucheuma-cottonii',
                'grade_type' => 'Cottonii',
                'moisture_content' => '≤38%',
                'impurity_content' => '≤2%',
                'packaging_details' => '50kg Compressed Bale, PP Woven Bag',
                'description' => 'High-grade Eucheuma Cottonii sourced from the pristine waters of East Java. Ideal for kappa-carrageenan extraction with excellent gel strength and viscosity properties.',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Dried Eucheuma Spinosum',
                'slug' => 'dried-eucheuma-spinosum',
                'grade_type' => 'Spinosum',
                'moisture_content' => '≤35%',
                'impurity_content' => '≤3%',
                'packaging_details' => '50kg Bale, Compressed',
                'description' => 'Premium Eucheuma Spinosum for iota-carrageenan production. Delivers superior thickening and stabilizing performance for dairy and food applications.',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Dried Gracilaria SP',
                'slug' => 'dried-gracilaria-sp',
                'grade_type' => 'Gracilaria',
                'moisture_content' => '≤20%',
                'impurity_content' => '≤5%',
                'packaging_details' => '25kg PP Bag',
                'description' => 'Carefully processed Gracilaria seaweed, ideal for agar-agar production. Consistently high gel strength meeting international food safety standards.',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Semi-Refined Carrageenan (SRC)',
                'slug' => 'semi-refined-carrageenan-src',
                'grade_type' => 'SRC',
                'moisture_content' => '≤12%',
                'impurity_content' => '≤1%',
                'packaging_details' => '25kg Kraft Paper Bag with PE Liner',
                'description' => 'Food-grade Semi-Refined Carrageenan powder processed from select Cottonii. Suitable for meat, dairy, and beverage applications with high gel strength.',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Raw Dried Seaweed (Bulk)',
                'slug' => 'raw-dried-seaweed-bulk',
                'grade_type' => 'Cottonii',
                'moisture_content' => '≤40%',
                'impurity_content' => '≤5%',
                'packaging_details' => 'Loose Bulk in Container',
                'description' => 'Cost-effective bulk raw dried seaweed for large-scale processing facilities. Available in container-load quantities with competitive FOB pricing.',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Premium Washed Cottonii',
                'slug' => 'premium-washed-cottonii',
                'grade_type' => 'Cottonii',
                'moisture_content' => '≤35%',
                'impurity_content' => '≤1%',
                'packaging_details' => '50kg Compressed Bale',
                'description' => 'Triple-washed Eucheuma Cottonii with ultra-low impurity content. Premium grade for high-end carrageenan manufacturers requiring superior raw material.',
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(['slug' => $product['slug']], $product);
        }

        // Seed Certifications
        $certifications = [
            [
                'name' => 'ISO 9001:2015',
                'issuing_body' => 'SGS International',
                'year_acquired' => '2019',
                'description' => 'Quality Management System certification ensuring consistent quality in all operations.',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'HACCP',
                'issuing_body' => 'Bureau Veritas',
                'year_acquired' => '2020',
                'description' => 'Hazard Analysis Critical Control Points certification for food safety management.',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'ISO 22000:2018',
                'issuing_body' => 'TÜV Rheinland',
                'year_acquired' => '2021',
                'description' => 'Food Safety Management System ensuring safe food products throughout the supply chain.',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Halal Certified',
                'issuing_body' => 'BPJPH / MUI',
                'year_acquired' => '2018',
                'description' => 'Halal certification from the Indonesian Ulema Council ensuring compliance with Islamic dietary laws.',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'FDA Registered',
                'issuing_body' => 'U.S. FDA',
                'year_acquired' => '2022',
                'description' => 'Registered with the U.S. Food and Drug Administration for export to the United States.',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'BPOM Certified',
                'issuing_body' => 'BPOM Indonesia',
                'year_acquired' => '2018',
                'description' => 'Indonesian National Agency of Drug and Food Control certification.',
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($certifications as $cert) {
            Certification::firstOrCreate(['name' => $cert['name']], $cert);
        }

        $this->call(TradePriceSeeder::class);
    }
}
