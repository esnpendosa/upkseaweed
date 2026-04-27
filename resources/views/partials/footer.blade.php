{{-- Corporate Footer --}}
<footer class="relative bg-upknavy-900 border-t border-white/5 pt-24 pb-12 overflow-hidden" id="contact">
    {{-- High-end Decorative Backgrounds --}}
    <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-upkgreen/[0.03] rounded-full blur-[120px] -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-blue-600/[0.02] rounded-full blur-[150px] translate-x-1/3 translate-y-1/3 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        {{-- Footer Main Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-16 mb-24">
            
            {{-- Column 1: Brand & Social (4/12) --}}
            <div class="lg:col-span-4 space-y-12">
                <div class="space-y-8">
                    <a href="{{ route('home') }}" class="flex flex-col sm:flex-row items-center gap-6 group">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center border border-white/10 group-hover:border-upkgreen/50 transition-all duration-500 shadow-2xl p-2 overflow-hidden shadow-[0_0_20px_rgba(255,255,255,0.1)]">
                                <img src="{{ asset('assets/img/logo-upkseaweed.png') }}" alt="UPK Seaweed Logo" class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-110">
                            </div>
                            <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center border border-white/10 group-hover:border-upkgreen/50 transition-all duration-500 shadow-2xl p-2 overflow-hidden shadow-[0_0_20px_rgba(255,255,255,0.1)]">
                                <img src="{{ asset('assets/img/logo-koperasi.png') }}" alt="Koperasi Indonesia Logo" class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-110">
                            </div>
                        </div>
                        <div class="text-center sm:text-left">
                            <span class="text-2xl font-heading font-black text-white uppercase leading-none block tracking-tighter">UPK <span class="text-upkgreen">SEAWEED</span></span>
                            <p class="text-[9px] text-gray-500 tracking-[0.4em] uppercase mt-1.5 font-black opacity-60">{{ __('messages.footer_subtitle') }}</p>
                        </div>
                    </a>
                    <p class="text-gray-400 text-sm leading-relaxed font-medium max-w-sm">
                        {{ \App\Models\Setting::get('footer_about', __('messages.footer_about')) }}
                    </p>
                </div>

                <div class="space-y-6">
                    <h5 class="text-[10px] font-black text-gray-600 uppercase tracking-[0.3em]">{{ __('messages.footer_social_title') }}</h5>
                    <div class="flex flex-wrap gap-4">
                        @php
                            $socials = [
                                ['icon' => 'M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z', 'color' => 'hover:text-[#25D366] hover:bg-[#25D366]/10', 'url' => 'https://wa.me/'.\App\Models\Setting::get('whatsapp_number')],
                                ['icon' => 'M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.332 3.608 1.308.975.975 1.245 2.242 1.308 3.607.058 1.266.07 1.646.07 4.852s-.012 3.584-.07 4.85c-.062 1.367-.332 2.633-1.308 3.608-.975.975-2.242 1.245-3.607 1.308-1.266.058-1.646.07-4.852.07s-3.584-.012-4.85-.07c-1.367-.062-2.633-.332-3.608-1.308-.975-.975-1.245-2.242-1.308-3.607-.058-1.266-.07-1.646-.07-4.852s.012-3.584.07-4.85c.062-1.367.332-2.633 1.308-3.608.975-.975 2.242-1.245 3.607-1.308 1.266-.058 1.646-.07 4.852-.07zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.354-.2 6.782-2.618 6.979-6.98.059-1.281.073-1.689.073-4.948s-.014-3.667-.072-4.947c-.2-4.358-2.618-6.78-6.98-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z', 'color' => 'hover:text-pink-500 hover:bg-pink-500/10', 'url' => '#'],
                                ['icon' => 'M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z', 'color' => 'hover:text-blue-500 hover:bg-blue-500/10', 'url' => '#'],
                                ['icon' => 'M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.761 0 5-2.239 5-5v-14c0-2.761-2.239-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z', 'color' => 'hover:text-blue-400 hover:bg-blue-400/10', 'url' => '#'],
                            ];
                        @endphp
                        @foreach($socials as $social)
                        <a href="{{ $social['url'] }}" target="_blank" class="w-12 h-12 rounded-2xl glass border border-white/10 flex items-center justify-center text-gray-500 transition-all duration-300 {{ $social['color'] }} shadow-xl group">
                            <svg class="w-5 h-5 transition-transform duration-500 group-hover:scale-110" fill="currentColor" viewBox="0 0 24 24"><path d="{{ $social['icon'] }}"/></svg>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Column 2: Tautan Cepat (2/12) --}}
            <div class="lg:col-span-2 space-y-10 items-start">
                <h5 class="text-[10px] font-black text-white uppercase tracking-[0.4em]">{{ __('messages.footer_ops_title') }}</h5>
                <ul class="space-y-6">
                    @foreach([
                        ['route' => 'products', 'label' => 'nav_products'],
                        ['route' => 'trade', 'label' => 'nav_trade'],
                        ['route' => 'statistics', 'label' => 'nav_stats'],
                        ['route' => 'lms', 'label' => 'nav_lms'],
                    ] as $link)
                    <li>
                        <a href="{{ route($link['route']) }}" class="group flex items-center gap-3 text-gray-500 hover:text-upkgreen transition-all duration-300">
                            <span class="w-1.5 h-1.5 rounded-full border border-gray-800 group-hover:bg-upkgreen group-hover:border-upkgreen transition-all"></span>
                            <span class="text-[11px] font-black uppercase tracking-widest">{{ __('messages.'.$link['label']) }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Column 3: Governance (2/12) --}}
            <div class="lg:col-span-2 space-y-10 items-start">
                <h5 class="text-[10px] font-black text-white uppercase tracking-[0.4em]">{{ __('messages.footer_gov_title') }}</h5>
                <ul class="space-y-6">
                    @foreach([
                        ['route' => 'regulations', 'label' => 'nav_regulations'],
                        ['route' => 'certifications', 'label' => 'nav_certifications'],
                        ['route' => 'team', 'label' => 'nav_team'],
                        ['route' => 'contact', 'label' => 'nav_contact'],
                    ] as $link)
                    <li>
                        <a href="{{ route($link['route']) }}" class="group flex items-center gap-3 text-gray-500 hover:text-upkgreen transition-all duration-300">
                            <span class="w-1.5 h-1.5 rounded-full border border-gray-800 group-hover:bg-upkgreen group-hover:border-upkgreen transition-all"></span>
                            <span class="text-[11px] font-black uppercase tracking-widest">{{ __('messages.'.$link['label']) }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Column 4: Headquarters (4/12) --}}
            <div class="lg:col-span-4 space-y-10">
                <h5 class="text-[10px] font-black text-white uppercase tracking-[0.4em]">{{ __('messages.footer_hq') }}</h5>
                <div class="glass p-1 rounded-[2.5rem] border border-white/5 overflow-hidden group shadow-2xl relative">
                    {{-- Address Info Overlay --}}
                    <div class="absolute top-6 left-6 right-6 z-10 glass p-4 rounded-2xl border border-white/10 flex items-center gap-4 group-hover:-translate-y-20 transition-all duration-700">
                        <div class="w-10 h-10 bg-upkgreen/20 rounded-xl flex items-center justify-center text-upkgreen shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <p class="text-[10px] font-black text-white uppercase tracking-widest leading-tight opacity-70 italic">
                            {{ \App\Models\Setting::get('address', 'Gresik, Indonesia') }}
                        </p>
                    </div>

                    {{-- Map Container --}}
                    <div class="h-64 relative">
                        <div class="absolute inset-0 grayscale opacity-40 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-1000 scale-[1.1] group-hover:scale-100">
                            {!! \App\Models\Setting::get('google_maps_iframe') !!}
                        </div>
                        {{-- Glossy Overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-upknavy/80 via-transparent to-transparent pointer-events-none"></div>
                        
                        <a href="https://maps.google.com/?q={{ urlencode(\App\Models\Setting::get('address')) }}" target="_blank" class="absolute bottom-6 left-1/2 -translate-x-1/2 px-8 py-3 bg-upkgreen hover:bg-upkgreen-600 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-xl shadow-2xl transition-all hover:scale-105 active:scale-95 whitespace-nowrap">
                            {{ __('messages.footer_map_btn') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Copyright Section --}}
        <div class="pt-10 border-t border-white/5 flex flex-col lg:flex-row items-center justify-between gap-8">
            <div class="flex flex-col items-center lg:items-start gap-4">
                <p class="text-[10px] font-black text-gray-600 uppercase tracking-[0.3em] text-center lg:text-left">
                    &copy; {{ date('Y') }} {{ \App\Models\Setting::get('site_name', 'UPK Seaweed') }}. {{ __('messages.footer_rights') }}
                </p>
                <div class="flex flex-wrap justify-center lg:justify-start gap-8">
                    <a href="{{ route('privacy') }}" class="text-[9px] font-black text-gray-700 hover:text-upkgreen uppercase tracking-[0.3em] transition-all">{{ __('messages.footer_privacy') }}</a>
                    <a href="{{ route('compliance') }}" class="text-[9px] font-black text-gray-700 hover:text-upkgreen uppercase tracking-[0.3em] transition-all">{{ __('messages.footer_terms') }}</a>
                </div>
            </div>

            {{-- Dev & Certs Combined Row --}}
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-16">
                {{-- Developer Subtle Credit --}}
                <div class="flex items-center gap-3">
                    <div class="w-1 h-3 bg-upkgreen/20 rounded-full"></div>
                    <p class="text-[9px] font-black text-gray-700 uppercase tracking-[0.3em]">
                        {{ __('messages.footer_dev_by') }} <a href="https://www.linkedin.com/in/muahmmad-as-ad-muhibbin-akbar-0973a0254/" target="_blank" class="text-upkgreen hover:underline font-bold transition-all">Kang Digital</a>
                    </p>
                </div>

                {{-- Unified Certifications --}}
                <div class="flex items-center gap-8 opacity-20 grayscale hover:grayscale-0 transition-all duration-700">
                    <div class="text-center">
                        <p class="text-xl font-black text-white leading-none">ISO</p>
                        <p class="text-[7px] font-black text-gray-500 uppercase tracking-widest mt-1">9001:2015</p>
                    </div>
                    <div class="text-center">
                        <p class="text-xl font-black text-white leading-none">HACCP</p>
                        <p class="text-[7px] font-black text-gray-500 uppercase tracking-widest mt-1">CERTIFIED</p>
                    </div>
                    <div class="text-center">
                        <p class="text-xl font-black text-white leading-none">FAO</p>
                        <p class="text-[7px] font-black text-gray-500 uppercase tracking-widest mt-1">COMPLIANT</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    #contact iframe {
        width: 100% !important;
        height: 100% !important;
        border: none !important;
        filter: contrast(1.1) brightness(0.9);
    }
</style>
