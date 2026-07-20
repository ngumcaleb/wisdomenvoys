@extends('layouts.public')

@section('content')

{{-- HERO SECTION --}}
@php $heroImage = $settings->hero_home_image ?? '/images/widomenvoys-hero.webp'; @endphp
<section class="relative min-h-[380px] sm:min-h-[460px] md:min-h-[560px] lg:min-h-[620px] flex items-end sm:items-center overflow-hidden hero-bg" style="background-image: url('{{ $heroImage }}')">
    <div class="absolute inset-0 bg-gradient-to-r from-primary/95 via-primary/70 to-primary/20"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>
    <div class="relative z-10 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10 text-white w-full pt-0 pb-10 sm:pt-8 sm:pb-14 md:pt-10 md:pb-16">
        <div class="max-w-3xl lg:max-w-4xl space-y-3 sm:space-y-5 md:space-y-6 lg:space-y-8">
            <div class="flex items-center gap-2 sm:gap-3 md:gap-4">
                <div class="w-1 h-4 sm:h-6 md:h-8 bg-white/60 rounded-full"></div>
                <span class="font-headline text-[9px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.18em] text-white/85">{{ $hero['eyebrow'] ?? 'We Win, Influence, Establish' }}</span>
            </div>
            <h1 class="font-headline text-[22px] leading-[1.12] sm:text-[34px] sm:leading-[1.1] md:text-[50px] lg:text-[66px] xl:text-[76px] font-extrabold uppercase drop-shadow-lg tracking-tight">
                {!! nl2br(e($hero['title'])) !!}
            </h1>
            <p class="text-xs leading-relaxed sm:text-sm sm:leading-relaxed md:text-base lg:text-lg xl:text-xl text-white/80 max-w-xl lg:max-w-2xl">
                {{ $hero['subtitle'] }}
            </p>
            <div class="pt-1 sm:pt-3 md:pt-5">
                <a class="group inline-flex items-center gap-2 bg-white text-primary px-5 py-2.5 sm:px-8 sm:py-3.5 md:px-10 md:py-4 lg:px-11 lg:py-4.5 rounded-full font-headline text-[10px] sm:text-xs md:text-sm font-bold uppercase tracking-[0.06em] shadow-xl hover:shadow-2xl hover:bg-white/95 transition-all duration-300" href="{{ $hero['button_one_url'] ?? '#' }}">
                    {{ $hero['button_one'] ?? 'Discover Us' }}
                    <span class="material-symbols-outlined text-xs sm:text-base md:text-lg transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- SERVICES SECTION --}}
<section class="py-14 sm:py-18 md:py-24 lg:py-28 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 sm:gap-5 md:gap-8 mb-10 sm:mb-12 md:mb-16 lg:mb-20">
        <div class="max-w-xl">
            <div class="inline-flex items-center gap-2 bg-primary/8 rounded-full px-3.5 sm:px-4 py-1.5 sm:py-2 mb-4 sm:mb-5">
                <span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
                <span class="font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.15em] text-primary">OUR SERVICES</span>
            </div>
            <h2 class="font-headline text-[22px] sm:text-[28px] md:text-[34px] lg:text-[40px] leading-[1.15] sm:leading-[1.2] font-bold text-on-surface">
                Services We Offer<br class="hidden sm:block"> For You
            </h2>
        </div>
        <p class="text-[13px] sm:text-sm md:text-base text-on-surface-variant leading-relaxed max-w-md md:text-right">
            Empowering lives through wisdom, worship, and kingdom-driven solutions for every sphere of life.
        </p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 md:gap-6 lg:gap-7">
        @forelse($services as $service)
            <div class="bg-surface rounded-2xl overflow-hidden shadow-[0_2px_20px_rgba(0,0,0,0.06)] hover:shadow-[0_8px_40px_rgba(0,0,0,0.1)] transition-shadow duration-500 group flex flex-col h-full border border-outline-variant/50">
                <div class="h-40 sm:h-48 md:h-52 lg:h-56 overflow-hidden relative">
                    @if($service->image)
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $service->image }}" alt="{{ $service->title }}">
                    @else
                        <div class="w-full h-full bg-surface-container flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary/25 text-4xl sm:text-5xl">church</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/15 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>
                <div class="p-5 sm:p-6 md:p-7 lg:p-8 flex flex-col flex-grow">
                    <h3 class="font-headline text-[14px] sm:text-[15px] md:text-base font-bold mb-2.5 sm:mb-3 md:mb-4 text-on-surface leading-snug">{{ $service->title }}</h3>
                    <p class="text-[12px] sm:text-[13px] md:text-sm text-on-surface-variant flex-grow mb-5 sm:mb-6 md:mb-7 leading-relaxed">
                        {{ Str::limit($service->description, 120) }}
                    </p>
                    <a class="group/btn inline-flex items-center gap-2 bg-primary text-white font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.1em] px-5 sm:px-6 py-2.5 sm:py-3 rounded-full transition-all duration-300 hover:bg-primary-container hover:shadow-lg hover:shadow-primary/20 self-start" href="{{ $service->button_url ?? '#' }}">
                        {{ $service->button_text }}
                        <span class="material-symbols-outlined text-xs transition-transform duration-300 group-hover/btn:translate-x-0.5">arrow_forward</span>
                    </a>
                </div>
            </div>
        @empty
            @foreach(range(1, 4) as $i)
                <div class="bg-surface rounded-2xl overflow-hidden shadow-[0_2px_20px_rgba(0,0,0,0.06)] flex flex-col h-full border border-outline-variant/50">
                    <div class="h-40 sm:h-48 md:h-52 lg:h-56 bg-surface-container flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary/20 text-4xl sm:text-5xl">image</span>
                    </div>
                    <div class="p-5 sm:p-6 md:p-7 lg:p-8 flex flex-col flex-grow">
                        <div class="h-4 sm:h-5 bg-surface-container-high rounded-md w-3/4 mb-3 sm:mb-4"></div>
                        <div class="h-2.5 sm:h-3 bg-surface-container-high rounded-full w-full mb-2"></div>
                        <div class="h-2.5 sm:h-3 bg-surface-container-high rounded-full w-5/6 mb-5 sm:mb-6 md:mb-7"></div>
                        <div class="h-8 sm:h-9 bg-surface-container-high rounded-full w-20 sm:w-24"></div>
                    </div>
                </div>
            @endforeach
        @endforelse
    </div>
