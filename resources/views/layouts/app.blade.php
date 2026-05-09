<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Dynamic SEO Meta Tags --}}
    <title>@yield('title', \App\Models\Setting::get('seo_title', 'UPK Seaweed — Premium Indonesian Seaweed Exporter'))</title>
    <meta name="description" content="@yield('meta_description', \App\Models\Setting::get('seo_description', 'Leading Indonesian B2B seaweed exporter. Premium quality, ISO & HACCP Certified.'))">
    <meta name="keywords" content="@yield('meta_keywords', \App\Models\Setting::get('seo_keywords', 'seaweed exporter, Indonesia seaweed, Cottonii supplier'))">
    <meta name="author" content="{{ \App\Models\Setting::get('site_name', 'UPK Seaweed') }}">
    <meta name="robots" content="index, follow">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', \App\Models\Setting::get('seo_title', 'UPK Seaweed'))">
    <meta property="og:description" content="@yield('meta_description', \App\Models\Setting::get('seo_description', 'SEAWEED EXPORTER'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ \App\Models\Setting::get('site_name', 'UPK Seaweed') }}">

    {{-- Hreflang Tags for Multi-language SEO --}}
    @php
        $locales = ['en', 'id', 'zh', 'ja', 'ko', 'ar', 'fr', 'es', 'de', 'ru', 'it', 'pt', 'nl', 'tr', 'vi', 'th', 'hi', 'ms'];
    @endphp
    @foreach($locales as $loc)
        <link rel="alternate" hreflang="{{ $loc }}" href="{{ url()->current() }}?lang={{ $loc }}">
    @endforeach
    <link rel="alternate" hreflang="x-default" href="{{ url('/') }}">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🌿</text></svg>">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Tailwind CSS CDN with Custom Config --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        upknavy: {
                            DEFAULT: '#0A192F',
                            50: '#F8FAFC', // Light theme background
                            100: '#F1F5F9',
                            200: '#E2E8F0',
                            300: '#CBD5E1',
                            400: '#94A3B8',
                            500: '#0A192F',
                            600: '#091527',
                            700: '#07101F',
                            800: '#050C17',
                            900: '#03070F',
                        },
                        upkgreen: {
                            DEFAULT: '#10B981',
                            50: '#ECFDF5',
                            100: '#D1FAE5',
                            200: '#A7F3D0',
                            300: '#6EE7B7',
                            400: '#34D399',
                            500: '#10B981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065F46',
                            900: '#064E3B',
                        }
                    },
                    fontFamily: {
                        'heading': ['Outfit', 'sans-serif'],
                        'body': ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
                        'fade-in': 'fadeIn 1s ease-out forwards',
                        'slide-in-left': 'slideInLeft 0.6s ease-out forwards',
                        'slide-in-right': 'slideInRight 0.6s ease-out forwards',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'count-up': 'countUp 1s ease-out forwards',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideInLeft: {
                            '0%': { opacity: '0', transform: 'translateX(-50px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        },
                        slideInRight: {
                            '0%': { opacity: '0', transform: 'translateX(50px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        },
                    },
                },
            },
        }
    </script>

    {{-- Theme Switcher Logic --}}
    <script>
        if (localStorage.getItem('theme') === 'light' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: light)').matches)) {
            document.documentElement.classList.add('light');
            document.documentElement.classList.remove('dark');
        } else {
            document.documentElement.classList.add('dark');
            document.documentElement.classList.remove('light');
        }
    </script>

    {{-- Alpine.js CDN --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Custom Styles --}}
    <style>
        :root {
            --bg-color: #0A192F;
            --text-color: #ffffff;
            --nav-bg: rgba(10, 25, 47, 0.85);
        }

        .light {
            --bg-color: #F8FAFC;
            --text-color: #0F172A;
            --nav-bg: rgba(255, 255, 255, 0.85);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
        }
        
        .dark body {
            background-color: #0A192F;
            color: #ffffff;
        }

        .light body {
            background-color: #F8FAFC;
            color: #0F172A;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }

        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: var(--bg-color);
        }
        ::-webkit-scrollbar-thumb {
            background: #10B981;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #059669;
        }

        /* Glassmorphism utility */
        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .light .glass {
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(15, 23, 42, 0.05);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
        }

        .glass-dark {
            background: var(--nav-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(16, 185, 129, 0.15);
        }

        .light .glass-dark {
            background: var(--nav-bg);
            border: 1px solid rgba(15, 23, 42, 0.1);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #10B981, #059669, #065F46);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Card hover glow */
        .card-glow {
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        .card-glow:hover {
            box-shadow: 0 0 30px rgba(16, 185, 129, 0.15), 0 20px 60px rgba(0, 0, 0, 0.1);
            transform: translateY(-8px);
        }

        /* Animated gradient border */
        .gradient-border {
            position: relative;
        }
        .gradient-border::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 1px;
            background: linear-gradient(135deg, #10B981, transparent, #10B981);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
        }

        /* Intersection Observer animations */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        .reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        /* Wave animation for hero */
        .wave-bg {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }
        .wave-bg svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 80px;
        }

        /* Particle effect dots */
        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(16, 185, 129, 0.3);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        /* Light mode specific text colors */
        .light .text-gray-400 { color: #64748B; }
        .light .text-gray-500 { color: #475569; }
        .light .text-white { color: #0F172A; }
        .light .bg-upknavy { background-color: #F8FAFC; }
        .light .bg-upknavy-700 { background-color: #F1F5F9; }
        .light .bg-upknavy-800 { background-color: #E2E8F0; }
        .light .border-white\/5 { border-color: rgba(15, 23, 42, 0.05); }
        .light .border-white\/10 { border-color: rgba(15, 23, 42, 0.1); }
    </style>

    {{-- Structured Data (JSON-LD) --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "{{ \App\Models\Setting::get('site_name', 'UPK Seaweed') }}",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('logo.svg') }}",
      "description": "{{ \App\Models\Setting::get('seo_description') }}",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Pangkahkulon",
        "addressLocality": "Ujungpangkah",
        "addressRegion": "Gresik",
        "addressCountry": "ID"
      }
    }
    </script>

    {{-- Swiper.js --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- flag-icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css" />

    @stack('styles')
</head>
<body class="transition-colors duration-500 font-body antialiased overflow-x-hidden" x-data="{ mobileMenu: false, isDark: localStorage.getItem('theme') !== 'light' }">

    {{-- Navigation --}}
    @include('partials.navbar')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- AI Chatbot System --}}
    @include('partials.chatbot')

    {{-- Scroll Reveal Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
        });
    </script>

    @stack('scripts')
</body>
</html>
