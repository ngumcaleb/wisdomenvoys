@extends('layouts.public')

@section('title', 'Our Services - ' . ($settings->site_name ?? 'Wisdom Envoys Ministry'))

@section('content')

{{-- HERO --}}
<section class="relative min-h-[400px] flex items-center overflow-hidden hero-bg bg-on-secondary-fixed border-b border-outline-variant" @if($settings->hero_services_image) style="background-image: url('{{ $settings->hero_services_image }}')" @endif>
    @if($settings->hero_services_image)
        <div class="absolute inset-0 bg-black/50"></div>
    @endif
    <div class="max-w-[1280px] mx-auto px-6 relative z-10 py-20 text-center">
        <span class="font-headline text-xs font-bold uppercase tracking-[0.2em] text-primary-fixed-dim mb-4 block">{{ $hero['eyebrow'] }}</span>
        <h1 class="font-headline text-[48px] md:text-[56px] font-extrabold text-white mb-6 max-w-4xl">{{ $hero['title'] }}</h1>
        <p class="text-lg text-white/80 max-w-2xl mb-10 leading-relaxed mx-auto">{{ $hero['description'] }}</p>
    </div>
</section>

{{-- SERVICES BENTO GRID --}}
<section class="py-32 bg-surface" id="services">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="text-center mb-16">
            <span class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-primary mb-2 block">OUR SERVICES</span>
            <h2 class="font-headline text-[40px] leading-[1.2] font-bold text-on-surface mb-6">Equipping the Saints for Transformation</h2>
            <div class="w-20 h-1 bg-primary mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-stretch">
            @forelse($services as $index => $service)
                @if($index === 0)
                    {{-- First service: Large feature --}}
                    <div class="md:col-span-8 flex flex-col md:flex-row bg-white rounded-xl overflow-hidden card-shadow group">
                        <div class="md:w-1/2 overflow-hidden h-64 md:h-auto">
                            @if($service->image)
                                <img alt="{{ $service->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="{{ $service->image }}">
                            @else
                                <div class="w-full h-full min-h-[256px] bg-surface-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary/20 text-[80px]">church</span>
                                </div>
                            @endif
                        </div>
                        <div class="md:w-1/2 p-10 flex flex-col justify-center">
                            <span class="material-symbols-outlined text-primary text-4xl mb-4">church</span>
                            <h3 class="font-headline text-[28px] leading-[1.3] font-bold text-on-surface mb-4">{{ $service->title }}</h3>
                            <p class="text-base text-on-surface-variant mb-6 leading-relaxed">{{ $service->description }}</p>
                            <a class="inline-flex items-center gap-2 bg-primary text-white font-headline text-xs font-bold uppercase tracking-[0.1em] px-6 py-2.5 rounded-full transition-colors hover:bg-primary-container" href="{{ route('services.show', $service) }}">
                                {{ $service->button_text }} <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                @elseif($index === 3)
                    {{-- Fourth service: Wide feature with primary bg --}}
                    <div class="md:col-span-8 bg-primary rounded-xl overflow-hidden card-shadow relative group">
                        @if($service->image)
                            <div class="absolute inset-0 opacity-20">
                                <img alt="{{ $service->title }}" class="w-full h-full object-cover mix-blend-overlay" src="{{ $service->image }}">
                            </div>
                        @endif
                        <div class="relative z-10 p-10 md:p-12 h-full flex flex-col justify-end text-white">
                            <h3 class="font-headline text-[28px] leading-[1.3] font-bold mb-4">{{ $service->title }}</h3>
                            <p class="text-lg mb-6 max-w-xl text-white/90">{{ $service->description }}</p>
                            <a class="inline-block bg-white text-primary px-8 py-3 font-headline text-xs font-bold uppercase tracking-[0.1em] rounded-full hover:bg-surface-container transition-colors" href="{{ route('services.show', $service) }}">{{ $service->button_text }}</a>
                        </div>
                    </div>
                @else
                    {{-- Other services: Small feature --}}
                    <div class="md:col-span-4 bg-white rounded-xl overflow-hidden card-shadow flex flex-col">
                        <div class="h-48 overflow-hidden">
                            @if($service->image)
                                <img alt="{{ $service->title }}" class="w-full h-full object-cover" src="{{ $service->image }}">
                            @else
                                <div class="w-full h-full bg-surface-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary/20 text-[60px]">image</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-8 flex-grow">
                            <h3 class="font-headline text-base font-semibold text-on-surface mb-4">{{ $service->title }}</h3>
                            <p class="text-sm text-on-surface-variant mb-6">{{ Str::limit($service->description, 100) }}</p>
                            <a class="inline-flex items-center gap-2 bg-primary text-white font-headline text-xs font-bold uppercase tracking-[0.1em] px-6 py-2.5 rounded-full transition-colors hover:bg-primary-container" href="{{ route('services.show', $service) }}">
                                {{ $service->button_text }} <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                @endif
            @empty
                <div class="col-span-full text-center py-20">
                    <p class="text-on-surface-variant">No services available yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- LEADERSHIP --}}
@if($team_leader)
<section class="py-32 bg-surface-container-low overflow-hidden">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="flex flex-col lg:flex-row gap-32 items-center">
            <div class="lg:w-1/2 relative">
                <div class="absolute -top-10 -left-10 w-40 h-40 bg-primary/5 rounded-full blur-3xl"></div>
                <div class="relative rounded-2xl overflow-hidden shadow-2xl bg-white p-4">
                    @if($team_leader->photo)
                        <img alt="{{ $team_leader->name }}" class="w-full h-auto rounded-xl" src="{{ $team_leader->photo }}">
                    @else
                        <div class="w-full aspect-square flex items-center justify-center bg-surface-container rounded-xl">
                            <span class="material-symbols-outlined text-primary/20 text-[120px]">person</span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="lg:w-1/2">
                <span class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-primary mb-2 block">TEAM LEADER</span>
                <h2 class="font-headline text-[40px] leading-[1.2] font-bold text-on-surface mb-6">{{ $team_leader->name }}</h2>
                <div class="space-y-4 text-base text-on-surface-variant leading-relaxed">
                    @foreach(explode("\n\n", $team_leader->bio) as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>
                <div class="mt-10">
                    <a class="bg-primary text-on-primary px-8 py-4 font-headline text-xs font-bold uppercase tracking-[0.1em] rounded-full hover:shadow-xl transition-all inline-block" href="{{ route('about') }}">SEE GLOBAL OPPORTUNITIES</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endsection
