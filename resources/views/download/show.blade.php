@extends('layouts.public')

@section('title', $message->title . ' - ' . ($settings->site_name ?? 'Wisdom Envoys Ministry'))

@section('content')

<section class="relative bg-on-secondary-fixed py-20 px-6">
    <div class="absolute inset-0 overflow-hidden opacity-20">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-primary rounded-full blur-[120px]"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-accent-pink rounded-full blur-[120px]"></div>
    </div>
    <div class="relative max-w-[1280px] mx-auto z-10">
        <a class="inline-flex items-center gap-2 text-primary-fixed mb-8 hover:text-white transition-colors" href="{{ route('download.year', $message->year->year) }}">
            <span class="material-symbols-outlined">arrow_back</span>
            <span class="font-headline text-xs font-bold uppercase tracking-[0.1em]">Back to {{ $message->year->year }}</span>
        </a>
        <div class="flex flex-col md:flex-row gap-8 items-start">
            <div class="w-full md:w-80 shrink-0 rounded-xl overflow-hidden card-shadow">
                @if($message->thumbnail)
                    <img alt="{{ $message->title }}" class="w-full aspect-square object-cover" src="{{ $message->thumbnail }}">
                @else
                    <div class="w-full aspect-square bg-surface-container flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary/20 text-[80px]">music_note</span>
                    </div>
                @endif
            </div>
            <div class="flex-1">
                @if($message->category)
                    <span class="inline-block bg-primary/10 text-primary px-3 py-1 rounded text-[12px] font-bold tracking-widest uppercase mb-4">{{ $message->category->name }}</span>
                @endif
                <h1 class="font-headline text-[32px] md:text-[40px] font-extrabold text-white mb-4 leading-tight">{{ $message->title }}</h1>
                <div class="flex flex-wrap items-center gap-4 text-primary-fixed/80 text-sm mb-6">
                    <span class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">person</span>
                        {{ $message->speaker }}
                    </span>
                    @if($message->series)
                        <span class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">library_music</span>
                            {{ $message->series->name }}
                        </span>
                    @endif
                    <span class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">calendar_today</span>
                        {{ $message->published_at?->format('F j, Y') ?? 'N/A' }}
                    </span>
                    @if($message->duration)
                        <span class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">schedule</span>
                            {{ $message->duration }}
                        </span>
                    @endif
                </div>
                @if($message->description)
                    <p class="text-white/70 leading-relaxed mb-8">{{ $message->description }}</p>
                @endif
                @if($message->audio)
                    <div class="mb-6">
                        <x-audio-player src="{{ $message->audio }}" :title="$message->title" :speaker="$message->speaker" :thumbnail="$message->thumbnail" />
                    </div>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ $message->audio }}" download class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white border border-white/20 px-6 py-3 rounded-full font-headline text-xs font-bold uppercase tracking-[0.1em] hover:bg-white/20 transition-colors">
                            <span class="material-symbols-outlined text-[18px]">download</span>
                            Download Audio
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
