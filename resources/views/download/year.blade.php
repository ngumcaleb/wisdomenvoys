@extends('layouts.public')

@section('title', 'Messages ' . $year->year . ' - ' . ($settings->site_name ?? 'Wisdom Envoys Ministry'))

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
        <h1 class="font-headline text-[48px] md:text-[56px] font-extrabold text-white mb-4">Messages ({{ $year->year }})</h1>
        <p class="text-lg max-w-2xl opacity-80 text-white/80">
            Explore the divine mandates and teachings from the year {{ $year->year }}.
        </p>
    </div>
</section>

{{-- SEARCH --}}
<section class="pt-10 max-w-[1280px] mx-auto px-6">
    <form method="GET" class="bg-white p-4 md:p-6 rounded-xl card-shadow flex flex-col md:flex-row gap-4 items-center justify-between mb-10">
        <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-primary">filter_list</span>
            <span class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface-variant">{{ $messages->count() }} Messages</span>
        </div>
        <div class="relative w-full md:w-96">
            <input name="search" value="{{ request('search') }}" class="w-full bg-surface-container-low border-none rounded-lg px-4 py-3 text-base focus:ring-2 focus:ring-primary/20" placeholder="Search for a message title..." type="text">
            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline">search</span>
        </div>
    </form>
</section>

{{-- MESSAGES --}}
<section class="max-w-[1280px] mx-auto px-6 pb-20">
    <div class="space-y-8">
        @forelse($messages as $message)
            <div class="bg-white rounded-2xl overflow-hidden card-shadow border border-outline-variant">
                <div class="flex flex-col md:flex-row">
                    {{-- Thumbnail --}}
                    <div class="w-full md:w-64 shrink-0 aspect-video md:aspect-auto overflow-hidden relative">
                        @if($message->thumbnail)
                            <img alt="{{ $message->title }}" class="w-full h-full object-cover" src="{{ $message->thumbnail }}">
                        @else
                            <div class="w-full h-full min-h-[180px] bg-gradient-to-br from-primary/10 to-surface-container flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary/20 text-[60px]">music_note</span>
                            </div>
                        @endif
                        @if($message->category)
                            <div class="absolute top-3 left-3 bg-primary text-white px-2.5 py-1 rounded-full text-[11px] font-bold tracking-wider uppercase">{{ $message->category->name }}</div>
                        @endif
                    </div>

                    {{-- Info --}}
                    <div class="flex-1 p-6 flex flex-col justify-between">
                        <div>
                            <h3 class="font-headline text-lg font-bold text-on-surface mb-1">{{ $message->title }}</h3>
                            <div class="flex flex-wrap items-center gap-4 text-sm text-on-surface-variant mb-3">
                                <span class="flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-[16px]">person</span>
                                    {{ $message->speaker }}
                                </span>
                                @if($message->series)
                                    <span class="flex items-center gap-1.5">
                                        <span class="material-symbols-outlined text-[16px]">library_music</span>
                                        {{ $message->series->name }}
                                    </span>
                                @endif
                                <span class="flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-[16px]">calendar_today</span>
                                    {{ $message->published_at?->format('M Y') ?? 'N/A' }}
                                </span>
                            </div>
                            @if($message->description)
                                <p class="text-sm text-on-surface-variant mb-4 line-clamp-2">{{ $message->description }}</p>
                            @endif
                        </div>
                        <div class="flex flex-wrap items-center gap-2">
                            @if($message->audio)
                                <a href="{{ $message->audio }}" class="inline-flex items-center gap-1.5 bg-primary text-white px-4 py-2 rounded-full text-[11px] font-bold uppercase tracking-wider hover:bg-primary-container transition-colors" target="_blank">
                                    <span class="material-symbols-outlined text-[14px]">download</span>
                                    Download
                                </a>
                            @endif
                            @if($message->video)
                                <a href="{{ $message->video }}" class="inline-flex items-center gap-1.5 bg-on-secondary-fixed text-white px-4 py-2 rounded-full text-[11px] font-bold uppercase tracking-wider hover:opacity-90 transition-colors" target="_blank">
                                    <span class="material-symbols-outlined text-[14px]">play_circle</span>
                                    Watch
                                </a>
                            @endif
                            @if($message->notes)
                                <a href="{{ $message->notes }}" class="inline-flex items-center gap-1.5 bg-surface-container text-on-surface px-4 py-2 rounded-full text-[11px] font-bold uppercase tracking-wider hover:bg-surface-container-high transition-colors" target="_blank">
                                    <span class="material-symbols-outlined text-[14px]">description</span>
                                    Notes
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Inline Audio Player --}}
                @if($message->audio)
                    <div class="border-t border-outline-variant">
                        <x-audio-player src="{{ $message->audio }}" :title="$message->title" :speaker="$message->speaker" :thumbnail="$message->thumbnail" />
                    </div>
                @endif
            </div>
        @empty
            <div class="text-center py-20">
                <span class="material-symbols-outlined text-primary/30 text-[80px]">search_off</span>
                <p class="text-on-surface-variant mt-4">No messages found{{ request('search') ? ' for "' . request('search') . '"' : '' }}.</p>
            </div>
        @endforelse
    </div>
</section>

@endsection
