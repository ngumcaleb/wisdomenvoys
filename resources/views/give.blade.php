@extends('layouts.public')

@section('title', 'Give - ' . ($settings->site_name ?? 'Wisdom Envoys Ministry'))

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
            <span class="inline-block bg-primary text-white font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.14em] px-4 sm:px-5 py-2 sm:py-2.5 rounded-full shadow-lg shadow-primary/30 mb-4 sm:mb-5 md:mb-6">THE APOSTOLIC MANDATE</span>
            <h1 class="font-headline text-[32px] sm:text-[40px] md:text-[52px] lg:text-[64px] font-extrabold tracking-tight text-white leading-[1.05] mb-3 sm:mb-4 md:mb-5">
                Give to Us
            </h1>
            <p class="text-[14px] sm:text-sm md:text-base lg:text-lg max-w-xl text-white/60 leading-relaxed mb-6 sm:mb-7 md:mb-8">
                Your generous giving empowers us to raise kingdom ambassadors, fund global missions, and provide free spiritual resources to those who seek them.
            </p>
            <div class="flex flex-nowrap gap-2.5 sm:gap-3">
                <a href="#online-giving" class="group inline-flex items-center gap-2 bg-primary text-white font-headline text-[10px] sm:text-xs md:text-sm font-bold uppercase tracking-[0.06em] px-5 sm:px-7 py-2.5 sm:py-3 rounded-full shadow-lg shadow-primary/30 hover:bg-primary-container hover:shadow-xl transition-all duration-300">
                    <span class="material-symbols-outlined text-[14px] sm:text-[16px] md:text-[18px]">volunteer_activism</span>
                    Give Now
                </a>
                <a href="#mobile-money" class="group inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white font-headline text-[10px] sm:text-xs md:text-sm font-bold uppercase tracking-[0.06em] px-5 sm:px-7 py-2.5 sm:py-3 rounded-full border border-white/20 hover:bg-white/20 transition-all duration-300">
                    <span class="material-symbols-outlined text-[14px] sm:text-[16px] md:text-[18px]">smartphone</span>
                    Mobile Money
                </a>
            </div>
        </div>
    </div>
</section>

{{-- WHY GIVE --}}
<section class="py-14 sm:py-18 md:py-24 lg:py-28 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10">
    <div class="text-center mb-10 sm:mb-12 md:mb-16">
        <div class="inline-flex items-center gap-2 bg-surface-container rounded-full px-3.5 sm:px-4 py-1.5 sm:py-2 mb-4 sm:mb-5">
            <span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
            <span class="font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.15em] text-primary">WHY GIVE</span>
        </div>
        <h2 class="font-headline text-[22px] sm:text-[28px] md:text-[34px] lg:text-[40px] leading-[1.15] sm:leading-[1.2] font-bold text-on-surface">Your Giving Makes an Impact</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-5 md:gap-6">
        <div class="p-6 sm:p-7 md:p-8 bg-white rounded-[20px] sm:rounded-[24px] border border-outline-variant/50 shadow-[0_2px_16px_rgba(0,0,0,0.04)] flex flex-col items-center text-center group hover:shadow-[0_8px_40px_rgba(0,0,0,0.08)] hover:-translate-y-1 transition-all duration-500">
            <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-surface-container-high flex items-center justify-center mb-5 sm:mb-6 group-hover:bg-primary transition-colors duration-500">
                <span class="material-symbols-outlined text-on-surface-variant text-[24px] sm:text-[26px] group-hover:text-white transition-colors duration-500">public</span>
            </div>
            <h3 class="font-headline text-[15px] sm:text-base md:text-lg font-bold text-on-surface mb-3 sm:mb-4">Global Missions</h3>
            <p class="text-[13px] sm:text-sm text-on-surface-variant leading-relaxed">Fund evangelical missions and convergence centers across nations to spread the word of the Kingdom.</p>
        </div>
        <div class="p-6 sm:p-7 md:p-8 bg-white rounded-[20px] sm:rounded-[24px] border border-outline-variant/50 shadow-[0_2px_16px_rgba(0,0,0,0.04)] flex flex-col items-center text-center group hover:shadow-[0_8px_40px_rgba(0,0,0,0.08)] hover:-translate-y-1 transition-all duration-500">
            <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-surface-container-high flex items-center justify-center mb-5 sm:mb-6 group-hover:bg-primary transition-colors duration-500">
                <span class="material-symbols-outlined text-on-surface-variant text-[24px] sm:text-[26px] group-hover:text-white transition-colors duration-500">school</span>
            </div>
            <h3 class="font-headline text-[15px] sm:text-base md:text-lg font-bold text-on-surface mb-3 sm:mb-4">Leadership Training</h3>
            <p class="text-[13px] sm:text-sm text-on-surface-variant leading-relaxed">Support our MLTP programs to raise thoroughly trained believers as agents of transformation in every sector.</p>
        </div>
        <div class="p-6 sm:p-7 md:p-8 bg-white rounded-[20px] sm:rounded-[24px] border border-outline-variant/50 shadow-[0_2px_16px_rgba(0,0,0,0.04)] flex flex-col items-center text-center group hover:shadow-[0_8px_40px_rgba(0,0,0,0.08)] hover:-translate-y-1 transition-all duration-500">
            <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-surface-container-high flex items-center justify-center mb-5 sm:mb-6 group-hover:bg-primary transition-colors duration-500">
                <span class="material-symbols-outlined text-on-surface-variant text-[24px] sm:text-[26px] group-hover:text-white transition-colors duration-500">menu_book</span>
            </div>
            <h3 class="font-headline text-[15px] sm:text-base md:text-lg font-bold text-on-surface mb-3 sm:mb-4">Free Resources</h3>
            <p class="text-[13px] sm:text-sm text-on-surface-variant leading-relaxed">Provide free messages, manuals, and workbooks to those seeking spiritual growth through our digital platforms.</p>
        </div>
    </div>
