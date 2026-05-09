@extends('layouts.app')

@section('title', $seo['title'])
@section('meta_description', $seo['description'])

@section('content')
<div class="relative pt-48 pb-24 bg-white dark:bg-upknavy overflow-hidden transition-colors duration-500">
    {{-- Hero Background --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/img/dummy/hero_products.png') }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-white/80 dark:bg-upknavy/80 transition-colors"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- E-commerce Header --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 mb-16 reveal">
            <div>
                <h1 class="text-5xl lg:text-8xl font-heading font-black text-upknavy-900 dark:text-white mb-6 uppercase tracking-tighter leading-none transition-colors">
                    {!! __('messages.prod_h1') !!}
                </h1>
                <p class="text-gray-700 dark:text-gray-300 text-xl font-medium max-w-2xl leading-relaxed transition-colors">{{ __('messages.prod_subtitle') }}</p>
            </div>
            <div class="flex items-center gap-4">
                 <div class="glass p-2 rounded-3xl border border-gray-200 dark:border-white/5 flex shadow-2xl bg-white/50 dark:bg-white/5">
                    <button class="px-10 py-5 bg-upkgreen text-white rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all shadow-lg active:scale-95">
                        {{ __('messages.prod_all') }}
                    </button>
                    <button class="px-10 py-5 text-gray-400 dark:text-gray-500 hover:text-upknavy-900 dark:hover:text-white rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all hover:bg-slate-100 dark:hover:bg-white/5">
                        {{ __('messages.prod_wholesale') }}
                    </button>
                 </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
            {{-- Filters Sidebar --}}
            <div class="lg:col-span-1 space-y-10 reveal">
                <div class="glass p-8 rounded-[2.5rem] border border-gray-200 dark:border-white/5 bg-white dark:bg-white/5 transition-colors">
                    <h3 class="text-upknavy-900 dark:text-white text-[10px] font-black uppercase tracking-[.4em] mb-8 decoration-upkgreen underline underline-offset-8 decoration-2">
                        {{ __('messages.prod_categories') }}
                    </h3>
                    <div class="space-y-4">
                        @php
                            $categories = $products->pluck('grade_type')->unique();
                        @endphp
                        @foreach($categories as $cat)
                        <label class="flex items-center gap-4 cursor-pointer group">
                            <div class="relative w-5 h-5">
                                <input type="checkbox" class="peer hidden">
                                <div class="w-full h-full rounded border-2 border-gray-200 dark:border-white/10 bg-slate-50 dark:bg-white/5 peer-checked:bg-upkgreen peer-checked:border-upkgreen transition-all"></div>
                            </div>
                            <span class="text-sm font-bold text-gray-700 dark:text-gray-300 group-hover:text-upknavy-900 dark:group-hover:text-white transition-colors">{{ $cat }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="glass p-8 rounded-[2.5rem] border border-gray-200 dark:border-white/5 bg-white dark:bg-white/5 transition-colors">
                    <h3 class="text-upknavy-900 dark:text-white text-[10px] font-black uppercase tracking-[.4em] mb-8 decoration-blue-500 underline underline-offset-8 decoration-2">{{ __('messages.prod_cert_title') }}</h3>
                    <div class="space-y-6">
                        <div class="flex items-center gap-4 text-gray-700 dark:text-gray-300 text-xs font-bold leading-relaxed transition-colors">
                            <div class="w-8 h-8 rounded-lg bg-upkgreen/10 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 text-upkgreen" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
                            </div>
                            {{ __('messages.prod_cert_haccp') }}
                        </div>
                        <div class="flex items-center gap-4 text-gray-700 dark:text-gray-300 text-xs font-bold leading-relaxed transition-colors">
                            <div class="w-8 h-8 rounded-lg bg-upkgreen/10 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 text-upkgreen" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
                            </div>
                            {{ __('messages.prod_cert_halal') }}
                        </div>
                    </div>
                </div>

                <div class="p-10 glass rounded-[3rem] bg-gradient-to-br from-upkgreen/10 to-transparent border border-gray-200 dark:border-upkgreen/20 shadow-2xl transition-colors bg-white dark:bg-transparent">
                    <h4 class="text-upknavy-900 dark:text-white text-xl font-heading font-black mb-4 transition-colors">{{ __('messages.prod_custom_title') }}</h4>
                    <p class="text-gray-600 dark:text-gray-400 text-xs mb-8 leading-loose font-medium transition-colors">{{ __('messages.prod_custom_sub') }}</p>
                    <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number') }}" class="inline-block text-[10px] font-black uppercase text-upkgreen tracking-[0.3em] border-b-2 border-upkgreen pb-1 hover:text-upknavy-900 dark:hover:text-white hover:border-upknavy-900 dark:hover:border-white transition-all">
                        {{ __('messages.prod_request_quote') }}
                    </a>
                </div>
            </div>

            {{-- Products Grid --}}
            <div class="lg:col-span-3">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                    @foreach($products as $product)
                    <div class="reveal glass rounded-[3rem] border border-gray-100 dark:border-white/5 overflow-hidden flex flex-col group transition-all duration-500 hover:border-upkgreen/30 hover:-translate-y-2 shadow-2xl bg-white dark:bg-upknavy-800 transition-colors">
                        {{-- Image Area --}}
                        <div class="aspect-square relative overflow-hidden bg-slate-100 dark:bg-upknavy-700">
                            @if($product->image_path)
                                <img src="/media/{{ $product->image_path }}" alt="{{ $product->getLocalized('title') }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200 dark:from-upknavy-700 dark:to-upknavy-900 border-2 border-white/5 relative overflow-hidden">
                                     {{-- Industrial Pattern --}}
                                     <div class="absolute inset-0 opacity-[0.03] z-0" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%2310B981&quot; fill-opacity=&quot;1&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
                                     <div class="z-10 text-upkgreen/20 group-hover:text-upkgreen/40 transition-colors">
                                        <svg class="w-24 h-24 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                                     </div>
                                     <span class="z-10 text-[8px] font-black uppercase tracking-[0.4em] text-gray-400 dark:text-gray-700 group-hover:text-upkgreen transition-colors">UPK SEAWEED HUB</span>
                                </div>
                            @endif
                            
                            {{-- Badges --}}
                            <div class="absolute top-8 left-8">
                                <span class="px-6 py-2 glass-dark backdrop-blur-xl rounded-full text-[8px] font-black text-upkgreen uppercase tracking-[0.3em] border border-white/10 shadow-2xl">
                                    {{ $product->grade_type }}
                                </span>
                            </div>

                            {{-- Hover Overlay Specs --}}
                            <div class="absolute inset-0 bg-upknavy/80 backdrop-blur-md opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col justify-center p-12 text-center">
                                <div class="space-y-6">
                                    <div>
                                        <p class="text-[8px] font-black text-upkgreen uppercase tracking-[0.4em] mb-2">{{ __('messages.prod_moisture') }}</p>
                                        <p class="text-3xl font-heading font-black text-white">{{ $product->moisture_content ?? '≤38%' }}</p>
                                    </div>
                                    <div class="w-12 h-px bg-white/10 mx-auto"></div>
                                    <div>
                                        <p class="text-[8px] font-black text-blue-400 uppercase tracking-[0.4em] mb-2">{{ __('messages.prod_impurity') }}</p>
                                        <p class="text-3xl font-heading font-black text-white">{{ $product->impurity_content ?? '≤2%' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Info Area --}}
                        <div class="p-10 flex-1 flex flex-col">
                            <h3 class="text-2xl font-heading font-extrabold text-upknavy-900 dark:text-white mb-4 leading-tight group-hover:text-upkgreen transition-colors">{{ $product->getLocalized('title') }}</h3>
                            <p class="text-gray-700 dark:text-gray-300 text-sm font-medium line-clamp-3 leading-loose mb-10 flex-1 transition-colors">
                                {{ $product->getLocalized('description') }}
                            </p>
                            
                            {{-- Action Footer --}}
                            <div class="flex items-center justify-between pt-8 border-t border-gray-100 dark:border-white/5 transition-colors">
                                <div class="flex flex-col">
                                    <span class="text-[8px] font-black text-gray-400 dark:text-gray-600 uppercase tracking-[0.3em] mb-2 transition-colors">{{ __('messages.prod_price_from') }}</span>
                                    <span class="text-upkgreen font-black text-xl tracking-tighter">{{ __('messages.prod_inquire') }}</span>
                                </div>
                                <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number') }}?text=Inquiry%20{{ urlencode($product->getLocalized('title')) }}" 
                                   target="_blank"
                                   class="w-14 h-14 rounded-2xl glass border border-gray-200 dark:border-white/10 flex items-center justify-center text-upknavy-900 dark:text-white hover:bg-upkgreen hover:border-upkgreen hover:text-white transition-all shadow-2xl active:scale-95 group/btn bg-white dark:bg-white/5">
                                    <svg class="w-6 h-6 group-hover/btn:scale-125 transition-transform duration-500" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Empty State --}}
                @if($products->isEmpty())
                <div class="text-center py-40 glass rounded-[4rem] border border-white/5">
                    <svg class="w-32 h-32 text-upkgreen/5 mx-auto mb-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    <h3 class="text-3xl font-heading font-black text-gray-600 uppercase tracking-widest">{{ __('messages.prod_empty') }}</h3>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
