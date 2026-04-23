<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Setting;
use App\Models\TeamMember;
use App\Models\Article;
use App\Models\Certification;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Settings
        Setting::updateOrCreate(['key' => 'home_about_image'], ['value' => 'images/about.jpg']);
        
        // 2. Products
        $p1 = Product::where('title', 'LIKE', '%Gracilaria%')->first();
        if ($p1) $p1->update(['image_path' => 'products/gracilaria.jpg']);
        
        $p2 = Product::where('title', 'LIKE', '%Salt%')->first();
        if ($p2) $p2->update(['image_path' => 'products/salt.jpg']);

        // 3. Team
        $t1 = TeamMember::where('position', 'Chairman')->first();
        if ($t1) $t1->update(['photo_path' => 'team/chairman.jpg']);

        // 4. Articles
        Article::query()->update(['image_path' => 'images/about.jpg']);
        
        // 5. Certifications
        Certification::query()->update(['logo_path' => 'products/salt.jpg']);
    }
}
