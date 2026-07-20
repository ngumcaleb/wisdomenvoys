@extends('layouts.public')

@section('content')

{{-- HERO SECTION --}}
<section class="relative min-h-[750px] md:min-h-[850px] flex items-center overflow-hidden hero-bg" @if($settings->hero_home_image) style="background-image: url('{{ $settings->hero_home_image }}')" @endif>
    <div class="absolute inset-0 bg-gradient-to-br from-primary via-primary-container to-red-800 @if($settings->hero_home_image) hidden @endif"></div>
    @if($settings->hero_home_image)
        <div class="absolute inset-0 bg-black/50"></div>
    @endif
    <div class="relative z-10 max-w-[1280px] mx-auto px-6 text-white w-full">
        <div class="max-w-4xl space-y-8">
            <div class="flex items-center gap-4">
                <div class="w-1 h-8 bg-white/50"></div>
                <span class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-white/90">{{ $hero['eyebrow'] ?? 'We Win, Influence, Establish' }}</span>
            </div>
            <h1 class="font-headline text-[48px] md:text-[80px] leading-[1.1] font-extrabold uppercase" style="text-shadow: 0 2px 4px rgba(0,0,0,0.1)">
                {!! nl2br(e($hero['title'])) !!}
            </h1>
            <p class="text-lg md:text-xl opacity-90 leading-relaxed max-w-2xl">
                {{ $hero['subtitle'] }}
            </p>
            <div class="pt-6">
                <a class="bg-white text-primary px-10 py-5 rounded-full font-headline text-2xl font-bold inline-flex items-center gap-3 hover:bg-gray-100 transition-colors shadow-xl" href="{{ $hero['button_one_url'] ?? '#' }}">
                    {{ $hero['button_one'] ?? 'Discover Us' }}
                    <span class="material-symbols-outlined font-bold">arrow_forward</span>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- SERVICES SECTION --}}
<section class="py-32 max-w-[1280px] mx-auto px-6">
    <div class="text-center mb-16 relative">
        <span class="absolute -top-12 left-1/2 -translate-x-1/2 opacity-5 font-headline text-[56px] font-extrabold uppercase select-none">Our Services</span>
        <span class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-primary block mb-2">OUR SERVICES</span>
        <h2 class="font-headline text-[40px] leading-[1.2] font-bold text-on-surface">
            Services We Offer For You
        </h2>
        <div class="w-16 h-1 bg-primary mx-auto mt-4"></div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @forelse($services as $service)
            <div class="bg-surface rounded-xl overflow-hidden card-shadow group flex flex-col h-full">
                <div class="h-56 overflow-hidden relative">
                    @if($service->image)
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ $service->image }}" alt="{{ $service->title }}">
                    @else
                        <div class="w-full h-full bg-surface-container flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-5xl">church</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-8 flex flex-col flex-grow">
                    <h3 class="font-headline text-base font-semibold mb-4 text-on-surface">{{ $service->title }}</h3>
                    <p class="text-sm text-on-surface-variant flex-grow mb-6 leading-relaxed">
                        {{ Str::limit($service->description, 120) }}
                    </p>
                    <a class="inline-flex items-center gap-2 bg-primary text-white font-headline text-xs font-bold uppercase tracking-[0.1em] px-6 py-2.5 rounded-full transition-colors hover:bg-primary-container" href="{{ $service->button_url ?? '#' }}">
                        {{ $service->button_text }}
                    </a>
                </div>
            </div>
        @empty
            @foreach(range(1, 4) as $i)
                <div class="bg-surface rounded-xl overflow-hidden card-shadow flex flex-col h-full">
                    <div class="h-56 bg-surface-container flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary/30 text-5xl">image</span>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <div class="h-5 bg-surface-container-high rounded w-3/4 mb-4"></div>
                        <div class="h-3 bg-surface-container-high rounded w-full mb-2"></div>
                        <div class="h-3 bg-surface-container-high rounded w-5/6 mb-6"></div>
                        <div class="h-8 bg-surface-container-high rounded w-24"></div>
                    </div>
                </div>
            @endforeach
        @endforelse
    </div>
</section>

