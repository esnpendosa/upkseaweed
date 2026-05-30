<?php

namespace Database\Seeders;

use App\Models\TradePrice;
use Illuminate\Database\Seeder;

class TradePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prices = [
            [
                'product_name' => 'Dried Cottonii',
                'quality_specs' => 'Moisture ≤38%, Impurities ≤3%',
                'reference_price' => 'Rp 28.500/kg',
                'market_trend' => '+2.5%',
                'trend_direction' => 'up',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'product_name' => 'Dried Spinosum',
                'quality_specs' => 'Moisture ≤38%, Impurities ≤3%',
                'reference_price' => 'Rp 12.000/kg',
                'market_trend' => '-1.2%',
                'trend_direction' => 'down',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'product_name' => 'Gracilaria SP',
                'quality_specs' => 'Premium Grade, Sun Dried',
                'reference_price' => 'Rp 14.500/kg',
                'market_trend' => '+0.8%',
                'trend_direction' => 'up',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'product_name' => 'Semi-Refined (SRC)',
                'quality_specs' => 'Industrial Processing Grade',
                'reference_price' => 'Contact Us',
                'market_trend' => 'Stable',
                'trend_direction' => 'stable',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($prices as $price) {
            TradePrice::firstOrCreate(['product_name' => $price['product_name']], $price);
        }
    }
}
