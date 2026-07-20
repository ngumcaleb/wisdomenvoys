@extends('layouts.public')

@section('title', 'Download - ' . ($settings->site_name ?? 'Wisdom Envoys Ministry'))

@section('content')

{{-- HERO --}}
<header class="relative py-16 md:py-24 overflow-hidden hero-bg bg-on-secondary-fixed" @if($settings->hero_download_image) style="background-image: url('{{ $settings->hero_download_image }}')" @endif>
    @if($settings->hero_download_image)
        <div class="absolute inset-0 bg-black/50"></div>
    @endif
    <div class="relative z-10 max-w-[1280px] mx-auto px-6 text-center">
        <h1 class="font-headline text-[48px] md:text-[56px] font-extrabold mb-4 tracking-tight text-white">{{ $hero['title'] }}</h1>
        <p class="text-lg max-w-2xl mx-auto opacity-80 text-white/80">{{ $hero['description'] }}</p>
    </div>
</header>

{{-- TABS --}}
<section class="pt-16 max-w-[1280px] mx-auto px-6">
    {{-- Tab Buttons --}}
    <div class="flex items-center gap-1 bg-surface-container rounded-xl p-1.5 w-fit mx-auto mb-12">
        <button onclick="switchTab('all')" id="tab-all" class="tab-btn font-headline text-xs font-bold uppercase tracking-[0.1em] px-8 py-3 rounded-full transition-all duration-200 bg-primary text-white">
            All
        </button>
        <button onclick="switchTab('messages')" id="tab-messages" class="tab-btn font-headline text-xs font-bold uppercase tracking-[0.1em] px-8 py-3 rounded-full transition-all duration-200 text-on-surface-variant hover:text-on-surface">
            Messages
        </button>
        <button onclick="switchTab('podcasts')" id="tab-podcasts" class="tab-btn font-headline text-xs font-bold uppercase tracking-[0.1em] px-8 py-3 rounded-full transition-all duration-200 text-on-surface-variant hover:text-on-surface">
            Podcasts
        </button>
    </div>

    {{-- ALL TAB --}}
    <div id="panel-all" class="tab-panel">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($years as $year)
                @php
                    $hasMessages = $year->messages_count > 0;
                    $hasPodcasts = $year->podcasts_count > 0;
                @endphp
                <div class="group relative bg-white rounded-xl overflow-hidden card-shadow transition-all duration-300 hover:-translate-y-2">
                    <div class="aspect-square relative overflow-hidden">
                        @if($year->cover_image)
                            <img alt="Resources {{ $year->year }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ $year->cover_image }}">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-primary/5 via-surface-container to-primary/10 flex items-center justify-center">
                                <span class="font-headline text-6xl font-extrabold text-primary/15">{{ $year->year }}</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-on-secondary-fixed/80 to-transparent opacity-60"></div>
                        @if($year->year == $years->first()->year)
                            <div class="absolute top-4 left-4">
                                <span class="bg-primary text-white text-[11px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Latest</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="font-headline text-base font-semibold text-on-surface mb-4">All Resources {{ $year->year }}</h3>
                        <div class="flex flex-col gap-2">
                            @if($hasMessages)
                                <a class="flex items-center justify-between group/link bg-surface-container hover:bg-primary-container hover:text-on-primary-container p-3 rounded-full transition-colors" href="{{ route('download.year', $year->year) }}">
                                    <span class="font-headline text-xs font-bold uppercase tracking-[0.1em]">Messages ({{ $year->messages_count }})</span>
                                    <span class="material-symbols-outlined text-[20px] transition-transform group-hover/link:translate-x-1">arrow_forward</span>
                                </a>
                            @endif
                            @if($hasPodcasts)
                                <a class="flex items-center justify-between group/link bg-surface-container hover:bg-primary-container hover:text-on-primary-container p-3 rounded-full transition-colors" href="{{ route('download.year.podcasts', $year->year) }}">
                                    <span class="font-headline text-xs font-bold uppercase tracking-[0.1em]">Podcasts ({{ $year->podcasts_count }})</span>
                                    <span class="material-symbols-outlined text-[20px] transition-transform group-hover/link:translate-x-1">arrow_forward</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <span class="material-symbols-outlined text-primary/30 text-[80px]">folder_open</span>
                    <p class="text-on-surface-variant mt-4">No resources available yet.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- MESSAGES TAB --}}
    <div id="panel-messages" class="tab-panel hidden">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($messageYears as $year)
                <div class="group relative bg-white rounded-xl overflow-hidden card-shadow transition-all duration-300 hover:-translate-y-2">
                    <div class="aspect-square relative overflow-hidden">
                        @if($year->cover_image)
                            <img alt="Messages {{ $year->year }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ $year->cover_image }}">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-primary/5 via-surface-container to-primary/10 flex items-center justify-center">
                                <span class="font-headline text-6xl font-extrabold text-primary/15">{{ $year->year }}</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-on-secondary-fixed/80 to-transparent opacity-60"></div>
                        @if($year->year == $messageYears->first()->year)
                            <div class="absolute top-4 left-4">
                                <span class="bg-primary text-white text-[11px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Latest</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="font-headline text-base font-semibold text-on-surface mb-1">Messages</h3>
                        <p class="text-sm text-on-surface-variant mb-4">{{ $year->year }} &middot; {{ $year->messages_count }} messages</p>
                        <a class="flex items-center justify-between group/link bg-surface-container hover:bg-primary-container hover:text-on-primary-container p-3 rounded-full transition-colors" href="{{ route('download.year', $year->year) }}">
                            <span class="font-headline text-xs font-bold uppercase tracking-[0.1em]">View Messages</span>
                            <span class="material-symbols-outlined text-[20px] transition-transform group-hover/link:translate-x-1">arrow_forward</span>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <span class="material-symbols-outlined text-primary/30 text-[80px]">mic</span>
                    <p class="text-on-surface-variant mt-4">No message years available yet.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- PODCASTS TAB --}}
    <div id="panel-podcasts" class="tab-panel hidden">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($podcastYears as $year)
                <div class="group relative bg-white rounded-xl overflow-hidden card-shadow transition-all duration-300 hover:-translate-y-2">
                    <div class="aspect-square relative overflow-hidden">
                        @if($year->cover_image)
                            <img alt="Podcasts {{ $year->year }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ $year->cover_image }}">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-accent-pink/5 via-surface-container to-accent-pink/10 flex items-center justify-center">
                                <span class="material-symbols-outlined text-accent-pink/20 text-[80px]">podcasts</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-on-secondary-fixed/80 to-transparent opacity-60"></div>
                        @if($year->year == $podcastYears->first()->year)
                            <div class="absolute top-4 left-4">
                                <span class="bg-accent-pink text-white text-[11px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Latest</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="font-headline text-base font-semibold text-on-surface mb-1">Podcasts</h3>
                        <p class="text-sm text-on-surface-variant mb-4">{{ $year->year }} &middot; {{ $year->podcasts_count }} episodes</p>
                        <a class="flex items-center justify-between group/link bg-surface-container hover:bg-primary-container hover:text-on-primary-container p-3 rounded-full transition-colors" href="{{ route('download.year.podcasts', $year->year) }}">
                            <span class="font-headline text-xs font-bold uppercase tracking-[0.1em]">Listen Now</span>
                            <span class="material-symbols-outlined text-[20px] transition-transform group-hover/link:translate-x-1">arrow_forward</span>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <span class="material-symbols-outlined text-primary/30 text-[80px]">headphones</span>
                    <p class="text-on-surface-variant mt-4">No podcast years available yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- NEWSLETTER CTA --}}
