{{-- Sticky Corporate Navbar --}}
<nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-500"
     x-data="{ scrolled: false, langOpen: false }"
     x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
     :class="scrolled ? 'glass-dark shadow-2xl py-2' : 'bg-transparent py-4'">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group" id="nav-logo">
                <div class="w-10 h-10 bg-gradient-to-br from-upkgreen to-upkgreen-300 rounded-lg flex items-center justify-center shadow-lg group-hover:shadow-upkgreen/30 transition-shadow duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <span class="text-lg font-heading font-bold text-white uppercase leading-none block">{{ __('messages.nav_company_name_line1') }} <span class="text-upkgreen">{{ __('messages.nav_company_name_line2') }}</span></span>
                    <p class="text-[8px] text-gray-500 tracking-[0.12em] uppercase mt-0.5">{{ __('messages.nav_tagline') }}</p>
                </div>
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden lg:flex items-center gap-1">
                <a href="#products" class="nav-link px-4 py-2 text-sm font-medium text-gray-300 hover:text-white rounded-lg hover:bg-white/5 transition-all duration-200" id="nav-products">
                    {{ __('messages.nav_products') }}
                </a>
                <a href="#certifications" class="nav-link px-4 py-2 text-sm font-medium text-gray-300 hover:text-white rounded-lg hover:bg-white/5 transition-all duration-200" id="nav-certifications">
                    {{ __('messages.nav_certifications') }}
                </a>
                <a href="#about" class="nav-link px-4 py-2 text-sm font-medium text-gray-300 hover:text-white rounded-lg hover:bg-white/5 transition-all duration-200" id="nav-about">
                    {{ __('messages.nav_about') }}
                </a>
                <a href="#news" class="nav-link px-4 py-2 text-sm font-medium text-gray-300 hover:text-white rounded-lg hover:bg-white/5 transition-all duration-200" id="nav-news">
                    {{ __('messages.nav_news') }}
                </a>
                <a href="#contact" class="nav-link px-4 py-2 text-sm font-medium text-gray-300 hover:text-white rounded-lg hover:bg-white/5 transition-all duration-200" id="nav-contact">
                    {{ __('messages.nav_contact') }}
                </a>

                {{-- Language Switcher --}}
                <div class="relative ml-2" x-data="{ langOpen: false }">
                    <button @click="langOpen = !langOpen" @click.outside="langOpen = false"
                            class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-300 hover:text-white rounded-lg hover:bg-white/5 transition-all duration-200 border border-white/10"
                            id="language-switcher">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                        </svg>
                        <span class="uppercase font-semibold text-xs">{{ strtoupper(app()->getLocale()) }}</span>
                        <svg class="w-3 h-3 transition-transform" :class="langOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    {{-- Dropdown --}}
                    <div x-show="langOpen"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute right-0 mt-2 w-52 glass-dark rounded-xl shadow-2xl overflow-hidden divide-y divide-white/5"
                         style="display: none;">
                        @php
                            $langs = [
                                'en' => ['flag' => '🇺🇸', 'label' => 'English'],
                                'id' => ['flag' => '🇮🇩', 'label' => 'Indonesia'],
                                'ja' => ['flag' => '🇯🇵', 'label' => '日本語'],
                                'zh' => ['flag' => '🇨🇳', 'label' => '中文'],
                                'ko' => ['flag' => '🇰🇷', 'label' => '한국어'],
                                'ar' => ['flag' => '🇸🇦', 'label' => 'العربية'],
                                'es' => ['flag' => '🇪🇸', 'label' => 'Español'],
                                'fr' => ['flag' => '🇫🇷', 'label' => 'Français'],
                                'de' => ['flag' => '🇩🇪', 'label' => 'Deutsch'],
                                'pt' => ['flag' => '🇧🇷', 'label' => 'Português'],
                                'ru' => ['flag' => '🇷🇺', 'label' => 'Русский'],
                                'nl' => ['flag' => '🇳🇱', 'label' => 'Nederlands'],
                                'it' => ['flag' => '🇮🇹', 'label' => 'Italiano'],
                                'hi' => ['flag' => '🇮🇳', 'label' => 'हिन्दी'],
                                'th' => ['flag' => '🇹🇭', 'label' => 'ไทย'],
                                'vi' => ['flag' => '🇻🇳', 'label' => 'Tiếng Việt'],
                                'ms' => ['flag' => '🇲🇾', 'label' => 'Bahasa Melayu'],
                                'tr' => ['flag' => '🇹🇷', 'label' => 'Türkçe'],
                            ];
                            $currentLocale = app()->getLocale();
                        @endphp
                        <div class="py-1 max-h-80 overflow-y-auto custom-scrollbar">
                            @foreach($langs as $code => $lang)
                                <a href="?lang={{ $code }}"
                                   class="flex items-center gap-3 px-4 py-2.5 text-sm hover:bg-white/10 transition-colors {{ $currentLocale === $code ? 'text-upkgreen bg-upkgreen/10 font-bold' : 'text-gray-300' }}"
                                   id="lang-{{ $code }}">
                                    <span class="text-base">{{ $lang['flag'] }}</span>
                                    <span>{{ $lang['label'] }}</span>
                                    @if($currentLocale === $code)
                                        <svg class="w-3.5 h-3.5 ml-auto text-upkgreen flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- CTA Button --}}
                <a href="#contact"
                   class="ml-4 px-6 py-2.5 bg-upkgreen hover:bg-upkgreen-600 text-white text-sm font-semibold rounded-lg shadow-lg shadow-upkgreen/25 hover:shadow-upkgreen/40 transition-all duration-300 hover:scale-105"
                   id="nav-cta-quote">
                    {{ __('messages.nav_cta') }}
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <button @click="mobileMenu = !mobileMenu"
                    class="lg:hidden p-2 text-gray-300 hover:text-white rounded-lg hover:bg-white/10 transition-all"
                    id="mobile-menu-toggle">
                <svg x-show="!mobileMenu" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileMenu" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="mobileMenu"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="lg:hidden glass-dark mt-2 mx-4 rounded-2xl shadow-2xl overflow-hidden"
         style="display: none;">
        <div class="p-4 space-y-1">
            <a href="#products" @click="mobileMenu = false" class="block px-4 py-3 text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 rounded-lg transition-all">{{ __('messages.nav_products') }}</a>
            <a href="#certifications" @click="mobileMenu = false" class="block px-4 py-3 text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 rounded-lg transition-all">{{ __('messages.nav_certifications') }}</a>
            <a href="#about" @click="mobileMenu = false" class="block px-4 py-3 text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 rounded-lg transition-all">{{ __('messages.nav_about') }}</a>
            <a href="#news" @click="mobileMenu = false" class="block px-4 py-3 text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 rounded-lg transition-all">{{ __('messages.nav_news') }}</a>
            <a href="#contact" @click="mobileMenu = false" class="block px-4 py-3 text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 rounded-lg transition-all">{{ __('messages.nav_contact') }}</a>

            {{-- Mobile Language Switcher Grid --}}
            <div class="pt-3 border-t border-white/10">
                <p class="text-xs text-gray-500 uppercase tracking-wider px-2 mb-2">Language Selection</p>
                <div class="grid grid-cols-4 gap-2">
                    @foreach($langs ?? [] as $code => $lang)
                        <a href="?lang={{ $code }}"
                           class="flex flex-col items-center gap-1 py-3 px-1 rounded-xl text-center transition-all {{ (app()->getLocale() === $code) ? 'bg-upkgreen/20 text-upkgreen ring-1 ring-upkgreen/50' : 'text-gray-400 hover:bg-white/5' }}">
                            <span class="text-xl">{{ $lang['flag'] }}</span>
                            <span class="text-[8px] font-bold uppercase">{{ $code }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Mobile CTA --}}
            <a href="#contact" @click="mobileMenu = false"
               class="block text-center px-4 py-3 bg-upkgreen hover:bg-upkgreen-600 text-white text-sm font-semibold rounded-lg transition-all mt-4">
                {{ __('messages.nav_cta') }}
            </a>
        </div>
    </div>
