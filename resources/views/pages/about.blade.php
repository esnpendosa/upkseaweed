@extends('layouts.app')

@section('title', $seo['title'])
@section('meta_description', $seo['description'])

@section('content')
{{-- ============= HERO SECTION ============= --}}
<section class="relative pt-48 pb-32 bg-white dark:bg-upknavy overflow-hidden transition-colors duration-500">
    {{-- High-end Background Elements --}}
    <div class="absolute inset-0">
        <div class="absolute top-0 right-0 w-[1000px] h-[1000px] bg-upkgreen/[0.02] rounded-full blur-[150px]"></div>
        <div class="absolute -bottom-20 -left-20 w-[800px] h-[800px] bg-blue-600/[0.02] rounded-full blur-[150px]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-4xl mx-auto reveal">
            <span class="inline-flex items-center gap-2 bg-upkgreen/10 text-upkgreen text-[10px] font-black px-6 py-2 rounded-full border border-upkgreen/20 mb-10 uppercase tracking-[0.4em]">
                {{ __('messages.about_welcome_header') }}
            </span>
            <h1 class="text-5xl lg:text-9xl font-heading font-black text-upknavy-900 dark:text-white leading-[0.85] tracking-tighter uppercase mb-12 transition-colors">
                {!! __('messages.about_h1') !!}
            </h1>
            <p class="text-gray-700 dark:text-gray-300 text-xl md:text-2xl leading-relaxed mb-16 mx-auto max-w-2xl font-medium transition-colors">
                {{ $compro['foreword'] }}
            </p>
            <div class="flex flex-wrap justify-center gap-6">
                <a href="#history" class="px-12 py-6 bg-upkgreen hover:bg-upkgreen-600 text-white font-black uppercase tracking-[0.2em] text-[11px] rounded-2xl shadow-2xl shadow-upkgreen/20 transition-all hover:scale-105 active:scale-95">
                    {{ __('messages.about_read_history') }}
                </a>
                <a href="#vision" class="px-12 py-6 glass border border-gray-200 dark:border-white/10 text-upknavy-900 dark:text-white font-black uppercase tracking-[0.2em] text-[11px] rounded-2xl hover:bg-slate-100 dark:hover:bg-white/5 transition-all">
                    {{ __('messages.about_vision') }} & {{ __('messages.about_mission') }}
                </a>
            </div>
        </div>
    </div>
    
    {{-- Hero Poster --}}
    <div class="relative z-10 max-w-[1400px] mx-auto px-4 mt-24 reveal">
        <div class="aspect-[21/9] rounded-[4rem] overflow-hidden shadow-2xl border border-white/5 bg-upknavy-800 relative group">
            <img src="{{ asset('assets/img/dummy/about_hero.png') }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-[3000ms] grayscale-[10%] group-hover:grayscale-0">
            <div class="absolute inset-0 bg-gradient-to-t from-upknavy via-transparent to-transparent opacity-80"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                 <div class="glass p-12 sm:p-20 rounded-[4rem] border border-gray-100 dark:border-white/10 backdrop-blur-3xl bg-white/40 dark:bg-upknavy/40 text-center scale-90 sm:scale-100 max-w-2xl mx-4 transition-colors">
                    <div class="w-20 h-20 bg-upkgreen/20 rounded-full flex items-center justify-center mx-auto mb-10 border border-upkgreen/30">
                        <svg class="w-10 h-10 text-upkgreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <p class="text-upknavy-900 dark:text-white text-3xl sm:text-5xl font-heading font-black italic tracking-tighter leading-none uppercase transition-colors">
                        "{{ __('messages.about_quote') }}"
                    </p>
                 </div>
            </div>
        </div>
    </div>
</section>

