@extends('layouts.app')

@section('title', $seo['title'])

@section('content')
<div class="relative pt-48 pb-24 bg-upknavy overflow-hidden">
    {{-- Hero Background --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/img/dummy/hero_about.png') }}" class="w-full h-full object-cover grayscale opacity-20">
        <div class="absolute inset-0 bg-gradient-to-b from-upknavy/90 via-upknavy/80 to-upknavy"></div>
    </div>
    
    <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header --}}
        <div class="mb-20 reveal text-center">
            <span class="inline-flex items-center gap-2 bg-blue-500/10 text-blue-400 text-[10px] font-black px-6 py-2 rounded-full border border-blue-500/20 mb-8 uppercase tracking-[0.4em]">
                {{ __('messages.compliance_badge') }}
            </span>
            <h1 class="text-5xl lg:text-7xl font-heading font-black text-white leading-tight tracking-tighter uppercase mb-6">
                {!! __('messages.compliance_h1') !!}
            </h1>
            <p class="text-gray-500 text-[10px] font-black uppercase tracking-[0.3em]">{{ __('messages.compliance_v') }}</p>
        </div>

        {{-- Content --}}
        <div class="glass p-12 sm:p-20 rounded-[4rem] border border-white/5 shadow-2xl relative reveal">
            <div class="prose prose-invert max-w-none">
                <div class="space-y-16">
                    <section class="space-y-6">
                        <h2 class="text-3xl font-heading font-black text-white uppercase tracking-tighter decoration-blue-500 underline underline-offset-8 decoration-2">{{ __('messages.compliance_sec1_title') }}</h2>
                        <p class="text-gray-400 leading-relaxed font-medium">{{ __('messages.compliance_sec1_desc') }}</p>
                    </section>

                    <section class="space-y-6">
                        <h2 class="text-3xl font-heading font-black text-white uppercase tracking-tighter">{{ __('messages.compliance_sec2_title') }}</h2>
                        <p class="text-gray-400 font-medium">{{ __('messages.compliance_sec2_desc') }}</p>
                        <ul class="space-y-4 text-gray-400 font-medium">
                            <li class="flex gap-4">
                                <span class="text-blue-500 font-black rtl:order-last">/</span> 
                                <span>{{ __('messages.compliance_sec2_list1') }}</span>
                            </li>
                            <li class="flex gap-4">
                                <span class="text-blue-500 font-black rtl:order-last">/</span> 
                                <span>{{ __('messages.compliance_sec2_list2') }}</span>
                            </li>
                            <li class="flex gap-4">
                                <span class="text-blue-500 font-black rtl:order-last">/</span> 
                                <span>{{ __('messages.compliance_sec2_list3') }}</span>
                            </li>
                        </ul>
                    </section>

                    <section class="space-y-6">
                        <h2 class="text-3xl font-heading font-black text-white uppercase tracking-tighter">{{ __('messages.compliance_sec3_title') }}</h2>
                        <p class="text-gray-400 leading-relaxed font-medium">{{ __('messages.compliance_sec3_desc') }}</p>
                    </section>

                    <section class="space-y-6 pt-12 border-t border-white/5">
                        <p class="text-[10px] text-gray-600 font-black uppercase tracking-[0.3em] italic">{{ __('messages.compliance_footer_note') }}</p>
                    </section>
                </div>
            </div>

            {{-- Decorative Corner --}}
            <div class="absolute bottom-10 right-10 rtl:right-auto rtl:left-10 opacity-10">
                <svg class="w-32 h-32 text-white" fill="currentColor" viewBox="0 0 24 24">
                   <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                </svg>
            </div>
        </div>
    </div>
</div>
@endsection
