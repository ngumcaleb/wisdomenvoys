@extends('layouts.public')

@section('title', 'Download - ' . ($settings->site_name ?? 'Wisdom Envoys Ministry'))

@section('content')

{{-- HERO --}}
@php $heroBg = !empty($settings->hero_download_image) ? $settings->hero_download_image : '/images/download-hero-bg.jpg'; @endphp
<header class="relative min-h-[400px] sm:min-h-[420px] md:min-h-[480px] lg:min-h-[520px] flex items-end sm:items-center overflow-hidden hero-bg" style="background-image: url('{{ $heroBg }}')">
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-black/20"></div>
    <div class="relative z-10 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10 w-full py-10 sm:py-14 md:py-20 lg:py-24">
        <div class="max-w-3xl">
            <div class="flex items-center gap-2 mb-4 sm:mb-5 md:mb-6">
                <span class="bg-primary text-white font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.12em] px-3 sm:px-4 py-1.5 sm:py-2 rounded-full">Free Resources</span>
                <span class="bg-white/15 backdrop-blur-sm text-white font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.12em] px-3 sm:px-4 py-1.5 sm:py-2 rounded-full border border-white/20">Audio & Podcasts</span>
            </div>
            <h1 class="font-headline text-[30px] sm:text-[36px] md:text-[48px] lg:text-[56px] font-extrabold mb-3 sm:mb-4 tracking-tight text-white leading-[1.08]">{{ $hero['title'] }}</h1>
            <p class="text-[14px] sm:text-sm md:text-base lg:text-lg max-w-xl text-white/75 leading-relaxed mb-5 sm:mb-6 md:mb-8">{{ $hero['description'] }}</p>
            <div class="flex flex-nowrap gap-2.5 sm:gap-3">
                <a href="#panel-messages" onclick="switchTab('messages')" class="group inline-flex items-center gap-1.5 sm:gap-2 bg-primary text-white font-headline text-[10px] sm:text-xs md:text-sm font-bold uppercase tracking-[0.06em] px-4 sm:px-6 py-2.5 sm:py-3 rounded-full shadow-lg shadow-primary/30 hover:bg-primary-container hover:shadow-xl transition-all duration-300">
                    <span class="material-symbols-outlined text-[14px] sm:text-[16px] md:text-[18px]">mic</span>
                    Get Messages
                </a>
                <a href="#panel-podcasts" onclick="switchTab('podcasts')" class="group inline-flex items-center gap-1.5 sm:gap-2 bg-white/15 backdrop-blur-sm text-white font-headline text-[10px] sm:text-xs md:text-sm font-bold uppercase tracking-[0.06em] px-4 sm:px-6 py-2.5 sm:py-3 rounded-full border border-white/25 hover:bg-white/25 transition-all duration-300">
                    <span class="material-symbols-outlined text-[14px] sm:text-[16px] md:text-[18px]">headphones</span>
                    Listen Now
                </a>
            </div>
        </div>
    </div>
</header>

