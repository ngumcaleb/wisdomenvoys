<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $settings->site_name ?? 'Wisdom Envoys Ministry')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
            --font-sans: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif;
            --font-headline: 'Montserrat', ui-sans-serif, system-ui, sans-serif;

            --color-primary: #DC143C;
            --color-primary-container: #E8192C;
            --color-on-primary: #ffffff;
            --color-on-primary-container: #fffafa;
            --color-primary-fixed-dim: #ffb4ab;

            --color-surface: #ffffff;
            --color-surface-dim: #f5f5f5;
            --color-surface-container: #f8f9fa;
            --color-surface-container-low: #fafafa;
            --color-surface-container-lowest: #ffffff;
            --color-surface-container-high: #f0f0f0;
            --color-surface-muted: #F8F9FA;
            --color-surface-variant: #e8e8e8;

            --color-on-surface: #1a1a2e;
            --color-on-surface-variant: #555770;
            --color-on-background: #1a1a2e;

            --color-outline: #b0b0c0;
            --color-outline-variant: #e0e0e8;

            --color-on-secondary-fixed: #0f172a;
            --color-on-secondary-fixed-variant: #334155;

            --color-accent-pink: #E91E63;

            --color-background: #ffffff;
            --color-text-on-dark: #FFFFFF;
        }

        html { scroll-behavior: smooth; }
        body { font-family: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
        }
        .card-shadow { box-shadow: 0px 4px 20px rgba(0,0,0,0.05); }
        .hero-bg { background-size: cover; background-position: center; }
    </style>
    @stack('styles')