</nav>

{{-- Pass langs to view for mobile menu --}}
@php
    if (!isset($langs)) {
        $langs = [
            'en' => ['flag' => '🇺🇸', 'label' => 'English'],
            'id' => ['flag' => '🇮🇩', 'label' => 'Indonesia'],
            'ja' => ['flag' => '🇯🇵', 'label' => '日本語'],
            'zh' => ['flag' => '🇨🇳', 'label' => '中文'],
            'ko' => ['flag' => '🇰🇷', 'label' => '한국어'],
            'ar' => ['flag' => '🇸🇦', 'label' => 'العربية'],
            'es' => ['flag' => '🇪🇸', 'label' => 'Español'],
            'fr' => ['flag' => '🇫🇷', 'label' => 'Français'],
            'de' => ['flag' => '🇩🇪', 'label' => 'Deutsch'],
            'pt' => ['flag' => '🇧🇷', 'label' => 'Português'],
            'ru' => ['flag' => '🇷🇺', 'label' => 'Русский'],
            'nl' => ['flag' => '🇳🇱', 'label' => 'Nederlands'],
            'it' => ['flag' => '🇮🇹', 'label' => 'Italiano'],
            'hi' => ['flag' => '🇮🇳', 'label' => 'हिन्दी'],
            'th' => ['flag' => '🇹🇭', 'label' => 'ไทย'],
            'vi' => ['flag' => '🇻🇳', 'label' => 'Tiếng Việt'],
            'ms' => ['flag' => '🇲🇾', 'label' => 'Bahasa Melayu'],
            'tr' => ['flag' => '🇹🇷', 'label' => 'Türkçe'],
        ];
    }
@endphp
