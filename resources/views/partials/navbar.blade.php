{{-- Sticky Corporate Navbar --}}
<nav class="fixed top-0 left-0 right-0 z-[100] transition-all duration-700"
     x-data="{ scrolled: false, mobileMenu: false, langOpen: false }"
     x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 30 })"
     :class="scrolled ? 'glass-dark shadow-2xl py-2' : 'bg-transparent py-6'">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4">

            {{-- Logo Area --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0 group" id="nav-logo">
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-upkgreen/10 rounded-2xl flex items-center justify-center border border-upkgreen/20 group-hover:border-upkgreen/50 transition-all duration-500 shadow-2xl">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 text-upkgreen group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="hidden xl:block">
                    <span class="text-xs sm:text-sm font-heading font-black text-white uppercase leading-none block tracking-tighter">UPK <span class="text-upkgreen">SEAWEED</span></span>
                    <p class="text-[6px] text-gray-500 tracking-[0.3em] uppercase mt-1 font-black">Industrial Marine Hub</p>
                </div>
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden lg:flex items-center gap-0.5">
                <a href="{{ route('home') }}" class="px-3 py-2 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-white transition-all whitespace-nowrap">{{ __('messages.nav_home') }}</a>
                <a href="{{ route('products') }}" class="px-3 py-2 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-white transition-all whitespace-nowrap">{{ __('messages.nav_products') }}</a>
                <a href="{{ route('trade') }}" class="px-3 py-2 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-white transition-all whitespace-nowrap">{{ __('messages.nav_trade') }}</a>

                {{-- Resources --}}
                <div class="relative group" x-data="{ open: false }">
                    <button @mouseenter="open = true" @click="open = !open" class="flex items-center gap-1.5 px-3 py-2 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-white transition-all">
                        {{ __('messages.nav_resources') }}
                        <svg class="w-2.5 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open" @mouseleave="open = false" x-transition class="absolute left-0 mt-2 w-48 glass-dark rounded-xl shadow-2xl border border-white/10 py-2 z-50">
                        <a href="{{ route('statistics') }}" class="block px-4 py-3 text-[10px] uppercase font-black text-gray-300 hover:text-white hover:bg-white/5 mx-2 rounded-lg">{{ __('messages.nav_stats') }}</a>
                        <a href="{{ route('lms') }}" class="block px-4 py-3 text-[10px] uppercase font-black text-gray-300 hover:text-white hover:bg-white/5 mx-2 rounded-lg">{{ __('messages.nav_lms') }}</a>
                        <a href="{{ route('regulations') }}" class="block px-4 py-3 text-[10px] uppercase font-black text-gray-300 hover:text-white hover:bg-white/5 mx-2 rounded-lg">{{ __('messages.nav_regulations') }}</a>
                    </div>
                </div>

                {{-- Company --}}
                <div class="relative group" x-data="{ open: false }">
                    <button @mouseenter="open = true" @click="open = !open" class="flex items-center gap-1.5 px-3 py-2 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-white transition-all">
                        {{ __('messages.nav_company') }}
                        <svg class="w-2.5 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open" @mouseleave="open = false" x-transition class="absolute left-0 mt-2 w-48 glass-dark rounded-xl shadow-2xl border border-white/10 py-2 z-50">
                        <a href="{{ route('about') }}" class="block px-4 py-3 text-[10px] uppercase font-black text-gray-300 hover:text-white hover:bg-white/5 mx-2 rounded-lg">{{ __('messages.nav_about') }}</a>
                        <a href="{{ route('team') }}" class="block px-4 py-3 text-[10px] uppercase font-black text-gray-300 hover:text-white hover:bg-white/5 mx-2 rounded-lg">{{ __('messages.nav_team') }}</a>
                        <a href="{{ route('certifications') }}" class="block px-4 py-3 text-[10px] uppercase font-black text-gray-300 hover:text-white hover:bg-white/5 mx-2 rounded-lg">{{ __('messages.nav_certifications') }}</a>
                    </div>
                </div>

                <a href="{{ route('articles.index') }}" class="px-3 py-2 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-white transition-all whitespace-nowrap">{{ __('messages.nav_news') }}</a>
                <a href="{{ route('contact') }}" class="px-3 py-2 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-white transition-all whitespace-nowrap">{{ __('messages.nav_contact') }}</a>
            </div>

            {{-- Right Actions --}}
            <div class="flex items-center gap-3">
                {{-- Language Selector --}}
                @php
                    $fullLocales = [
                        'en' => ['flag' => 'fi-us', 'name' => 'English'],
                        'id' => ['flag' => 'fi-id', 'name' => 'Indonesia'],
                        'zh' => ['flag' => 'fi-cn', 'name' => 'Chinese'],
                        'ja' => ['flag' => 'fi-jp', 'name' => 'Japanese'],
                        'ko' => ['flag' => 'fi-kr', 'name' => 'Korean'],
                        'ar' => ['flag' => 'fi-sa', 'name' => 'Arabic'],
                        'fr' => ['flag' => 'fi-fr', 'name' => 'French'],
                        'es' => ['flag' => 'fi-es', 'name' => 'Spanish'],
                        'de' => ['flag' => 'fi-de', 'name' => 'German'],
                        'ru' => ['flag' => 'fi-ru', 'name' => 'Russian'],
                        'it' => ['flag' => 'fi-it', 'name' => 'Italian'],
                        'pt' => ['flag' => 'fi-pt', 'name' => 'Portuguese'],
                        'nl' => ['flag' => 'fi-nl', 'name' => 'Dutch'],
                        'tr' => ['flag' => 'fi-tr', 'name' => 'Turkish'],
                        'vi' => ['flag' => 'fi-vn', 'name' => 'Vietnamese'],
                        'th' => ['flag' => 'fi-th', 'name' => 'Thai'],
                        'hi' => ['flag' => 'fi-in', 'name' => 'Hindi'],
                        'ms' => ['flag' => 'fi-my', 'name' => 'Malay'],
                    ];
                    $currentLocale = app()->getLocale();
                @endphp
                <div class="relative" x-data="{ langOpen: false }">
                    <button @click="langOpen = !langOpen" class="flex items-center gap-3 px-4 py-3 glass border border-white/10 rounded-2xl hover:bg-upkgreen/10 transition-all group">
                        <span class="fi {{ $fullLocales[$currentLocale]['flag'] ?? 'fi-un' }} fis rounded-lg group-hover:scale-110 transition-transform"></span>
                        <span class="text-[12px] font-black text-white uppercase tracking-widest">{{ strtoupper($currentLocale) }}</span>
                        <svg class="w-3 opacity-30 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="langOpen" @click.outside="langOpen = false" x-transition class="absolute right-0 mt-4 w-56 glass-dark rounded-2xl shadow-2xl border border-white/10 py-3 z-50 h-96 overflow-y-auto custom-scrollbar">
                        @foreach($fullLocales as $code => $data)
                            <a href="?lang={{ $code }}" class="flex items-center justify-between px-6 py-4 hover:bg-upkgreen/10 transition-all {{ $currentLocale == $code ? 'bg-upkgreen/5 text-upkgreen' : 'text-gray-400' }}">
                                <div class="flex items-center gap-4">
                                    <span class="fi {{ $data['flag'] }} fis rounded-md scale-125"></span>
                                    <span class="text-[10px] font-black uppercase tracking-widest">{{ $data['name'] }}</span>
                                </div>
                                @if($currentLocale == $code)
                                <svg class="w-4 h-4 text-upkgreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- CTA Button --}}
                <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number') }}" target="_blank"
                   class="hidden sm:flex items-center justify-center px-8 py-4 bg-upkgreen hover:bg-upkgreen-600 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-2xl shadow-2xl shadow-upkgreen/20 transition-all hover:scale-105 active:scale-95">
                    {{ __('messages.nav_cta') }}
                </a>

                {{-- Mobile Menu Toggle --}}
                <button @click="mobileMenu = !mobileMenu" class="lg:hidden p-3.5 glass border border-white/10 rounded-2xl text-white">
                    <svg x-show="!mobileMenu" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileMenu" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="mobileMenu" x-cloak x-transition class="lg:hidden fixed inset-0 z-50 bg-upknavy/98 backdrop-blur-3xl p-8 overflow-y-auto">
        <div class="flex justify-between items-center mb-20">
            <span class="text-2xl font-heading font-black text-white uppercase tracking-tighter">Terminal Menu</span>
            <button @click="mobileMenu = false" class="p-5 glass rounded-3xl text-white border border-white/10">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="space-y-6">
            <a href="{{ route('home') }}" class="block py-6 text-xl font-black uppercase tracking-widest text-gray-400 border-b border-white/5 hover:text-white">{{ __('messages.nav_home') }}</a>
            <a href="{{ route('products') }}" class="block py-6 text-xl font-black uppercase tracking-widest text-white border-b border-white/5 hover:text-upkgreen">{{ __('messages.nav_products') }}</a>
            <a href="{{ route('trade') }}" class="block py-6 text-xl font-black uppercase tracking-widest text-gray-400 border-b border-white/5 hover:text-white">{{ __('messages.nav_trade') }}</a>
            <a href="{{ route('articles.index') }}" class="block py-6 text-xl font-black uppercase tracking-widest text-gray-400 border-b border-white/5 hover:text-white">{{ __('messages.nav_news') }}</a>
            <a href="{{ route('contact') }}" class="block py-6 text-xl font-black uppercase tracking-widest text-gray-400 hover:text-white">{{ __('messages.nav_contact') }}</a>

            <div class="pt-12">
                 <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number') }}" class="flex items-center justify-center py-8 bg-upkgreen text-white font-black uppercase tracking-[0.3em] text-sm rounded-4xl shadow-2xl">
                    {{ __('messages.nav_cta') }}
                 </a>
            </div>
        </div>
    </div>
</nav>
