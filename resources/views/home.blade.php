@extends('layouts.public')

@section('content')

{{-- HERO SECTION --}}
@php $heroImage = !empty($settings->hero_home_image) ? $settings->hero_home_image : '/images/widomenvoys-hero.webp'; @endphp
<section class="relative min-h-[400px] sm:min-h-[460px] md:min-h-[560px] lg:min-h-[620px] flex items-end sm:items-center overflow-hidden hero-bg" style="background-image: url('{{ $heroImage }}')">
    <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-black/30"></div>
    <div class="absolute top-6 right-6 sm:top-10 sm:right-10 md:top-14 md:right-14 lg:top-20 lg:right-20 w-24 h-24 sm:w-32 sm:h-32 md:w-48 md:h-48 lg:w-64 lg:h-64 border border-white/[0.06] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-10 right-12 sm:bottom-14 sm:right-16 md:bottom-20 md:right-20 w-16 h-16 sm:w-20 sm:h-20 md:w-32 md:h-32 border border-white/[0.04] rounded-full pointer-events-none"></div>
    <div class="relative z-10 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10 text-white w-full py-10 sm:py-14 md:py-20 lg:py-24">
        <div class="max-w-3xl lg:max-w-4xl space-y-4 sm:space-y-5 md:space-y-6 lg:space-y-8">
            <span class="inline-block bg-primary text-white font-headline text-[11px] sm:text-xs md:text-sm font-bold uppercase tracking-[0.14em] px-4 sm:px-5 py-2 sm:py-2.5 rounded-full shadow-lg shadow-primary/30">{{ $hero['eyebrow'] ?? 'We Win, Influence, Establish' }}</span>
            <h1 class="font-headline text-[30px] leading-[1.1] sm:text-[38px] sm:leading-[1.08] md:text-[52px] lg:text-[68px] xl:text-[78px] font-extrabold uppercase drop-shadow-lg tracking-tight">
                {!! nl2br(e($hero['title'])) !!}
            </h1>
            <p class="text-[14px] leading-relaxed sm:text-base sm:leading-relaxed md:text-lg lg:text-xl xl:text-xl text-white/60 max-w-xl lg:max-w-2xl">
                {{ $hero['subtitle'] }}
            </p>
            <div class="pt-1 sm:pt-3 md:pt-5">
                <a class="group inline-flex items-center gap-2 bg-primary text-white px-6 py-3 sm:px-8 sm:py-3.5 md:px-10 md:py-4 lg:px-11 lg:py-4.5 rounded-full font-headline text-[12px] sm:text-xs md:text-sm font-bold uppercase tracking-[0.06em] shadow-lg shadow-primary/30 hover:bg-primary-container hover:shadow-xl transition-all duration-300" href="{{ $hero['button_one_url'] ?? '#' }}">
                    {{ $hero['button_one'] ?? 'Discover Us' }}
                    <span class="material-symbols-outlined text-sm sm:text-base md:text-lg transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
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
            <a href="{{ route('services.show', $service->slug) }}" class="block bg-surface rounded-2xl overflow-hidden shadow-[0_2px_20px_rgba(0,0,0,0.06)] hover:shadow-[0_8px_40px_rgba(0,0,0,0.12)] hover:-translate-y-1 transition-all duration-500 group flex flex-col h-full border border-outline-variant/50">
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
                    <h3 class="font-headline text-[14px] sm:text-[15px] md:text-base font-bold mb-2.5 sm:mb-3 md:mb-4 text-on-surface leading-snug group-hover:text-primary transition-colors duration-300">{{ $service->title }}</h3>
                    <p class="text-[12px] sm:text-[13px] md:text-sm text-on-surface-variant flex-grow leading-relaxed">
                        {{ Str::limit($service->description, 120) }}
                    </p>
                    <div class="mt-4 sm:mt-5">
                        <span class="group/btn inline-flex items-center gap-2 bg-primary text-white font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.1em] px-5 sm:px-6 py-2.5 sm:py-3 rounded-full transition-all duration-300 hover:bg-primary-container hover:shadow-lg hover:shadow-primary/20">
                            Learn More
                            <span class="material-symbols-outlined text-xs transition-transform duration-300 group-hover/btn:translate-x-0.5">arrow_forward</span>
                        </span>
                    </div>
                </div>
            </a>
        @empty
            @foreach(range(1, 4) as $i)
                <div class="bg-surface rounded-2xl overflow-hidden shadow-[0_2px_20px_rgba(0,0,0,0.06)] flex flex-col h-full border border-outline-variant/50">
                    <div class="h-40 sm:h-48 md:h-52 lg:h-56 bg-surface-container flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary/20 text-4xl sm:text-5xl">image</span>
                    </div>
                    <div class="p-5 sm:p-6 md:p-7 lg:p-8 flex flex-col flex-grow">
                        <div class="h-4 sm:h-5 bg-surface-container-high rounded-md w-3/4 mb-3 sm:mb-4"></div>
                        <div class="h-2.5 sm:h-3 bg-surface-container-high rounded-full w-full mb-2"></div>
                        <div class="h-2.5 sm:h-3 bg-surface-container-high rounded-full w-5/6 flex-grow"></div>
                        <div class="mt-4 sm:mt-5 h-3 bg-surface-container-high rounded-full w-16 sm:w-20"></div>
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
@php $branchCount = $branches->count(); @endphp
<section class="py-14 sm:py-18 md:py-24 lg:py-28 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 sm:gap-5 md:gap-8 mb-10 sm:mb-12 md:mb-16">
        <div class="max-w-xl">
            <div class="inline-flex items-center gap-2 bg-primary/8 rounded-full px-3.5 sm:px-4 py-1.5 sm:py-2 mb-4 sm:mb-5">
                <span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
                <span class="font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.15em] text-primary">OUR BRANCHES</span>
            </div>
            <h2 class="font-headline text-[22px] sm:text-[28px] md:text-[34px] lg:text-[40px] leading-[1.15] sm:leading-[1.2] font-bold text-on-surface">
                Our Branch Network
            </h2>
        </div>
        <p class="text-[13px] sm:text-sm md:text-base text-on-surface-variant leading-relaxed max-w-md md:text-right">
            Local roots, global impact. Find a branch near you and be part of the movement.
        </p>
    </div>

    {{-- 1 branch: full width --}}
    @if($branchCount === 1)
        @foreach($branches as $branch)
            <a href="{{ $branch->button_url ?? '#' }}" class="group relative rounded-2xl overflow-hidden aspect-[16/7] sm:aspect-[16/6] cursor-pointer block shadow-[0_2px_20px_rgba(0,0,0,0.06)] hover:shadow-[0_8px_40px_rgba(0,0,0,0.12)] transition-shadow duration-500">
                <div class="w-full h-full bg-surface-container">
                    @if($branch->cover_image)
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $branch->cover_image }}" alt="{{ $branch->name }}">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary/15 text-[80px] sm:text-[100px]">location_on</span>
                        </div>
                    @endif
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <div class="absolute inset-0 flex flex-col justify-end p-6 sm:p-8 md:p-10">
                    <h3 class="font-headline text-[20px] sm:text-[24px] md:text-[28px] font-bold text-white mb-3 sm:mb-4">{{ $branch->name }}</h3>
                    <div class="inline-flex items-center gap-1.5 bg-primary text-white font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.1em] px-5 sm:px-6 py-2.5 sm:py-3 rounded-full transition-all duration-300 hover:bg-primary-container hover:shadow-lg hover:shadow-primary/30 w-fit">
                        {{ $branch->button_text ?? 'Explore' }}
                        <span class="material-symbols-outlined text-[13px] transition-transform duration-300 group-hover:translate-x-0.5">arrow_forward</span>
                    </div>
                </div>
            </a>
        @endforeach

    {{-- 2 branches: 2 equal columns --}}
    @elseif($branchCount === 2)
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5 md:gap-6">
            @foreach($branches as $branch)
                <a href="{{ $branch->button_url ?? '#' }}" class="group relative rounded-2xl overflow-hidden aspect-[4/5] sm:aspect-[3/4] cursor-pointer block shadow-[0_2px_20px_rgba(0,0,0,0.06)] hover:shadow-[0_8px_40px_rgba(0,0,0,0.12)] transition-shadow duration-500">
                    <div class="w-full h-full bg-surface-container">
                        @if($branch->cover_image)
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $branch->cover_image }}" alt="{{ $branch->name }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary/15 text-[60px] sm:text-[80px]">location_on</span>
                            </div>
                        @endif
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-5 sm:p-6 md:p-7">
                        <h3 class="font-headline text-[15px] sm:text-base md:text-lg font-bold text-white mb-2.5 sm:mb-3">{{ $branch->name }}</h3>
                        <div class="inline-flex items-center gap-1.5 bg-primary text-white font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.1em] px-4 sm:px-5 py-2 sm:py-2.5 rounded-full transition-all duration-300 hover:bg-primary-container hover:shadow-lg hover:shadow-primary/30 w-fit">
                            {{ $branch->button_text ?? 'Explore' }}
                            <span class="material-symbols-outlined text-[13px] transition-transform duration-300 group-hover:translate-x-0.5">arrow_forward</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    {{-- 3 branches: 3 equal columns --}}
    @elseif($branchCount === 3)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 md:gap-6">
            @foreach($branches as $branch)
                <a href="{{ $branch->button_url ?? '#' }}" class="group relative rounded-2xl overflow-hidden aspect-[4/5] sm:aspect-[3/4] cursor-pointer block shadow-[0_2px_20px_rgba(0,0,0,0.06)] hover:shadow-[0_8px_40px_rgba(0,0,0,0.12)] transition-shadow duration-500">
                    <div class="w-full h-full bg-surface-container">
                        @if($branch->cover_image)
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $branch->cover_image }}" alt="{{ $branch->name }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary/15 text-[60px] sm:text-[80px]">location_on</span>
                            </div>
                        @endif
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-5 sm:p-6 md:p-7">
                        <h3 class="font-headline text-[15px] sm:text-base md:text-lg font-bold text-white mb-2.5 sm:mb-3">{{ $branch->name }}</h3>
                        <div class="inline-flex items-center gap-1.5 bg-primary text-white font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.1em] px-4 sm:px-5 py-2 sm:py-2.5 rounded-full transition-all duration-300 hover:bg-primary-container hover:shadow-lg hover:shadow-primary/30 w-fit">
                            {{ $branch->button_text ?? 'Explore' }}
                            <span class="material-symbols-outlined text-[13px] transition-transform duration-300 group-hover:translate-x-0.5">arrow_forward</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    {{-- 4 branches: 3 top, 1 centered bottom --}}
    @elseif($branchCount === 4)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 md:gap-6">
            @foreach($branches->take(3) as $branch)
                <a href="{{ $branch->button_url ?? '#' }}" class="group relative rounded-2xl overflow-hidden aspect-[4/5] sm:aspect-[3/4] cursor-pointer block shadow-[0_2px_20px_rgba(0,0,0,0.06)] hover:shadow-[0_8px_40px_rgba(0,0,0,0.12)] transition-shadow duration-500">
                    <div class="w-full h-full bg-surface-container">
                        @if($branch->cover_image)
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $branch->cover_image }}" alt="{{ $branch->name }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary/15 text-[60px] sm:text-[80px]">location_on</span>
                            </div>
                        @endif
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-5 sm:p-6 md:p-7">
                        <h3 class="font-headline text-[15px] sm:text-base md:text-lg font-bold text-white mb-2.5 sm:mb-3">{{ $branch->name }}</h3>
                        <div class="inline-flex items-center gap-1.5 bg-primary text-white font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.1em] px-4 sm:px-5 py-2 sm:py-2.5 rounded-full transition-all duration-300 hover:bg-primary-container hover:shadow-lg hover:shadow-primary/30 w-fit">
                            {{ $branch->button_text ?? 'Explore' }}
                            <span class="material-symbols-outlined text-[13px] transition-transform duration-300 group-hover:translate-x-0.5">arrow_forward</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="mt-4 sm:mt-5 md:mt-6 flex justify-center">
            <div class="w-full sm:w-[calc(50%-0.625rem)] lg:w-[calc(33.333%-0.833rem)]">
                @php $last = $branches->last(); @endphp
                <a href="{{ $last->button_url ?? '#' }}" class="group relative rounded-2xl overflow-hidden aspect-[4/5] sm:aspect-[3/4] cursor-pointer block shadow-[0_2px_20px_rgba(0,0,0,0.06)] hover:shadow-[0_8px_40px_rgba(0,0,0,0.12)] transition-shadow duration-500">
                    <div class="w-full h-full bg-surface-container">
                        @if($last->cover_image)
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $last->cover_image }}" alt="{{ $last->name }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary/15 text-[60px] sm:text-[80px]">location_on</span>
                            </div>
                        @endif
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-5 sm:p-6 md:p-7">
                        <h3 class="font-headline text-[15px] sm:text-base md:text-lg font-bold text-white mb-2.5 sm:mb-3">{{ $last->name }}</h3>
                        <div class="inline-flex items-center gap-1.5 bg-primary text-white font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.1em] px-4 sm:px-5 py-2 sm:py-2.5 rounded-full transition-all duration-300 hover:bg-primary-container hover:shadow-lg hover:shadow-primary/30 w-fit">
                            {{ $last->button_text ?? 'Explore' }}
                            <span class="material-symbols-outlined text-[13px] transition-transform duration-300 group-hover:translate-x-0.5">arrow_forward</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    {{-- 5+ branches: 3 top, 2 centered bottom, repeat --}}
    @else
        @php $topBranches = $branches->take(3); $bottomBranches = $branches->skip(3)->take(2); @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 md:gap-6">
            @foreach($topBranches as $branch)
                <a href="{{ $branch->button_url ?? '#' }}" class="group relative rounded-2xl overflow-hidden aspect-[4/5] sm:aspect-[3/4] cursor-pointer block shadow-[0_2px_20px_rgba(0,0,0,0.06)] hover:shadow-[0_8px_40px_rgba(0,0,0,0.12)] transition-shadow duration-500">
                    <div class="w-full h-full bg-surface-container">
                        @if($branch->cover_image)
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $branch->cover_image }}" alt="{{ $branch->name }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary/15 text-[60px] sm:text-[80px]">location_on</span>
                            </div>
                        @endif
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-5 sm:p-6 md:p-7">
                        <h3 class="font-headline text-[15px] sm:text-base md:text-lg font-bold text-white mb-2.5 sm:mb-3">{{ $branch->name }}</h3>
                        <div class="inline-flex items-center gap-1.5 bg-primary text-white font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.1em] px-4 sm:px-5 py-2 sm:py-2.5 rounded-full transition-all duration-300 hover:bg-primary-container hover:shadow-lg hover:shadow-primary/30 w-fit">
                            {{ $branch->button_text ?? 'Explore' }}
                            <span class="material-symbols-outlined text-[13px] transition-transform duration-300 group-hover:translate-x-0.5">arrow_forward</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        @if($bottomBranches->count())
            <div class="mt-4 sm:mt-5 md:mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5 md:gap-6 max-w-[75%] mx-auto">
                @foreach($bottomBranches as $branch)
                    <a href="{{ $branch->button_url ?? '#' }}" class="group relative rounded-2xl overflow-hidden aspect-[4/5] sm:aspect-[3/4] cursor-pointer block shadow-[0_2px_20px_rgba(0,0,0,0.06)] hover:shadow-[0_8px_40px_rgba(0,0,0,0.12)] transition-shadow duration-500">
                        <div class="w-full h-full bg-surface-container">
                            @if($branch->cover_image)
                                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $branch->cover_image }}" alt="{{ $branch->name }}">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary/15 text-[60px] sm:text-[80px]">location_on</span>
                                </div>
                            @endif
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        <div class="absolute inset-0 flex flex-col justify-end p-5 sm:p-6 md:p-7">
                            <h3 class="font-headline text-[15px] sm:text-base md:text-lg font-bold text-white mb-2.5 sm:mb-3">{{ $branch->name }}</h3>
                            <div class="inline-flex items-center gap-1.5 bg-primary text-white font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.1em] px-4 sm:px-5 py-2 sm:py-2.5 rounded-full transition-all duration-300 hover:bg-primary-container hover:shadow-lg hover:shadow-primary/30 w-fit">
                                {{ $branch->button_text ?? 'Explore' }}
                                <span class="material-symbols-outlined text-[13px] transition-transform duration-300 group-hover:translate-x-0.5">arrow_forward</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    @endif
