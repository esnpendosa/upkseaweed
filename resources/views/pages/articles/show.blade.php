@extends('layouts.app')

@section('title', $article->title . ' — UPK Seaweed News')
@section('meta_description', $article->excerpt ?? Str::limit(strip_tags($article->content), 160))

@section('content')
<section class="relative pt-32 pb-24 bg-upknavy overflow-hidden">
    {{-- Background decorative elements --}}
    <div class="absolute inset-0">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-upkgreen/[0.03] rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-upkgreen/[0.02] rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Breadcrumbs --}}
        <nav class="flex mb-8 text-sm font-medium animate-fade-in" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="text-gray-400 hover:text-upkgreen transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('home') }}#news" class="ml-1 text-gray-400 hover:text-upkgreen transition-colors md:ml-2">News</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-gray-500 md:ml-2 truncate max-w-[200px]">{{ $article->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <header class="mb-12">
            <div class="flex items-center gap-4 mb-6 animate-fade-in-up">
                <span class="px-4 py-1 bg-upkgreen/10 border border-upkgreen/20 text-upkgreen text-xs font-bold rounded-full uppercase tracking-widest">
                    Milestone
                </span>
                <time class="text-gray-400 text-sm flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $article->published_at ? $article->published_at->format('d F Y') : $article->created_at->format('d F Y') }}
                </time>
            </div>
            
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-heading font-bold text-white leading-[1.1] mb-8 animate-fade-in-up" style="animation-delay: 0.1s;">
                {{ $article->title }}
            </h1>

            <div class="flex items-center gap-4 animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="w-12 h-12 rounded-full bg-upknavy-600 border border-white/10 flex items-center justify-center text-upkgreen">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                </div>
                <div>
                    <p class="text-white font-medium">{{ $article->author ?? 'UPK Seaweed Team' }}</p>
                    <p class="text-gray-500 text-xs uppercase tracking-widest">Press Release</p>
                </div>
            </div>
        </header>

        <div class="reveal">
            @if($article->image_path)
                <div class="relative glass rounded-3xl overflow-hidden mb-12 shadow-2xl">
                    <img src="{{ asset('storage/' . $article->image_path) }}" alt="{{ $article->title }}" class="w-full h-auto">
                    <div class="absolute inset-0 bg-gradient-to-t from-upknavy/40 to-transparent"></div>
                </div>
            @endif

            <div class="prose prose-invert prose-lg max-w-none prose-p:text-gray-400 prose-headings:text-white prose-a:text-upkgreen hover:prose-a:text-upkgreen-400 prose-strong:text-white prose-img:rounded-3xl">
                {!! nl2br(e($article->content)) !!}
            </div>

            <div class="mt-16 pt-8 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-8">
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-500">Share this story:</span>
                    <div class="flex items-center gap-3">
                        <a href="#" class="w-10 h-10 rounded-xl glass flex items-center justify-center text-gray-400 hover:text-white hover:bg-upkgreen/20 transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-xl glass flex items-center justify-center text-gray-400 hover:text-white hover:bg-upkgreen/20 transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-xl glass flex items-center justify-center text-gray-400 hover:text-white hover:bg-upkgreen/20 transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.965 1.406-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 01.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.135-2.607 7.462-6.223 7.462-1.215 0-2.358-.631-2.75-1.37l-.749 2.848c-.27 1.029-1.002 2.319-1.492 3.111C10.582 23.858 11.289 24 12.017 24c6.62 0 11.988-5.367 11.988-11.987C24.005 5.367 18.637 0 12.017 0z"/></svg>
                        </a>
                    </div>
                </div>
                <a href="{{ route('home') }}#news" class="px-8 py-4 glass rounded-2xl text-white font-semibold hover:bg-upkgreen hover:text-white hover:border-upkgreen transition-all duration-300">
                    Back to All News
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
