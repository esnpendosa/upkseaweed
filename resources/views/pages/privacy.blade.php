@extends('layouts.app')

@section('title', $seo['title'])

@section('content')
<div class="relative pt-48 pb-24 bg-upknavy overflow-hidden">
    {{-- Hero Background --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/img/dummy/hero_regulations.png') }}" class="w-full h-full object-cover grayscale opacity-20">
        <div class="absolute inset-0 bg-gradient-to-b from-upknavy/90 via-upknavy/80 to-upknavy"></div>
    </div>
    
    <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header --}}
        <div class="mb-20 reveal text-center">
            <span class="inline-flex items-center gap-2 bg-upkgreen/10 text-upkgreen text-[10px] font-black px-6 py-2 rounded-full border border-upkgreen/20 mb-8 uppercase tracking-[0.4em]">
                {{ __('messages.privacy_badge') }}
            </span>
            <h1 class="text-5xl lg:text-7xl font-heading font-black text-white leading-tight tracking-tighter uppercase mb-6">
                {!! __('messages.privacy_h1') !!}
            </h1>
            <p class="text-gray-500 text-[10px] font-black uppercase tracking-[0.3em]">{{ __('messages.privacy_v') }}</p>
        </div>

        {{-- Content --}}
        <div class="glass p-12 sm:p-20 rounded-[4rem] border border-white/5 shadow-2xl relative reveal">
            <div class="prose prose-invert prose-upkgreen max-w-none">
                <div class="space-y-16">
                    <section class="space-y-6">
                        <h2 class="text-3xl font-heading font-black text-white uppercase tracking-tighter decoration-upkgreen underline underline-offset-8 decoration-2">{{ __('messages.privacy_sec1_title') }}</h2>
                        <p class="text-gray-400 leading-relaxed font-medium">{{ __('messages.privacy_sec1_desc') }}</p>
                    </section>

                    <section class="space-y-6">
                        <h2 class="text-3xl font-heading font-black text-white uppercase tracking-tighter">{{ __('messages.privacy_sec2_title') }}</h2>
                        <ul class="space-y-4 text-gray-400 font-medium">
                            <li class="flex gap-4"><span class="text-upkgreen font-black">/</span> {{ __('messages.privacy_sec2_list1') }}</li>
                            <li class="flex gap-4"><span class="text-upkgreen font-black">/</span> {{ __('messages.privacy_sec2_list2') }}</li>
                            <li class="flex gap-4"><span class="text-upkgreen font-black">/</span> {{ __('messages.privacy_sec2_list3') }}</li>
                        </ul>
                    </section>

                    <section class="space-y-6">
                        <h2 class="text-3xl font-heading font-black text-white uppercase tracking-tighter">{{ __('messages.privacy_sec3_title') }}</h2>
                        <p class="text-gray-400 leading-relaxed font-medium">{{ __('messages.privacy_sec3_desc') }}</p>
                    </section>

                    <section class="space-y-6 pt-12 border-t border-white/5">
                        <p class="text-[10px] text-gray-600 font-black uppercase tracking-[0.3em] italic">{{ __('messages.privacy_footer_note') }}</p>
                    </section>
                </div>
            </div>

            {{-- Decorative Corner --}}
            <div class="absolute bottom-10 right-10 rtl:right-auto rtl:left-10 opacity-10">
                <svg class="w-32 h-32 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                </svg>
            </div>
        </div>
    </div>
</div>
@endsection
