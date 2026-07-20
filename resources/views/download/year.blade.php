@extends('layouts.public')

@section('title', 'Messages ' . $year->year . ' - ' . ($settings->site_name ?? 'Wisdom Envoys Ministry'))

@section('content')

{{-- HERO --}}
@php $heroBg = !empty($settings->hero_download_image) ? $settings->hero_download_image : '/images/download-hero-bg.jpg'; @endphp
<section class="relative min-h-[320px] sm:min-h-[360px] md:min-h-[420px] lg:min-h-[460px] flex items-end sm:items-end overflow-hidden hero-bg" style="background-image: url('{{ $heroBg }}')">
    <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/50 to-black/20"></div>
    <div class="absolute top-8 right-8 sm:top-12 sm:right-12 md:top-16 md:right-16 lg:top-20 lg:right-20 font-headline text-[100px] sm:text-[140px] md:text-[180px] lg:text-[220px] font-extrabold text-white/[0.04] leading-none select-none pointer-events-none">{{ $year->year }}</div>
    <div class="relative z-10 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10 w-full py-10 sm:py-12 md:py-16 lg:py-20">
        <a class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white/60 hover:text-white hover:bg-white/20 font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.12em] px-4 py-2 rounded-full border border-white/15 transition-all duration-300 mb-5 sm:mb-6 md:mb-8" href="{{ route('download.index') }}">
            <span class="material-symbols-outlined text-[14px] sm:text-[16px]">arrow_back</span>
            All Downloads
        </a>
        <div class="max-w-2xl">
            <h1 class="font-headline text-[36px] sm:text-[44px] md:text-[56px] lg:text-[64px] font-extrabold tracking-tight text-white leading-[1.05] mb-2 sm:mb-3">
                {{ $year->year }}
                <span class="block text-[24px] sm:text-[28px] md:text-[34px] lg:text-[38px] font-bold text-white/70 mt-1 sm:mt-2">Messages</span>
            </h1>
            <p class="text-[14px] sm:text-sm md:text-base lg:text-lg max-w-lg text-white/60 leading-relaxed mb-6 sm:mb-7 md:mb-8">
                Explore the divine mandates and teachings from {{ $year->year }}.
            </p>
            <a href="#messages" class="group inline-flex items-center gap-2 bg-primary text-white font-headline text-[11px] sm:text-xs md:text-sm font-bold uppercase tracking-[0.06em] px-5 sm:px-7 py-2.5 sm:py-3 rounded-full shadow-lg shadow-primary/30 hover:bg-primary-container hover:shadow-xl transition-all duration-300">
                <span class="material-symbols-outlined text-[16px] sm:text-[18px]">arrow_downward</span>
                Browse Messages
            </a>
        </div>
    </div>
</section>

{{-- SEARCH --}}
<section class="pt-8 sm:pt-10 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10">
    <form method="GET" class="bg-white p-4 sm:p-5 md:p-6 rounded-2xl shadow-[0_2px_20px_rgba(0,0,0,0.06)] border border-outline-variant/50 flex flex-col sm:flex-row gap-3 sm:gap-4 items-stretch sm:items-center sm:justify-between mb-8 sm:mb-10">
        <div class="flex items-center gap-2.5">
            <span class="w-8 h-8 sm:w-9 sm:h-9 bg-surface-container-high rounded-full flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-primary text-[16px] sm:text-[18px]">filter_list</span>
            </span>
            <span class="font-headline text-[12px] sm:text-xs font-bold uppercase tracking-[0.1em] text-on-surface-variant">{{ $messages->count() }} Messages</span>
        </div>
        <div class="relative w-full sm:w-80 md:w-96">
            <input name="search" value="{{ request('search') }}" class="w-full bg-surface-container-low border border-outline-variant/50 rounded-full px-5 py-3 sm:py-3.5 text-[13px] sm:text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all" placeholder="Search for a message title..." type="text">
            <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-outline text-[18px] sm:text-xl">search</span>
        </div>
    </form>
</section>

