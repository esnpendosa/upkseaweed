@extends('layouts.app')

@section('title', 'UPK Seaweed — ' . __('messages.hero_h1_line1') . ' ' . __('messages.hero_h1_line3'))
@section('meta_description', 'UPK Seaweed (Ujungpangkah Kulon Marine) — ' . __('messages.hero_subtitle'))

@section('content')

{{-- ============================================ --}}
{{-- HERO SECTION --}}
{{-- ============================================ --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden" id="hero">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-br from-upknavy via-upknavy-600 to-upknavy-800"></div>
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%2310B981&quot; fill-opacity=&quot;1&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        <div class="absolute top-20 left-10 w-72 h-72 bg-upkgreen/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-upkgreen/5 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1.5s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-upkgreen/[0.03] rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-20">
        <div class="text-center max-w-4xl mx-auto">
            <div class="inline-flex items-center gap-2 bg-upkgreen/10 border border-upkgreen/20 rounded-full px-5 py-2 mb-8 animate-fade-in">
                <span class="w-2 h-2 bg-upkgreen rounded-full animate-pulse"></span>
                <span class="text-upkgreen text-sm font-medium tracking-wide">{{ __('messages.hero_badge') }}</span>
            </div>

            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-heading font-extrabold text-white leading-tight mb-8 animate-fade-in-up" style="animation-delay: 0.1s;">
                {{ \App\Models\Setting::get('hero_title_1', __('messages.hero_h1_line1')) }} <span class="gradient-text">{{ \App\Models\Setting::get('hero_title_2', __('messages.hero_h1_line2')) }}</span>
            </h1>

            <p class="text-lg sm:text-xl text-gray-300 max-w-2xl mx-auto mb-12 animate-fade-in-up" style="animation-delay: 0.2s;">
                {{ \App\Models\Setting::get('hero_subtitle', __('messages.hero_subtitle')) }}
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="#products"
                   class="group px-8 py-4 bg-upkgreen hover:bg-upkgreen-600 text-white font-semibold rounded-xl shadow-2xl shadow-upkgreen/25 hover:shadow-upkgreen/40 transition-all duration-300 hover:scale-105 flex items-center gap-2"
                   id="hero-cta-products">
                    {{ __('messages.hero_cta_products') }}
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                <a href="#contact"
                   class="px-8 py-4 border border-white/20 hover:border-upkgreen/50 text-white font-semibold rounded-xl hover:bg-white/5 transition-all duration-300 flex items-center gap-2"
                   id="hero-cta-contact">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    {{ __('messages.hero_cta_quote') }}
                </a>
            </div>

            <div class="mt-16 animate-bounce">
                <a href="#trust-bar" class="inline-flex flex-col items-center gap-2 text-gray-500 hover:text-upkgreen transition-colors">
                    <span class="text-xs uppercase tracking-widest">{{ __('messages.hero_scroll') }}</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="wave-bg">
        <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M0,40 C360,80 720,0 1080,40 C1260,60 1380,50 1440,45 L1440,80 L0,80 Z" fill="#0A192F" fill-opacity="0.5"/>
            <path d="M0,50 C360,90 720,10 1080,50 C1260,70 1380,60 1440,55 L1440,80 L0,80 Z" fill="#07101F"/>
        </svg>
    </div>
</section>

{{-- ============================================ --}}
{{-- TRUST BAR --}}
{{-- ============================================ --}}
<section class="relative bg-upknavy-700 py-12 border-y border-white/5" id="trust-bar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="reveal flex items-center justify-center gap-4 group">
                <div class="w-14 h-14 rounded-2xl bg-upkgreen/10 border border-upkgreen/20 flex items-center justify-center group-hover:bg-upkgreen/20 transition-all duration-300">
                    <svg class="w-7 h-7 text-upkgreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <div>
                    <div class="text-2xl font-heading font-bold text-white">500+ MT</div>
                    <p class="text-sm text-gray-400">{{ __('messages.trust_capacity') }}</p>
                </div>
            </div>
            <div class="reveal flex items-center justify-center gap-4 group" style="transition-delay: 0.1s;">
                <div class="w-14 h-14 rounded-2xl bg-upkgreen/10 border border-upkgreen/20 flex items-center justify-center group-hover:bg-upkgreen/20 transition-all duration-300">
                    <svg class="w-7 h-7 text-upkgreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <div>
                    <div class="text-2xl font-heading font-bold text-white">ISO & HACCP</div>
                    <p class="text-sm text-gray-400">{{ __('messages.trust_certified') }}</p>
                </div>
            </div>
            <div class="reveal flex items-center justify-center gap-4 group" style="transition-delay: 0.2s;">
                <div class="w-14 h-14 rounded-2xl bg-upkgreen/10 border border-upkgreen/20 flex items-center justify-center group-hover:bg-upkgreen/20 transition-all duration-300">
                    <svg class="w-7 h-7 text-upkgreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <div class="text-2xl font-heading font-bold text-white">FOB / CIF</div>
                    <p class="text-sm text-gray-400">{{ __('messages.trust_shipping') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================ --}}
{{-- ABOUT SECTION --}}
{{-- ============================================ --}}
<section class="relative py-24 bg-upknavy" id="about">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="lg:w-1/2 reveal">
                <span class="inline-block px-4 py-1.5 bg-upkgreen/10 text-upkgreen text-sm font-bold rounded-full border border-upkgreen/20 mb-6 uppercase tracking-widest">
                    {{ __('messages.about_badge') }}
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-heading font-bold text-white mb-8 leading-tight">
                    {{ \App\Models\Setting::get('about_title', __('messages.about_h2_1') . ' ' . __('messages.about_h2_2')) }}
                </h2>
                <div class="space-y-6 text-gray-400 text-lg leading-relaxed mb-8">
                    <p>
                        {{ \App\Models\Setting::get('about_description', __('messages.about_p1')) }}
                    </p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach([
                        ['about_direct','about_direct_sub'],
                        ['about_trace','about_trace_sub'],
                        ['about_quality','about_quality_sub'],
                        ['about_sustain','about_sustain_sub'],
                    ] as $item)
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-upkgreen/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-upkgreen" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-white">{{ __('messages.'.$item[0]) }}</p>
                            <p class="text-xs text-gray-500">{{ __('messages.'.$item[1]) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="reveal grid grid-cols-2 gap-4" style="transition-delay: 0.2s;">
                <div class="glass rounded-2xl p-6 text-center card-glow">
                    <div class="text-3xl font-heading font-bold gradient-text mb-1">10+</div>
                    <p class="text-sm text-gray-400">{{ __('messages.about_years') }}</p>
                </div>
                <div class="glass rounded-2xl p-6 text-center card-glow">
                    <div class="text-3xl font-heading font-bold gradient-text mb-1">15+</div>
                    <p class="text-sm text-gray-400">{{ __('messages.about_countries') }}</p>
                </div>
                <div class="glass rounded-2xl p-6 text-center card-glow">
                    <div class="text-3xl font-heading font-bold gradient-text mb-1">200+</div>
                    <p class="text-sm text-gray-400">{{ __('messages.about_farmers') }}</p>
                </div>
                <div class="glass rounded-2xl p-6 text-center card-glow">
                    <div class="text-3xl font-heading font-bold gradient-text mb-1">6K+</div>
                    <p class="text-sm text-gray-400">{{ __('messages.about_export') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================ --}}
{{-- PRODUCTS SECTION --}}
{{-- ============================================ --}}
<section class="relative py-24 bg-upknavy-700" id="products">
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-upkgreen/30 to-transparent"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
            <span class="inline-flex items-center gap-2 bg-upkgreen/10 text-upkgreen text-sm font-medium px-4 py-1.5 rounded-full border border-upkgreen/20 mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                {{ __('messages.products_badge') }}
            </span>
            <h2 class="text-3xl sm:text-4xl font-heading font-bold text-white mb-4">
                {{ __('messages.products_h2') }} <span class="gradient-text">{{ __('messages.products_h2_2') }}</span> {{ __('messages.products_h2_3') }}
            </h2>
            <p class="text-gray-400 max-w-2xl mx-auto">{{ __('messages.products_desc') }}</p>
        </div>

        @if($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
                    <div class="reveal group glass rounded-2xl overflow-hidden card-glow" style="transition-delay: {{ $loop->index * 0.1 }}s;">
                        <div class="relative h-56 overflow-hidden bg-upknavy-600">
                            @if($product->image_path)
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-upknavy-600 to-upknavy-800">
                                    <svg class="w-16 h-16 text-upkgreen/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-upkgreen/90 backdrop-blur-sm text-white text-xs font-semibold rounded-full shadow-lg">{{ $product->grade_type }}</span>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-upknavy/80 via-transparent to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-heading font-bold text-white mb-3 group-hover:text-upkgreen transition-colors">{{ $product->title }}</h3>
                            @if($product->description)
                                <p class="text-sm text-gray-400 mb-4 line-clamp-2">{{ $product->description }}</p>
                            @endif
                            <div class="space-y-2 mb-5">
                                @if($product->moisture_content)
                                    <div class="flex items-center justify-between py-2 border-b border-white/5">
                                        <span class="text-xs text-gray-500 uppercase tracking-wider">{{ __('messages.products_moisture') }}</span>
                                        <span class="text-sm font-medium text-upkgreen">{{ $product->moisture_content }}</span>
                                    </div>
                                @endif
                                @if($product->impurity_content)
                                    <div class="flex items-center justify-between py-2 border-b border-white/5">
                                        <span class="text-xs text-gray-500 uppercase tracking-wider">{{ __('messages.products_impurity') }}</span>
                                        <span class="text-sm font-medium text-upkgreen">{{ $product->impurity_content }}</span>
                                    </div>
                                @endif
                                @if($product->packaging_details)
                                    <div class="flex items-center justify-between py-2">
                                        <span class="text-xs text-gray-500 uppercase tracking-wider">{{ __('messages.products_packaging') }}</span>
                                        <span class="text-sm font-medium text-gray-300">{{ $product->packaging_details }}</span>
                                    </div>
                                @endif
                            </div>
                            <a href="https://wa.me/6281234567890?text=Hello%2C%20I%20am%20interested%20in%20{{ urlencode($product->title) }}"
                               target="_blank"
                               class="flex items-center justify-center gap-2 w-full py-3 bg-upkgreen/10 hover:bg-upkgreen text-upkgreen hover:text-white border border-upkgreen/30 hover:border-upkgreen rounded-xl text-sm font-semibold transition-all duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                {{ __('messages.products_inquire') }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16 glass rounded-2xl">
                <svg class="w-16 h-16 text-upkgreen/30 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                <h3 class="text-lg font-heading font-semibold text-gray-300 mb-2">{{ __('messages.products_empty') }}</h3>
                <p class="text-sm text-gray-500">{{ __('messages.products_empty_sub') }}</p>
            </div>
        @endif
    </div>
</section>

{{-- ============================================ --}}
{{-- CERTIFICATIONS SECTION --}}
{{-- ============================================ --}}
<section class="relative py-24 bg-upknavy" id="certifications">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
            <span class="inline-flex items-center gap-2 bg-upkgreen/10 text-upkgreen text-sm font-medium px-4 py-1.5 rounded-full border border-upkgreen/20 mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                {{ __('messages.cert_badge') }}
            </span>
            <h2 class="text-3xl sm:text-4xl font-heading font-bold text-white mb-4">
                {{ __('messages.cert_h2') }} <span class="gradient-text">{{ __('messages.cert_h2_2') }}</span>
            </h2>
            <p class="text-gray-400 max-w-2xl mx-auto">{{ __('messages.cert_desc') }}</p>
        </div>

        @if($certifications->count() > 0)
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($certifications as $cert)
                    <div class="reveal glass rounded-2xl p-6 text-center card-glow group" style="transition-delay: {{ $loop->index * 0.1 }}s;">
                        <div class="w-20 h-20 mx-auto mb-4 rounded-2xl bg-white/5 flex items-center justify-center overflow-hidden group-hover:bg-white/10 transition-all duration-300">
                            @if($cert->logo_path)
                                <img src="{{ asset('storage/' . $cert->logo_path) }}" alt="{{ $cert->name }}" class="w-14 h-14 object-contain" loading="lazy">
                            @else
                                <svg class="w-10 h-10 text-upkgreen/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            @endif
                        </div>
                        <h4 class="text-base font-heading font-bold text-white mb-1 group-hover:text-upkgreen transition-colors">{{ $cert->name }}</h4>
                        @if($cert->issuing_body)
                            <p class="text-xs text-gray-500 mb-1">{{ $cert->issuing_body }}</p>
                        @endif
                        @if($cert->year_acquired)
                            <span class="inline-block text-[10px] text-upkgreen bg-upkgreen/10 px-2 py-0.5 rounded-full font-medium">
                                {{ __('messages.cert_since') }} {{ $cert->year_acquired }}
                            </span>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16 glass rounded-2xl">
                <svg class="w-16 h-16 text-upkgreen/30 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                <h3 class="text-lg font-heading font-semibold text-gray-300 mb-2">{{ __('messages.cert_empty') }}</h3>
                <p class="text-sm text-gray-500">{{ __('messages.cert_empty_sub') }}</p>
            </div>
        @endif
    </div>
</section>

{{-- ============================================ --}}
{{-- NEWS SECTION --}}
{{-- ============================================ --}}
<section class="relative py-24 bg-upknavy-700" id="news">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
            <span class="inline-flex items-center gap-2 bg-upkgreen/10 text-upkgreen text-sm font-medium px-4 py-1.5 rounded-full border border-upkgreen/20 mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                {{ __('messages.news_badge') }}
            </span>
            <h2 class="text-3xl sm:text-4xl font-heading font-bold text-white mb-4">
                {{ __('messages.news_h2') }} <span class="gradient-text">{{ __('messages.news_h2_2') }}</span>
            </h2>
            <p class="text-gray-400 max-w-2xl mx-auto">{{ __('messages.news_desc') }}</p>
        </div>

        @if($articles->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($articles as $article)
                    <article class="reveal group glass rounded-2xl overflow-hidden card-glow flex flex-col h-full" style="transition-delay: {{ $loop->index * 0.1 }}s;">
                        <div class="relative h-52 overflow-hidden bg-upknavy-600">
                            @if($article->image_path)
                                <img src="{{ asset('storage/' . $article->image_path) }}" alt="{{ $article->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-upknavy-600 to-upknavy-800">
                                    <svg class="w-16 h-16 text-upkgreen/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-upknavy to-transparent">
                                <time class="text-upkgreen text-xs font-semibold tracking-wider flex items-center gap-2">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    {{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}
                                </time>
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <a href="{{ route('articles.show', $article->slug) }}" class="group/title">
                                <h3 class="text-xl font-heading font-bold text-white mb-3 group-hover/title:text-upkgreen transition-colors line-clamp-2">
                                    {{ $article->title }}
                                </h3>
                            </a>
                            <p class="text-sm text-gray-400 mb-6 line-clamp-3 flex-grow">
                                {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 120) }}
                            </p>
                            <a href="{{ route('articles.show', $article->slug) }}" class="inline-flex items-center gap-2 text-upkgreen text-sm font-semibold hover:gap-3 transition-all">
                                {{ __('messages.news_read_more') }}
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="text-center py-16 glass rounded-2xl">
                <p class="text-gray-500">{{ __('messages.news_empty') }}</p>
            </div>
        @endif
    </div>
</section>

{{-- ============================================ --}}
{{-- CTA SECTION --}}
{{-- ============================================ --}}
<section class="relative py-24 bg-upknavy-700 overflow-hidden">
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-upkgreen/30 to-transparent"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-upkgreen/[0.02] rounded-full blur-3xl"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="reveal text-center max-w-3xl mx-auto">
            <span class="inline-flex items-center gap-2 bg-upkgreen/10 text-upkgreen text-sm font-medium px-4 py-1.5 rounded-full border border-upkgreen/20 mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                {{ __('messages.cta_badge') }}
            </span>
            <h2 class="text-3xl sm:text-4xl font-heading font-bold text-white mb-6">
                {{ __('messages.cta_h2') }} <span class="gradient-text">{{ __('messages.cta_h2_2') }}</span>
            </h2>
            <p class="text-gray-400 mb-10 leading-relaxed">{{ __('messages.cta_desc') }}</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="https://wa.me/6281234567890?text=Hello%20UPK%20Seaweed%2C%20I%20would%20like%20to%20discuss%20a%20supply%20contract."
                   target="_blank"
                   class="group px-8 py-4 bg-upkgreen hover:bg-upkgreen-600 text-white font-semibold rounded-xl shadow-2xl shadow-upkgreen/25 hover:shadow-upkgreen/40 transition-all duration-300 hover:scale-105 flex items-center gap-2"
                   id="cta-whatsapp">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    {{ __('messages.cta_whatsapp') }}
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="mailto:export@upkseaweed.id"
                   class="px-8 py-4 border border-white/20 hover:border-upkgreen/50 text-white font-semibold rounded-xl hover:bg-white/5 transition-all duration-300 flex items-center gap-2"
                   id="cta-email">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    {{ __('messages.cta_email') }}
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
