@extends('layouts.app')

@section('title', $seo['title'])
@section('meta_description', $seo['description'])

@section('content')
<div class="relative pt-48 pb-24 bg-white dark:bg-upknavy overflow-hidden transition-colors duration-500">
    {{-- Hero Background --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/img/dummy/edu_hero.png') }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-white/80 dark:bg-upknavy/80 transition-colors"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header Section with Dummy Image --}}
        <div class="mb-32 reveal text-center max-w-4xl mx-auto">
            <span class="inline-flex items-center gap-2 bg-purple-500/10 text-purple-400 text-[10px] font-black px-6 py-2 rounded-full border border-purple-500/20 mb-8 uppercase tracking-[0.4em]">
                {{ __('messages.edu_badge') }}
            </span>
            <h1 class="text-5xl lg:text-8xl font-heading font-black text-upknavy-900 dark:text-white leading-[0.9] tracking-tighter uppercase mb-8 transition-colors">
                {!! __('messages.edu_h1') !!}
            </h1>
            <p class="text-gray-700 dark:text-gray-300 text-xl leading-relaxed font-medium transition-colors">
                {{ __('messages.edu_subtitle') }}
            </p>
        </div>
                {{-- Decorative floating element --}}
                <div class="absolute -bottom-10 -left-10 glass p-8 rounded-3xl border border-white/10 hidden sm:block animate-bounce-slow">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center text-purple-600 dark:text-purple-400 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <div>
                            <p class="text-upknavy-900 dark:text-white font-black text-xs uppercase tracking-widest transition-colors">Global Standards</p>
                            <p class="text-gray-500 dark:text-gray-400 text-[10px] uppercase font-bold tracking-widest transition-colors">FAO/HACCP Certified</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modules Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 reveal">
            @forelse($modules as $module)
            <div class="group relative glass rounded-[2.5rem] p-10 border border-gray-100 dark:border-white/5 bg-white dark:bg-upknavy-800 hover:border-purple-500/30 transition-all duration-500 flex flex-col h-full shadow-2xl">
                <div class="absolute top-0 right-0 p-10">
                     <div class="w-14 h-14 rounded-2xl bg-purple-500/10 flex items-center justify-center text-purple-400 group-hover:bg-purple-500 group-hover:text-white transition-all duration-500 shadow-xl">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                     </div>
                </div>
                
                <div class="mb-10">
                    <span class="text-[10px] font-black uppercase tracking-[0.3em] text-purple-600 dark:text-purple-500/60 block mb-4 transition-colors">{{ __('messages.edu_module_badge') }}</span>
                    <h3 class="text-2xl font-heading font-black text-upknavy-900 dark:text-white leading-tight uppercase tracking-tight group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">{{ $module->getLocalized('title') }}</h3>
                </div>
                
                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-12 line-clamp-4 font-medium italic transition-colors">
                    {{ $module->getLocalized('description') }}
                </p>

                <div class="mt-auto">
                    <a href="{{ $module->link ?? '#' }}" class="inline-flex items-center gap-3 text-upknavy-900 dark:text-white text-[10px] font-black uppercase tracking-[0.2em] bg-gray-100 dark:bg-purple-500/20 px-8 py-4 rounded-2xl hover:bg-purple-500 hover:text-white transition-all duration-300 shadow-lg group/btn">
                        {{ __('messages.edu_access') }}
                        <svg class="w-5 h-5 group-hover/btn:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full py-24 text-center glass rounded-[3rem] border-dashed border-2 border-gray-200 dark:border-white/10 bg-gray-50 dark:bg-transparent transition-colors">
                <p class="text-gray-600 dark:text-gray-400 font-black uppercase tracking-widest italic transition-colors">{{ __('messages.edu_empty') }}</p>
            </div>
            @endforelse
        </div>
        
        {{-- Certification CTA --}}
        <div class="mt-32 reveal">
            <div class="glass rounded-[4rem] p-12 sm:p-20 text-center relative overflow-hidden border border-white/5 bg-gradient-to-br from-purple-500/5 via-transparent to-upkgreen/5">
                <div class="absolute -top-12 -left-12 w-64 h-64 bg-upkgreen/10 rounded-full blur-[80px]"></div>
                <div class="absolute -bottom-12 -right-12 w-64 h-64 bg-purple-500/10 rounded-full blur-[80px]"></div>
                
                <div class="relative z-10 max-w-2xl mx-auto">
                    <h2 class="text-4xl lg:text-5xl font-heading font-black text-upknavy-900 dark:text-white mb-6 uppercase tracking-tighter leading-tight transition-colors">
                        {{ __('messages.edu_cta_title') }}
                    </h2>
                    <p class="text-gray-700 dark:text-gray-300 text-lg mb-12 leading-relaxed transition-colors">
                        {{ __('messages.edu_cta_desc') }}
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex px-12 py-5 bg-upkgreen hover:bg-upkgreen-600 text-white font-black uppercase tracking-[0.2em] text-xs rounded-2xl transition-all shadow-2xl shadow-upkgreen/30 hover:scale-105 active:scale-95">
                        {{ __('messages.edu_cta_btn') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
