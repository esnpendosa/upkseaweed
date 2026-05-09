@extends('layouts.app')

@section('title', $seo['title'])
@section('meta_description', $seo['description'])

@section('content')
<div class="relative pt-48 pb-24 bg-upknavy overflow-hidden">
    {{-- Hero Background --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/img/dummy/hero_certs.png') }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-upknavy/80"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header --}}
        <div class="text-center mb-32 reveal">
            <span class="inline-flex items-center gap-2 bg-upkgreen/10 text-upkgreen text-[10px] font-black px-6 py-2 rounded-full border border-upkgreen/20 mb-10 uppercase tracking-[0.4em] leading-none">
                {{ __('messages.cert_badge') }}
            </span>
            <h1 class="text-5xl lg:text-8xl font-heading font-black text-white leading-[0.9] tracking-tighter uppercase mb-10">
                {!! __('messages.cert_h1') !!}
            </h1>
            <p class="text-gray-400 text-xl max-w-3xl mx-auto leading-relaxed font-medium">
                {{ __('messages.cert_subtitle') }}
            </p>
        </div>

        {{-- Cert List --}}
        <div class="space-y-12 mb-32">
            @foreach($certifications as $cert)
            <div class="reveal glass p-10 sm:p-12 rounded-[4rem] border border-white/5 flex flex-col lg:flex-row items-center gap-12 group hover:border-upkgreen/30 transition-all duration-700 shadow-2xl overflow-hidden relative" style="transition-delay: {{ $loop->index * 0.1 }}s;">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full blur-[80px] -mr-32 -mt-32"></div>
                
                <div class="w-56 h-56 rounded-[3rem] bg-upknavy-800 p-10 flex items-center justify-center shrink-0 group-hover:bg-upkgreen/10 transition-all duration-700 border border-white/5 group-hover:border-upkgreen/20 shadow-2xl">
                    @if($cert->image_path)
                        <img src="/media/{{ $cert->image_path }}" alt="{{ $cert->title }}" class="max-w-full max-h-full object-contain grayscale group-hover:grayscale-0 transition-all duration-700 brightness-150">
                    @else
                        <svg class="w-16 h-16 text-upkgreen/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    @endif
                </div>
                
                <div class="flex-1 text-center lg:text-left">
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-8 mb-8">
                        <div>
                            <h3 class="text-3xl sm:text-4xl font-heading font-black text-white group-hover:text-upkgreen transition-colors tracking-tighter uppercase leading-none">{{ $cert->getLocalized('title') }}</h3>
                            <p class="text-upkgreen text-[10px] font-black uppercase tracking-[0.4em] mt-3 opacity-60">{{ $cert->issuer ?? 'International Standard' }}</p>
                        </div>
                        @if($cert->valid_until)
                        <div class="px-8 py-3 glass rounded-2xl border border-white/10 text-[10px] font-black uppercase tracking-widest text-gray-500">
                            Valid through: <span class="text-white">{{ $cert->valid_until }}</span>
                        </div>
                        @endif
                    </div>
                    <p class="text-gray-400 text-xl leading-relaxed italic font-medium">
                        "{{ $cert->getLocalized('description') }}"
                    </p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- CTA --}}
        <div class="reveal relative p-16 sm:p-24 rounded-[5rem] overflow-hidden text-center border border-white/5 bg-gradient-to-br from-upkgreen/5 via-transparent to-transparent">
             <div class="absolute inset-0 bg-upknavy/40 backdrop-blur-3xl"></div>
             <div class="relative z-10 max-w-2xl mx-auto">
                 <h2 class="text-4xl font-heading font-black text-white mb-6 uppercase tracking-tighter">Certified Global Supply?</h2>
                 <p class="text-gray-500 text-lg mb-12 font-medium">Request official verified copies of our certifications for your compliance audit or industrial requirements.</p>
                 <a href="mailto:{{ \App\Models\Setting::get('site_email') }}" class="px-12 py-6 bg-upkgreen hover:bg-upkgreen-600 text-white font-black uppercase tracking-[0.2em] text-xs rounded-2xl transition-all shadow-2xl shadow-upkgreen/30 hover:scale-105 active:scale-95">
                    Contact Compliance Dept
                 </a>
             </div>
        </div>
    </div>
</div>
@endsection
