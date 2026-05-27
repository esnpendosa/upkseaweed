@extends('layouts.app')

@section('title', $seo['title'])
@section('meta_description', $seo['description'])
@section('meta_keywords', 'seaweed statistics, industrial export capacity, seaweed production volume, blue economy growth')

@push('json_ld')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "{{ $seo['title'] }}",
  "description": "{{ $seo['description'] }}",
  "url": "{{ url()->current() }}",
  "about": {
    "@type": "Dataset",
    "name": "UPK Seaweed Cultivation & Export Volume Statistics",
    "description": "Real-time production growth data and global market share stats of Ujungpangkah seaweed cooperative.",
    "publisher": {
      "@type": "Organization",
      "name": "{{ \App\Models\Setting::get('site_name', 'UPK Seaweed') }}"
    }
  }
}
</script>
@endpush

@section('content')
<div class="relative pt-48 pb-24 bg-white dark:bg-upknavy overflow-hidden transition-colors duration-500">
    {{-- Hero Background --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/img/dummy/hero_stats.png') }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-white/80 dark:bg-upknavy/80 transition-colors"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header Section --}}
        <div class="text-center mb-32 reveal max-w-4xl mx-auto">
            <span class="inline-flex items-center gap-2 bg-upkgreen/10 text-upkgreen text-[10px] font-black px-6 py-2 rounded-full border border-upkgreen/20 mb-10 uppercase tracking-[0.4em] leading-none">
                {{ __('messages.nav_stats') }}
            </span>
            <h1 class="text-5xl lg:text-9xl font-heading font-black text-upknavy-900 dark:text-white leading-[0.85] tracking-tighter uppercase mb-10 transition-colors">
                Seaweed <span class="text-upkgreen">Statistics</span>
            </h1>
            <p class="text-gray-700 dark:text-gray-300 text-xl leading-relaxed font-medium transition-colors">
                {{ __('messages.trade_desc') }}
            </p>
        </div>

        {{-- Main Stats Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-32">
            <div class="reveal glass rounded-[3rem] p-12 card-glow text-center border border-gray-100 dark:border-white/5 bg-white dark:bg-upknavy-800 group hover:border-upkgreen/30 transition-all duration-500 shadow-2xl" style="transition-delay: 0.1s;">
                <div class="w-20 h-20 bg-upkgreen/10 rounded-3xl flex items-center justify-center text-upkgreen mx-auto mb-8 border border-gray-100 dark:border-white/5 group-hover:bg-upkgreen group-hover:text-white transition-all">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <div class="text-6xl font-heading font-black text-upknavy-900 dark:text-white mb-2 tracking-tighter transition-colors">{{ $stats['production'] }}</div>
                <p class="text-gray-500 dark:text-gray-400 font-black uppercase tracking-[0.2em] text-[10px] transition-colors">{{ __('messages.trust_capacity') }}</p>
            </div>

            <div class="reveal glass rounded-[3rem] p-12 card-glow text-center border border-gray-100 dark:border-white/5 bg-white dark:bg-upknavy-800 group hover:border-blue-500/30 transition-all duration-500 shadow-2xl" style="transition-delay: 0.2s;">
                <div class="w-20 h-20 bg-blue-500/10 rounded-3xl flex items-center justify-center text-blue-400 mx-auto mb-8 border border-gray-100 dark:border-white/5 group-hover:bg-blue-500 group-hover:text-white transition-all">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div class="text-6xl font-heading font-black text-upknavy-900 dark:text-white mb-2 tracking-tighter transition-colors">{{ $stats['countries'] }}</div>
                <p class="text-gray-500 dark:text-gray-400 font-black uppercase tracking-[0.2em] text-[10px] transition-colors">{{ __('messages.home_about_stats_export') }}</p>
            </div>

            <div class="reveal glass rounded-[3rem] p-12 card-glow text-center border border-gray-100 dark:border-white/5 bg-white dark:bg-upknavy-800 group hover:border-purple-500/30 transition-all duration-500 shadow-2xl" style="transition-delay: 0.3s;">
                <div class="w-20 h-20 bg-purple-500/10 rounded-3xl flex items-center justify-center text-purple-400 mx-auto mb-8 border border-gray-100 dark:border-white/5 group-hover:bg-purple-500 group-hover:text-white transition-all">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
                <div class="text-6xl font-heading font-black text-upknavy-900 dark:text-white mb-2 tracking-tighter transition-colors">{{ $stats['farmers'] }}</div>
                <p class="text-gray-500 dark:text-gray-400 font-black uppercase tracking-[0.2em] text-[10px] transition-colors">{{ __('messages.home_about_stats_farmers') }}</p>
            </div>

            <div class="reveal glass rounded-[3rem] p-12 card-glow text-center border border-gray-100 dark:border-white/5 bg-white dark:bg-upknavy-800 group hover:border-orange-500/30 transition-all duration-500 shadow-2xl" style="transition-delay: 0.4s;">
                <div class="w-20 h-20 bg-orange-500/10 rounded-3xl flex items-center justify-center text-orange-400 mx-auto mb-8 border border-gray-100 dark:border-white/5 group-hover:bg-orange-500 group-hover:text-white transition-all">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div class="text-6xl font-heading font-black text-upknavy-900 dark:text-white mb-2 tracking-tighter transition-colors">{{ $stats['impact'] }}</div>
                <p class="text-gray-500 dark:text-gray-400 font-black uppercase tracking-[0.2em] text-[10px] transition-colors">Economic Impact</p>
            </div>
        </div>

        {{-- Detailed Analysis --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2 reveal glass rounded-[4rem] p-12 border border-gray-100 dark:border-white/5 relative overflow-hidden bg-white dark:bg-upknavy-800 transition-colors shadow-2xl">
                <div class="absolute top-0 right-0 w-64 h-64 bg-upkgreen/5 rounded-full blur-[80px]"></div>
                <h3 class="text-2xl font-heading font-black text-upknavy-900 dark:text-white mb-12 flex items-center gap-4 uppercase tracking-tighter transition-colors">
                    <span class="w-2 h-10 bg-upkgreen rounded-full"></span>
                    Production Growth Trend
                </h3>
                <div class="h-80 w-full relative">
                    <svg class="w-full h-full" viewBox="0 0 800 300" preserveAspectRatio="none">
                        <path d="M0 250 Q 150 220 300 180 T 450 140 T 600 80 T 800 20" fill="none" stroke="url(#line-grad)" stroke-width="6" stroke-linecap="round" />
                        <path d="M0 250 Q 150 220 300 180 T 450 140 T 600 80 T 800 20 L 800 300 L 0 300 Z" fill="url(#area-grad)" opacity="0.15" />
                        <defs>
                            <linearGradient id="line-grad" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" style="stop-color:#10B981;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#3B82F6;stop-opacity:1" />
                            </linearGradient>
                            <linearGradient id="area-grad" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" style="stop-color:#10B981;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:transparent;stop-opacity:0" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <div class="absolute bottom-0 left-0 right-0 flex justify-between text-[10px] text-gray-500 dark:text-gray-600 uppercase font-black px-4 mb-4 tracking-widest transition-colors">
                        <span>2020</span><span>2021</span><span>2022</span><span>2023</span><span>2024 (FCST)</span>
                    </div>
                </div>
            </div>
            
            <div class="reveal glass rounded-[4rem] p-12 border border-gray-100 dark:border-white/5 relative overflow-hidden bg-white dark:bg-upknavy-800 transition-colors shadow-2xl">
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-blue-500/5 rounded-full blur-[60px]"></div>
                <h3 class="text-2xl font-heading font-black text-upknavy-900 dark:text-white mb-12 flex items-center gap-4 uppercase tracking-tighter transition-colors">
                    <span class="w-2 h-10 bg-blue-500 rounded-full"></span>
                    Market Share
                </h3>
                <div class="space-y-10">
                    @foreach([
                        ['label' => 'China / East Asia', 'val' => 45, 'color' => 'bg-upkgreen'],
                        ['label' => 'European Union', 'val' => 25, 'color' => 'bg-blue-600'],
                        ['label' => 'North America', 'val' => 15, 'color' => 'bg-purple-600'],
                        ['label' => 'ASEAN Partners', 'val' => 15, 'color' => 'bg-orange-500'],
                    ] as $item)
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-[10px] font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest transition-colors">{{ $item['label'] }}</span>
                            <span class="text-xs font-black text-upknavy-900 dark:text-white transition-colors">{{ $item['val'] }}%</span>
                        </div>
                        <div class="h-3 w-full bg-white/5 rounded-full overflow-hidden border border-white/5 p-0.5">
                            <div class="h-full {{ $item['color'] }} rounded-full transition-all duration-1000 shadow-lg" style="width: {{ $item['val'] }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