</section>

{{-- ONLINE GIVING --}}
<section id="online-giving" class="py-14 sm:py-18 md:py-24 lg:py-28 bg-surface-container-low">
    <div class="max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10 text-center">
        <div class="inline-flex items-center gap-2 bg-primary rounded-full px-3.5 sm:px-4 py-1.5 sm:py-2 mb-4 sm:mb-5">
            <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
            <span class="font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.15em] text-white">ONLINE GIVING</span>
        </div>
        <h2 class="font-headline text-[22px] sm:text-[28px] md:text-[34px] lg:text-[40px] leading-[1.15] sm:leading-[1.2] font-bold text-on-surface mb-4 sm:mb-5 md:mb-6">Give Securely Online</h2>
        <p class="text-[14px] sm:text-sm md:text-base lg:text-lg text-on-surface-variant max-w-2xl mx-auto mb-8 sm:mb-10 md:mb-12 leading-relaxed">
            Use our secure online giving portal for one-time offerings or recurring gifts. Your generosity fuels the prophetic mandate.
        </p>
        <div class="bg-white p-8 sm:p-10 md:p-12 rounded-[20px] sm:rounded-[24px] border border-outline-variant/50 shadow-[0_2px_20px_rgba(0,0,0,0.06)] max-w-lg mx-auto flex flex-col items-center">
            <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-primary/10 flex items-center justify-center mb-5 sm:mb-6">
                <span class="material-symbols-outlined text-primary text-[36px] sm:text-[42px]">volunteer_activism</span>
            </div>
            <h3 class="font-headline text-[17px] sm:text-lg md:text-xl font-bold text-on-surface mb-2 sm:mb-3">Ready to Give?</h3>
            <p class="text-[13px] sm:text-sm text-on-surface-variant mb-6 sm:mb-7 leading-relaxed">Click below to open our secure giving portal.</p>
            <a href="https://givings.thecovenantoflife.com" target="_blank" class="group inline-flex items-center gap-2 bg-primary text-white font-headline text-[11px] sm:text-xs md:text-sm font-bold uppercase tracking-[0.08em] px-8 sm:px-10 py-3 sm:py-3.5 rounded-full shadow-lg shadow-primary/30 hover:bg-primary-container hover:shadow-xl transition-all duration-300">
                Give Now
                <span class="material-symbols-outlined text-[14px] sm:text-[16px] transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
            </a>
        </div>
    </div>
</section>

