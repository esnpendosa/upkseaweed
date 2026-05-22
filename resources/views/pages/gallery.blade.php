@extends('layouts.app')

@section('title', $seo['title'])
@section('meta_description', $seo['description'])
@section('meta_keywords', $seo['keywords'] ?? '')

@section('content')
<div class="bg-slate-900 pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Galeri Industri</h1>
            <p class="text-slate-400 text-lg max-w-2xl mx-auto">
                Melihat lebih dekat perjalanan kami dalam memproses rumput laut kualitas dunia, dari petani hingga ke pasar global.
            </p>
        </div>

        <!-- Categories Filter (Optional) -->
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <button class="px-6 py-2 rounded-full bg-emerald-500 text-white font-medium transition hover:bg-emerald-600">Semua</button>
            @php
                $categories = $items->pluck('category')->unique()->filter();
            @endphp
            @foreach($categories as $category)
                <button class="px-6 py-2 rounded-full bg-slate-800 text-slate-300 font-medium transition hover:bg-slate-700 hover:text-white">{{ $category }}</button>
            @endforeach
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($items as $item)
                <div class="group relative overflow-hidden rounded-2xl bg-slate-800 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-emerald-500/20">
                    <div class="aspect-w-16 aspect-h-12 overflow-hidden">
                        @if($item->image_path)
                            <img src="{{ asset('media/' . $item->image_path) }}" 
                                 alt="{{ $item->getLocalized('title') }}" 
                                 class="object-cover w-full h-full transform transition-transform duration-700 group-hover:scale-110">
                        @else
                            <div class="w-full h-full bg-slate-700 flex items-center justify-center">
                                <i class="heroicon-o-photo text-slate-600 w-12 h-12"></i>
                            </div>
                        @endif
                    </div>
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6">
                        @if($item->category)
                            <span class="text-emerald-400 text-xs font-bold uppercase tracking-wider mb-2">{{ $item->category }}</span>
                        @endif
                        <h3 class="text-xl font-bold text-white mb-2">{{ $item->getLocalized('title') }}</h3>
                        <p class="text-slate-300 text-sm line-clamp-2">{{ $item->getLocalized('description') }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <p class="text-slate-500 text-lg">Belum ada foto galeri yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