{{-- MESSAGES --}}
<section id="messages" class="max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10 pb-32 sm:pb-36 md:pb-40">
    <div class="space-y-3 sm:space-y-3.5 md:space-y-4">
        @forelse($messages as $index => $message)
            <div class="message-card bg-white rounded-[20px] sm:rounded-[24px] overflow-hidden shadow-[0_2px_16px_rgba(0,0,0,0.05)] hover:shadow-[0_6px_30px_rgba(0,0,0,0.09)] transition-all duration-500 border border-outline-variant/50 flex items-center gap-3 sm:gap-4 p-3 sm:p-3.5 md:p-4" data-index="{{ $index }}">
                {{-- Thumbnail --}}
                <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-full overflow-hidden shrink-0 relative">
                    @if($message->thumbnail)
                        <img alt="{{ $message->title }}" class="w-full h-full object-cover" src="{{ $message->thumbnail }}">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-primary/8 to-surface-container flex items-center justify-center">
                            <span class="material-symbols-outlined text-on-surface-variant/50 text-2xl sm:text-3xl md:text-4xl">music_note</span>
                        </div>
                    @endif
                </div>

                {{-- Info --}}
                <div class="flex-1 min-w-0">
                    <h3 class="font-headline text-[13px] sm:text-sm md:text-[15px] font-bold text-on-surface leading-snug truncate">{{ $message->title }}</h3>
                    <p class="text-[11px] sm:text-[12px] md:text-[13px] text-on-surface-variant mt-0.5 sm:mt-1">
                        @if($message->published_at)
                            {{ $message->published_at->format('d F Y') }}
                        @endif
                    </p>
                    @if($message->description)
                        <p class="hidden md:block text-[12px] sm:text-[13px] text-on-surface-variant/70 mt-1.5 leading-relaxed line-clamp-2">{{ $message->description }}</p>
                    @endif
                </div>

                {{-- Actions --}}
                <div class="flex flex-col items-center gap-2 shrink-0">
                    <div class="flex items-center gap-1.5 sm:gap-2">
                        @if($message->audio)
                            <button onclick="playMessage({{ $index }})" class="play-btn w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 bg-primary rounded-full flex items-center justify-center hover:bg-primary-container hover:shadow-md hover:shadow-primary/20 transition-all duration-300" title="Play">
                                <span class="material-symbols-outlined text-white text-[16px] sm:text-[17px] md:text-[18px]">play_arrow</span>
                            </button>
                            <a href="{{ $message->audio }}" class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 bg-on-secondary-fixed rounded-full flex items-center justify-center hover:bg-black hover:shadow-md transition-all duration-300" title="Download" target="_blank">
                                <span class="material-symbols-outlined text-white text-[16px] sm:text-[17px] md:text-[18px]">download</span>
                            </a>
                        @endif
                    </div>
                    <button onclick="event.stopPropagation(); openMessageModal({{ $message->id }})" class="inline-flex items-center gap-0.5 text-primary hover:text-primary-container transition-colors duration-300" title="Show Details">
                        <span class="font-headline text-[9px] sm:text-[10px] font-bold uppercase tracking-[0.06em]">Show Details</span>
                        <span class="material-symbols-outlined text-[12px]">arrow_forward</span>
                    </button>
                </div>
            </div>

            {{-- Modal --}}
            <div id="modal-{{ $message->id }}" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6">
                <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeMessageModal({{ $message->id }})"></div>
                <div class="relative bg-white rounded-2xl sm:rounded-3xl w-full max-w-lg max-h-[85vh] overflow-y-auto shadow-2xl">
                    <div class="sticky top-0 bg-white/95 backdrop-blur-sm border-b border-outline-variant/50 px-5 sm:px-6 py-4 flex items-center justify-between rounded-t-2xl sm:rounded-t-3xl z-10">
                        <span class="font-headline text-[11px] sm:text-xs font-bold uppercase tracking-[0.1em] text-primary">Message Details</span>
                        <button onclick="closeMessageModal({{ $message->id }})" class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center hover:bg-surface-container-high transition-colors">
                            <span class="material-symbols-outlined text-on-surface-variant text-[18px]">close</span>
                        </button>
                    </div>
                    <div class="p-5 sm:p-6">
                        @if($message->thumbnail)
                            <div class="rounded-xl overflow-hidden mb-5 aspect-video">
                                <img alt="{{ $message->title }}" class="w-full h-full object-cover" src="{{ $message->thumbnail }}">
                            </div>
                        @endif
                        <h3 class="font-headline text-[17px] sm:text-lg md:text-xl font-bold text-on-surface mb-3 leading-snug">{{ $message->title }}</h3>
                        <div class="flex flex-wrap gap-3 text-[12px] sm:text-[13px] text-on-surface-variant mb-4">
                            <span class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-[14px] text-primary">person</span>
                                {{ $message->speaker }}
                            </span>
                            @if($message->series)
                                <span class="flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-[14px] text-primary">library_music</span>
                                    {{ $message->series->name }}
                                </span>
                            @endif
                            <span class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-[14px] text-primary">calendar_today</span>
                                @if($message->published_at)
                                    {{ $message->published_at->format('d F Y') }}
                                @endif
                            </span>
                            @if($message->category)
                                <span class="inline-flex items-center gap-1.5 bg-surface-container-high text-primary px-2.5 py-1 rounded-full font-bold">
                                    {{ $message->category->name }}
                                </span>
                            @endif
                        </div>
                        @if($message->description)
                            <p class="text-[13px] sm:text-sm text-on-surface-variant leading-relaxed mb-5">{{ $message->description }}</p>
                        @endif
                        <div class="flex flex-wrap gap-2.5">
                            @if($message->audio)
                                <button onclick="closeMessageModal({{ $message->id }}); playMessage({{ $index }})" class="inline-flex items-center gap-1.5 bg-primary text-white px-5 py-2.5 rounded-full text-[10px] sm:text-[11px] font-bold uppercase tracking-[0.08em] hover:bg-primary-container transition-all">
                                    <span class="material-symbols-outlined text-[14px]">play_arrow</span>
                                    Play Message
                                </button>
                                <a href="{{ $message->audio }}" class="inline-flex items-center gap-1.5 bg-on-secondary-fixed text-white px-5 py-2.5 rounded-full text-[10px] sm:text-[11px] font-bold uppercase tracking-[0.08em] hover:bg-black transition-all" target="_blank">
                                    <span class="material-symbols-outlined text-[14px]">download</span>
                                    Download
                                </a>
                            @endif
                            @if($message->video)
                                <a href="{{ $message->video }}" class="inline-flex items-center gap-1.5 bg-surface-container border border-outline-variant/50 text-on-surface px-5 py-2.5 rounded-full text-[10px] sm:text-[11px] font-bold uppercase tracking-[0.08em] hover:bg-surface-container-high transition-all" target="_blank">
                                    <span class="material-symbols-outlined text-[14px]">play_circle</span>
                                    Watch Video
                                </a>
                            @endif
                            @if($message->notes)
                                <a href="{{ $message->notes }}" class="inline-flex items-center gap-1.5 bg-surface-container border border-outline-variant/50 text-on-surface px-5 py-2.5 rounded-full text-[10px] sm:text-[11px] font-bold uppercase tracking-[0.08em] hover:bg-surface-container-high transition-all" target="_blank">
                                    <span class="material-symbols-outlined text-[14px]">description</span>
                                    Notes
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-16 sm:py-20">
                <span class="material-symbols-outlined text-on-surface-variant/50 text-[60px] sm:text-[80px]">search_off</span>
                <p class="text-[13px] sm:text-sm md:text-base text-on-surface-variant mt-3 sm:mt-4">No messages found{{ request('search') ? ' for "' . request('search') . '"' : '' }}.</p>
            </div>
        @endforelse
    </div>