{{-- TABS --}}
<section class="pt-10 sm:pt-14 md:pt-16 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10">
    {{-- Tab Buttons --}}
    <div class="flex items-center gap-1 bg-surface-container rounded-xl p-1 sm:p-1.5 w-fit mx-auto mb-8 sm:mb-10 md:mb-12">
        <button onclick="switchTab('all')" id="tab-all" class="tab-btn font-headline text-[11px] sm:text-xs font-bold uppercase tracking-[0.1em] px-5 sm:px-7 md:px-8 py-2.5 sm:py-3 rounded-full transition-all duration-200 bg-primary text-white">
            All
        </button>
        <button onclick="switchTab('messages')" id="tab-messages" class="tab-btn font-headline text-[11px] sm:text-xs font-bold uppercase tracking-[0.1em] px-5 sm:px-7 md:px-8 py-2.5 sm:py-3 rounded-full transition-all duration-200 text-on-surface-variant hover:text-on-surface">
            Messages
        </button>
        <button onclick="switchTab('podcasts')" id="tab-podcasts" class="tab-btn font-headline text-[11px] sm:text-xs font-bold uppercase tracking-[0.1em] px-5 sm:px-7 md:px-8 py-2.5 sm:py-3 rounded-full transition-all duration-200 text-on-surface-variant hover:text-on-surface">
            Podcasts
        </button>
    </div>

    {{-- ALL TAB --}}
    <div id="panel-all" class="tab-panel">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 md:gap-6">
            @forelse($years as $year)
                @php
                    $hasMessages = $year->messages_count > 0;
                    $hasPodcasts = $year->podcasts_count > 0;
                @endphp
                <div class="group relative bg-white rounded-2xl overflow-hidden shadow-[0_2px_20px_rgba(0,0,0,0.06)] hover:shadow-[0_8px_40px_rgba(0,0,0,0.1)] transition-all duration-500 hover:-translate-y-1 border border-outline-variant/50">
                    <div class="aspect-[4/3] sm:aspect-square relative overflow-hidden">
                        @if($year->cover_image)
                            <img alt="Resources {{ $year->year }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $year->cover_image }}">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-primary/5 via-surface-container to-primary/10 flex items-center justify-center">
                                <span class="font-headline text-5xl sm:text-6xl font-extrabold text-primary/15">{{ $year->year }}</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent"></div>
                        @if($year->year == $years->first()->year)
                            <div class="absolute top-3 left-3 sm:top-4 sm:left-4">
                                <span class="bg-primary text-white text-[10px] sm:text-[11px] font-bold px-2.5 sm:px-3 py-1 sm:py-1.5 rounded-full uppercase tracking-wider">Latest</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-4 sm:p-5 md:p-6">
                        <h3 class="font-headline text-[14px] sm:text-[15px] md:text-base font-bold text-on-surface mb-3 sm:mb-4">All Resources {{ $year->year }}</h3>
                        <div class="flex flex-col gap-2">
                            @if($hasMessages)
                                <a class="group/link flex items-center gap-3 bg-on-secondary-fixed text-white p-2.5 sm:p-3 rounded-full transition-all duration-300 hover:bg-black hover:shadow-lg" href="{{ route('download.year', $year->year) }}">
                                    <span class="w-7 h-7 sm:w-8 sm:h-8 bg-white/10 rounded-full flex items-center justify-center flex-shrink-0">
                                        <span class="material-symbols-outlined text-[15px] sm:text-[16px]">mic</span>
                                    </span>
                                    <span class="font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.1em] flex-grow">Messages ({{ $year->messages_count }})</span>
                                    <span class="material-symbols-outlined text-[16px] sm:text-[18px] transition-transform duration-300 group-hover/link:translate-x-0.5">arrow_forward</span>
                                </a>
                            @endif
                            @if($hasPodcasts)
                                <a class="group/link flex items-center gap-3 bg-primary text-white p-2.5 sm:p-3 rounded-full transition-all duration-300 hover:bg-primary-container hover:shadow-lg hover:shadow-primary/20" href="{{ route('download.year.podcasts', $year->year) }}">
                                    <span class="w-7 h-7 sm:w-8 sm:h-8 bg-white/15 rounded-full flex items-center justify-center flex-shrink-0">
                                        <span class="material-symbols-outlined text-[15px] sm:text-[16px]">headphones</span>
                                    </span>
                                    <span class="font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.1em] flex-grow">Podcasts ({{ $year->podcasts_count }})</span>
                                    <span class="material-symbols-outlined text-[16px] sm:text-[18px] transition-transform duration-300 group-hover/link:translate-x-0.5">arrow_forward</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16 sm:py-20">
                    <span class="material-symbols-outlined text-primary/30 text-[60px] sm:text-[80px]">folder_open</span>
                    <p class="text-[13px] sm:text-sm md:text-base text-on-surface-variant mt-3 sm:mt-4">No resources available yet.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- MESSAGES TAB --}}
    <div id="panel-messages" class="tab-panel hidden">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 md:gap-6">
            @forelse($messageYears as $year)
                <div class="group relative bg-white rounded-2xl overflow-hidden shadow-[0_2px_20px_rgba(0,0,0,0.06)] hover:shadow-[0_8px_40px_rgba(0,0,0,0.1)] transition-all duration-500 hover:-translate-y-1 border border-outline-variant/50">
                    <div class="aspect-[4/3] sm:aspect-square relative overflow-hidden">
                        @if($year->cover_image)
                            <img alt="Messages {{ $year->year }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $year->cover_image }}">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-primary/5 via-surface-container to-primary/10 flex items-center justify-center">
                                <span class="font-headline text-5xl sm:text-6xl font-extrabold text-primary/15">{{ $year->year }}</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent"></div>
                        @if($year->year == $messageYears->first()->year)
                            <div class="absolute top-3 left-3 sm:top-4 sm:left-4">
                                <span class="bg-primary text-white text-[10px] sm:text-[11px] font-bold px-2.5 sm:px-3 py-1 sm:py-1.5 rounded-full uppercase tracking-wider">Latest</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-4 sm:p-5 md:p-6">
                        <h3 class="font-headline text-[14px] sm:text-[15px] md:text-base font-bold text-on-surface mb-1">Messages</h3>
                        <p class="text-[12px] sm:text-[13px] md:text-sm text-on-surface-variant mb-3 sm:mb-4">{{ $year->year }} &middot; {{ $year->messages_count }} messages</p>
                        <a class="group/link flex items-center gap-3 bg-on-secondary-fixed text-white p-2.5 sm:p-3 rounded-full transition-all duration-300 hover:bg-black hover:shadow-lg" href="{{ route('download.year', $year->year) }}">
                            <span class="w-7 h-7 sm:w-8 sm:h-8 bg-white/10 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-[15px] sm:text-[16px]">mic</span>
                            </span>
                            <span class="font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.1em] flex-grow">View Messages</span>
                            <span class="material-symbols-outlined text-[16px] sm:text-[18px] transition-transform duration-300 group-hover/link:translate-x-0.5">arrow_forward</span>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16 sm:py-20">
                    <span class="material-symbols-outlined text-primary/30 text-[60px] sm:text-[80px]">mic</span>
                    <p class="text-[13px] sm:text-sm md:text-base text-on-surface-variant mt-3 sm:mt-4">No message years available yet.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- PODCASTS TAB --}}
    <div id="panel-podcasts" class="tab-panel hidden">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 md:gap-6">
            @forelse($podcastYears as $year)
                <div class="group relative bg-white rounded-2xl overflow-hidden shadow-[0_2px_20px_rgba(0,0,0,0.06)] hover:shadow-[0_8px_40px_rgba(0,0,0,0.1)] transition-all duration-500 hover:-translate-y-1 border border-outline-variant/50">
                    <div class="aspect-[4/3] sm:aspect-square relative overflow-hidden">
                        @if($year->cover_image)
                            <img alt="Podcasts {{ $year->year }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $year->cover_image }}">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-accent-pink/5 via-surface-container to-accent-pink/10 flex items-center justify-center">
                                <span class="material-symbols-outlined text-accent-pink/20 text-[60px] sm:text-[80px]">podcasts</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent"></div>
                        @if($year->year == $podcastYears->first()->year)
                            <div class="absolute top-3 left-3 sm:top-4 sm:left-4">
                                <span class="bg-accent-pink text-white text-[10px] sm:text-[11px] font-bold px-2.5 sm:px-3 py-1 sm:py-1.5 rounded-full uppercase tracking-wider">Latest</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-4 sm:p-5 md:p-6">
                        <h3 class="font-headline text-[14px] sm:text-[15px] md:text-base font-bold text-on-surface mb-1">Podcasts</h3>
                        <p class="text-[12px] sm:text-[13px] md:text-sm text-on-surface-variant mb-3 sm:mb-4">{{ $year->year }} &middot; {{ $year->podcasts_count }} episodes</p>
                        <a class="group/link flex items-center gap-3 bg-primary text-white p-2.5 sm:p-3 rounded-full transition-all duration-300 hover:bg-primary-container hover:shadow-lg hover:shadow-primary/20" href="{{ route('download.year.podcasts', $year->year) }}">
                            <span class="w-7 h-7 sm:w-8 sm:h-8 bg-white/15 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-[15px] sm:text-[16px]">headphones</span>
                            </span>
                            <span class="font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.1em] flex-grow">Listen Now</span>
                            <span class="material-symbols-outlined text-[16px] sm:text-[18px] transition-transform duration-300 group-hover/link:translate-x-0.5">arrow_forward</span>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16 sm:py-20">
                    <span class="material-symbols-outlined text-primary/30 text-[60px] sm:text-[80px]">headphones</span>
                    <p class="text-[13px] sm:text-sm md:text-base text-on-surface-variant mt-3 sm:mt-4">No podcast years available yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- NEWSLETTER CTA --}}