{{-- TEAM LEADER SECTION --}}
@if($team_leader)
<section class="py-32 bg-surface-container-low overflow-hidden">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="w-full lg:w-1/2 space-y-8 order-2 lg:order-1">
                <div class="space-y-2">
                    <span class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-primary border-l-4 border-primary pl-4">TEAM LEADER</span>
                    <h2 class="font-headline text-[40px] md:text-[56px] leading-[1.1] font-extrabold text-on-surface">{{ $team_leader->name }}</h2>
                </div>
                <div class="space-y-4 text-on-surface-variant leading-relaxed">
                    @foreach(explode("\n\n", $team_leader->bio) as $paragraph)
                        <p class="text-base leading-relaxed">{{ $paragraph }}</p>
                    @endforeach
                </div>
                <a class="bg-primary text-on-primary px-8 py-4 rounded-full font-headline text-2xl font-bold inline-flex items-center gap-2 hover:opacity-90 transition-opacity" href="{{ route('about') }}">
                    See Our Global Opportunities
                </a>
            </div>
            <div class="w-full lg:w-1/2 order-1 lg:order-2 relative">
                <div class="aspect-square rounded-2xl overflow-hidden shadow-2xl relative z-10 border-8 border-white bg-surface-container">
                    @if($team_leader->photo)
                        <img class="w-full h-full object-cover" src="{{ $team_leader->photo }}" alt="{{ $team_leader->name }}">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary/20 text-[120px]">person</span>
                        </div>
                    @endif
                </div>
                <div class="absolute -top-10 -right-10 w-48 h-48 bg-primary/10 rounded-full blur-3xl -z-0"></div>
                <div class="absolute -bottom-10 -left-10 w-64 h-64 bg-accent-pink/5 rounded-full blur-3xl -z-0"></div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- BRANCH NETWORK / DISCOVER US --}}
@if($branches->count())
<section class="py-32 max-w-[1280px] mx-auto px-6">
    <div class="text-center max-w-4xl mx-auto mb-16">
        <span class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-primary mb-4 block">LOCAL ROOTS, GLOBAL IMPACT</span>
        <h2 class="font-headline text-[40px] leading-[1.2] font-bold text-on-surface mb-8">
            <span class="after:content-[''] after:block after:w-20 after:h-1 after:bg-primary after:mx-auto after:mt-4">Our Branch Network</span>
        </h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach($branches as $branch)
            <div class="group relative rounded-xl overflow-hidden aspect-[4/5] cursor-pointer">
                <div class="w-full h-full bg-surface-container">
                    @if($branch->cover_image)
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $branch->cover_image }}" alt="{{ $branch->name }}">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary/20 text-[80px]">location_on</span>
                        </div>
                    @endif
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-on-background via-on-background/20 to-transparent"></div>
                <div class="absolute inset-0 flex flex-col justify-end p-8">
                    <h3 class="font-headline text-xl font-bold text-white mb-4">{{ $branch->name }}</h3>
                    <a class="bg-white/10 backdrop-blur-md text-white border border-white/30 py-2 text-center rounded-full font-headline text-xs font-bold uppercase tracking-[0.1em] hover:bg-white hover:text-primary transition-all" href="{{ $branch->button_url ?? '#' }}">
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
<section class="py-32 bg-on-secondary-fixed text-white overflow-hidden relative">
    <div class="max-w-[1280px] mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <span class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-primary-fixed-dim mb-4 block">OUR CORE</span>
            <h2 class="font-headline text-[40px] leading-[1.2] font-bold uppercase">Vision & Mandate</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($visions as $vision)
                <div class="bg-white/5 p-12 border border-white/10 hover:bg-white/10 transition-colors">
                    <div class="w-16 h-16 bg-primary-container rounded-full flex items-center justify-center mb-8">
                        <span class="material-symbols-outlined text-white text-3xl">{{ $vision->icon ?? 'auto_awesome' }}</span>
                    </div>
                    <h3 class="font-headline text-[28px] leading-[1.3] font-bold mb-6">{{ $vision->title }}</h3>
                    <p class="text-base text-white/80 leading-relaxed">{{ $vision->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA SECTION --}}
<section class="py-20 bg-surface-container-low border-y border-outline-variant">
    <div class="max-w-[1280px] mx-auto px-6 text-center">
        <h2 class="font-headline text-[40px] leading-[1.2] font-bold mb-6 text-on-surface">Join the Kingdom Army Today</h2>
        <p class="max-w-2xl mx-auto text-base text-on-surface-variant mb-10">
            Be a part of a community that is redefining leadership, spirituality, and societal impact. Your journey towards divine mandate starts here.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('partnership') }}" class="bg-primary text-white font-headline text-xs font-bold uppercase tracking-[0.1em] py-4 px-10 rounded-full shadow-md hover:translate-y-[-2px] transition-all">JOIN A COMMUNITY</a>
            <a href="mailto:{{ $settings->email ?? 'clprotocols@gmail.com' }}" class="bg-on-secondary-fixed text-white font-headline text-xs font-bold uppercase tracking-[0.1em] py-4 px-10 rounded-full hover:opacity-90 transition-all">SPEAK WITH A PASTOR</a>
        </div>
    </div>
</section>

@endsection
