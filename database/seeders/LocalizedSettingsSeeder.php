<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class LocalizedSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // English Localizations
            'hero_subtitle_en'      => ['Welcome to the Seaweed Cultivation Fishery Village Cooperative. We are committed to delivering the best service in supporting local economic development through sustainable marine farming.', 'textarea'],
            'about_title_en'        => ['About Our Cooperative', 'text'],
            'about_description_en'  => ['The "Seaweed Cultivation Fishery Village" Cooperative is a joint venture founded by a group of individuals committed to developing the potential of seaweed. We focus on cultivation, processing, and marketing high-quality seaweed products. With a spirit of collaboration, we strive to empower cooperative members through skill improvement, market access, and sustainable development.', 'textarea'],
            'vision_en'             => ['Realizing member welfare through innovation sustainability, community empowerment, and partnership strategic for sustainable economic growth.', 'textarea'],
            'mission_en'            => ['Improving the welfare of members through economic empowerment, cooperative education, and environmental sustainability, with a focus on transparency, active member participation, and internal innovation services and products.', 'textarea'],

            // Chinese Localizations
            'hero_subtitle_zh'      => ['欢迎浏览海藻养殖渔业合作社商业合作社简介。自成立以来，我们一直致力于提供为支持地方经济发展提供最好的服务。', 'textarea'],
            'about_title_zh'        => ['关于我们 / About Us', 'text'],
            'about_description_zh'  => ['“海藻养殖渔业村”合作社是由一群致力于开发海藻潜力的个人创办的合资企业。我们专注于优质产品的种植、加工和营销。本着协作精神，我们努力通过提高技能、市场准入和可持续发展来增强合作社成员的发展。', 'textarea'],
            'vision_zh'             => ['以创新实现会员福利：可持续发展、社区赋权和伙伴关系，可持续经济增长战略。', 'textarea'],
            'mission_zh'            => ['通过经济赋权改善成员的福利，合作教育和环境可持续性，重点是透明度、会员积极参与和内部创新服务和产品。', 'textarea'],
        ];

        foreach ($settings as $key => $data) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $data[0], 'type' => $data[1]]
            );
        }
    }
}