<section class="py-14 sm:py-18 md:py-24 lg:py-28 bg-on-secondary-fixed text-white overflow-hidden relative mt-10 sm:mt-14 md:mt-16">
    <div class="max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10 text-center relative z-10">
        <h2 class="font-headline text-[22px] sm:text-[28px] md:text-[36px] lg:text-[40px] leading-[1.15] sm:leading-[1.2] font-bold mb-4 sm:mb-5 md:mb-6">Never Miss a Mandate</h2>
        <p class="text-[13px] sm:text-sm md:text-base lg:text-lg mb-6 sm:mb-8 md:mb-10 max-w-xl mx-auto opacity-80 leading-relaxed">Subscribe to our monthly newsletter to get notified about the latest audio messages and upcoming service series.</p>
        <form class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center max-w-md mx-auto" onsubmit="event.preventDefault(); fetch('/newsletter', {method:'POST', headers:{'Content-Type':'application/json','X-CSRF-TOKEN':document.querySelector('meta[name=csrf-token]').content}, body:JSON.stringify({email:this.email.value})}).then(r=>r.json()).then(d=>{alert(d.message); this.reset()})">
            <input name="email" class="flex-grow bg-white/10 border border-white/20 rounded-full px-5 py-3 sm:py-3.5 text-[13px] sm:text-sm md:text-base text-white placeholder:text-white/50 focus:ring-2 focus:ring-primary" placeholder="Your Email Address" type="email" required>
            <button class="bg-primary text-white font-headline text-[11px] sm:text-xs font-bold uppercase tracking-[0.1em] px-7 sm:px-8 py-3 sm:py-3.5 rounded-full hover:bg-primary-container transition-all duration-300" type="submit">Subscribe</button>
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
