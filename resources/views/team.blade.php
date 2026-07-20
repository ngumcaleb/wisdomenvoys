@extends('layouts.public')

@section('title', 'Our Team - ' . ($settings->site_name ?? 'Wisdom Envoys Ministry'))

@section('content')

{{-- HERO --}}
@php $heroBg = !empty($settings->hero_home_image) ? $settings->hero_home_image : '/images/widomenvoys-hero.webp'; @endphp
<section class="relative min-h-[360px] sm:min-h-[400px] md:min-h-[480px] lg:min-h-[540px] flex items-end sm:items-center overflow-hidden hero-bg" style="background-image: url('{{ $heroBg }}')">
    <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-black/30"></div>
    <div class="absolute top-0 right-0 sm:top-4 sm:right-4 md:top-6 md:right-6 lg:top-10 lg:right-10 w-[140px] sm:w-[200px] md:w-[280px] lg:w-[360px] h-[140px] sm:h-[200px] md:h-[280px] lg:h-[360px] border-[3px] border-white/10 rounded-full pointer-events-none"></div>
    <div class="absolute bottom-6 right-4 sm:bottom-10 sm:right-8 md:bottom-14 md:right-12 lg:bottom-20 lg:right-16 w-[100px] sm:w-[140px] md:w-[200px] lg:w-[260px] h-[100px] sm:h-[140px] md:h-[200px] lg:h-[260px] border-[2px] border-white/[0.08] rounded-full pointer-events-none"></div>
    <div class="absolute top-[15%] left-[8%] w-[100px] sm:w-[140px] md:w-[180px] h-[100px] sm:h-[140px] md:h-[180px] border-[2px] border-white/[0.06] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-[10%] left-[15%] w-[70px] sm:w-[90px] md:w-[120px] h-[70px] sm:h-[90px] md:h-[120px] border-[2px] border-white/[0.05] rounded-full pointer-events-none"></div>
    <div class="absolute top-[25%] right-[30%] w-[60px] sm:w-[80px] md:w-[100px] h-[60px] sm:h-[80px] md:h-[100px] border-[2px] border-white/[0.04] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-[20%] right-[40%] w-[50px] sm:w-[70px] md:w-[90px] h-[50px] sm:h-[70px] md:h-[90px] border-[2px] border-white/[0.03] rounded-full pointer-events-none"></div>
    <div class="relative z-10 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10 w-full py-10 sm:py-14 md:py-20 lg:py-24">
        <div class="max-w-3xl">
            <span class="inline-block bg-primary text-white font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.14em] px-4 sm:px-5 py-2 sm:py-2.5 rounded-full shadow-lg shadow-primary/30 mb-4 sm:mb-5 md:mb-6">THE KINGDOM ARMY</span>
            <h1 class="font-headline text-[32px] sm:text-[40px] md:text-[52px] lg:text-[64px] font-extrabold tracking-tight text-white leading-[1.05] mb-3 sm:mb-4 md:mb-5">
                Our Team
            </h1>
            <p class="text-[14px] sm:text-sm md:text-base lg:text-lg max-w-xl text-white/60 leading-relaxed">
                Meet the spirit-filled leaders and workers serving across the various streams of the Wisdom Envoys mandate.
            </p>
        </div>
    </div>
</section>

{{-- FOUNDER --}}
@if($founder)
<section class="py-14 sm:py-18 md:py-24 lg:py-28 bg-surface-container-low">
    <div class="max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10">
        <div class="flex flex-col md:flex-row gap-8 sm:gap-10 md:gap-14 lg:gap-16 items-center">
            <div class="w-48 h-48 sm:w-56 sm:h-56 md:w-64 md:h-64 lg:w-72 lg:h-72 rounded-full overflow-hidden border-[6px] border-white shadow-[0_8px_40px_rgba(0,0,0,0.1)] shrink-0">
                @if($founder->photo)
                    <img src="{{ $founder->photo }}" alt="{{ $founder->name }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-surface-container-high flex items-center justify-center">
                        <span class="material-symbols-outlined text-on-surface-variant text-[56px] sm:text-[64px]">person</span>
                    </div>
                @endif
            </div>
            <div class="text-center md:text-left">
                <div class="inline-flex items-center gap-2 bg-primary rounded-full px-3.5 sm:px-4 py-1.5 sm:py-2 mb-4 sm:mb-5">
                    <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
                    <span class="font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.15em] text-white">FOUNDER & VISIONARY</span>
                </div>
                <h2 class="font-headline text-[24px] sm:text-[30px] md:text-[36px] lg:text-[42px] font-extrabold text-on-surface leading-[1.1] mb-3 sm:mb-4">{{ $founder->name }}</h2>
                @if($founder->role)
                    <p class="text-[14px] sm:text-base md:text-lg text-primary font-semibold mb-3 sm:mb-4">{{ $founder->role }}</p>
                @endif
                @if($founder->bio)
                    <p class="text-[14px] sm:text-sm md:text-base text-on-surface-variant leading-relaxed max-w-xl mx-auto md:mx-0">{{ $founder->bio }}</p>
                @endif
                <div class="flex items-center gap-3 justify-center md:justify-start mt-5 sm:mt-6">
                    @if($founder->email)
                        <a href="mailto:{{ $founder->email }}" class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center hover:bg-primary hover:text-white text-on-surface-variant transition-all duration-300">
                            <span class="material-symbols-outlined text-[18px]">mail</span>
                        </a>
                    @endif
                    @if($founder->phone)
                        <a href="tel:{{ $founder->phone }}" class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center hover:bg-primary hover:text-white text-on-surface-variant transition-all duration-300">
                            <span class="material-symbols-outlined text-[18px]">phone</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- TABS + TEAM --}}