</head>
<body class="bg-surface text-on-surface antialiased">

    {{-- HEADER --}}
    <header class="sticky top-0 w-full z-50 bg-surface shadow-sm h-20">
        <nav class="max-w-[1280px] mx-auto flex justify-between items-center px-6 h-full">
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="/images/wisdom-envoys-logo.png" alt="Wisdom Envoys Ministry" class="h-12 w-auto">
            </a>
            <div class="hidden md:flex items-center gap-8">
                <a class="font-headline text-xs font-bold uppercase tracking-[0.1em] transition-colors duration-200 {{ request()->routeIs('home') ? 'text-primary border-b-2 border-primary' : 'text-on-surface-variant hover:text-primary' }}" href="{{ route('home') }}">Home</a>
                <a class="font-headline text-xs font-bold uppercase tracking-[0.1em] transition-colors duration-200 {{ request()->routeIs('download.*') ? 'text-primary border-b-2 border-primary' : 'text-on-surface-variant hover:text-primary' }}" href="{{ route('download.index') }}">Download</a>
                <a class="font-headline text-xs font-bold uppercase tracking-[0.1em] transition-colors duration-200 {{ request()->routeIs('services') ? 'text-primary border-b-2 border-primary' : 'text-on-surface-variant hover:text-primary' }}" href="{{ route('services') }}">Our Services</a>
                <a class="font-headline text-xs font-bold uppercase tracking-[0.1em] transition-colors duration-200 {{ request()->routeIs('products') ? 'text-primary border-b-2 border-primary' : 'text-on-surface-variant hover:text-primary' }}" href="{{ route('products') }}">Our Products</a>
                <a class="font-headline text-xs font-bold uppercase tracking-[0.1em] transition-colors duration-200 {{ request()->routeIs('partnership') ? 'text-primary border-b-2 border-primary' : 'text-on-surface-variant hover:text-primary' }}" href="{{ route('partnership') }}">Partnership</a>
            </div>
            <a href="https://givings.thecovenantoflife.com/" class="hidden md:inline-block bg-primary text-on-primary px-6 py-3 rounded-full font-headline text-xs font-bold uppercase tracking-[0.1em] hover:bg-primary-container transition-all">
                Give to Us
            </a>
            <button id="mobile-toggle" class="md:hidden text-primary p-2">
                <span class="material-symbols-outlined text-[32px]">menu</span>
            </button>
        </nav>
        <div id="mobile-menu" class="hidden md:hidden absolute top-20 left-0 w-full bg-surface shadow-xl p-6 flex flex-col gap-4">
            <a class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface-variant" href="{{ route('home') }}">Home</a>
            <a class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface-variant" href="{{ route('download.index') }}">Download</a>
            <a class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface-variant" href="{{ route('services') }}">Our Services</a>
            <a class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface-variant" href="{{ route('products') }}">Our Products</a>
            <a class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface-variant" href="{{ route('partnership') }}">Partnership</a>
            <a href="https://givings.thecovenantoflife.com/" class="bg-primary text-on-primary w-full py-3 rounded-full font-headline text-xs font-bold uppercase tracking-[0.1em] text-center">Give to Us</a>
        </div>
    </header>

    {{-- MAIN CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-on-secondary-fixed text-white py-12 sm:py-16 md:py-20 px-5 sm:px-8 md:px-10">
        <div class="max-w-[1280px] mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 sm:gap-10 lg:gap-8">
            <div class="space-y-5 sm:space-y-6">
                <span class="font-headline text-base sm:text-lg font-bold text-primary">Wisdom Envoys</span>
                <p class="text-white/50 text-[13px] sm:text-sm leading-relaxed">
                    An institution raising people empowered by God's Wisdom to model the Culture of God's Kingdom across every stratum and sphere of human life.
                </p>
                <div class="flex gap-3">
                    @if($settings->facebook)
                        <a href="{{ $settings->facebook }}" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-white flex items-center justify-center hover:bg-primary transition-all duration-300 hover:scale-110 group" target="_blank">
                            <span class="material-symbols-outlined text-primary text-[16px] sm:text-sm group-hover:text-white transition-colors">public</span>
                        </a>
                    @endif
                    @if($settings->instagram)
                        <a href="{{ $settings->instagram }}" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-white flex items-center justify-center hover:bg-primary transition-all duration-300 hover:scale-110 group" target="_blank">
                            <span class="material-symbols-outlined text-primary text-[16px] sm:text-sm group-hover:text-white transition-colors">photo_camera</span>
                        </a>
                    @endif
                    @if($settings->youtube)
                        <a href="{{ $settings->youtube }}" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-white flex items-center justify-center hover:bg-primary transition-all duration-300 hover:scale-110 group" target="_blank">
                            <span class="material-symbols-outlined text-primary text-[16px] sm:text-sm group-hover:text-white transition-colors">smart_display</span>
                        </a>
                    @endif
                    @if($settings->tiktok)
                        <a href="{{ $settings->tiktok }}" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-white flex items-center justify-center hover:bg-primary transition-all duration-300 hover:scale-110 group" target="_blank">
                            <span class="material-symbols-outlined text-primary text-[16px] sm:text-sm group-hover:text-white transition-colors">music_note</span>
                        </a>
                    @endif
                    @if($settings->email)
                        <a href="mailto:{{ $settings->email }}" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-white flex items-center justify-center hover:bg-primary transition-all duration-300 hover:scale-110 group">
                            <span class="material-symbols-outlined text-primary text-[16px] sm:text-sm group-hover:text-white transition-colors">mail</span>
                        </a>
                    @endif
                </div>
            </div>
            <div>
                <h4 class="font-headline text-[11px] sm:text-xs font-bold uppercase tracking-widest mb-5 sm:mb-6 text-white/90">Pages</h4>
                <ul class="space-y-3 sm:space-y-4">
                    <li><a class="text-[13px] sm:text-sm text-white/50 hover:text-primary transition-colors duration-300" href="{{ route('about') }}">Discover Us Today</a></li>
                    <li><a class="text-[13px] sm:text-sm text-white/50 hover:text-primary transition-colors duration-300" href="{{ route('services') }}">Our Services</a></li>
                    <li><a class="text-[13px] sm:text-sm text-white/50 hover:text-primary transition-colors duration-300" href="{{ route('download.index') }}">Free Downloads</a></li>
                    <li><a class="text-[13px] sm:text-sm text-white/50 hover:text-primary transition-colors duration-300" href="{{ route('partnership') }}">Partnership</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-headline text-[11px] sm:text-xs font-bold uppercase tracking-widest mb-5 sm:mb-6 text-white/90">Product</h4>
                <ul class="space-y-3 sm:space-y-4">
                    <li><a class="text-[13px] sm:text-sm text-white/50 hover:text-primary transition-colors duration-300" href="{{ route('download.index') }}">Free Message Download</a></li>
                    <li><a class="text-[13px] sm:text-sm text-white/50 hover:text-primary transition-colors duration-300" href="{{ route('products') }}">Manuals & Workbooks</a></li>
                    <li><a class="text-[13px] sm:text-sm text-white/50 hover:text-primary transition-colors duration-300" href="{{ route('podcasts') }}">Podcasts</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-headline text-[11px] sm:text-xs font-bold uppercase tracking-widest mb-5 sm:mb-6 text-white/90">Contact Info</h4>
                <ul class="space-y-3 sm:space-y-4">
                    @if($settings->address)
                        <li class="flex items-start gap-3">
                            <span class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="material-symbols-outlined text-primary text-[16px] sm:text-[17px]">location_on</span>
                            </span>
                            <span class="text-[13px] sm:text-sm text-white/50 leading-relaxed">{{ $settings->address }}</span>
                        </li>
                    @endif
                    @if($settings->email)
                        <li class="flex items-center gap-3">
                            <span class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-primary text-[16px] sm:text-[17px]">mail</span>
                            </span>
                            <span class="text-[13px] sm:text-sm text-white/50">{{ $settings->email }}</span>
                        </li>
                    @endif
                    @if($settings->phone)
                        <li class="flex items-center gap-3">
                            <span class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-primary text-[16px] sm:text-[17px]">phone</span>
                            </span>
                            <span class="text-[13px] sm:text-sm text-white/50">{{ $settings->phone }}</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="max-w-[1280px] mx-auto mt-10 sm:mt-12 md:mt-16 pt-6 sm:pt-8 border-t border-white/10 text-center">
            <p class="text-[12px] sm:text-[13px] text-white/30">{{ $settings->copyright ?? '© ' . date('Y') . ' Wisdom Envoys Ministry. All Rights Reserved.' }}</p>
        </div>
    </footer>

    <script>
        document.getElementById('mobile-toggle')?.addEventListener('click', () => {
            document.getElementById('mobile-menu')?.classList.toggle('hidden');
        });
    </script>
    @stack('scripts')
</body>
</html>
