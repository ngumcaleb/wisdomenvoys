@extends('layouts.public')

@section('title', 'Our Services - ' . ($settings->site_name ?? 'Wisdom Envoys Ministry'))

@section('content')

{{-- HERO --}}
@php $heroBg = !empty($settings->hero_services_image) ? $settings->hero_services_image : '/images/download-hero-bg.jpg'; @endphp
<section class="relative min-h-[320px] sm:min-h-[360px] md:min-h-[420px] lg:min-h-[460px] flex items-end sm:items-end overflow-hidden hero-bg" style="background-image: url('{{ $heroBg }}')">
    <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-black/30"></div>
    <div class="relative z-10 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10 w-full py-10 sm:py-12 md:py-16 lg:py-20">
        <div class="max-w-2xl">
            <span class="inline-block bg-primary text-white font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.14em] px-4 sm:px-5 py-2 sm:py-2.5 rounded-full shadow-lg shadow-primary/30 mb-4 sm:mb-5 md:mb-6">{{ $hero['eyebrow'] }}</span>
            <h1 class="font-headline text-[32px] sm:text-[40px] md:text-[52px] lg:text-[60px] font-extrabold tracking-tight text-white leading-[1.05] mb-3 sm:mb-4">
                {{ $hero['title'] }}
            </h1>
            <p class="text-[14px] sm:text-sm md:text-base lg:text-lg max-w-xl text-white/60 leading-relaxed mb-6 sm:mb-7 md:mb-8">
                {{ $hero['description'] }}
            </p>
            <a href="#services" class="group inline-flex items-center gap-2 bg-primary text-white font-headline text-[11px] sm:text-xs md:text-sm font-bold uppercase tracking-[0.06em] px-5 sm:px-7 py-2.5 sm:py-3 rounded-full shadow-lg shadow-primary/30 hover:bg-primary-container hover:shadow-xl transition-all duration-300">
                <span class="material-symbols-outlined text-[16px] sm:text-[18px]">arrow_downward</span>
                Explore Services
            </a>
        </div>
    </div>
</section>

{{-- SERVICES GRID --}}
<section id="services" class="py-14 sm:py-18 md:py-24 lg:py-28 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 sm:gap-5 md:gap-8 mb-10 sm:mb-12 md:mb-16 lg:mb-20">
        <div class="max-w-xl">
            <div class="inline-flex items-center gap-2 bg-primary/8 rounded-full px-3.5 sm:px-4 py-1.5 sm:py-2 mb-4 sm:mb-5">
                <span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
                <span class="font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.15em] text-primary">OUR SERVICES</span>
            </div>
            <h2 class="font-headline text-[22px] sm:text-[28px] md:text-[34px] lg:text-[40px] leading-[1.15] sm:leading-[1.2] font-bold text-on-surface">
                Equipping the Saints<br class="hidden sm:block"> for Transformation
            </h2>
        </div>
    </div>

    <div class="space-y-4 sm:space-y-5 md:space-y-6">
        @forelse($services as $index => $service)
            @if($index === 0)
                {{-- FIRST SERVICE: Feature card --}}
                <a href="{{ route('services.show', $service) }}" class="block bg-white rounded-[20px] sm:rounded-[24px] overflow-hidden shadow-[0_2px_20px_rgba(0,0,0,0.06)] hover:shadow-[0_8px_40px_rgba(0,0,0,0.12)] transition-all duration-500 border border-outline-variant/50 group">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/2 aspect-video md:aspect-auto overflow-hidden relative">
                            @if($service->image)
                                <img alt="{{ $service->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $service->image }}">
                            @else
                                <div class="w-full h-full min-h-[200px] md:min-h-full bg-gradient-to-br from-primary/8 to-surface-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary/15 text-[60px] sm:text-[80px]">church</span>
                                </div>
                            @endif
                        </div>
                        <div class="md:w-1/2 p-6 sm:p-8 md:p-10 lg:p-12 flex flex-col justify-center">
                            <span class="w-10 h-10 sm:w-12 sm:h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-4 sm:mb-5">
                                <span class="material-symbols-outlined text-primary text-[20px] sm:text-[22px]">church</span>
                            </span>
                            <h3 class="font-headline text-[20px] sm:text-[24px] md:text-[28px] font-bold text-on-surface mb-3 sm:mb-4 leading-snug">{{ $service->title }}</h3>
                            <p class="text-[13px] sm:text-sm md:text-base text-on-surface-variant mb-5 sm:mb-6 leading-relaxed line-clamp-3 md:line-clamp-none">{{ $service->description }}</p>
                            <span class="inline-flex items-center gap-1.5 bg-primary text-white font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.08em] px-5 sm:px-6 py-2.5 sm:py-3 rounded-full w-fit group-hover:bg-primary-container transition-colors duration-300">
                                {{ $service->button_text }}
                                <span class="material-symbols-outlined text-[14px] sm:text-[15px]">arrow_forward</span>
                            </span>
                        </div>
                    </div>
                </a>

            @elseif($index === 3 && $services->count() > 3)
                {{-- WIDE FEATURE: Primary bg --}}
                <a href="{{ route('services.show', $service) }}" class="block bg-primary rounded-[20px] sm:rounded-[24px] overflow-hidden shadow-[0_2px_20px_rgba(220,20,60,0.15)] relative group">
                    @if($service->image)
                        <div class="absolute inset-0 opacity-15">
                            <img alt="{{ $service->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $service->image }}">
                        </div>
                    @endif
                    <div class="relative z-10 p-8 sm:p-10 md:p-12 lg:p-16 text-white">
                        <span class="w-10 h-10 sm:w-12 sm:h-12 bg-white/15 rounded-xl flex items-center justify-center mb-4 sm:mb-5">
                            <span class="material-symbols-outlined text-white text-[20px] sm:text-[22px]">auto_awesome</span>
                        </span>
                        <h3 class="font-headline text-[22px] sm:text-[28px] md:text-[34px] font-bold mb-3 sm:mb-4 leading-snug">{{ $service->title }}</h3>
                        <p class="text-[13px] sm:text-sm md:text-base text-white/75 mb-6 sm:mb-8 max-w-xl leading-relaxed">{{ $service->description }}</p>
                        <span class="inline-flex items-center gap-1.5 bg-white text-primary font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.08em] px-5 sm:px-6 py-2.5 sm:py-3 rounded-full group-hover:bg-white/90 transition-colors duration-300">
                            {{ $service->button_text }}
                            <span class="material-symbols-outlined text-[14px] sm:text-[15px]">arrow_forward</span>
                        </span>
                    </div>
                </a>

            @else
                {{-- Regular card --}}
                <a href="{{ route('services.show', $service) }}" class="block bg-white rounded-[20px] sm:rounded-[24px] overflow-hidden shadow-[0_2px_16px_rgba(0,0,0,0.05)] hover:shadow-[0_6px_30px_rgba(0,0,0,0.09)] transition-all duration-500 border border-outline-variant/50 group">
                    <div class="flex items-center gap-3 sm:gap-4 p-3 sm:p-4">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-full overflow-hidden shrink-0">
                            @if($service->image)
                                <img alt="{{ $service->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $service->image }}">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-primary/8 to-surface-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary/20 text-2xl sm:text-3xl md:text-4xl">church</span>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-headline text-[14px] sm:text-[15px] md:text-[17px] font-bold text-on-surface leading-snug">{{ $service->title }}</h3>
                            <p class="hidden md:block text-[12px] sm:text-[13px] text-on-surface-variant/70 mt-1.5 leading-relaxed line-clamp-2">{{ $service->description }}</p>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <span class="inline-flex items-center gap-1 bg-primary text-white font-headline text-[9px] sm:text-[10px] md:text-[11px] font-bold uppercase tracking-[0.06em] px-3 sm:px-4 py-2 rounded-full group-hover:bg-primary-container transition-colors duration-300">
                                {{ $service->button_text }}
                                <span class="material-symbols-outlined text-[12px] sm:text-[13px]">arrow_forward</span>
                            </span>
                        </div>
                    </div>
                </a>
            @endif
        @empty
            <div class="text-center py-16 sm:py-20">
                <span class="material-symbols-outlined text-primary/20 text-[60px] sm:text-[80px]">church</span>
                <p class="text-[13px] sm:text-sm md:text-base text-on-surface-variant mt-3 sm:mt-4">No services available yet.</p>
            </div>
        @endforelse
    </div>
