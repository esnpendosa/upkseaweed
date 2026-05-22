@extends('layouts.app')

@section('title', $article->getLocalized('title') . ' — ' . \App\Models\Setting::get('site_name'))
@section('meta_description', $article->getLocalized('excerpt') ?? Str::limit(strip_tags($article->getLocalized('content')), 160))

@section('content')
<div class="relative pt-48 bg-white dark:bg-upknavy overflow-hidden transition-colors duration-500">
    {{-- Dynamic Hero Background --}}
    <div class="absolute inset-0 z-0 h-[70vh]">
        <img src="{{ $article->image_path ? '/media/' . $article->image_path : asset('assets/img/dummy/hero_news.png') }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-white/80 dark:from-upknavy/80 via-white/60 dark:via-upknavy/60 to-white dark:to-upknavy transition-colors"></div>
    </div>

    <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header Section --}}
        <div class="mb-20 reveal">
            {{-- Category & Date --}}
            <div class="flex flex-wrap items-center gap-6 mb-10">
                <span class="inline-flex items-center gap-2 bg-upkgreen text-white text-[10px] font-black px-4 py-1.5 rounded-full shadow-2xl uppercase tracking-[0.2em]">
                    {{ $article->category ?? 'Industrial Update' }}
                </span>
                <span class="text-gray-600 dark:text-gray-400 text-[10px] font-black uppercase tracking-[0.3em] transition-colors">
                    {{ $article->published_at ? $article->published_at->format('F d, Y') : $article->created_at->format('F d, Y') }}
                </span>
                <span class="w-1 h-1 bg-gray-200 dark:bg-gray-700 rounded-full transition-colors"></span>
                <span class="text-gray-600 dark:text-gray-500 text-[10px] font-black uppercase tracking-[0.3em] transition-colors">
                    {{ number_format($article->views_count) }} {{ __('messages.news_views') }}
                </span>
            </div>

            <h1 class="text-5xl md:text-8xl font-heading font-black text-upknavy-900 dark:text-white leading-[0.85] tracking-tighter uppercase mb-12 transition-colors">
                {{ $article->getLocalized('title') }}
            </h1>

            {{-- Author & Engagement Bar --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-8 py-10 border-y border-gray-100 dark:border-white/5 mx-[-1rem] px-4 transition-colors">
                <div class="flex items-center gap-5">
                    <div class="w-14 h-14 rounded-2xl bg-gray-50 dark:bg-upknavy-600 border border-gray-100 dark:border-white/10 flex items-center justify-center text-upkgreen shadow-2xl group overflow-hidden relative transition-colors">
                        <div class="absolute inset-0 bg-upkgreen/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <svg class="w-7 h-7 relative z-10" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    </div>
                    <div>
                        <p class="text-upknavy-900 dark:text-white font-black text-xs uppercase tracking-widest transition-colors">Global Maritime Press</p>
                        <p class="text-gray-600 dark:text-gray-500 text-[10px] uppercase font-black tracking-widest opacity-80 transition-colors">{{ \App\Models\Setting::get('site_name') }}</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-4">
                    <form action="{{ route('articles.like', $article->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center gap-4 px-8 py-4 glass rounded-2xl border border-gray-200 dark:border-white/10 bg-white dark:bg-upknavy-800 hover:border-upkgreen hover:bg-upkgreen/10 transition-all text-gray-500 dark:text-gray-400 hover:text-upkgreen group active:scale-[0.98] shadow-2xl">
                            <svg class="w-5 h-5 group-hover:scale-125 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                            <span class="text-[10px] font-black uppercase tracking-widest transition-colors">{{ number_format($article->likes_count) }} {{ __('messages.news_like') }}</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Article Content --}}
        <article class="reveal pb-24">
            <div class="prose dark:prose-invert prose-xl max-w-none prose-p:text-gray-700 dark:prose-p:text-gray-400 prose-p:leading-relaxed prose-headings:font-heading prose-headings:font-black prose-headings:uppercase prose-headings:tracking-tighter prose-headings:text-upknavy-900 dark:prose-headings:text-white prose-a:text-upkgreen hover:prose-a:text-upkgreen-400 prose-img:rounded-[3rem] prose-img:border prose-img:border-gray-100 dark:prose-img:border-white/10 prose-strong:text-upknavy-900 dark:prose-strong:text-white prose-blockquote:border-upkgreen prose-blockquote:bg-gray-50 dark:prose-blockquote:bg-white/5 prose-blockquote:p-10 prose-blockquote:rounded-3xl prose-blockquote:not-italic prose-blockquote:text-xl transition-colors">
                {!! nl2br(strip_tags($article->getLocalized('content'), '<a><p><br><strong><b><i><em><ul><li><ol><img><h3><h4><blockquete>')) !!}
            </div>

            {{-- Interaction Bar --}}
            <div class="mt-24 pt-12 border-t border-gray-100 dark:border-white/5 flex flex-col md:flex-row items-center justify-between gap-12 transition-colors">
                <div class="flex flex-col gap-6 w-full md:w-auto text-center md:text-left">
                    <span class="text-[10px] font-black text-gray-600 dark:text-gray-500 uppercase tracking-[0.4em] transition-colors">{{ __('messages.news_share') }}</span>
                    <div class="flex items-center justify-center md:justify-start gap-5">
                        @php
                            $shareUrl = urlencode(request()->fullUrl());
                            $shareText = urlencode($article->getLocalized('title'));
                        @endphp
                        {{-- Social Buttons --}}
                        <a href="https://wa.me/?text={{ $shareText }}%20{{ $shareUrl }}" target="_blank" class="w-14 h-14 rounded-2xl glass border border-gray-200 dark:border-white/5 bg-white dark:bg-upknavy-800 flex items-center justify-center text-gray-500 hover:text-white hover:bg-[#25D366] transition-all shadow-2xl group">
                            <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" class="w-14 h-14 rounded-2xl glass border border-gray-200 dark:border-white/5 bg-white dark:bg-upknavy-800 flex items-center justify-center text-gray-500 hover:text-white hover:bg-[#1877F2] transition-all shadow-2xl group">
                            <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ $shareText }}&url={{ $shareUrl }}" target="_blank" class="w-14 h-14 rounded-2xl glass border border-gray-200 dark:border-white/5 bg-white dark:bg-upknavy-800 flex items-center justify-center text-gray-500 hover:text-white hover:bg-black transition-all shadow-2xl group">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                    </div>
                </div>
                <a href="{{ route('articles.index') }}" class="w-full md:w-auto px-12 py-6 bg-gray-50 dark:bg-white/5 hover:bg-upkgreen border border-gray-100 dark:border-white/10 hover:border-upkgreen rounded-2xl text-[10px] font-black uppercase tracking-widest text-upknavy-900 dark:text-white transition-all shadow-2xl text-center active:scale-[0.98] transition-colors">
                    {{ __('messages.news_read_more') }}
                </a>
            </div>
        </article>

        {{-- Integrated Comments Section --}}
        <section class="mt-32 reveal pt-24 border-t border-gray-100 dark:border-white/5 transition-colors" id="comments" x-data="{ replyingTo: null }">
            <div class="max-w-3xl mx-auto">
                <h3 class="text-3xl font-heading font-black text-upknavy-900 dark:text-white uppercase tracking-tighter mb-16 flex items-center justify-between transition-colors">
                    <span>{{ __('messages.news_comments') }}</span>
                    <span class="text-upkgreen bg-upkgreen/10 px-4 py-1.5 rounded-2xl text-sm border border-upkgreen/20 shadow-2xl">{{ $article->allComments->count() }}</span>
                </h3>

                {{-- Unified Form --}}
                <div class="glass p-10 sm:p-16 rounded-[4rem] border border-gray-100 dark:border-white/5 bg-white dark:bg-upknavy-800 mb-24 relative overflow-hidden shadow-2xl transition-colors">
                    <form action="{{ route('articles.comment', $article->id) }}" method="POST" class="space-y-10">
                        @csrf
                        <input type="hidden" name="parent_id" x-model="replyingTo">
                        
                        <div x-show="replyingTo" class="bg-upkgreen/10 border border-upkgreen/20 p-6 rounded-3xl flex items-center justify-between mb-8 animate-fade-in group">
                            <span class="text-upkgreen text-[10px] font-black uppercase tracking-widest">Replying to a stakeholder comment...</span>
                            <button type="button" @click="replyingTo = null" class="text-gray-500 dark:text-gray-400 hover:text-upknavy-900 dark:hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-10">
                            <div class="space-y-4">
                                <label class="block text-[10px] font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest px-1 transition-colors">Identity</label>
                                <input type="text" name="name" required placeholder="Your Professional Name" class="w-full bg-gray-50 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-2xl px-6 py-5 text-upknavy-900 dark:text-white focus:outline-none focus:border-upkgreen/50 transition-all placeholder:text-gray-400">
                            </div>
                            <div class="space-y-4">
                                <label class="block text-[10px] font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest px-1 transition-colors">Corporate Email</label>
                                <input type="email" name="email" placeholder="email@company.com" class="w-full bg-gray-50 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-2xl px-6 py-5 text-upknavy-900 dark:text-white focus:outline-none focus:border-upkgreen/50 transition-all placeholder:text-gray-400">
                            </div>
                        </div>
                        <div class="space-y-4">
                            <label class="block text-[10px] font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest px-1 transition-colors">Insights / Inquiry</label>
                            <textarea name="content" rows="5" required placeholder="Join the discussion..." class="w-full bg-gray-50 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-2xl px-6 py-5 text-upknavy-900 dark:text-white focus:outline-none focus:border-upkgreen/50 transition-all resize-none placeholder:text-gray-400"></textarea>
                        </div>
                        <button type="submit" class="w-full sm:w-auto px-12 py-6 bg-upkgreen hover:bg-upkgreen-600 text-white font-black uppercase tracking-[0.2em] text-[10px] rounded-2xl shadow-2xl shadow-upkgreen/20 transition-all active:scale-[0.98]">
                            {{ __('messages.news_post_comment') }}
                        </button>
                    </form>
                </div>

                {{-- Structured Comments List --}}
                <div class="space-y-16">
                    @forelse($article->comments as $comment)
                        <div class="reveal-child group">
                            <div class="flex gap-8">
                                <div class="shrink-0 w-16 h-16 rounded-[1.5rem] bg-upknavy-700 border border-white/10 flex items-center justify-center text-upkgreen shadow-2xl font-black text-2xl uppercase">
                                    {{ substr($comment->name, 0, 1) }}
                                </div>
                                <div class="grow space-y-6">
                                    <div class="glass p-10 rounded-[3rem] border border-gray-100 dark:border-white/5 bg-white dark:bg-upknavy-800 shadow-2xl transition-colors">
                                        <div class="flex items-center justify-between mb-6">
                                            <h4 class="text-upknavy-900 dark:text-white font-black text-xs uppercase tracking-[0.2em] transition-colors">{{ $comment->name }}</h4>
                                            <span class="text-[10px] text-gray-500 dark:text-gray-600 font-bold uppercase tracking-widest transition-colors">{{ $comment->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-gray-600 dark:text-gray-400 text-lg leading-relaxed font-medium mb-10 transition-colors">{{ $comment->content }}</p>
                                        <button @click="replyingTo = {{ $comment->id }}; window.scrollTo({top: document.getElementById('comments').offsetTop, behavior: 'smooth'})" 
                                                class="text-upkgreen text-[10px] font-black uppercase tracking-[0.4em] hover:text-upknavy-900 dark:hover:text-white transition-all flex items-center gap-3">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
                                            {{ __('messages.news_reply') }}
                                        </button>
                                    </div>

                                    {{-- Nested Replies --}}
                                    @foreach($comment->replies as $reply)
                                        <div class="flex gap-6 mt-10 ml-8 sm:ml-16">
                                            <div class="shrink-0 w-12 h-12 rounded-2xl bg-upkgreen/10 border border-upkgreen/20 flex items-center justify-center text-upkgreen shadow-xl font-black text-sm uppercase">
                                                {{ substr($reply->name, 0, 1) }}
                                            </div>
                                            <div class="grow glass p-8 rounded-[2.5rem] border border-gray-100 dark:border-white/5 bg-gray-50 dark:bg-upkgreen/[0.01] shadow-xl transition-colors">
                                                <div class="flex items-center justify-between mb-4">
                                                    <h4 class="text-upknavy-900 dark:text-white font-black text-[10px] uppercase tracking-widest transition-colors">{{ $reply->name }}</h4>
                                                    <span class="text-[9px] text-gray-500 dark:text-gray-600 font-bold uppercase tracking-wider transition-colors">{{ $reply->created_at->diffForHumans() }}</span>
                                                </div>
                                                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed font-medium italic transition-colors">"{{ $reply->content }}"</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-24 glass rounded-[4rem] border border-dashed border-gray-200 dark:border-white/10 bg-white/5 dark:bg-transparent transition-colors">
                            <p class="text-gray-500 dark:text-gray-600 font-black uppercase tracking-widest transition-colors">{{ __('messages.news_no_comments') }}</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
</div>

<style>
    .prose blockquote p::before, .prose blockquote p::after { content: none !important; }
</style>
@endsection
