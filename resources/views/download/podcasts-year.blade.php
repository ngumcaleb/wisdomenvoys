@extends('layouts.public')

@section('title', 'Podcasts ' . $year->year . ' - ' . ($settings->site_name ?? 'Wisdom Envoys Ministry'))

@section('content')

{{-- HERO --}}
<section class="relative bg-on-secondary-fixed py-20 px-6">
    <div class="absolute inset-0 overflow-hidden opacity-20">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-primary rounded-full blur-[120px]"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-accent-pink rounded-full blur-[120px]"></div>
    </div>
    <div class="relative max-w-[1280px] mx-auto z-10">
        <a class="inline-flex items-center gap-2 text-primary-fixed mb-8 hover:text-white transition-colors" href="{{ route('download.index') }}">
            <span class="material-symbols-outlined">arrow_back</span>
            <span class="font-headline text-xs font-bold uppercase tracking-[0.1em]">Back to Downloads</span>
        </a>
        <h1 class="font-headline text-[48px] md:text-[56px] font-extrabold text-white mb-4">Podcasts ({{ $year->year }})</h1>
        <p class="text-lg max-w-2xl opacity-80 text-white/80">
            Listen to podcast episodes from the year {{ $year->year }}.
        </p>
    </div>
</section>

{{-- PODCASTS --}}
<section class="pt-10 max-w-[1280px] mx-auto px-6 pb-20">
    <div class="mb-8">
        <span class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface-variant">{{ $podcasts->count() }} Podcasts</span>
    </div>
    <div class="space-y-6">
        @forelse($podcasts as $podcast)
            <x-audio-player
                src="{{ $podcast->audio }}"
                :title="$podcast->message->title"
                :speaker="$podcast->message->speaker ?? null"
                :thumbnail="$podcast->message->thumbnail"
            />
        @empty
            <div class="text-center py-20">
                <span class="material-symbols-outlined text-primary/30 text-[80px]">headphones</span>
                <p class="text-on-surface-variant mt-4">No podcasts available for {{ $year->year }}.</p>
            </div>
        @endforelse
    </div>
</section>

@endsection