</section>

{{-- LEADERSHIP --}}
@if($team_leader)
<section class="py-14 sm:py-18 md:py-24 lg:py-28 bg-surface-container-low overflow-hidden">
    <div class="max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10">
        <div class="flex flex-col lg:flex-row gap-10 sm:gap-14 md:gap-20 lg:gap-32 items-center">
            <div class="lg:w-1/2 relative">
                <div class="absolute -top-10 -left-10 w-40 h-40 bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>
                <div class="relative rounded-[20px] sm:rounded-[24px] overflow-hidden shadow-2xl bg-white p-3 sm:p-4">
                    @if($team_leader->photo)
                        <img alt="{{ $team_leader->name }}" class="w-full h-auto rounded-[16px] sm:rounded-[20px]" src="{{ $team_leader->photo }}">
                    @else
                        <div class="w-full aspect-square flex items-center justify-center bg-surface-container rounded-[16px] sm:rounded-[20px]">
                            <span class="material-symbols-outlined text-primary/20 text-[80px] sm:text-[100px] md:text-[120px]">person</span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="lg:w-1/2">
                <div class="inline-flex items-center gap-2 bg-primary/8 rounded-full px-3.5 sm:px-4 py-1.5 sm:py-2 mb-4 sm:mb-5">
                    <span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
                    <span class="font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.15em] text-primary">TEAM LEADER</span>
                </div>
                <h2 class="font-headline text-[24px] sm:text-[30px] md:text-[36px] lg:text-[40px] leading-[1.15] sm:leading-[1.2] font-bold text-on-surface mb-4 sm:mb-5 md:mb-6">{{ $team_leader->name }}</h2>
                <div class="space-y-3 sm:space-y-4 text-[13px] sm:text-sm md:text-base text-on-surface-variant leading-relaxed">
                    @foreach(explode("\n\n", $team_leader->bio) as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>
                <div class="mt-6 sm:mt-8 md:mt-10">
                    <a class="inline-flex items-center gap-2 bg-primary text-white px-6 sm:px-8 py-3 sm:py-3.5 font-headline text-[11px] sm:text-xs font-bold uppercase tracking-[0.08em] rounded-full hover:bg-primary-container hover:shadow-lg hover:shadow-primary/20 transition-all duration-300" href="{{ route('about') }}">
                        See Global Opportunities
                        <span class="material-symbols-outlined text-[14px] sm:text-[16px]">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endsection
