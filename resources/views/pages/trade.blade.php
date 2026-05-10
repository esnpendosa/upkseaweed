@extends('layouts.app')

@section('title', $seo['title'])
@section('meta_description', $seo['description'])

@section('content')
<div class="relative pt-48 pb-24 bg-white dark:bg-upknavy overflow-hidden transition-colors duration-500">
    {{-- Hero Background --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/img/dummy/hero_news.png') }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-white/80 dark:bg-upknavy/80 transition-colors"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Hero Header --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-32">
            <div class="reveal">
                <span class="inline-flex items-center gap-2 bg-blue-500/10 text-blue-400 text-[10px] font-black px-6 py-2 rounded-full border border-blue-500/20 mb-10 uppercase tracking-[0.4em] leading-none">
                    {{ __('messages.trade_badge') }}
                </span>
                <h1 class="text-5xl lg:text-9xl font-heading font-black text-upknavy-900 dark:text-white leading-[0.85] tracking-tighter uppercase mb-10 transition-colors">
                    Trade <span class="text-blue-600 dark:text-blue-500">Terminal</span>
                </h1>
                <p class="text-gray-700 dark:text-gray-300 text-xl leading-relaxed mb-12 max-w-xl font-medium transition-colors">
                    {{ __('messages.trade_desc') }}
                </p>
                <div class="flex flex-wrap gap-6">
                    <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number') }}?text=I%20want%20to%20inquire%20about%20seaweed%20orders." target="_blank"
                       class="px-12 py-6 bg-upkgreen hover:bg-upkgreen-600 text-white font-black uppercase tracking-[0.2em] text-[10px] rounded-2xl shadow-2xl shadow-upkgreen/30 flex items-center gap-4 transition-all hover:scale-105 active:scale-95">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Inquire Orders
                    </a>
                    <a href="#market" class="px-12 py-6 glass border border-gray-200 dark:border-white/10 text-upknavy-900 dark:text-white font-black uppercase tracking-[0.2em] text-[10px] rounded-2xl hover:bg-slate-100 dark:hover:bg-white/5 transition-all">
                        Price Index
                    </a>
                </div>
            </div>
            <div class="reveal relative" style="transition-delay: 0.2s;">
                <div class="glass p-10 rounded-[3.5rem] border border-white/5 relative overflow-hidden shadow-2xl">
                    <div class="absolute -top-24 -right-24 w-64 h-64 bg-upkgreen/10 rounded-full blur-[80px]"></div>
                    <div class="relative z-10 space-y-6">
                        <div class="flex justify-between items-center bg-gray-100/50 dark:bg-upknavy/50 p-6 rounded-2xl border border-gray-200 dark:border-white/5 transition-colors">
                            <span class="text-[10px] font-black text-gray-500 dark:text-gray-600 uppercase tracking-widest italic transition-colors">Live Demand Forecast</span>
                            <span class="text-upkgreen font-black text-sm uppercase tracking-widest">+14.2% YoY</span>
                        </div>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="glass p-8 rounded-3xl border border-blue-500/10 bg-white dark:bg-white/5 transition-colors">
                                <p class="text-[10px] text-gray-500 dark:text-gray-600 font-black uppercase tracking-widest mb-4 transition-colors">EU Direct</p>
                                <p class="text-3xl font-heading font-black text-upknavy-900 dark:text-white transition-colors">420 MT</p>
                            </div>
                            <div class="glass p-8 rounded-3xl border border-purple-500/10 bg-white dark:bg-white/5 transition-colors">
                                <p class="text-[10px] text-gray-500 dark:text-gray-600 font-black uppercase tracking-widest mb-4 transition-colors">East Asia</p>
                                <p class="text-3xl font-heading font-black text-upknavy-900 dark:text-white transition-colors">840 MT</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Market Table --}}
        <div class="reveal mb-32" id="market">
            <div class="text-center mb-16">
                <h2 class="text-4xl sm:text-6xl font-heading font-black text-upknavy-900 dark:text-white mb-6 uppercase tracking-tighter leading-tight transition-colors">
                    Real-time <span class="text-blue-600 dark:text-blue-500">Price</span> Index
                </h2>
                <p class="text-gray-700 dark:text-gray-300 text-lg font-medium max-w-2xl mx-auto transition-colors">Benchmark prices based on current international demand and local supply levels for industrial compliance.</p>
            </div>
            
            <div class="glass rounded-[4rem] overflow-hidden border border-gray-100 dark:border-white/5 shadow-2xl bg-white dark:bg-upknavy-800 transition-colors">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[800px]">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-white/[0.03] transition-colors">
                                <th class="px-12 py-8 text-[10px] font-black text-gray-500 dark:text-gray-600 uppercase tracking-[0.3em] transition-colors">Product Classification</th>
                                <th class="px-12 py-8 text-[10px] font-black text-gray-500 dark:text-gray-600 uppercase tracking-[0.3em] transition-colors">Quality Specs</th>
                                <th class="px-12 py-8 text-[10px] font-black text-gray-500 dark:text-gray-600 uppercase tracking-[0.3em] text-right transition-colors">Reference Price</th>
                                <th class="px-12 py-8 text-[10px] font-black text-gray-500 dark:text-gray-600 uppercase tracking-[0.3em] text-right transition-colors">Mkt Trend</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-white/5 transition-colors">
                            @foreach([
                                ['type' => 'Dried Cottonii', 'specs' => 'Moisture ≤38%, Impurities ≤3%', 'price' => 'Rp 28.500/kg', 'trend' => '+2.5%', 'color' => 'text-upkgreen'],
                                ['type' => 'Dried Spinosum', 'specs' => 'Moisture ≤38%, Impurities ≤3%', 'price' => 'Rp 12.000/kg', 'trend' => '-1.2%', 'color' => 'text-red-400'],
                                ['type' => 'Gracilaria SP', 'specs' => 'Premium Grade, Sun Dried', 'price' => 'Rp 14.500/kg', 'trend' => '+0.8%', 'color' => 'text-upkgreen'],
                                ['type' => 'Semi-Refined (SRC)', 'specs' => 'Industrial Processing Grade', 'price' => 'Contact Us', 'trend' => 'Stable', 'color' => 'text-blue-400'],
                            ] as $item)
                            <tr class="hover:bg-gray-50 dark:hover:bg-white/[0.02] transition-colors group">
                                <td class="px-12 py-8">
                                    <div class="flex items-center gap-4">
                                        <div class="w-2 h-2 rounded-full {{ str_contains($item['color'], 'upkgreen') ? 'bg-upkgreen' : 'bg-gray-300 dark:bg-gray-700' }} transition-colors"></div>
                                        <span class="text-upknavy-900 dark:text-white font-black uppercase tracking-tight text-lg transition-colors">{{ $item['type'] }}</span>
                                    </div>
                                </td>
                                <td class="px-12 py-8 text-gray-500 dark:text-gray-400 text-sm font-medium italic transition-colors">{{ $item['specs'] }}</td>
                                <td class="px-12 py-8 text-upknavy-900 dark:text-white font-black text-right text-lg tracking-tighter transition-colors">{{ $item['price'] }}</td>
                                <td class="px-12 py-8 font-black text-right uppercase tracking-widest text-[10px] {{ $item['color'] }} transition-colors">{{ $item['trend'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Logistics Partners --}}
        <div class="reveal py-20 border-y border-white/5 relative">
            <div class="absolute inset-0 bg-blue-600/[0.01]"></div>
            <p class="relative z-10 text-center text-gray-500 dark:text-gray-600 text-[10px] font-black uppercase tracking-[0.5em] mb-16 transition-colors">Strategic Logistics Ecosystem</p>
            <div class="relative z-10 flex flex-wrap justify-center items-center gap-16 md:gap-24 opacity-40 grayscale hover:grayscale-0 transition-all duration-700">
                <span class="text-3xl font-black text-upknavy-900 dark:text-white italic tracking-tighter leading-none transition-colors">MAERSK</span>
                <span class="text-3xl font-black text-upknavy-900 dark:text-white italic tracking-tighter leading-none transition-colors">MSC</span>
                <span class="text-3xl font-black text-upknavy-900 dark:text-white italic tracking-tighter leading-none transition-colors">COSCO</span>
                <span class="text-3xl font-black text-upknavy-900 dark:text-white italic tracking-tighter leading-none transition-colors">ONE</span>
                <span class="text-3xl font-black text-upknavy-900 dark:text-white italic tracking-tighter leading-none uppercase transition-colors">Cma Cgm</span>
            </div>
        </div>
    </div>
</div>
@endsection
