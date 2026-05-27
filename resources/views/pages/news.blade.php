@extends('layouts.app')

@section('title', $seo['title'])
@section('meta_description', $seo['description'])
@section('meta_keywords', 'seaweed industry news, Indonesia seaweed cooperative, Ujungpangkah marine hub updates, aquaculture research')

@push('json_ld')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Blog",
  "name": "{{ $seo['title'] }}",
  "description": "{{ $seo['description'] }}",
  "url": "{{ url()->current() }}",
  "publisher": {
    "@type": "Organization",
    "name": "{{ \App\Models\Setting::get('site_name', 'UPK Seaweed') }}",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ asset('assets/img/logo-upkseaweed.png') }}"
    }
  },
  "blogPost": [
    @foreach($articles as $article)
    {
      "@type": "BlogPosting",
      "headline": "{{ $article->getLocalized('title') }}",
      "description": "{{ strip_tags($article->getLocalized('excerpt') ?? Str::limit(strip_tags($article->getLocalized('content')), 150)) }}",
      "image": "{{ $article->image_path ? asset('/media/' . $article->image_path) : asset('assets/img/logo-upkseaweed.png') }}",
      "datePublished": "{{ $article->published_at ? $article->published_at->toIso8601String() : $article->created_at->toIso8601String() }}",
      "url": "{{ route('articles.show', $article->slug) }}",
      "author": {
        "@type": "Organization",
        "name": "{{ \App\Models\Setting::get('site_name', 'UPK Seaweed') }}"
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
        <img src="{{ asset('assets/img/dummy/hero_news.png') }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-white/80 dark:bg-upknavy/80 transition-colors"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header --}}
        <div class="mb-20 reveal">
            <span class="inline-flex items-center gap-2 bg-upkgreen/10 text-upkgreen text-[10px] font-black px-6 py-2 rounded-full border border-upkgreen/20 mb-8 uppercase tracking-[0.3em]">
                {{ __('messages.nav_news') }}
            </span>
            <h1 class="text-5xl md:text-7xl font-heading font-black text-upknavy-900 dark:text-white leading-[0.9] tracking-tighter uppercase mb-8 transition-colors">
                {!! __('messages.news_title') !!}
            </h1>
            <p class="text-gray-700 dark:text-gray-300 text-lg max-w-2xl leading-relaxed transition-colors">
                {{ __('messages.news_subtitle') }}
            </p>
        </div>

        {{-- News Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-20">
            @foreach($articles as $article)
            <article class="reveal glass rounded-[3rem] overflow-hidden border border-gray-100 dark:border-white/5 bg-white dark:bg-upknavy-800 flex flex-col group hover:border-upkgreen/30 transition-all duration-500 shadow-2xl" 
                     style="transition-delay: {{ $loop->index * 0.1 }}s;">
                
                <div class="h-64 relative overflow-hidden">
                    @if($article->image_path)
                        <img src="/media/{{ $article->image_path }}" alt="{{ $article->getLocalized('title') }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <div class="w-full h-full bg-upkgreen/5 flex items-center justify-center text-upkgreen/20">
                             <svg class="w-16 h-16 opacity-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-white dark:from-upknavy via-transparent to-transparent opacity-80 transition-colors"></div>
                    <div class="absolute bottom-6 left-8">
                         <span class="text-[10px] font-black text-upkgreen uppercase tracking-[0.2em] bg-gray-50/80 dark:bg-upknavy/80 backdrop-blur-md px-3 py-1 rounded-lg border border-gray-200 dark:border-white/10 transition-colors">
                            {{ $article->category ?? 'Industry' }}
                         </span>
                    </div>
                </div>

                <div class="p-10 flex-1 flex flex-col">
                    <div class="flex items-center gap-3 mb-6">
                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="text-[10px] font-bold text-gray-600 dark:text-gray-500 uppercase tracking-widest transition-colors">
                            {{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }}
                        </span>
                    </div>

                    <h3 class="text-xl md:text-2xl font-heading font-black text-upknavy-900 dark:text-white mb-6 group-hover:text-upkgreen transition-colors leading-[1.1] tracking-tight uppercase">
                        {{ $article->getLocalized('title') }}
                    </h3>

                    <p class="text-gray-600 dark:text-gray-500 text-sm leading-relaxed mb-10 line-clamp-3 transition-colors">
                        {{ $article->getLocalized('excerpt') ?? Str::limit(strip_tags($article->getLocalized('content')), 150) }}
                    </p>

                    <div class="mt-auto">
                        <a href="{{ route('articles.show', $article->slug) }}" class="inline-flex items-center gap-4 text-upknavy-900 dark:text-white text-[10px] font-black uppercase tracking-[0.2em] hover:text-upkgreen transition-all group/btn">
                            {{ __('messages.news_read_more') }}
                            <svg class="w-5 h-5 text-upkgreen group-hover/btn:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="reveal pt-12 border-t border-gray-100 dark:border-white/5 transition-colors">
            {{ $articles->links() }}
        </div>
    </div>
</div>
@endsection
