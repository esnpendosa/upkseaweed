{{-- Premium Responsive Corporate Navbar --}}
<nav class="fixed top-0 left-0 right-0 z-[100] transition-all duration-700"
     x-data="{ 
        scrolled: false, 
        mobileMenu: false, 
        langOpen: false,
        activeDropdown: null 
     }"
     x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
     :class="scrolled ? 'glass-dark shadow-2xl py-3' : 'bg-transparent py-6'">
    
    <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-10">
        <div class="flex items-center justify-between">

            {{-- Logo Section --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0 group">
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-white rounded-xl sm:rounded-2xl flex items-center justify-center border border-gray-100 dark:border-white/10 group-hover:border-upkgreen/50 transition-all duration-500 shadow-xl p-1.5 sm:p-2 overflow-hidden shadow-[0_0_15px_rgba(255,255,255,0.05)]">
                    <img src="{{ asset('assets/img/logo-upkseaweed.png') }}" alt="Logo" class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="hidden sm:block">
                    <span class="text-lg sm:text-xl font-heading font-black text-upknavy-900 dark:text-white uppercase leading-none block tracking-tighter transition-colors">UPK <span class="text-upkgreen">SEAWEED</span></span>
                    <p class="text-[6px] sm:text-[7px] text-gray-500 dark:text-gray-400 tracking-[0.3em] uppercase mt-1 font-bold opacity-80 italic transition-colors">Industrial Marine Hub</p>
                </div>
            </a>

            {{-- Desktop Navigation (Dynamic Breakpoints) --}}
            <div class="hidden xl:flex items-center bg-gray-50/50 dark:bg-white/5 p-1.5 rounded-2xl border border-gray-100 dark:border-white/5 transition-colors">
                <a href="{{ route('home') }}" class="px-4 py-2 text-[11px] font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400 hover:text-upknavy-900 dark:hover:text-white hover:bg-white dark:hover:bg-white/10 rounded-xl transition-all whitespace-nowrap">{{ __('messages.nav_home') }}</a>
                <a href="{{ route('products') }}" class="px-4 py-2 text-[11px] font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400 hover:text-upknavy-900 dark:hover:text-white hover:bg-white dark:hover:bg-white/10 rounded-xl transition-all whitespace-nowrap">{{ __('messages.nav_products') }}</a>
                <a href="{{ route('trade') }}" class="px-4 py-2 text-[11px] font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400 hover:text-upknavy-900 dark:hover:text-white hover:bg-white dark:hover:bg-white/10 rounded-xl transition-all whitespace-nowrap">{{ __('messages.nav_trade') }}</a>

                {{-- Dropdown: Resources --}}
                <div class="relative" @mouseenter="activeDropdown = 'resources'" @mouseleave="activeDropdown = null">
                    <button class="flex items-center gap-1.5 px-4 py-2 text-[11px] font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400 hover:text-upknavy-900 dark:hover:text-white hover:bg-white dark:hover:bg-white/10 rounded-xl transition-all">
                        {{ __('messages.nav_resources') }}
                        <svg class="w-2.5 opacity-40 transition-transform duration-300" :class="activeDropdown === 'resources' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="activeDropdown === 'resources'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="absolute left-0 mt-2 w-56 bg-white dark:bg-upknavy-800 rounded-2xl shadow-2xl border border-gray-100 dark:border-white/10 py-3 z-50 overflow-hidden">
                        <a href="{{ route('statistics') }}" class="flex items-center gap-3 px-5 py-3 text-[10px] uppercase font-bold text-gray-500 dark:text-gray-400 hover:text-upkgreen hover:bg-upkgreen/5 transition-all">
                            <div class="w-1.5 h-1.5 rounded-full bg-upkgreen"></div>
                            {{ __('messages.nav_stats') }}
                        </a>
                        <a href="{{ route('lms') }}" class="flex items-center gap-3 px-5 py-3 text-[10px] uppercase font-bold text-gray-500 dark:text-gray-400 hover:text-upkgreen hover:bg-upkgreen/5 transition-all">
                            <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div>
                            {{ __('messages.nav_lms') }}
                        </a>
                        <a href="{{ route('regulations') }}" class="flex items-center gap-3 px-5 py-3 text-[10px] uppercase font-bold text-gray-500 dark:text-gray-400 hover:text-upkgreen hover:bg-upkgreen/5 transition-all">
                            <div class="w-1.5 h-1.5 rounded-full bg-orange-500"></div>
                            {{ __('messages.nav_regulations') }}
                        </a>
                    </div>
                </div>

                {{-- Dropdown: Company --}}
                <div class="relative" @mouseenter="activeDropdown = 'company'" @mouseleave="activeDropdown = null">
                    <button class="flex items-center gap-1.5 px-4 py-2 text-[11px] font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400 hover:text-upknavy-900 dark:hover:text-white hover:bg-white dark:hover:bg-white/10 rounded-xl transition-all">
                        {{ __('messages.nav_company') }}
                        <svg class="w-2.5 opacity-40 transition-transform duration-300" :class="activeDropdown === 'company' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="activeDropdown === 'company'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="absolute left-0 mt-2 w-56 bg-white dark:bg-upknavy-800 rounded-2xl shadow-2xl border border-gray-100 dark:border-white/10 py-3 z-50 overflow-hidden">
                        <a href="{{ route('about') }}" class="flex items-center gap-3 px-5 py-3 text-[10px] uppercase font-bold text-gray-500 dark:text-gray-400 hover:text-upkgreen hover:bg-upkgreen/5 transition-all">
                            <div class="w-1.5 h-1.5 rounded-full bg-upkgreen"></div>
                            {{ __('messages.nav_about') }}
                        </a>
                        <a href="{{ route('team') }}" class="flex items-center gap-3 px-5 py-3 text-[10px] uppercase font-bold text-gray-500 dark:text-gray-400 hover:text-upkgreen hover:bg-upkgreen/5 transition-all">
                            <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div>
                            {{ __('messages.nav_team') }}
                        </a>
                        <a href="{{ route('certifications') }}" class="flex items-center gap-3 px-5 py-3 text-[10px] uppercase font-bold text-gray-500 dark:text-gray-400 hover:text-upkgreen hover:bg-upkgreen/5 transition-all">
                            <div class="w-1.5 h-1.5 rounded-full bg-orange-500"></div>
                            {{ __('messages.nav_certifications') }}
                        </a>
                    </div>
                </div>

                <a href="{{ route('articles.index') }}" class="px-4 py-2 text-[11px] font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400 hover:text-upknavy-900 dark:hover:text-white hover:bg-white dark:hover:bg-white/10 rounded-xl transition-all whitespace-nowrap">{{ __('messages.nav_news') }}</a>
                <a href="{{ route('contact') }}" class="px-4 py-2 text-[11px] font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400 hover:text-upknavy-900 dark:hover:text-white hover:bg-white dark:hover:bg-white/10 rounded-xl transition-all whitespace-nowrap">{{ __('messages.nav_contact') }}</a>
            </div>

            {{-- Right Actions --}}
            <div class="flex items-center gap-2 sm:gap-4">
                
                {{-- Theme Toggle --}}
                <button @click="isDark = !isDark; 
                        document.documentElement.classList.toggle('dark', isDark); 
                        document.documentElement.classList.toggle('light', !isDark); 
                        localStorage.setItem('theme', isDark ? 'dark' : 'light');" 
                        class="p-2.5 sm:p-3 bg-gray-50/50 dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-xl sm:rounded-2xl text-upknavy-900 dark:text-white hover:bg-upkgreen/10 transition-all">
                    <svg x-show="!isDark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                    <svg x-show="isDark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 9H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </button>

                {{-- Language Selector (Condensed) --}}
                @php
                    $fullLocales = [
                        'en' => ['flag' => 'fi-us', 'name' => 'EN'],
                        'id' => ['flag' => 'fi-id', 'name' => 'ID'],
                        'zh' => ['flag' => 'fi-cn', 'name' => 'CN'],
                        'ja' => ['flag' => 'fi-jp', 'name' => 'JP'],
                        'ko' => ['flag' => 'fi-kr', 'name' => 'KR'],
                    ];
                    $currentLocale = app()->getLocale();
                @endphp
                <div class="relative" x-data="{ langOpen: false }">
                    <button @click="langOpen = !langOpen" class="flex items-center gap-2 px-3 py-2.5 sm:px-4 sm:py-3 bg-gray-50/50 dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-xl sm:rounded-2xl hover:bg-upkgreen/10 transition-all group">
                        <span class="fi {{ $fullLocales[$currentLocale]['flag'] ?? 'fi-un' }} fis rounded-sm"></span>
                        <span class="hidden sm:inline text-[10px] font-bold text-upknavy-900 dark:text-white uppercase tracking-widest">{{ $fullLocales[$currentLocale]['name'] ?? strtoupper($currentLocale) }}</span>
                    </button>
                    <div x-show="langOpen" @click.outside="langOpen = false" x-transition class="absolute right-0 mt-3 w-40 bg-white dark:bg-upknavy-800 rounded-2xl shadow-2xl border border-gray-100 dark:border-white/10 py-2 z-50">
                        @foreach($fullLocales as $code => $data)
                            <a href="?lang={{ $code }}" class="flex items-center gap-3 px-5 py-3 hover:bg-upkgreen/5 transition-all {{ $currentLocale == $code ? 'text-upkgreen bg-upkgreen/5' : 'text-gray-500 dark:text-gray-400' }}">
                                <span class="fi {{ $data['flag'] }} fis rounded-sm"></span>
                                <span class="text-[10px] font-bold uppercase tracking-widest">{{ $data['name'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- CTA Button --}}
                <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number') }}" target="_blank"
                   class="hidden md:flex items-center justify-center px-6 py-3.5 bg-upkgreen hover:bg-upkgreen-600 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-xl sm:rounded-2xl shadow-lg shadow-upkgreen/20 transition-all hover:scale-105 active:scale-95 whitespace-nowrap">
                    {{ __('messages.nav_cta') }}
                </a>

                {{-- Mobile Menu Toggle --}}
                <button @click="mobileMenu = !mobileMenu" class="xl:hidden p-2.5 sm:p-3 bg-gray-50/50 dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-xl sm:rounded-2xl text-upknavy-900 dark:text-white transition-colors">
                    <svg x-show="!mobileMenu" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileMenu" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu Overlay --}}
    <div x-show="mobileMenu" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="xl:hidden fixed inset-0 z-[200] bg-white dark:bg-upknavy-900 p-6 flex flex-col">
        <div class="flex justify-between items-center mb-12">
            <span class="text-xl font-heading font-black text-upknavy-900 dark:text-white uppercase tracking-tighter">Menu</span>
            <button @click="mobileMenu = false" class="p-4 bg-gray-100 dark:bg-white/5 rounded-2xl text-upknavy-900 dark:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        
        <div class="flex-1 space-y-2 overflow-y-auto custom-scrollbar">
            @php
                $navLinks = [
                    ['route' => 'home', 'label' => 'nav_home'],
                    ['route' => 'products', 'label' => 'nav_products'],
                    ['route' => 'trade', 'label' => 'nav_trade'],
                    ['route' => 'articles.index', 'label' => 'nav_news'],
                    ['route' => 'contact', 'label' => 'nav_contact'],
                ];
            @endphp
            @foreach($navLinks as $link)
            <a href="{{ route($link['route']) }}" class="block p-5 text-lg font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400 border-b border-gray-50 dark:border-white/5 hover:text-upkgreen transition-all">
                {{ __('messages.'.$link['label']) }}
            </a>
            @endforeach
            
            <div class="pt-10">
                 <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number') }}" class="flex items-center justify-center py-6 bg-upkgreen text-white font-black uppercase tracking-[0.3em] text-sm rounded-3xl shadow-xl">
                    {{ __('messages.nav_cta') }}
                 </a>
            </div>
        </div>
    </div>
</nav>
