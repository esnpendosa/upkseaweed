@extends('layouts.app')

@section('title', $seo['title'])
@section('meta_description', $seo['description'])
@section('meta_keywords', 'upk seaweed leadership, seaweed cooperative management, Ujungpangkah cooperative team, Indonesian seaweed experts')

@push('json_ld')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "AboutPage",
  "name": "{{ $seo['title'] }}",
  "description": "{{ $seo['description'] }}",
  "url": "{{ url()->current() }}",
  "mainEntity": {
    "@type": "ItemList",
    "name": "Cooperative Leadership & Structure",
    "numberOfItems": {{ $team->count() }},
    "itemListElement": [
      @foreach($team as $index => $member)
      {
        "@type": "ListItem",
        "position": {{ $index + 1 }},
        "item": {
          "@type": "Person",
          "name": "{{ $member->name }}",
          "jobTitle": "{{ $member->getLocalized('position') }}",
          "address": "{{ $member->address ?? 'Ujungpangkah, Gresik, Indonesia' }}",
          "telephone": "{{ $member->phone ?? '' }}",
          "worksFor": {
            "@type": "Organization",
            "name": "{{ \App\Models\Setting::get('site_name', 'UPK Seaweed') }}"
          }
        }
      }{{ !$loop->last ? ',' : '' }}
      @endforeach
    ]
  }
}
</script>
@endpush

@section('content')
<div class="relative pt-48 pb-24 bg-white dark:bg-upknavy overflow-hidden transition-colors duration-500">
    {{-- Hero Background --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/img/dummy/hero_team.png') }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-white/80 dark:bg-upknavy/80 transition-colors"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header --}}
        <div class="text-center mb-32 reveal max-w-4xl mx-auto">
            <span class="inline-flex items-center gap-2 bg-upkgreen/10 text-upkgreen text-[10px] font-black px-6 py-2 rounded-full border border-upkgreen/20 mb-10 uppercase tracking-[0.4em] leading-none">
                {{ __('messages.team_badge') }}
            </span>
            <h1 class="text-5xl lg:text-9xl font-heading font-black text-upknavy-900 dark:text-white leading-[0.85] tracking-tighter uppercase mb-10 transition-colors">
                {!! __('messages.team_h1') !!}
            </h1>
            <p class="text-gray-700 dark:text-gray-300 text-xl leading-relaxed font-medium transition-colors">
                {{ __('messages.team_subtitle') }}
            </p>
        </div>

        {{-- Team Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 sm:gap-14 mb-32">
            @foreach($team as $member)
            <div class="reveal group h-full" style="transition-delay: {{ $loop->index * 0.1 }}s;">
                <div class="relative aspect-[4/5] rounded-[4rem] overflow-hidden mb-10 shadow-2xl border border-gray-100 dark:border-white/5 bg-gray-50 dark:bg-upknavy-800 transition-colors">
                    @if($member->photo_path)
                        <img src="/media/{{ $member->photo_path }}" alt="{{ $member->name }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-1000 group-hover:scale-105">
                    @else
                        <div class="w-full h-full bg-upknavy-700 flex items-center justify-center text-upkgreen/20 group-hover:text-upkgreen transition-colors">
                            <svg class="w-32 h-32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-upknavy via-transparent to-transparent opacity-80"></div>
                    
                    {{-- Position Badge Floating --}}
                    <div class="absolute bottom-8 left-8 right-8">
                         <div class="glass p-6 rounded-3xl border border-gray-200 dark:border-white/10 backdrop-blur-3xl bg-white/40 dark:bg-upknavy/40 shadow-2xl transition-colors">
                            <h3 class="text-upknavy-900 dark:text-white font-heading font-black text-2xl tracking-tighter uppercase leading-none mb-2 transition-colors">{{ $member->name }}</h3>
                            <p class="text-upkgreen text-[10px] font-black uppercase tracking-[0.3em]">{{ $member->getLocalized('position') }}</p>
                         </div>
                    </div>
                </div>
                
                {{-- Detail Box --}}
                <div class="px-8 space-y-4 reveal-child opacity-0 group-hover:opacity-100 transition-all duration-500">
                    @if($member->address)
                    <div class="flex items-start gap-4">
                        <div class="w-2 h-2 rounded-full bg-gray-200 dark:bg-white/20 mt-2 transition-colors"></div>
                        <span class="text-xs text-gray-600 dark:text-gray-500 italic font-medium leading-relaxed transition-colors">{{ $member->address }}</span>
                    </div>
                    @endif
                    @if($member->phone)
                    <div class="flex items-center gap-4">
                        <div class="w-2 h-2 rounded-full bg-upkgreen/40"></div>
                        <span class="text-[10px] text-gray-600 dark:text-gray-400 font-black tracking-widest transition-colors">{{ $member->phone }}</span>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        {{-- Dynamic Localized Quote --}}
        <div class="reveal relative p-16 sm:p-24 rounded-[5rem] overflow-hidden text-center border border-gray-100 dark:border-white/5 bg-gradient-to-br from-upkgreen/5 via-transparent to-transparent bg-white dark:bg-transparent shadow-2xl transition-colors">
             <div class="absolute inset-0 bg-white/40 dark:bg-upknavy/40 backdrop-blur-3xl transition-colors"></div>
             <p class="relative z-10 text-upknavy-900 dark:text-white italic text-2xl sm:text-4xl leading-tight font-black tracking-tighter uppercase max-w-4xl mx-auto transition-colors">
                "{{ __('messages.about_quote') }}"
             </p>
        </div>
    </div>
</div>
@endsection