</section>

{{-- STICKY BOTTOM PLAYER --}}
<div id="audio-player-bar" class="fixed bottom-0 left-0 right-0 z-[90] translate-y-full transition-transform duration-500 ease-[cubic-bezier(0.16,1,0.3,1)]">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-md"></div>
    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 md:px-8 py-3 sm:py-4">
        {{-- Progress bar at top --}}
        <div class="absolute top-0 left-0 right-0 h-1 bg-white/10 cursor-pointer group" id="player-progress-bar" onclick="seekFromBar(event)">
            <div id="player-progress-fill" class="h-full bg-primary transition-all duration-100" style="width: 0%"></div>
            <div id="player-progress-thumb" class="absolute top-1/2 -translate-y-1/2 w-3 h-3 bg-primary rounded-full shadow-lg shadow-primary/40 opacity-0 group-hover:opacity-100 transition-opacity" style="left: 0%"></div>
        </div>

        <div class="flex items-center gap-3 sm:gap-4">
            {{-- Thumbnail (rotates when playing) --}}
            <div id="player-thumb" class="w-11 h-11 sm:w-13 sm:h-13 md:w-14 md:h-14 rounded-full overflow-hidden shrink-0 border-2 border-white/20 shadow-lg">
                <div id="player-thumb-img" class="w-full h-full bg-gradient-to-br from-primary/30 to-surface-container flex items-center justify-center">
                    <span class="material-symbols-outlined text-on-surface-variant text-xl">music_note</span>
                </div>
            </div>

            {{-- Info --}}
            <div class="flex-1 min-w-0">
                <p id="player-title" class="font-headline text-[12px] sm:text-[13px] md:text-sm font-bold text-white truncate">No track selected</p>
                <p id="player-speaker" class="text-[10px] sm:text-[11px] text-white/50 truncate"></p>
            </div>

            {{-- Time --}}
            <div class="hidden sm:flex items-center gap-1.5 text-white/50 text-[11px] font-mono shrink-0">
                <span id="player-current">0:00</span>
                <span>/</span>
                <span id="player-duration">0:00</span>
            </div>

            {{-- Controls --}}
            <div class="flex items-center gap-1 sm:gap-1.5 shrink-0">
                <button onclick="prevTrack()" class="w-8 h-8 sm:w-9 sm:h-9 rounded-full flex items-center justify-center text-white/60 hover:text-white hover:bg-white/10 transition-all" title="Previous">
                    <span class="material-symbols-outlined text-[18px] sm:text-[20px]">skip_previous</span>
                </button>
                <button onclick="togglePlayer()" id="player-play-btn" class="w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-primary flex items-center justify-center text-white hover:bg-primary-container hover:shadow-lg hover:shadow-primary/30 transition-all" title="Play/Pause">
                    <span class="material-symbols-outlined text-[22px] sm:text-[24px]" id="player-play-icon">play_arrow</span>
                </button>
                <button onclick="nextTrack()" class="w-8 h-8 sm:w-9 sm:h-9 rounded-full flex items-center justify-center text-white/60 hover:text-white hover:bg-white/10 transition-all" title="Next">
                    <span class="material-symbols-outlined text-[18px] sm:text-[20px]">skip_next</span>
                </button>
            </div>

            {{-- Close --}}
            <button onclick="closePlayer()" class="w-8 h-8 rounded-full flex items-center justify-center text-white/40 hover:text-white hover:bg-white/10 transition-all shrink-0" title="Close">
                <span class="material-symbols-outlined text-[18px]">close</span>
            </button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<style>
    @keyframes spin-disc {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .disc-spinning { animation: spin-disc 3s linear infinite; }
    .disc-paused { animation-play-state: paused; }
</style>
<script>
    // Playlist data
    const playlist = [
        @foreach($messages as $msg)
        @if($msg->audio)
        {
            title: @json($msg->title),
            speaker: @json($msg->speaker),
            audio: @json($msg->audio),
            thumbnail: @json($msg->thumbnail ?? ''),
        },
        @endif
        @endforeach
    ];

    let currentTrack = -1;
    let isPlaying = false;
    const audio = new Audio();
    audio.preload = 'metadata';

    // Elements
    const bar = document.getElementById('audio-player-bar');
    const thumb = document.getElementById('player-thumb');
    const thumbImg = document.getElementById('player-thumb-img');
    const titleEl = document.getElementById('player-title');
    const speakerEl = document.getElementById('player-speaker');
    const currentEl = document.getElementById('player-current');
    const durationEl = document.getElementById('player-duration');
    const progressFill = document.getElementById('player-progress-fill');
    const progressThumb = document.getElementById('player-progress-thumb');
    const playIcon = document.getElementById('player-play-icon');

    function playMessage(index) {
        if (index < 0 || index >= playlist.length) return;
        if (currentTrack === index && isPlaying) {
            audio.pause();
            isPlaying = false;
            updatePlayUI();
            return;
        }
        currentTrack = index;
        const track = playlist[index];
        audio.src = track.audio;
        audio.play().then(() => {
            isPlaying = true;
            updatePlayUI();
            showPlayer();
        }).catch(() => {});
    }

    function togglePlayer() {
        if (currentTrack < 0) {
            if (playlist.length > 0) playMessage(0);
            return;
        }
        if (isPlaying) {
            audio.pause();
            isPlaying = false;
        } else {
            audio.play().then(() => { isPlaying = true; }).catch(() => {});
        }
        updatePlayUI();
    }

    function prevTrack() {
        if (currentTrack > 0) playMessage(currentTrack - 1);
        else playMessage(playlist.length - 1);
    }

    function nextTrack() {
        if (currentTrack < playlist.length - 1) playMessage(currentTrack + 1);
        else playMessage(0);
    }

    function showPlayer() {
        bar.classList.remove('translate-y-full');
        bar.classList.add('translate-y-0');
    }

    function closePlayer() {
        audio.pause();
        audio.src = '';
        isPlaying = false;
        currentTrack = -1;
        bar.classList.remove('translate-y-0');
        bar.classList.add('translate-y-full');
        updatePlayUI();
        highlightActiveCard();
    }

    function updatePlayUI() {
        playIcon.textContent = isPlaying ? 'pause' : 'play_arrow';

        // Disc rotation
        if (isPlaying) {
            thumbImg.classList.add('disc-spinning');
            thumbImg.classList.remove('disc-paused');
        } else {
            thumbImg.classList.add('disc-paused');
        }

        // Track info + thumbnail
        if (currentTrack >= 0) {
            const track = playlist[currentTrack];
            titleEl.textContent = track.title;
            speakerEl.textContent = track.speaker || '';
            if (track.thumbnail) {
                thumbImg.innerHTML = '<img src="' + track.thumbnail + '" class="w-full h-full object-cover">';
            } else {
                thumbImg.innerHTML = '<span class="material-symbols-outlined text-on-surface-variant text-xl">music_note</span>';
            }
        }

        highlightActiveCard();
    }

    function highlightActiveCard() {
        document.querySelectorAll('.message-card').forEach((card, i) => {
            if (i === currentTrack && isPlaying) {
                card.classList.add('ring-2', 'ring-primary/30', 'bg-primary/[0.02]');
            } else {
                card.classList.remove('ring-2', 'ring-primary/30', 'bg-primary/[0.02]');
            }
        });
    }

    // Audio events
    audio.ontimeupdate = () => {
        if (!audio.duration) return;
        const pct = (audio.currentTime / audio.duration) * 100;
        progressFill.style.width = pct + '%';
        progressThumb.style.left = pct + '%';
        currentEl.textContent = formatTime(audio.currentTime);
    };

    audio.onloadedmetadata = () => {
        durationEl.textContent = formatTime(audio.duration);
    };

    audio.onended = () => {
        nextTrack();
    };

    function seekFromBar(e) {
        const bar = document.getElementById('player-progress-bar');
        const rect = bar.getBoundingClientRect();
        const pct = (e.clientX - rect.left) / rect.width;
        if (audio.duration) {
            audio.currentTime = pct * audio.duration;
        }
    }

    function formatTime(s) {
        const m = Math.floor(s / 60);
        const sec = Math.floor(s % 60);
        return m + ':' + (sec < 10 ? '0' : '') + sec;
    }

    function openMessageModal(id) {
        const modal = document.getElementById('modal-' + id);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    function closeMessageModal(id) {
        const modal = document.getElementById('modal-' + id);
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }
</script>
@endpush