{{-- ============= HISTORY SECTION ============= --}}
<section id="history" class="relative py-32 bg-white dark:bg-upknavy border-t border-gray-100 dark:border-white/5 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
            <div class="reveal">
                <div class="mb-12">
                    <h2 class="text-4xl lg:text-7xl font-heading font-black text-upknavy-900 dark:text-white mb-6 uppercase tracking-tighter leading-none transition-colors">
                        {{ __('messages.about_history_title') }}
                    </h2>
                    <div class="w-24 h-2 bg-upkgreen rounded-full"></div>
                </div>
                <div class="prose dark:prose-invert prose-2xl max-w-none prose-p:text-gray-700 dark:prose-p:text-gray-400 prose-p:leading-[1.7] first-letter:text-9xl first-letter:font-black first-letter:text-upkgreen first-letter:float-left first-letter:mr-8 first-letter:mt-4 first-letter:leading-none transition-colors">
                    {!! nl2br(e($compro['history'])) !!}
                </div>
            </div>
            <div class="reveal">
                <div class="aspect-[4/5] rounded-[5rem] overflow-hidden shadow-2xl border border-white/10 relative group">
                    <img src="{{ asset('assets/img/dummy/about_history.png') }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000 grayscale-[40%] group-hover:grayscale-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-upknavy/40 to-transparent"></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============= VISION & MISSION ============= --}}
<section id="vision" class="relative py-32 bg-gray-50 dark:bg-upknavy-700 border-y border-gray-100 dark:border-white/5 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            {{-- Vision --}}
            <div class="lg:col-span-12 mb-20 text-center reveal">
                 <h2 class="text-5xl lg:text-8xl font-heading font-black text-upknavy-900 dark:text-white mb-6 uppercase tracking-tighter leading-none italic opacity-5 dark:opacity-10 transition-colors">{{ __('messages.about_purpose') }}</h2>
                 <div class="w-32 h-1 bg-gray-200 dark:bg-white/10 mx-auto -mt-10 transition-colors"></div>
            </div>

            <div class="lg:col-span-5 reveal">
                <div class="glass p-12 sm:p-20 rounded-[4rem] border border-gray-200 dark:border-upkgreen/20 bg-white dark:bg-upknavy-800 h-full relative overflow-hidden group shadow-2xl transition-colors">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-upkgreen/10 rounded-full blur-[80px] -mr-32 -mt-32"></div>
                    <div class="w-20 h-20 bg-upkgreen/10 rounded-3xl flex items-center justify-center mb-10 border border-gray-100 dark:border-upkgreen/20 group-hover:bg-upkgreen group-hover:text-white transition-all">
                        <svg class="w-10 h-10 text-upkgreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="text-3xl font-heading font-black text-upknavy-900 dark:text-white mb-10 uppercase tracking-[0.3em] transition-colors">{{ __('messages.about_vision') }}</h3>
                    <p class="text-upknavy-900 dark:text-white text-3xl md:text-4xl leading-[1.1] italic font-black uppercase tracking-tight transition-colors">
                        "{{ $compro['vision'] }}"
                    </p>
                </div>
            </div>

            {{-- Mission --}}
            <div class="lg:col-span-7 reveal" style="transition-delay: 0.1s;">
                <div class="glass p-12 sm:p-20 rounded-[4rem] border border-gray-200 dark:border-white/5 bg-white dark:bg-upknavy-800 h-full relative overflow-hidden group shadow-2xl transition-colors">
                    <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-600/10 rounded-full blur-[80px] -ml-32 -mb-32"></div>
                    <div class="w-20 h-20 bg-gray-50 dark:bg-white/5 rounded-3xl flex items-center justify-center mb-10 border border-gray-100 dark:border-white/10 group-hover:border-upkgreen transition-all">
                        <svg class="w-10 h-10 text-gray-400 dark:text-gray-500 group-hover:text-upkgreen transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="text-3xl font-heading font-black text-upknavy-900 dark:text-white mb-10 uppercase tracking-[0.3em] transition-colors">{{ __('messages.about_mission') }}</h3>
                    <div class="text-gray-700 dark:text-gray-400 text-xl leading-relaxed font-medium space-y-6 transition-colors">
                        @php
                            $missions = explode('.', $compro['mission']);
                        @endphp
                        @foreach($missions as $mission)
                            @if(trim($mission))
                            <div class="flex gap-6">
                                <span class="text-upkgreen font-black text-2xl leading-none pt-1">/</span>
                                <p>{{ trim($mission) }}.</p>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============= VALUES SECTION ============= --}}