</section>

{{-- TEAM LEADER SECTION --}}
@if($team_leader)
<section class="py-20 md:py-32 bg-surface-container-low overflow-hidden">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center gap-10 md:gap-16">
            <div class="w-full lg:w-1/2 space-y-5 sm:space-y-6 md:space-y-8 order-2 lg:order-1">
                <div class="space-y-2">
                    <span class="font-headline text-[10px] sm:text-xs font-bold uppercase tracking-[0.1em] text-primary border-l-4 border-primary pl-4">TEAM LEADER</span>
                    <h2 class="font-headline text-[28px] sm:text-[36px] md:text-[48px] lg:text-[56px] leading-[1.1] font-extrabold text-on-surface">{{ $team_leader->name }}</h2>
                </div>
                <div class="space-y-4 text-on-surface-variant leading-relaxed">
                    @foreach(explode("\n\n", $team_leader->bio) as $paragraph)
                        <p class="text-sm sm:text-base leading-relaxed">{{ $paragraph }}</p>
                    @endforeach
                </div>
                <a class="bg-primary text-on-primary px-6 py-3 sm:px-8 sm:py-4 rounded-full font-headline text-xs sm:text-sm font-bold inline-flex items-center gap-2 hover:opacity-90 transition-opacity" href="{{ route('about') }}">
                    See Our Global Opportunities
                </a>
            </div>
            <div class="w-full lg:w-1/2 order-1 lg:order-2 relative">
                <div class="aspect-square rounded-2xl overflow-hidden shadow-2xl relative z-10 border-4 sm:border-8 border-white bg-surface-container max-w-[350px] sm:max-w-[450px] md:max-w-none mx-auto">
                    @if($team_leader->photo)
                        <img class="w-full h-full object-cover" src="{{ $team_leader->photo }}" alt="{{ $team_leader->name }}">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary/20 text-[80px] sm:text-[100px] md:text-[120px]">person</span>
                        </div>
                    @endif
                </div>
                <div class="absolute -top-6 sm:-top-10 -right-6 sm:-right-10 w-32 sm:w-48 h-32 sm:h-48 bg-primary/10 rounded-full blur-3xl -z-0"></div>
                <div class="absolute -bottom-6 sm:-bottom-10 -left-6 sm:-left-10 w-48 sm:w-64 h-48 sm:h-64 bg-accent-pink/5 rounded-full blur-3xl -z-0"></div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- BRANCH NETWORK / DISCOVER US --}}
