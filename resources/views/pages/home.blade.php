@extends('layouts.app')

@section('title', 'UPK Seaweed — Industrial Hub')
@section('meta_description', 'Connecting Sustainable Farmers with the Global Marine Industry.')

@section('content')

{{-- ============= HERO SLIDER ============= --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden" id="hero">
    {{-- Swiper Container --}}
    <div class="swiper hero-swiper absolute inset-0 w-full h-full">
        <div class="swiper-wrapper">
            @forelse($slides as $slide)
            <div class="swiper-slide relative w-full h-full">
                {{-- Background Image --}}
                <div class="absolute inset-0 z-0">
                    @if($slide->image_path)
                        <img src="/media/{{ $slide->image_path }}" alt="{{ $slide->getLocalized('title') }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-upknavy via-upknavy-600 to-upknavy-800"></div>
                    @endif
                    <div class="absolute inset-0 bg-upknavy/60"></div>
                </div>

                {{-- Slide Content --}}
                <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
                    <div class="max-w-4xl pt-20">
                        <div class="reveal">
                            <span class="inline-flex items-center gap-2 bg-upkgreen/10 text-upkgreen text-[10px] font-black px-4 py-2 rounded-full border border-upkgreen/20 mb-8 uppercase tracking-widest leading-none">
                                {{ __('messages.hero_badge') }}
                            </span>
                            <h1 class="text-4xl sm:text-5xl lg:text-7xl font-heading font-extrabold text-white !text-white mb-8 leading-[0.9] tracking-tighter uppercase hero-title opacity-0">
                                {!! $slide->getLocalized('title') !!}
                            </h1>
                            <p class="text-white/80 text-lg sm:text-xl mb-12 max-w-2xl leading-relaxed font-medium hero-subtitle opacity-0">
                                {{ $slide->getLocalized('subtitle') }}
                            </p>
                            <div class="flex flex-col sm:flex-row gap-6 hero-actions opacity-0">
                                @if($slide->cta_text)
                                <a href="{{ $slide->cta_link ?? route('products') }}" class="inline-flex items-center justify-center px-10 py-5 bg-upkgreen hover:bg-upkgreen-600 text-white font-black uppercase tracking-widest text-xs rounded-2xl shadow-2xl shadow-upkgreen/20 transition-all hover:scale-105 active:scale-95">
                                    {{ $slide->getLocalized('cta_text') }}
                                </a>
                                @endif
                                <a href="{{ route('trade') }}" class="inline-flex items-center justify-center px-10 py-5 glass border border-white/10 text-white font-black uppercase tracking-widest text-xs rounded-2xl hover:bg-white/5 transition-all">
                                    {{ __('messages.hero_cta_trade') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            {{-- Fallback --}}
            <div class="swiper-slide relative w-full h-full">
                <div class="absolute inset-0 bg-gradient-to-br from-upknavy via-upknavy-600 to-upknavy-800"></div>
                <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
                    <div class="max-w-4xl pt-20 text-center">
                        <h1 class="text-6xl font-heading font-black text-white uppercase">{{ __('messages.hero_title') }}</h1>
                    </div>
                </div>
            </div>
            @endforelse
        </div>

        {{-- Navigation Dots --}}
        <div class="swiper-pagination !bottom-12"></div>
    </div>

    {{-- Overlay Patterns --}}
    <div class="absolute inset-0 opacity-[0.03] z-10 pointer-events-none" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%2310B981&quot; fill-opacity=&quot;1&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
</section>

@push('styles')
<style>
    .swiper-pagination-bullet { background: rgba(255,255,255,0.4) !important; opacity: 1 !important; width: 10px !important; height: 10px !important; margin: 0 6px !important; transition: all 0.3s ease; }
    .swiper-pagination-bullet-active { background: #10B981 !important; border-radius: 20px !important; width: 32px !important; }
    
    .hero-title { transform: translateY(20px); transition: all 1.2s cubic-bezier(0.16, 1, 0.3, 1) 0.2s; }
    .hero-subtitle { transform: translateY(20px); transition: all 1.2s cubic-bezier(0.16, 1, 0.3, 1) 0.4s; }
    .hero-actions { transform: translateY(20px); transition: all 1.2s cubic-bezier(0.16, 1, 0.3, 1) 0.6s; }
    
    .swiper-slide-active .hero-title,
    .swiper-slide-active .hero-subtitle,
    .swiper-slide-active .hero-actions { opacity: 1 !important; transform: translateY(0) !important; }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.hero-swiper', {
            loop: true,
            effect: 'fade',
            fadeEffect: { crossFade: true },
            speed: 1000,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    });
</script>
@endpush

{{-- ============= TRUST BAR ============= --}}
<section class="relative bg-white dark:bg-upknavy-700 py-12 border-y border-gray-100 dark:border-white/5 transition-colors duration-500" id="trust-bar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Dynamic Trust Items from Settings --}}
            <div class="reveal flex items-center justify-center gap-4 group">
                <div class="w-14 h-14 rounded-2xl bg-upkgreen/10 border border-upkgreen/20 flex items-center justify-center group-hover:bg-upkgreen/20 transition-all duration-300">
                    <svg class="w-7 h-7 text-upkgreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <div>
                    <div class="text-2xl font-heading font-bold text-upknavy-900 dark:text-white transition-colors">{{ \App\Models\Setting::get('trust_capacity_val', '500+ MT') }}</div>
                    <p class="text-[10px] uppercase font-black tracking-widest text-gray-400 dark:text-gray-500 transition-colors">{{ __('messages.trust_capacity') }}</p>
                </div>
            </div>
            <div class="reveal flex items-center justify-center gap-4 group">
                <div class="w-14 h-14 rounded-2xl bg-upkgreen/10 border border-upkgreen/20 flex items-center justify-center group-hover:bg-upkgreen/20 transition-all duration-300">
                    <svg class="w-7 h-7 text-upkgreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <div>
                    <div class="text-2xl font-heading font-bold text-upknavy-900 dark:text-white transition-colors">{{ \App\Models\Setting::get('trust_certified_val', 'ISO & HACCP') }}</div>
                    <p class="text-[10px] uppercase font-black tracking-widest text-gray-400 dark:text-gray-500 transition-colors">{{ __('messages.trust_certified') }}</p>
                </div>
            </div>
            <div class="reveal flex items-center justify-center gap-4 group">
                <div class="w-14 h-14 rounded-2xl bg-upkgreen/10 border border-upkgreen/20 flex items-center justify-center group-hover:bg-upkgreen/20 transition-all duration-300">
                    <svg class="w-7 h-7 text-upkgreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <div class="text-2xl font-heading font-bold text-upknavy-900 dark:text-white transition-colors">{{ \App\Models\Setting::get('trust_shipping_val', 'FOB / CIF / DDP') }}</div>
                    <p class="text-[10px] uppercase font-black tracking-widest text-gray-400 dark:text-gray-500 transition-colors">{{ __('messages.trust_shipping') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============= ABOUT SECTION ============= --}}
<section class="relative py-24 bg-white dark:bg-upknavy transition-colors duration-500 overflow-hidden" id="home-about">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
            <div class="reveal">
                <span class="inline-block px-4 py-1.5 bg-upkgreen/10 text-upkgreen text-[10px] font-black rounded-full border border-upkgreen/20 mb-8 uppercase tracking-[0.3em]">
                    {{ __('messages.home_about_badge') }}
                </span>
                <h2 class="text-3xl sm:text-5xl font-heading font-black text-upknavy-900 dark:text-white mb-8 leading-tight tracking-tighter uppercase transition-colors">
                    {{ \App\Models\Setting::getLocalized('home_about_title', __('messages.home_about_title')) }}
                </h2>
                <div class="text-gray-600 dark:text-gray-300 text-lg leading-relaxed mb-12 transition-colors">
                    {!! \App\Models\Setting::getLocalized('compro_foreword') !!}
                </div>
                <div class="grid grid-cols-2 gap-8">
                    <div class="glass p-6 rounded-3xl border border-gray-100 dark:border-white/5 card-glow group bg-slate-50/50 dark:bg-white/5 transition-colors">
                        <div class="text-4xl font-heading font-black text-upknavy-900 dark:text-white mb-2 group-hover:text-upkgreen transition-colors">{{ \App\Models\Setting::get('stats_yrs', '10+') }}</div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 dark:text-gray-500">{{ __('messages.home_about_stats_yrs') }}</p>
                    </div>
                    <div class="glass p-6 rounded-3xl border border-gray-100 dark:border-white/5 card-glow group bg-slate-50/50 dark:bg-white/5 transition-colors">
                        <div class="text-4xl font-heading font-black text-upknavy-900 dark:text-white mb-2 group-hover:text-upkgreen transition-colors">{{ \App\Models\Setting::get('stats_farmers', '200+') }}</div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-gray-500 dark:text-gray-400">{{ __('messages.home_about_stats_farmers') }}</p>
                    </div>
                </div>
            </div>
            <div class="reveal relative h-[600px] rounded-[4rem] overflow-hidden group shadow-2xl">
                 <img src="/media/{{ \App\Models\Setting::get('home_about_image', 'images/default-about.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000">
                 <div class="absolute inset-0 bg-gradient-to-t from-upknavy via-transparent to-transparent"></div>
                 <div class="absolute bottom-12 left-12 right-12">
                     <div class="glass p-8 rounded-[2rem] border border-white/10 backdrop-blur-xl">
                        <p class="text-white text-xl font-heading font-bold italic leading-relaxed">
                            "{{ \App\Models\Setting::getLocalized('home_about_quote', __('messages.home_about_quote')) }}"
                        </p>
                     </div>
                 </div>
            </div>
        </div>
    </div>
</section>

{{-- ============= PRODUCTS GRID ============= --}}
<section class="relative py-24 bg-slate-50 dark:bg-upknavy-700 transition-colors duration-500" id="products">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-8 mb-16 reveal">
            <div>
                 <h2 class="text-3xl sm:text-5xl font-heading font-black text-upknavy-900 dark:text-white mb-4 tracking-tighter uppercase transition-colors">
                    {!! __('messages.home_prod_title') !!}
                </h2>
                <p class="text-gray-600 dark:text-gray-300 text-lg font-medium transition-colors">{{ __('messages.prod_subtitle') }}</p>
            </div>
            <a href="{{ route('products') }}" class="px-8 py-4 glass border border-gray-200 dark:border-white/10 text-upknavy-900 dark:text-white text-[10px] font-black uppercase tracking-widest rounded-2xl hover:bg-upkgreen hover:border-upkgreen hover:text-white transition-all">
                {{ __('messages.prod_all') }}
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($products->take(4) as $product)
            <div class="reveal glass rounded-[3rem] p-4 border border-gray-100 dark:border-white/5 bg-white dark:bg-upknavy-800 hover:border-upkgreen/30 transition-all duration-500 group shadow-2xl overflow-hidden">
                <div class="aspect-square rounded-[2.5rem] bg-gray-50 dark:bg-white/5 mb-8 overflow-hidden relative">
                    <img src="{{ $product->image_path ? '/media/' . $product->image_path : 'https://placehold.co/600x600/0A192F/10B981?text=UPK' }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000 p-2 rounded-[2.5rem]">
                    <div class="absolute top-6 left-6">
                        <span class="text-[8px] font-black uppercase tracking-[0.3em] bg-upkgreen/20 text-upkgreen px-4 py-1.5 rounded-full backdrop-blur-md border border-upkgreen/20">{{ $product->grade_type }}</span>
                    </div>
                </div>
                <div class="px-6 pb-6">
                    <h3 class="text-upknavy-900 dark:text-white font-heading font-black text-xl mb-3 tracking-tight group-hover:text-upkgreen transition-colors">{{ $product->getLocalized('title') }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-xs line-clamp-2 leading-relaxed mb-6 transition-colors">{{ $product->getLocalized('description') }}</p>
                    <div class="flex items-center justify-between pt-6 border-t border-gray-100 dark:border-white/5">
                        <span class="text-[10px] font-black text-upkgreen uppercase tracking-widest">{{ __('messages.home_inquire_price') }}</span>
                        <svg class="w-5 h-5 text-gray-300 dark:text-gray-700 group-hover:text-upkgreen transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============= TRADE & STATS ============= --}}
<section class="relative py-24 bg-white dark:bg-upknavy transition-colors duration-500 overflow-hidden">
    {{-- Dynamic Background Blob --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[1000px] h-[1000px] bg-blue-600/[0.03] rounded-full blur-[120px] -z-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="reveal">
                <span class="text-blue-600 dark:text-blue-500 text-[10px] font-black uppercase tracking-[0.4em] mb-8 block transition-colors">{{ __('messages.trade_badge') }}</span>
                <h2 class="text-3xl sm:text-5xl font-heading font-black text-upknavy-900 dark:text-white mb-8 tracking-tighter uppercase leading-tight transition-colors">
                    {{ __('messages.trade_title') }}
                </h2>
                <p class="text-gray-700 dark:text-gray-300 text-xl leading-relaxed mb-12 transition-colors">
                    {{ __('messages.trade_desc') }}
                </p>
                <div class="flex flex-wrap gap-6">
                    <a href="{{ route('trade') }}" class="px-10 py-5 bg-blue-600 hover:bg-blue-700 text-white font-black uppercase tracking-widest text-xs rounded-2xl shadow-2xl shadow-blue-600/20 transition-all hover:scale-105">
                        {{ __('messages.home_enter_trade') }}
                    </a>
                    <a href="{{ route('statistics') }}" class="px-10 py-5 glass border border-gray-200 dark:border-white/10 text-upknavy-900 dark:text-white font-black uppercase tracking-widest text-xs rounded-2xl hover:bg-slate-100 dark:hover:bg-white/5 transition-all">
                        {{ __('messages.home_market_stats') }}
                    </a>
                </div>
            </div>
            <div class="reveal bg-slate-50 dark:bg-upknavy-800 rounded-[3.5rem] border border-gray-100 dark:border-white/5 p-12 card-glow shadow-2xl transition-colors">
                 <div class="grid grid-cols-1 gap-12">
                    <div class="flex items-center justify-between border-b border-gray-200 dark:border-white/5 pb-8 transition-colors">
                        <div>
                            <p class="text-upknavy-900 dark:text-white font-black text-4xl mb-1 transition-colors">{{ \App\Models\Setting::get('stats_production', '1,240') }} <span class="text-blue-600 dark:text-blue-500 text-sm italic">{{ __('messages.stats_mt') }}</span></p>
                            <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 dark:text-gray-600 transition-colors">{{ __('messages.stats_capacity_label') }}</p>
                        </div>
                        <div class="w-16 h-16 rounded-2xl bg-blue-600/10 flex items-center justify-center text-blue-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-upknavy-900 dark:text-white font-black text-4xl mb-1 transition-colors">{{ \App\Models\Setting::get('stats_export_value', '$3.2M') }}</p>
                            <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 dark:text-gray-600 transition-colors">{{ __('messages.stats_trade_label') }}</p>
                        </div>
                        <div class="w-16 h-16 rounded-2xl bg-upkgreen/10 flex items-center justify-center text-upkgreen">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</section>

{{-- ============= KNOWLEDGE & NEWS ============= --}}
<section class="relative py-24 bg-slate-50 dark:bg-upknavy-700 transition-colors duration-500" id="lms">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20 reveal">
            <span class="text-purple-600 dark:text-purple-500 text-[10px] font-black uppercase tracking-[0.4em] mb-6 block transition-colors">{{ __('messages.edu_badge') }}</span>
            <h2 class="text-4xl sm:text-6xl font-heading font-black text-upknavy-900 dark:text-white mb-6 uppercase tracking-tight transition-colors">{{ __('messages.edu_title') }}</h2>
            <p class="text-gray-600 dark:text-gray-300 text-lg max-w-2xl mx-auto transition-colors">{{ __('messages.edu_desc') }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
            @foreach(\App\Models\EducationModule::where('is_active', true)->ordered()->take(3)->get() as $module)
            <a href="{{ $module->link ?? route('lms') }}" class="reveal group glass rounded-[3rem] p-10 border border-gray-200 dark:border-white/5 bg-white dark:bg-upknavy-800 hover:border-purple-500/50 transition-all duration-500 shadow-xl overflow-hidden relative">
                @if($module->image_path)
                    <div class="absolute inset-0 -z-10 opacity-10 group-hover:opacity-20 transition-opacity">
                        <img src="/media/{{ $module->image_path }}" class="w-full h-full object-cover grayscale">
                    </div>
                @endif
                <div class="w-16 h-16 rounded-2xl bg-purple-500/10 flex items-center justify-center text-purple-600 dark:text-purple-400 mb-8 border border-purple-500/20 group-hover:scale-110 transition-transform">
                    {!! $module->icon ?? '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>' !!}
                </div>
                <h3 class="text-upknavy-900 dark:text-white font-heading font-black text-2xl mb-4 tracking-tight group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">{{ $module->getLocalized('title') }}</h3>
                <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed line-clamp-3 transition-colors">{{ $module->getLocalized('description') }}</p>
                <div class="mt-8 flex items-center gap-3 text-purple-600 dark:text-purple-400 text-[10px] font-black uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-all">
                    {{ __('messages.home_start_learning') }} <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </div>
            </a>
            @endforeach
        </div>

        {{-- Latest Articles --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1 reveal">
                <h2 class="text-3xl font-heading font-black text-upknavy-900 dark:text-white mb-6 uppercase tracking-tighter transition-colors">{{ __('messages.news_title') }}</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-8 leading-relaxed transition-colors">{{ __('messages.news_subtitle') }}</p>
                <a href="{{ route('articles.index') }}" class="text-upkgreen font-black text-[10px] uppercase tracking-[0.3em] border-b-2 border-upkgreen pb-1 hover:text-upknavy-900 dark:hover:text-white hover:border-upknavy-900 dark:hover:border-white transition-all">
                    {{ __('messages.news_all') }}
                </a>
            </div>
            @foreach($articles->take(2) as $article)
            <article class="reveal glass rounded-[3rem] overflow-hidden group border border-gray-100 dark:border-white/5 bg-white dark:bg-upknavy-800 transition-colors">
                <div class="aspect-video relative overflow-hidden">
                    <img src="{{ $article->image_path ? '/media/' . $article->image_path : 'https://placehold.co/800x450/0A192F/10B981?text=News' }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-all duration-1000">
                    <div class="absolute inset-0 bg-gradient-to-t from-upknavy to-transparent opacity-60"></div>
                </div>
                <div class="p-10">
                    <span class="text-[8px] font-black text-upkgreen uppercase tracking-widest mb-4 block">{{ $article->getLocalized('category') }}</span>
                    <h3 class="text-xl font-heading font-black text-upknavy-900 dark:text-white mb-6 group-hover:text-upkgreen transition-colors line-clamp-2 leading-tight uppercase">{{ $article->getLocalized('title') }}</h3>
                    <a href="{{ route('articles.show', $article->slug) }}" class="text-gray-500 dark:text-gray-400 hover:text-upknavy-900 dark:hover:text-white text-[10px] font-black uppercase tracking-widest flex items-center gap-2 transition-colors">
                        {{ __('messages.home_read_insight') }} <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

{{-- ============= BOTTOM CTA ============= --}}
<section class="relative py-32 bg-white dark:bg-upknavy transition-colors duration-500 overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-upkgreen/5 via-transparent to-transparent"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="reveal max-w-4xl mx-auto">
            <h2 class="text-4xl sm:text-7xl font-heading font-black text-upknavy-900 dark:text-white mb-8 tracking-tighter uppercase leading-[0.9] transition-colors">
                {{ __('messages.cta_h2') }}
            </h2>
            <p class="text-gray-700 dark:text-gray-300 text-xl sm:text-2xl mb-12 font-medium leading-relaxed transition-colors">
                 {{ __('messages.cta_p') }}
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number') }}" class="px-12 py-6 bg-upkgreen hover:bg-upkgreen-600 text-white font-black uppercase tracking-[0.2em] text-[10px] rounded-[2rem] shadow-2xl shadow-upkgreen/20 transition-all hover:scale-105 active:scale-95">
                    {{ __('messages.cta_btn_primary') }}
                </a>
                <a href="mailto:{{ \App\Models\Setting::get('site_email') }}" class="px-12 py-6 glass border border-gray-200 dark:border-white/10 text-upknavy-900 dark:text-white font-black uppercase tracking-[0.2em] text-[10px] rounded-[2rem] hover:bg-slate-100 dark:hover:bg-white/5 transition-all">
                    {{ __('messages.cta_btn_secondary') }}
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