<section class="relative py-32 bg-white dark:bg-upknavy overflow-hidden transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-24 reveal">
            <h2 class="text-4xl lg:text-7xl font-heading font-black text-upknavy-900 dark:text-white mb-6 uppercase tracking-tighter leading-none transition-colors">{{ __('messages.about_values') }}</h2>
            <div class="w-24 h-2 bg-upkgreen mx-auto mb-8 rounded-full shadow-[0_0_20px_rgba(16,185,129,0.5)]"></div>
            <p class="text-gray-600 dark:text-gray-500 uppercase tracking-[0.6em] text-[11px] font-black transition-colors">{{ __('messages.about_values_sub') }}</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @php
                $values = explode(',', $compro['values']);
                $icons = [
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>',
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>',
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>',
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                ];
            @endphp
            @foreach($values as $key => $value)
            <div class="reveal glass p-12 rounded-[4rem] border border-gray-100 dark:border-white/5 bg-gray-50 dark:bg-upknavy-800 hover:border-upkgreen/30 transition-all group flex flex-col items-center text-center hover:bg-upkgreen/[0.03] shadow-2xl" style="transition-delay: {{ $key * 0.1 }}s;">
                <div class="w-20 h-20 bg-upkgreen/10 rounded-[2rem] flex items-center justify-center text-upkgreen mb-10 group-hover:scale-110 group-hover:bg-upkgreen group-hover:text-white transition-all shadow-xl">
                    {!! $icons[$key % count($icons)] !!}
                </div>
                <h4 class="text-upknavy-900 dark:text-white font-black text-2xl uppercase tracking-tighter leading-tight transition-colors">{{ trim($value) }}</h4>
                <div class="w-10 h-1 bg-gray-200 dark:bg-white/10 mt-6 group-hover:w-20 group-hover:bg-upkgreen transition-all"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============= EXPANSION ROADMAP ============= --}}
<section class="relative py-32 bg-gray-100 dark:bg-upknavy-800 border-t border-gray-200 dark:border-white/5 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-20 items-center">
            <div class="lg:col-span-12 mb-20 text-center reveal">
                <h2 class="text-4xl lg:text-7xl font-heading font-black text-upknavy-900 dark:text-white mb-6 uppercase tracking-tighter leading-none transition-colors">
                    {{ __('messages.about_expansion') }}
                </h2>
                <p class="text-upkgreen font-bold uppercase tracking-[0.6em] text-[11px] transition-colors">{{ __('messages.about_expansion_sub') }}</p>
            </div>

            <div class="lg:col-span-6 reveal">
                <div class="space-y-12">
                    @php
                        // Parsing expansion text into blocks based on numbers 1., 2. etc
                        $expansionText = $compro['expansion'];
                        $roadmaps = preg_split('/(?=\d\.)/', $expansionText, -1, PREG_SPLIT_NO_EMPTY);
                    @endphp
                    @foreach($roadmaps as $item)
                        @if(trim($item))
                        <div class="flex gap-10 group">
                            <div class="shrink-0 pt-2">
                                <div class="w-16 h-16 glass rounded-2xl border border-gray-200 dark:border-white/10 bg-white dark:bg-upknavy-700 flex items-center justify-center text-upkgreen font-black text-2xl group-hover:bg-upkgreen group-hover:text-white transition-all shadow-xl">
                                    {{ substr(trim($item), 0, 1) }}
                                </div>
                            </div>
                            <div class="grow pb-12 border-b border-gray-200 dark:border-white/5 group-last:border-0">
                                <p class="text-gray-700 dark:text-gray-400 text-xl leading-relaxed font-medium italic transition-colors">
                                    {{ trim(substr(trim($item), 2)) }}
                                </p>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="lg:col-span-6 reveal" style="transition-delay: 0.1s;">
                <div class="relative rounded-[5rem] overflow-hidden shadow-2xl border border-white/10 aspect-[4/5] group">
                    <img src="{{ asset('assets/img/dummy/about_exp.png') }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-[3000ms] grayscale-[20%] group-hover:grayscale-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-upknavy via-transparent to-transparent opacity-80"></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============= TEAM PREVIEW ============= --}}