<section id="team" class="py-14 sm:py-18 md:py-24 lg:py-28 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10">
    {{-- Tab buttons --}}
    <div class="flex flex-wrap items-center gap-2 sm:gap-2.5 mb-10 sm:mb-12 md:mb-16 justify-center">
        <button onclick="filterStream('all')" class="tab-btn active font-headline text-[11px] sm:text-xs font-bold uppercase tracking-[0.08em] px-5 sm:px-6 py-2.5 sm:py-3 rounded-full transition-all duration-300" data-tab="all">
            All
        </button>
        @foreach($streams as $stream)
            <button onclick="filterStream('{{ $stream->slug }}')" class="tab-btn font-headline text-[11px] sm:text-xs font-bold uppercase tracking-[0.08em] px-5 sm:px-6 py-2.5 sm:py-3 rounded-full transition-all duration-300" data-tab="{{ $stream->slug }}">
                {{ $stream->name }}
            </button>
        @endforeach
    </div>

    {{-- Grid --}}
    <div id="team-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-5 md:gap-6">
        @foreach($streams as $stream)
            @foreach($stream->teamMembers as $member)
                @if(!$member->is_founder)
                    <div class="team-card bg-white rounded-[20px] sm:rounded-[24px] border border-outline-variant/50 shadow-[0_2px_16px_rgba(0,0,0,0.04)] p-6 sm:p-7 flex flex-col items-center text-center group hover:shadow-[0_8px_40px_rgba(0,0,0,0.08)] hover:-translate-y-1 transition-all duration-500" data-stream="{{ $stream->slug }}">
                        @if($member->is_stream_lead)
                            <span class="inline-flex items-center gap-1 bg-primary/10 text-primary font-headline text-[9px] sm:text-[10px] font-bold uppercase tracking-[0.1em] px-3 py-1 rounded-full mb-3">
                                <span class="material-symbols-outlined text-[10px]">star</span>
                                Stream Lead
                            </span>
                        @endif
                        <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full overflow-hidden mb-4 sm:mb-5 border-4 border-surface-container-high group-hover:border-primary/20 transition-colors duration-500">
                            @if($member->photo)
                                <img src="{{ $member->photo }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-surface-container-high flex items-center justify-center">
                                    <span class="material-symbols-outlined text-on-surface-variant text-[28px] sm:text-[32px]">person</span>
                                </div>
                            @endif
                        </div>
                        <h3 class="font-headline text-[15px] sm:text-base md:text-lg font-bold text-on-surface mb-1">{{ $member->name }}</h3>
                        @if($member->role)
                            <p class="text-[12px] sm:text-[13px] text-primary font-semibold mb-1">{{ $member->role }}</p>
                        @endif
                        <p class="text-[11px] sm:text-[12px] text-on-surface-variant mb-2">{{ $stream->name }} Stream</p>
                        @if($member->bio)
                            <p class="text-[12px] sm:text-[13px] text-on-surface-variant leading-relaxed line-clamp-2">{{ $member->bio }}</p>
                        @endif
                        <div class="flex items-center gap-2 mt-4">
                            @if($member->email)
                                <a href="mailto:{{ $member->email }}" class="w-8 h-8 rounded-full bg-surface-container-high flex items-center justify-center hover:bg-primary hover:text-white text-on-surface-variant transition-all duration-300">
                                    <span class="material-symbols-outlined text-[14px]">mail</span>
                                </a>
                            @endif
                            @if($member->phone)
                                <a href="tel:{{ $member->phone }}" class="w-8 h-8 rounded-full bg-surface-container-high flex items-center justify-center hover:bg-primary hover:text-white text-on-surface-variant transition-all duration-300">
                                    <span class="material-symbols-outlined text-[14px]">phone</span>
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>

    {{-- Empty state --}}
    <div id="empty-state" class="hidden text-center py-16 sm:py-20">
        <span class="material-symbols-outlined text-outline text-[48px] sm:text-[56px] mb-4">group_off</span>
        <p class="font-headline text-[15px] sm:text-base font-bold text-on-surface-variant">No team members found in this stream.</p>
    </div>
</section>

@endsection

@push('scripts')
<style>
    .tab-btn { background-color: #f0f0f0; color: #555770; }
    .tab-btn.active { background-color: #DC143C; color: #ffffff; }
    .tab-btn:not(.active):hover { background-color: #e0e0e8; }
</style>
<script>
    function filterStream(slug) {
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        document.querySelector(`.tab-btn[data-tab="${slug}"]`).classList.add('active');

        const cards = document.querySelectorAll('.team-card');
        let visible = 0;
        cards.forEach(card => {
            if (slug === 'all' || card.dataset.stream === slug) {
                card.style.display = '';
                visible++;
            } else {
                card.style.display = 'none';
            }
        });

        document.getElementById('empty-state').classList.toggle('hidden', visible > 0);
    }
</script>
@endpush