@if($branches->count())
<section class="py-20 md:py-32 max-w-[1280px] mx-auto px-6">
    <div class="text-center max-w-4xl mx-auto mb-12 md:mb-16">
        <span class="font-headline text-[10px] sm:text-xs font-bold uppercase tracking-[0.1em] text-primary mb-4 block">LOCAL ROOTS, GLOBAL IMPACT</span>
        <h2 class="font-headline text-[24px] sm:text-[32px] md:text-[40px] leading-[1.2] font-bold text-on-surface mb-6 md:mb-8">
            <span class="after:content-[''] after:block after:w-12 sm:after:w-20 after:h-1 after:bg-primary after:mx-auto after:mt-3 sm:after:mt-4">Our Branch Network</span>
        </h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6 md:gap-8">
        @foreach($branches as $branch)
            <div class="group relative rounded-xl overflow-hidden aspect-[4/5] cursor-pointer">
                <div class="w-full h-full bg-surface-container">
                    @if($branch->cover_image)
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $branch->cover_image }}" alt="{{ $branch->name }}">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary/20 text-[60px] sm:text-[80px]">location_on</span>
                        </div>
                    @endif
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-on-background via-on-background/20 to-transparent"></div>
                <div class="absolute inset-0 flex flex-col justify-end p-5 sm:p-6 md:p-8">
                    <h3 class="font-headline text-base sm:text-lg md:text-xl font-bold text-white mb-3 sm:mb-4">{{ $branch->name }}</h3>
                    <a class="bg-white/10 backdrop-blur-md text-white border border-white/30 py-2 text-center rounded-full font-headline text-[10px] sm:text-xs font-bold uppercase tracking-[0.1em] hover:bg-white hover:text-primary transition-all" href="{{ $branch->button_url ?? '#' }}">
                        {{ $branch->button_text }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif

{{-- VISION & MANDATE --}}
@if($visions->count())
<section class="py-20 md:py-32 bg-on-secondary-fixed text-white overflow-hidden relative">
    <div class="max-w-[1280px] mx-auto px-6 relative z-10">
        <div class="text-center mb-12 md:mb-16">
            <span class="font-headline text-[10px] sm:text-xs font-bold uppercase tracking-[0.1em] text-primary-fixed-dim mb-4 block">OUR CORE</span>
            <h2 class="font-headline text-[24px] sm:text-[32px] md:text-[40px] leading-[1.2] font-bold uppercase">Vision & Mandate</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6 md:gap-8">
            @foreach($visions as $vision)
                <div class="bg-white/5 p-6 sm:p-8 md:p-12 border border-white/10 hover:bg-white/10 transition-colors">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-primary-container rounded-full flex items-center justify-center mb-5 sm:mb-6 md:mb-8">
                        <span class="material-symbols-outlined text-white text-xl sm:text-2xl md:text-3xl">{{ $vision->icon ?? 'auto_awesome' }}</span>
                    </div>
                    <h3 class="font-headline text-xl sm:text-[22px] md:text-[28px] leading-[1.3] font-bold mb-4 sm:mb-5 md:mb-6">{{ $vision->title }}</h3>
                    <p class="text-sm sm:text-base text-white/80 leading-relaxed">{{ $vision->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA SECTION --}}
<section class="py-14 md:py-20 bg-surface-container-low border-y border-outline-variant">
    <div class="max-w-[1280px] mx-auto px-6 text-center">
        <h2 class="font-headline text-[24px] sm:text-[32px] md:text-[40px] leading-[1.2] font-bold mb-4 sm:mb-5 md:mb-6 text-on-surface">Join the Kingdom Army Today</h2>
        <p class="max-w-2xl mx-auto text-sm sm:text-base text-on-surface-variant mb-8 sm:mb-9 md:mb-10">
            Be a part of a community that is redefining leadership, spirituality, and societal impact. Your journey towards divine mandate starts here.
        </p>
        <div class="flex flex-wrap justify-center gap-3 sm:gap-4">
            <a href="{{ route('partnership') }}" class="bg-primary text-white font-headline text-[10px] sm:text-xs font-bold uppercase tracking-[0.1em] py-3 sm:py-4 px-7 sm:px-10 rounded-full shadow-md hover:translate-y-[-2px] transition-all">JOIN A COMMUNITY</a>
            <a href="mailto:{{ $settings->email ?? 'clprotocols@gmail.com' }}" class="bg-on-secondary-fixed text-white font-headline text-[10px] sm:text-xs font-bold uppercase tracking-[0.1em] py-3 sm:py-4 px-7 sm:px-10 rounded-full hover:opacity-90 transition-all">SPEAK WITH A PASTOR</a>
        </div>
    </div>
</section>

@endsection
