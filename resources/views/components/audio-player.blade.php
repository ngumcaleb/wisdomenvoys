@props([
    'src' => null,
    'title' => 'Audio',
    'speaker' => null,
    'thumbnail' => null,
    'id' => 'player-' . substr(md5($title), 0, 8),
])

@if($src)
<div class="bg-white rounded-2xl card-shadow border border-outline-variant overflow-hidden" id="{{ $id }}">
    <div class="flex items-center gap-4 p-4">
        {{-- Thumbnail --}}
        <div class="w-14 h-14 rounded-xl overflow-hidden shrink-0 bg-surface-container">
            @if($thumbnail)
                <img src="{{ $thumbnail }}" alt="{{ $title }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary/10 to-primary/5">
                    <span class="material-symbols-outlined text-primary text-2xl">music_note</span>
                </div>
            @endif
        </div>

        {{-- Info + Controls --}}
        <div class="flex-1 min-w-0">
            <h4 class="font-headline text-sm font-semibold text-on-surface truncate">{{ $title }}</h4>
            @if($speaker)
                <p class="text-xs text-on-surface-variant truncate">{{ $speaker }}</p>
            @endif
        </div>

        {{-- Play/Pause Button --}}
        <button onclick="togglePlay('{{ $id }}', '{{ $src }}')" id="{{ $id }}-btn"
            class="w-11 h-11 rounded-full bg-primary text-white flex items-center justify-center shrink-0 hover:bg-primary-container transition-colors shadow-md">
            <span class="material-symbols-outlined text-xl" id="{{ $id }}-icon">play_arrow</span>
        </button>
    </div>

    {{-- Progress Bar --}}
    <div class="px-4 pb-4">
        <div class="flex items-center gap-3">
            <span class="text-[11px] text-on-surface-variant font-mono w-10 text-right" id="{{ $id }}-current">0:00</span>
            <input type="range" min="0" max="100" value="0" step="0.1"
                id="{{ $id }}-progress"
                class="flex-1 h-1.5 rounded-full appearance-none bg-surface-container-high cursor-pointer accent-primary"
                oninput="seekAudio('{{ $id }}', this.value)">
            <span class="text-[11px] text-on-surface-variant font-mono w-10" id="{{ $id }}-duration">0:00</span>
        </div>
    </div>

    {{-- Hidden Audio Element --}}
    <audio id="{{ $id }}-audio" preload="metadata"
        ontimeupdate="updateProgress('{{ $id }}')"
        onloadedmetadata="loadedMeta('{{ $id }}')"
        onended="ended('{{ $id }}')">
        <source src="{{ $src }}" type="audio/mpeg">
    </audio>
</div>
@endif

@once
@push('scripts')
<script>
    const players = {};

    function getAudio(id) {
        if (!players[id]) {
            players[id] = document.getElementById(id + '-audio');
        }
        return players[id];
    }

    function togglePlay(id, src) {
        const audio = getAudio(id);
        const icon = document.getElementById(id + '-icon');

        // Pause all other players
        Object.keys(players).forEach(key => {
            if (key !== id && players[key] && !players[key].paused) {
                players[key].pause();
                const otherIcon = document.getElementById(key + '-icon');
                if (otherIcon) otherIcon.textContent = 'play_arrow';
            }
        });

        if (audio.paused) {
            audio.play();
            icon.textContent = 'pause';
        } else {
            audio.pause();
            icon.textContent = 'play_arrow';
        }
    }

    function updateProgress(id) {
        const audio = getAudio(id);
        const progress = document.getElementById(id + '-progress');
        const current = document.getElementById(id + '-current');
        if (audio.duration) {
            progress.value = (audio.currentTime / audio.duration) * 100;
            current.textContent = formatTime(audio.currentTime);
        }
    }

    function loadedMeta(id) {
        const audio = getAudio(id);
        const duration = document.getElementById(id + '-duration');
        duration.textContent = formatTime(audio.duration);
    }

    function seekAudio(id, value) {
        const audio = getAudio(id);
        if (audio.duration) {
            audio.currentTime = (value / 100) * audio.duration;
        }
    }

    function ended(id) {
        const icon = document.getElementById(id + '-icon');
        icon.textContent = 'play_arrow';
    }

    function formatTime(seconds) {
        const m = Math.floor(seconds / 60);
        const s = Math.floor(seconds % 60);
        return m + ':' + (s < 10 ? '0' : '') + s;
    }
</script>
@endpush
@endonce
