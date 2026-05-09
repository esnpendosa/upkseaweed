{{-- Sticky Corporate Navbar --}}
<nav class="fixed top-0 left-0 right-0 z-[100] transition-all duration-700"
     x-data="{ scrolled: false, mobileMenu: false, langOpen: false }"
     x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 30 })"
     :class="scrolled ? 'glass-dark shadow-2xl py-2' : 'bg-transparent py-6'">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4">

            {{-- Logo Area --}}
            <a href="{{ route('home') }}" class="flex items-center gap-4 shrink-0 group" id="nav-logo">
                <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center border border-white/10 group-hover:border-upkgreen/50 transition-all duration-500 shadow-2xl p-2 overflow-hidden shadow-[0_0_20px_rgba(255,255,255,0.1)]">
                    <img src="{{ asset('assets/img/logo-upkseaweed.png') }}" alt="UPK Seaweed Logo" class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="hidden xl:block">
                    <span class="text-xl font-heading font-black text-upknavy-900 dark:text-white uppercase leading-none block tracking-tighter transition-colors">UPK <span class="text-upkgreen">SEAWEED</span></span>
                    <p class="text-[7px] text-gray-400 dark:text-gray-500 tracking-[0.4em] uppercase mt-1.5 font-black opacity-80 italic transition-colors">Industrial Marine Hub</p>
                </div>
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden lg:flex items-center gap-1">
                <a href="{{ route('home') }}" class="px-4 py-2 text-[11px] font-bold uppercase tracking-widest text-gray-400 dark:text-gray-500 hover:text-upknavy-900 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-white/5 rounded-xl transition-all whitespace-nowrap">{{ __('messages.nav_home') }}</a>
                <a href="{{ route('products') }}" class="px-4 py-2 text-[11px] font-bold uppercase tracking-widest text-gray-400 dark:text-gray-500 hover:text-upknavy-900 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-white/5 rounded-xl transition-all whitespace-nowrap">{{ __('messages.nav_products') }}</a>
                <a href="{{ route('trade') }}" class="px-4 py-2 text-[11px] font-bold uppercase tracking-widest text-gray-400 dark:text-gray-500 hover:text-upknavy-900 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-white/5 rounded-xl transition-all whitespace-nowrap">{{ __('messages.nav_trade') }}</a>

                {{-- Resources --}}
                <div class="relative group" x-data="{ open: false }">
                    <button @mouseenter="open = true" @click="open = !open" class="flex items-center gap-1.5 px-4 py-2 text-[11px] font-bold uppercase tracking-widest text-gray-400 dark:text-gray-500 hover:text-upknavy-900 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-white/5 rounded-xl transition-all">
                        {{ __('messages.nav_resources') }}
                        <svg class="w-2.5 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open" @mouseleave="open = false" x-transition class="absolute left-0 mt-2 w-48 glass-dark rounded-xl shadow-2xl border border-white/10 py-2 z-50">
                        <a href="{{ route('statistics') }}" class="block px-4 py-3 text-[10px] uppercase font-black text-gray-400 dark:text-gray-300 hover:text-white hover:bg-white/5 mx-2 rounded-lg">{{ __('messages.nav_stats') }}</a>
                        <a href="{{ route('lms') }}" class="block px-4 py-3 text-[10px] uppercase font-black text-gray-400 dark:text-gray-300 hover:text-white hover:bg-white/5 mx-2 rounded-lg">{{ __('messages.nav_lms') }}</a>
                        <a href="{{ route('regulations') }}" class="block px-4 py-3 text-[10px] uppercase font-black text-gray-400 dark:text-gray-300 hover:text-white hover:bg-white/5 mx-2 rounded-lg">{{ __('messages.nav_regulations') }}</a>
                    </div>
                </div>

                {{-- Company --}}
                <div class="relative group" x-data="{ open: false }">
                    <button @mouseenter="open = true" @click="open = !open" class="flex items-center gap-1.5 px-4 py-2 text-[11px] font-bold uppercase tracking-widest text-gray-400 dark:text-gray-500 hover:text-upknavy-900 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-white/5 rounded-xl transition-all">
                        {{ __('messages.nav_company') }}
                        <svg class="w-2.5 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open" @mouseleave="open = false" x-transition class="absolute left-0 mt-2 w-48 glass-dark rounded-xl shadow-2xl border border-white/10 py-2 z-50">
                        <a href="{{ route('about') }}" class="block px-4 py-3 text-[10px] uppercase font-black text-gray-400 dark:text-gray-300 hover:text-white hover:bg-white/5 mx-2 rounded-lg">{{ __('messages.nav_about') }}</a>
                        <a href="{{ route('team') }}" class="block px-4 py-3 text-[10px] uppercase font-black text-gray-400 dark:text-gray-300 hover:text-white hover:bg-white/5 mx-2 rounded-lg">{{ __('messages.nav_team') }}</a>
                        <a href="{{ route('certifications') }}" class="block px-4 py-3 text-[10px] uppercase font-black text-gray-400 dark:text-gray-300 hover:text-white hover:bg-white/5 mx-2 rounded-lg">{{ __('messages.nav_certifications') }}</a>
                    </div>
                </div>

                <a href="{{ route('articles.index') }}" class="px-4 py-2 text-[11px] font-bold uppercase tracking-widest text-gray-400 dark:text-gray-500 hover:text-upknavy-900 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-white/5 rounded-xl transition-all whitespace-nowrap">{{ __('messages.nav_news') }}</a>
                <a href="{{ route('contact') }}" class="px-4 py-2 text-[11px] font-bold uppercase tracking-widest text-gray-400 dark:text-gray-500 hover:text-upknavy-900 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-white/5 rounded-xl transition-all whitespace-nowrap">{{ __('messages.nav_contact') }}</a>
            </div>

            {{-- Right Actions --}}
            <div class="flex items-center gap-3">
                {{-- Theme Toggle --}}
                <button @click="isDark = !isDark; 
                        if (isDark) { 
                            document.documentElement.classList.add('dark'); 
                            document.documentElement.classList.remove('light'); 
                            localStorage.setItem('theme', 'dark'); 
                        } else { 
                            document.documentElement.classList.add('light'); 
                            document.documentElement.classList.remove('dark'); 
                            localStorage.setItem('theme', 'light'); 
                        }" 
                        class="p-3.5 glass border border-gray-200 dark:border-white/10 rounded-2xl text-upknavy-900 dark:text-white hover:bg-upkgreen/10 transition-all group">
                    <svg x-show="!isDark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                    <svg x-show="isDark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 9H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </button>

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
                    <button @click="langOpen = !langOpen" class="flex items-center gap-3 px-4 py-3 glass border border-gray-200 dark:border-white/10 rounded-2xl hover:bg-upkgreen/10 transition-all group">
                        <span class="fi {{ $fullLocales[$currentLocale]['flag'] ?? 'fi-un' }} fis rounded-lg group-hover:scale-110 transition-transform"></span>
                        <span class="text-[12px] font-black text-upknavy-900 dark:text-white uppercase tracking-widest">{{ strtoupper($currentLocale) }}</span>
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
                   class="hidden sm:flex items-center justify-center px-6 py-3.5 bg-upkgreen hover:bg-upkgreen-600 text-white text-[11px] font-bold uppercase tracking-[0.2em] rounded-2xl shadow-2xl shadow-upkgreen/20 transition-all hover:scale-105 active:scale-95">
                    {{ __('messages.nav_cta') }}
                </a>

                {{-- Mobile Menu Toggle --}}
                <button @click="mobileMenu = !mobileMenu" class="lg:hidden p-3.5 glass border border-gray-200 dark:border-white/10 rounded-2xl text-upknavy-900 dark:text-white">
                    <svg x-show="!mobileMenu" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileMenu" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="mobileMenu" x-cloak x-transition class="lg:hidden fixed inset-0 z-50 bg-white dark:bg-upknavy-900 backdrop-blur-3xl p-8 overflow-y-auto">
        <div class="flex justify-between items-center mb-20">
            <span class="text-2xl font-heading font-black text-upknavy-900 dark:text-white uppercase tracking-tighter">Terminal Menu</span>
            <button @click="mobileMenu = false" class="p-5 glass rounded-3xl text-upknavy-900 dark:text-white border border-gray-200 dark:border-white/10">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="space-y-6">
            <a href="{{ route('home') }}" class="block py-6 text-xl font-black uppercase tracking-widest text-gray-500 dark:text-gray-400 border-b border-gray-100 dark:border-white/5 hover:text-upknavy-900 dark:hover:text-white transition-colors">{{ __('messages.nav_home') }}</a>
            <a href="{{ route('products') }}" class="block py-6 text-xl font-black uppercase tracking-widest text-upknavy-900 dark:text-white border-b border-gray-100 dark:border-white/5 hover:text-upkgreen transition-colors">{{ __('messages.nav_products') }}</a>
            <a href="{{ route('trade') }}" class="block py-6 text-xl font-black uppercase tracking-widest text-gray-500 dark:text-gray-400 border-b border-gray-100 dark:border-white/5 hover:text-upknavy-900 dark:hover:text-white transition-colors">{{ __('messages.nav_trade') }}</a>
            <a href="{{ route('articles.index') }}" class="block py-6 text-xl font-black uppercase tracking-widest text-gray-500 dark:text-gray-400 border-b border-gray-100 dark:border-white/5 hover:text-upknavy-900 dark:hover:text-white transition-colors">{{ __('messages.nav_news') }}</a>
            <a href="{{ route('contact') }}" class="block py-6 text-xl font-black uppercase tracking-widest text-gray-500 dark:text-gray-400 hover:text-upknavy-900 dark:hover:text-white transition-colors">{{ __('messages.nav_contact') }}</a>

            <div class="pt-12">
                 <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number') }}" class="flex items-center justify-center py-8 bg-upkgreen text-white font-black uppercase tracking-[0.3em] text-sm rounded-4xl shadow-2xl">
                    {{ __('messages.nav_cta') }}
                 </a>
            </div>
        </div>
    </div>
</nav>
