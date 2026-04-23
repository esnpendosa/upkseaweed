<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Certification;
use App\Models\Regulation;
use App\Models\EducationModule;
use App\Models\Setting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the home page with dynamic segments.
     */
    public function index()
    {
        $products = Product::where('is_active', true)->ordered()->get();

        $certifications = Certification::where('is_active', true)->ordered()->get();

        $articles = \App\Models\Article::orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // SEO and Section Data
        $seo = [
            'title' => Setting::getLocalized('site_name'),
            'description' => Setting::getLocalized('site_description'),
        ];

        $stats = [
            'production' => Setting::get('stats_production', '1,240'),
            'countries'  => Setting::get('stats_countries', '12'),
            'farmers'    => Setting::get('stats_farmers', '450+'),
            'impact'     => Setting::get('stats_impact', '$3.2M'),
        ];

        $slides = \App\Models\HeroSlide::where('is_active', true)->ordered()->get();

        return view('pages.home', compact('products', 'certifications', 'articles', 'seo', 'stats', 'slides'));
    }

    public function statistics()
    {
        $stats = [
            'production' => Setting::get('stats_production', '1,240'),
            'countries'  => Setting::get('stats_countries', '12'),
            'farmers'    => Setting::get('stats_farmers', '450+'),
            'impact'     => Setting::get('stats_impact', '$3.2M'),
        ];
        
        $seo = [
            'title' => __('messages.nav_stats') . ' - ' . Setting::getLocalized('site_name'),
            'description' => Setting::getLocalized('seo_stats_desc', 'Real-time production and economic impact data of seaweed cultivation.'),
        ];

        return view('pages.statistics', compact('stats', 'seo'));
    }

    public function trade()
    {
        $seo = [
            'title' => __('messages.nav_trade') . ' - ' . Setting::getLocalized('site_name'),
            'description' => Setting::getLocalized('seo_trade_desc', 'Direct marketplace for seaweed products and global industrial trade.'),
        ];

        return view('pages.trade', compact('seo'));
    }

    public function lms()
    {
        $modules = EducationModule::where('is_active', true)->ordered()->get();
        
        $seo = [
            'title' => __('messages.nav_lms') . ' - ' . Setting::getLocalized('site_name'),
            'description' => Setting::getLocalized('seo_lms_desc', 'Knowledge base and educational modules for sustainable seaweed farming.'),
        ];

        return view('pages.lms', compact('modules', 'seo'));
    }

    public function regulations()
    {
        $regulations = Regulation::where('is_active', true)->ordered()->get();
        
        $seo = [
            'title' => __('messages.nav_regulations') . ' - ' . Setting::getLocalized('site_name'),
            'description' => Setting::getLocalized('seo_regulations_desc', 'Access official policies, legal documents, and cooperative frameworks.'),
        ];

        return view('pages.regulations', compact('regulations', 'seo'));
    }

    public function about()
    {
        $team = \App\Models\TeamMember::where('is_active', true)->ordered()->get();

        $compro = [
            'history' => Setting::getLocalized('compro_history'),
            'vision' => Setting::getLocalized('compro_vision'),
            'mission' => Setting::getLocalized('compro_mission'),
            'values' => Setting::getLocalized('compro_values'),
            'expansion' => Setting::getLocalized('compro_expansion_plan'),
            'foreword' => Setting::getLocalized('compro_foreword'),
        ];
        
        $seo = [
            'title' => __('messages.nav_about') . ' - ' . Setting::getLocalized('site_name'),
            'description' => Setting::getLocalized('seo_about_desc', 'Learn about our mission to empower seaweed farmers and industrialize the marine economy.'),
        ];

        return view('pages.about', compact('team', 'compro', 'seo'));
    }

    public function team()
    {
        $team = \App\Models\TeamMember::where('is_active', true)->orderBy('sort_order')->get();
        
        $seo = [
            'title' => __('messages.nav_team') . ' - ' . Setting::getLocalized('site_name'),
            'description' => Setting::getLocalized('seo_team_desc', 'The leadership team driving Indonesia Seaweed Industrial Hub forward.'),
        ];

        return view('pages.team', compact('team', 'seo'));
    }

    public function products()
    {
        $products = Product::where('is_active', true)->ordered()->get();

        $seo = [
            'title' => __('messages.nav_products') . ' - ' . Setting::getLocalized('site_name'),
            'description' => Setting::getLocalized('seo_products_desc', 'Browse our range of high-quality Gracilaria, Cottonii, and processed marine products.'),
        ];

        return view('pages.products', compact('products', 'seo'));
    }

    public function certifications()
    {
        $certifications = Certification::where('is_active', true)->ordered()->get();

        $seo = [
            'title' => __('messages.nav_certifications') . ' - ' . Setting::getLocalized('site_name'),
            'description' => Setting::getLocalized('seo_certifications_desc', 'Our commitment to international standards including HACCP, Halal, and Organic certifications.'),
        ];

        return view('pages.certifications', compact('certifications', 'seo'));
    }

    public function news()
    {
        $articles = \App\Models\Article::orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        $seo = [
            'title' => __('messages.nav_news') . ' - ' . Setting::getLocalized('site_name'),
            'description' => Setting::getLocalized('seo_news_desc', 'Stay updated with the latest trends, research, and news from the seaweed industry.'),
        ];

        return view('pages.news', compact('articles', 'seo'));
    }

    public function contact()
    {
        $seo = [
            'title' => __('messages.nav_contact') . ' - ' . Setting::getLocalized('site_name'),
            'description' => Setting::getLocalized('seo_contact_desc', 'Reach out to us for bulk orders, partnerships, and industrial seaweed supply inquiries.'),
        ];

        return view('pages.contact', compact('seo'));
    }

    public function privacy()
    {
        $seo = [
            'title' => __('messages.footer_privacy') . ' - ' . Setting::getLocalized('site_name'),
            'description' => 'Privacy Protocol and data protection standards of the Marine Industrial Hub.',
        ];

        return view('pages.privacy', compact('seo'));
    }

    public function compliance()
    {
        $seo = [
            'title' => __('messages.footer_terms') . ' - ' . Setting::getLocalized('site_name'),
            'description' => 'Global trade compliance and cooperative governance protocols.',
        ];

        return view('pages.compliance', compact('seo'));
    }
}