{{-- MOBILE MONEY --}}
<section id="mobile-money" class="py-14 sm:py-18 md:py-24 lg:py-28 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10">
    <div class="text-center mb-10 sm:mb-12 md:mb-16">
        <div class="inline-flex items-center gap-2 bg-surface-container-high rounded-full px-3.5 sm:px-4 py-1.5 sm:py-2 mb-4 sm:mb-5">
            <span class="w-1.5 h-1.5 bg-primary rounded-full"></span>
            <span class="font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.15em] text-on-surface-variant">MOBILE MONEY</span>
        </div>
        <h2 class="font-headline text-[22px] sm:text-[28px] md:text-[34px] lg:text-[40px] leading-[1.15] sm:leading-[1.2] font-bold text-on-surface">Give via Mobile Money</h2>
        <p class="text-[14px] sm:text-sm md:text-base lg:text-lg text-on-surface-variant max-w-2xl mx-auto mt-3 sm:mt-4 leading-relaxed">Send your offering directly to our mobile money accounts.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-6 max-w-2xl mx-auto">
        {{-- MTN --}}
        <div class="bg-white rounded-[20px] sm:rounded-[24px] border border-outline-variant/50 shadow-[0_2px_16px_rgba(0,0,0,0.04)] p-6 sm:p-8 flex flex-col items-center text-center hover:shadow-[0_8px_40px_rgba(0,0,0,0.08)] hover:-translate-y-1 transition-all duration-500">
            <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#FFCC00] flex items-center justify-center mb-4 sm:mb-5 shadow-lg shadow-[#FFCC00]/20">
                <span class="font-headline text-[#000000] text-[18px] sm:text-[20px] font-extrabold">MTN</span>
            </div>
            <h3 class="font-headline text-[15px] sm:text-base md:text-lg font-bold text-on-surface mb-1">MTN Mobile Money</h3>
            <p class="text-[13px] sm:text-sm text-on-surface-variant mb-4">MoMo</p>
            <div class="bg-surface-container-low rounded-xl px-5 py-3 w-full">
                <p class="font-headline text-[18px] sm:text-[20px] md:text-[22px] font-extrabold text-on-surface tracking-wide">+237 653 766 793</p>
            </div>
            <p class="text-[11px] sm:text-[12px] text-on-surface-variant mt-3">Name: <span class="font-semibold text-on-surface">Wisdom Envoys Ministry</span></p>
        </div>
        {{-- Orange --}}
        <div class="bg-white rounded-[20px] sm:rounded-[24px] border border-outline-variant/50 shadow-[0_2px_16px_rgba(0,0,0,0.04)] p-6 sm:p-8 flex flex-col items-center text-center hover:shadow-[0_8px_40px_rgba(0,0,0,0.08)] hover:-translate-y-1 transition-all duration-500">
            <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#FF6600] flex items-center justify-center mb-4 sm:mb-5 shadow-lg shadow-[#FF6600]/20">
                <span class="material-symbols-outlined text-white text-[28px] sm:text-[32px]">smartphone</span>
            </div>
            <h3 class="font-headline text-[15px] sm:text-base md:text-lg font-bold text-on-surface mb-1">Orange Money</h3>
            <p class="text-[13px] sm:text-sm text-on-surface-variant mb-4">OM Money</p>
            <div class="bg-surface-container-low rounded-xl px-5 py-3 w-full">
                <p class="font-headline text-[18px] sm:text-[20px] md:text-[22px] font-extrabold text-on-surface tracking-wide">+237 655 123 456</p>
            </div>
            <p class="text-[11px] sm:text-[12px] text-on-surface-variant mt-3">Name: <span class="font-semibold text-on-surface">Wisdom Envoys Ministry</span></p>
        </div>
    </div>
</section>

{{-- CLOSING CTA --}}
<section class="py-14 sm:py-18 md:py-24 lg:py-28 bg-on-secondary-fixed text-white relative overflow-hidden">
    <div class="absolute top-0 left-0 w-64 h-64 bg-primary/10 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-48 h-48 bg-primary/10 rounded-full blur-[80px] pointer-events-none"></div>
    <div class="max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10 text-center relative z-10">
        <h2 class="font-headline text-[24px] sm:text-[30px] md:text-[36px] lg:text-[40px] leading-[1.15] sm:leading-[1.2] font-bold mb-4 sm:mb-5 md:mb-6">Every Seed Counts</h2>
        <p class="text-[14px] sm:text-sm md:text-base lg:text-lg text-white/60 max-w-2xl mx-auto mb-6 sm:mb-8 md:mb-10 leading-relaxed">Whether a one-time offering or a recurring gift, your generosity sustains the mission of raising kingdom ambassadors across the globe.</p>
        <a class="inline-flex items-center gap-2 bg-primary text-white py-3 sm:py-3.5 px-8 sm:px-10 font-headline text-[11px] sm:text-xs font-bold uppercase tracking-[0.08em] hover:bg-primary-container hover:shadow-lg hover:shadow-primary/30 transition-all duration-300 rounded-full" href="https://givings.thecovenantoflife.com" target="_blank">
            Give Now
            <span class="material-symbols-outlined text-[14px] sm:text-[16px]">arrow_forward</span>
        </a>
    </div>
</section>

@endsection