<section class="py-32 bg-on-secondary-fixed text-white overflow-hidden relative mt-16">
    <div class="max-w-[1280px] mx-auto px-6 text-center relative z-10">
        <h2 class="font-headline text-[40px] leading-[1.2] font-bold mb-6">Never Miss a Mandate</h2>
        <p class="text-lg mb-10 max-w-xl mx-auto opacity-80">Subscribe to our monthly newsletter to get notified about the latest audio messages and upcoming service series.</p>
        <form class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto" onsubmit="event.preventDefault(); fetch('/newsletter', {method:'POST', headers:{'Content-Type':'application/json','X-CSRF-TOKEN':document.querySelector('meta[name=csrf-token]').content}, body:JSON.stringify({email:this.email.value})}).then(r=>r.json()).then(d=>{alert(d.message); this.reset()})">
            <input name="email" class="flex-grow bg-white/10 border border-white/20 rounded-full px-4 py-3 text-white placeholder:text-white/50 focus:ring-2 focus:ring-primary" placeholder="Your Email Address" type="email" required>
            <button class="bg-primary text-white font-headline text-xs font-bold uppercase tracking-[0.1em] px-8 py-3 rounded-full hover:bg-primary/90 transition-all" type="submit">Subscribe</button>
        </form>
    </div>
</section>

@endsection

@push('scripts')
<script>
    function switchTab(tab) {
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('bg-primary', 'text-white');
            btn.classList.add('text-on-surface-variant');
        });
        document.querySelectorAll('.tab-panel').forEach(p => p.classList.add('hidden'));

        document.getElementById('tab-' + tab).classList.add('bg-primary', 'text-white');
        document.getElementById('tab-' + tab).classList.remove('text-on-surface-variant');
        document.getElementById('panel-' + tab).classList.remove('hidden');
    }
</script>
@endpush