<section class="relative py-32 bg-white dark:bg-upknavy border-y border-gray-100 dark:border-white/5 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
             <div class="reveal">
                <div class="relative w-full aspect-square rounded-[5rem] overflow-hidden shadow-2xl border border-gray-100 dark:border-white/5 group bg-gray-50 dark:bg-upknavy-800 transition-colors">
                    <img src="{{ asset('assets/img/dummy/team_1.png') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000 grayscale-[40%] group-hover:grayscale-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-upknavy via-transparent to-transparent opacity-60"></div>
                    <div class="absolute bottom-16 left-16 bg-white/10 dark:bg-white/5 backdrop-blur-xl p-10 rounded-[3rem] border border-white/20 dark:border-white/10 max-w-sm transition-colors">
                        <h4 class="text-white font-black text-2xl uppercase tracking-tighter mb-2 transition-colors">{{ __('messages.about_leadership_card_title') }}</h4>
                        <p class="text-white/80 dark:text-gray-400 text-sm font-medium transition-colors">{{ __('messages.about_leadership_card_desc') }}</p>
                    </div>
                </div>
             </div>
             <div class="reveal">
                <span class="inline-block px-5 py-2 bg-upkgreen/10 text-upkgreen text-[10px] font-black rounded-full border border-upkgreen/20 mb-10 uppercase tracking-[0.4em] transition-colors">{{ __('messages.about_leadership') }}</span>
                <h2 class="text-5xl lg:text-8xl font-heading font-black text-upknavy-900 dark:text-white mb-10 uppercase tracking-tighter leading-[0.9] transition-colors">{{ __('messages.about_leadership_sub') }}</h2>
                <p class="text-gray-700 dark:text-gray-400 text-xl leading-relaxed mb-12 transition-colors">
                    {{ __('messages.about_leadership_desc') }}
                </p>
                <div class="flex items-center gap-10 pt-8 border-t border-gray-100 dark:border-white/5 transition-colors">
                    <div class="flex -space-x-6">
                        @for($i=0; $i<3; $i++)
                        <div class="w-20 h-20 rounded-full border-4 border-white dark:border-upknavy overflow-hidden bg-gray-200 dark:bg-upknavy-600 transition-colors">
                             <img src="https://i.pravatar.cc/150?u={{ $i }}" class="w-full h-full object-cover grayscale">
                        </div>
                        @endfor
                    </div>
                    <div>
                         <p class="text-upknavy-900 dark:text-white font-black text-2xl uppercase tracking-tighter leading-none mb-1 transition-colors">500+</p>
                         <p class="text-gray-600 dark:text-gray-500 text-[10px] font-black uppercase tracking-widest leading-none transition-colors">{{ __('messages.about_coop_members') }}</p>
                    </div>
                </div>
                <div class="mt-16">
                    <a href="{{ route('team') }}" class="px-12 py-6 bg-gray-100 dark:bg-white/5 hover:bg-gray-200 dark:hover:bg-white/10 text-upknavy-900 dark:text-white font-black uppercase tracking-[0.2em] text-[11px] rounded-2xl border border-gray-200 dark:border-white/10 transition-all inline-block active:scale-95 shadow-lg transition-colors">
                        {{ __('messages.about_structure_btn') }}
                    </a>
                </div>
             </div>
        </div>
    </div>
</section>
@endsection
