@extends('layouts.app')

@section('title', $seo['title'])
@section('meta_description', $seo['description'])

@section('content')
<div class="relative pt-48 pb-24 bg-upknavy overflow-hidden">
    {{-- Hero Background --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/img/dummy/hero_regulations.png') }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-upknavy/80"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Hero --}}
        <div class="mb-24 reveal text-center max-w-3xl mx-auto">
            <span class="inline-flex items-center gap-2 bg-orange-500/10 text-orange-400 text-[10px] font-black px-6 py-2 rounded-full border border-orange-500/20 mb-8 uppercase tracking-[0.4em] leading-none">
                {{ __('messages.reg_badge') }}
            </span>
            <h1 class="text-5xl lg:text-8xl font-heading font-black text-white leading-[0.9] tracking-tighter uppercase mb-8">
                {!! __('messages.reg_h1') !!}
            </h1>
            <p class="text-gray-400 text-xl leading-relaxed font-medium">
                {{ __('messages.reg_subtitle') }}
            </p>
        </div>

        {{-- Main Layout --}}
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
            {{-- Search & Tools --}}
            <div class="lg:col-span-1 space-y-8 reveal">
                <div class="glass p-8 rounded-[3rem] border border-white/5 shadow-2xl">
                    <h3 class="text-white text-[10px] font-black uppercase tracking-[0.4em] mb-8 decoration-orange-500 underline underline-offset-8 decoration-2">{{ __('messages.reg_search') }}</h3>
                    <div class="relative">
                        <input type="text" placeholder="Search..." class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-orange-500/50 transition-all">
                        <svg class="absolute right-6 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                </div>
                
                <div class="bg-orange-600/10 p-10 rounded-[3rem] border border-orange-500/20 shadow-2xl relative overflow-hidden group">
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-orange-500/10 rounded-full blur-[40px]"></div>
                    <p class="text-orange-400 text-[10px] font-black uppercase tracking-[0.4em] mb-4 italic">{{ __('messages.reg_notice') }}</p>
                    <p class="text-gray-400 text-sm leading-relaxed font-medium">{{ __('messages.reg_notice_desc') }}</p>
                </div>
            </div>

            {{-- Document Collection --}}
            <div class="lg:col-span-3 reveal" style="transition-delay: 0.1s;">
                <div class="space-y-6">
                    @forelse($regulations as $reg)
                    <div class="group glass p-8 sm:p-10 rounded-[3.5rem] border border-white/5 hover:border-orange-500/30 transition-all duration-500 flex flex-col sm:flex-row items-center gap-10 shadow-2xl">
                        <div class="w-20 h-20 rounded-3xl bg-orange-500/10 flex items-center justify-center text-orange-400 group-hover:bg-orange-500 group-hover:text-white transition-all duration-500 shadow-xl border border-orange-500/20">
                             <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <div class="flex-1 text-center sm:text-left">
                            <span class="text-[10px] font-black uppercase tracking-[0.3em] text-orange-500/60 block mb-3">{{ $reg->category ?? 'Official Publication' }}</span>
                            <h3 class="text-3xl font-heading font-black text-white mb-3 tracking-tighter uppercase group-hover:text-orange-400 transition-colors">{{ $reg->getLocalized('title') }}</h3>
                            <p class="text-gray-500 text-sm font-medium italic italic leading-relaxed">{{ $reg->getLocalized('description') }}</p>
                        </div>
                        <div class="flex items-center gap-4">
                            @if($reg->file_path)
                            <a href="/media/{{ $reg->file_path }}" target="_blank" class="px-8 py-4 bg-orange-500/10 hover:bg-orange-500 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-2xl transition-all shadow-xl group/btn flex items-center gap-3">
                                {{ __('messages.reg_download') }}
                                <svg class="w-4 h-4 group-hover/btn:translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                            </a>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="py-32 text-center glass rounded-[4rem] border border-dashed border-white/10 opacity-50">
                        <p class="text-gray-600 font-black uppercase tracking-widest">{{ __('messages.reg_empty') }}</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
