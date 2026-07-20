@extends('layouts.public')

@section('title', 'Discover Us - ' . ($settings->site_name ?? 'Wisdom Envoys Ministry'))

@section('content')

{{-- HERO --}}
<section class="relative py-24 md:py-32 overflow-hidden hero-bg bg-on-secondary-fixed" @if($settings->hero_about_image) style="background-image: url('{{ $settings->hero_about_image }}')" @endif>
    @if($settings->hero_about_image)
        <div class="absolute inset-0 bg-black/50"></div>
    @endif
    <div class="max-w-[1280px] mx-auto px-6 relative z-10 text-center">
        <span class="inline-block font-headline text-xs font-bold uppercase tracking-[0.2em] text-primary-fixed-dim mb-4">{{ $hero['eyebrow'] }}</span>
        <h1 class="font-headline text-[48px] md:text-[56px] font-extrabold text-white mb-6 uppercase">{{ $hero['title'] }}</h1>
        <div class="w-24 h-1 bg-primary mx-auto mb-8"></div>
        <p class="max-w-3xl mx-auto text-lg text-white/80 leading-relaxed">
            {{ $hero['description'] }}
        </p>
    </div>
</section>

{{-- TEAM LEADER --}}
@if($team_leader)
<section class="py-32 max-w-[1280px] mx-auto px-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="relative order-2 lg:order-1">
            <div class="absolute -top-10 -left-10 w-40 h-40 bg-primary/10 rounded-full blur-3xl"></div>
            <div class="bg-surface-container rounded-xl overflow-hidden shadow-2xl">
                @if($team_leader->photo)
                    <img alt="{{ $team_leader->name }}" class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-700" src="{{ $team_leader->photo }}">
                @else
                    <div class="w-full aspect-square flex items-center justify-center bg-surface-container-high">
                        <span class="material-symbols-outlined text-on-surface-variant/50 text-[120px]">person</span>
                    </div>
                @endif
            </div>
        </div>
        <div class="order-1 lg:order-2">
            <span class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-primary mb-4 block">TEAM LEADER</span>
            <h2 class="font-headline text-[40px] leading-[1.2] font-bold mb-8 text-on-surface">{{ $team_leader->name }}</h2>
            <div class="space-y-6 text-on-surface-variant">
                @foreach(explode("\n\n", $team_leader->bio) as $i => $paragraph)
                    @if($i === 0)
                        <p class="text-lg italic border-l-4 border-primary pl-6">{{ $paragraph }}</p>
                    @else
                        <p class="text-base">{{ $paragraph }}</p>
                    @endif
                @endforeach
            </div>
        </div>
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

{{-- CTA --}}
<section class="py-20 bg-surface-container-low border-y border-outline-variant">
    <div class="max-w-[1280px] mx-auto px-6 text-center">
        <h2 class="font-headline text-[40px] leading-[1.2] font-bold mb-6 text-on-surface">Join the Kingdom Army Today</h2>
        <p class="max-w-2xl mx-auto text-base text-on-surface-variant mb-10">
            Be a part of a community that is redefining leadership, spirituality, and societal impact.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('partnership') }}" class="bg-primary text-white font-headline text-xs font-bold uppercase tracking-[0.1em] py-4 px-10 rounded-full shadow-md hover:translate-y-[-2px] transition-all">JOIN A COMMUNITY</a>
            <a href="mailto:{{ $settings->email ?? 'clprotocols@gmail.com' }}" class="bg-on-secondary-fixed text-white font-headline text-xs font-bold uppercase tracking-[0.1em] py-4 px-10 rounded-full hover:opacity-90 transition-all">SPEAK WITH A PASTOR</a>
        </div>
    </div>
</section>

@endsection
