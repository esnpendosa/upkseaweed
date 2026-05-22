@extends('layouts.app')

@section('title', 'Contact Us — ' . \App\Models\Setting::get('site_name'))

@section('content')
<section class="relative pt-48 pb-24 bg-white dark:bg-upknavy overflow-hidden transition-colors duration-500">
    {{-- Hero Background --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/img/dummy/hero_contact.png') }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-white/80 dark:bg-upknavy/80 transition-colors"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20 reveal">
            <span class="inline-flex items-center gap-2 bg-upkgreen/10 text-upkgreen text-[10px] font-black px-6 py-2 rounded-full border border-upkgreen/20 mb-8 uppercase tracking-[0.3em]">
                {{ __('messages.contact_badge') }}
            </span>
            <h1 class="text-5xl md:text-7xl font-heading font-black text-upknavy-900 dark:text-white leading-[0.9] tracking-tighter uppercase mb-8 transition-colors">
                {!! __('messages.contact_h1') !!}
            </h1>
            <p class="text-gray-700 dark:text-gray-300 text-lg max-w-2xl mx-auto leading-relaxed transition-colors">
                {{ __('messages.contact_subtitle') }}
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            {{-- Contact Form --}}
            <div class="lg:col-span-7 reveal">
                <div class="glass p-8 sm:p-12 rounded-[3.5rem] border border-gray-100 dark:border-white/5 bg-white dark:bg-upknavy-800 shadow-2xl relative overflow-hidden group transition-colors">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-upkgreen/5 rounded-full blur-3xl -mr-16 -mt-16 group-hover:bg-upkgreen/10 transition-all duration-700"></div>
                    
                    <h3 class="text-2xl font-heading font-black text-upknavy-900 dark:text-white uppercase tracking-tighter mb-10 transition-colors">
                        {{ __('messages.contact_form_title') }}
                    </h3>

                    <form action="#" class="space-y-8">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="block text-[10px] font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest px-1 transition-colors">{{ __('messages.contact_name') }}</label>
                                <input type="text" placeholder="John Doe" class="w-full bg-gray-50 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-2xl px-6 py-4 text-upknavy-900 dark:text-white focus:outline-none focus:border-upkgreen/50 transition-all placeholder:text-gray-400">
                            </div>
                            <div class="space-y-3">
                                <label class="block text-[10px] font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest px-1 transition-colors">{{ __('messages.contact_email') }}</label>
                                <input type="email" placeholder="john@company.com" class="w-full bg-gray-50 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-2xl px-6 py-4 text-upknavy-900 dark:text-white focus:outline-none focus:border-upkgreen/50 transition-all placeholder:text-gray-400">
                            </div>
                        </div>

                        <div class="space-y-3">
                            <label class="block text-[10px] font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest px-1 transition-colors">{{ __('messages.contact_subject') }}</label>
                            <input type="text" placeholder="{{ __('messages.contact_subject') }}..." class="w-full bg-gray-50 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-2xl px-6 py-4 text-upknavy-900 dark:text-white focus:outline-none focus:border-upkgreen/50 transition-all placeholder:text-gray-400">
                        </div>

                        <div class="space-y-3">
                            <label class="block text-[10px] font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest px-1 transition-colors">{{ __('messages.contact_message') }}</label>
                            <textarea rows="5" placeholder="{{ __('messages.contact_message') }}..." class="w-full bg-gray-50 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-2xl px-6 py-4 text-upknavy-900 dark:text-white focus:outline-none focus:border-upkgreen/50 transition-all resize-none placeholder:text-gray-400"></textarea>
                        </div>

                        <button type="submit" class="w-full py-5 bg-upkgreen hover:bg-upkgreen-600 text-white font-black uppercase tracking-[0.2em] text-[10px] rounded-2xl shadow-2xl shadow-upkgreen/20 transition-all active:scale-[0.98]">
                            {{ __('messages.contact_submit') }}
                        </button>
                    </form>
                </div>
            </div>

            {{-- Sidebar Info --}}
            <div class="lg:col-span-5 space-y-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-6">
                    {{-- Email --}}
                    <div class="glass p-8 rounded-[2.5rem] border border-gray-100 dark:border-white/5 bg-white dark:bg-upknavy-800 group hover:border-upkgreen/30 transition-all shadow-2xl">
                        <div class="w-12 h-12 bg-upkgreen/10 rounded-2xl flex items-center justify-center text-upkgreen mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <h4 class="text-upknavy-900 dark:text-white font-black text-xs uppercase tracking-widest mb-2 transition-colors">{{ __('messages.contact_sales_title') }}</h4>
                        <p class="text-gray-600 dark:text-gray-500 text-[10px] uppercase font-bold tracking-widest mb-4 transition-colors">{{ __('messages.contact_sales_desc') }}</p>
                        <a href="mailto:{{ \App\Models\Setting::get('site_email') }}" class="text-upkgreen font-black text-xs sm:text-sm hover:underline break-all uppercase tracking-tighter">
                            {{ \App\Models\Setting::get('site_email') }}
                        </a>
                    </div>

                    {{-- WhatsApp --}}
                    <div class="glass p-8 rounded-[2.5rem] border border-gray-100 dark:border-white/5 bg-white dark:bg-upknavy-800 group hover:border-upkgreen/30 transition-all shadow-2xl">
                        <div class="w-12 h-12 bg-upkgreen/10 rounded-2xl flex items-center justify-center text-upkgreen mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0a12 12 0 1 1 0 24 12 12 0 0 1 0-24zm.017 4.5a7.5 7.5 0 0 0-6.427 11.338l-1.09 3.977 4.07-.1.35.204a7.5 7.5 0 1 0 3.097-15.42zm4.18 10.368c-.227-.113-1.341-.662-1.55-.737-.207-.076-.36-.113-.51.113-.15.227-.58.737-.714.891-.132.15-.265.17-.492.057-.227-.113-.96-.353-1.826-1.127-.676-.604-1.132-1.35-1.265-1.577-.133-.227-.014-.35.1-.462.102-.102.227-.265.34-.397.114-.132.152-.227.227-.378.076-.15.038-.283-.019-.397-.057-.114-.51-1.23-.7-1.68-.184-.44-.37-.38-.51-.387-.132-.007-.282-.007-.433-.007s-.397.057-.604.283c-.207.227-.793.775-.793 1.89s.812 2.193.926 2.344c.113.15 1.598 2.44 3.873 3.42.54.233.963.372 1.292.477.544.173 1.038.148 1.43.09.435-.064 1.341-.548 1.53-.1.08.188.548.188 1.132-.057.148-.227.113-.53-.038-.15z"/></svg>
                        </div>
                        <h4 class="text-upknavy-900 dark:text-white font-black text-xs uppercase tracking-widest mb-2 transition-colors">{{ __('messages.contact_support_title') }}</h4>
                        <p class="text-gray-600 dark:text-gray-500 text-[10px] uppercase font-bold tracking-widest mb-4 transition-colors">{{ __('messages.contact_support_desc') }}</p>
                        <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number') }}" target="_blank" class="text-upkgreen font-black text-sm sm:text-lg hover:underline uppercase tracking-tighter">
                            +{{ \App\Models\Setting::get('whatsapp_number') }}
                        </a>
                    </div>
                </div>

                {{-- Map Card --}}
                <div class="glass p-8 rounded-[3rem] border border-gray-100 dark:border-white/5 bg-white dark:bg-upknavy-800 group overflow-hidden shadow-2xl transition-colors">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 bg-upkgreen/10 rounded-xl flex items-center justify-center text-upkgreen">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <h4 class="text-upknavy-900 dark:text-white font-black text-xs uppercase tracking-widest transition-colors">{{ __('messages.contact_hq_title') }}</h4>
                    </div>
                    
                    <p class="text-gray-600 dark:text-gray-500 text-xs font-bold uppercase tracking-widest leading-relaxed mb-8 transition-colors">
                        {{ \App\Models\Setting::get('address') }}
                    </p>

                    <div class="relative h-64 rounded-3xl overflow-hidden border border-white/10 shadow-inner">
                        {!! \App\Models\Setting::get('google_maps_iframe') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
