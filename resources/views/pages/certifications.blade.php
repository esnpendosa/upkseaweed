@extends('layouts.app')

@section('title', $seo['title'])
@section('meta_description', $seo['description'])
@section('meta_keywords', 'seaweed certifications, HACCP certified seaweed, Halal seaweed exporter, ISO seaweed standard')

@push('json_ld')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "name": "{{ $seo['title'] }}",
  "description": "{{ $seo['description'] }}",
  "url": "{{ url()->current() }}",
  "numberOfItems": {{ $certifications->count() }},
  "itemListElement": [
    @foreach($certifications as $index => $cert)
    {
      "@type": "ListItem",
      "position": {{ $index + 1 }},
      "item": {
        "@type": "CreativeWork",
        "name": "{{ $cert->getLocalized('title') }}",
        "description": "{{ strip_tags($cert->getLocalized('description')) }}",
        "publisher": {
          "@type": "Organization",
          "name": "{{ $cert->issuer ?? 'Standards Body' }}"
        }
      }
    }{{ !$loop->last ? ',' : '' }}
    @endforeach
  ]
}
</script>
@endpush

@section('content')
<div class="relative pt-48 pb-24 bg-white dark:bg-upknavy overflow-hidden transition-colors duration-500">
    {{-- Hero Background --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/img/dummy/hero_certs.png') }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-white/80 dark:bg-upknavy/80 transition-colors"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header --}}
        <div class="text-center mb-32 reveal">
            <span class="inline-flex items-center gap-2 bg-upkgreen/10 text-upkgreen text-[10px] font-black px-6 py-2 rounded-full border border-upkgreen/20 mb-10 uppercase tracking-[0.4em] leading-none">
                {{ __('messages.cert_badge') }}
            </span>
            <h1 class="text-5xl lg:text-8xl font-heading font-black text-upknavy-900 dark:text-white leading-[0.9] tracking-tighter uppercase mb-10 transition-colors">
                {!! __('messages.cert_h1') !!}
            </h1>
            <p class="text-gray-700 dark:text-gray-300 text-xl max-w-3xl mx-auto leading-relaxed font-medium transition-colors">
                {{ __('messages.cert_subtitle') }}
            </p>
        </div>

        {{-- Cert List --}}
        <div class="space-y-12 mb-32">
            @foreach($certifications as $cert)
            <div class="reveal glass p-10 sm:p-12 rounded-[4rem] border border-gray-100 dark:border-white/5 bg-white dark:bg-upknavy-800 flex flex-col lg:flex-row items-center gap-12 group hover:border-upkgreen/30 transition-all duration-700 shadow-2xl overflow-hidden relative" style="transition-delay: {{ $loop->index * 0.1 }}s;">
                <div class="absolute top-0 right-0 w-64 h-64 bg-gray-50 dark:bg-white/5 rounded-full blur-[80px] -mr-32 -mt-32 transition-colors"></div>
                
                <div class="w-56 h-56 rounded-[3rem] bg-gray-50 dark:bg-upknavy-800 p-10 flex items-center justify-center shrink-0 group-hover:bg-upkgreen/10 transition-all duration-700 border border-gray-100 dark:border-white/5 group-hover:border-upkgreen/20 shadow-2xl">
                    @if($cert->logo_path)
                        <img src="/media/{{ $cert->logo_path }}" alt="{{ $cert->getLocalized('title') }}" class="max-w-full max-h-full object-contain grayscale group-hover:grayscale-0 transition-all duration-700 dark:brightness-150">
                    @else
                        <svg class="w-16 h-16 text-upkgreen/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    @endif
                </div>
                
                <div class="flex-1 text-center lg:text-left">
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-8 mb-8">
                        <div>
                            <h3 class="text-3xl sm:text-4xl font-heading font-black text-upknavy-900 dark:text-white group-hover:text-upkgreen transition-colors tracking-tighter uppercase leading-none">{{ $cert->getLocalized('title') }}</h3>
                            <p class="text-upkgreen text-[10px] font-black uppercase tracking-[0.4em] mt-3 opacity-80 transition-opacity">{{ $cert->issuer ?? 'International Standard' }}</p>
                        </div>
                        @if($cert->valid_until)
                        <div class="px-8 py-3 glass rounded-2xl border border-gray-200 dark:border-white/10 text-[10px] font-black uppercase tracking-widest text-gray-500 bg-white dark:bg-transparent transition-colors">
                            Valid through: <span class="text-upknavy-900 dark:text-white">{{ $cert->valid_until }}</span>
                        </div>
                        @endif
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 text-xl leading-relaxed italic font-medium transition-colors">
                        "{{ $cert->getLocalized('description') }}"
                    </p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- CTA --}}
        <div class="reveal relative p-16 sm:p-24 rounded-[5rem] overflow-hidden text-center border border-gray-100 dark:border-white/5 bg-gradient-to-br from-upkgreen/5 via-transparent to-transparent bg-white dark:bg-transparent shadow-2xl transition-colors">
             <div class="absolute inset-0 bg-white/40 dark:bg-upknavy/40 backdrop-blur-3xl transition-colors"></div>
             <div class="relative z-10 max-w-2xl mx-auto">
                 <h2 class="text-4xl font-heading font-black text-upknavy-900 dark:text-white mb-6 uppercase tracking-tighter transition-colors">Certified Global Supply?</h2>
                 <p class="text-gray-700 dark:text-gray-500 text-lg mb-12 font-medium transition-colors">Request official verified copies of our certifications for your compliance audit or industrial requirements.</p>
                 <a href="mailto:{{ \App\Models\Setting::get('site_email') }}" class="px-12 py-6 bg-upkgreen hover:bg-upkgreen-600 text-white font-black uppercase tracking-[0.2em] text-xs rounded-2xl transition-all shadow-2xl shadow-upkgreen/30 hover:scale-105 active:scale-95">
                    Contact Compliance Dept
                 </a>
             </div>
        </div>
    </div>
</div>
@endsection