</section>
@endif

{{-- VISION & MANDATE --}}
@if($visions->count())
<section class="py-14 sm:py-18 md:py-24 lg:py-28 bg-on-secondary-fixed text-white overflow-hidden relative">
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-primary/8 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/3 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-primary/5 rounded-full blur-[100px] translate-y-1/2 -translate-x-1/3 pointer-events-none"></div>
    <div class="max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10 relative z-10">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 sm:gap-5 md:gap-8 mb-10 sm:mb-12 md:mb-16">
            <div class="max-w-xl">
                <div class="inline-flex items-center gap-2 bg-white/10 rounded-full px-3.5 sm:px-4 py-1.5 sm:py-2 mb-4 sm:mb-5">
                    <span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
                    <span class="font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.15em] text-primary-fixed-dim">OUR CORE</span>
                </div>
                <h2 class="font-headline text-[22px] sm:text-[28px] md:text-[34px] lg:text-[40px] leading-[1.15] sm:leading-[1.2] font-bold uppercase">
                    Vision & Mandate
                </h2>
            </div>
            <p class="text-[13px] sm:text-sm md:text-base text-white/60 leading-relaxed max-w-md md:text-right">
                Guided by divine purpose, driven by kingdom influence across every sphere of life.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5 md:gap-6">
            @foreach($visions as $vision)
                <div class="group relative bg-white/[0.04] backdrop-blur-sm p-6 sm:p-8 md:p-10 border border-white/[0.08] rounded-2xl hover:bg-white/[0.08] hover:border-white/[0.15] transition-all duration-500 overflow-hidden">
                    <div class="absolute -top-4 -right-4 text-[100px] sm:text-[120px] font-headline font-extrabold text-white/[0.03] leading-none select-none pointer-events-none">
                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </div>
                    <div class="relative z-10">
                        <div class="w-11 h-11 sm:w-12 sm:h-12 md:w-14 md:h-14 bg-primary/90 rounded-xl flex items-center justify-center mb-5 sm:mb-6 md:mb-7 group-hover:scale-110 transition-transform duration-500">
                            <span class="material-symbols-outlined text-white text-lg sm:text-xl md:text-2xl">{{ $vision->icon ?? 'auto_awesome' }}</span>
                        </div>
                        <h3 class="font-headline text-[17px] sm:text-lg md:text-xl lg:text-[22px] leading-[1.3] font-bold mb-3 sm:mb-4">{{ $vision->title }}</h3>
                        <p class="text-[13px] sm:text-sm md:text-[15px] text-white/55 leading-relaxed">{{ $vision->description }}</p>
                    </div>
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
