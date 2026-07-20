@extends('layouts.public')

@section('title', 'Partnership - ' . ($settings->site_name ?? 'Wisdom Envoys Ministry'))

@section('content')

{{-- HERO --}}
@php $heroBg = !empty($settings->hero_partnership_image) ? $settings->hero_partnership_image : '/images/download-hero-bg.jpg'; @endphp
<section class="relative min-h-[400px] sm:min-h-[460px] md:min-h-[540px] lg:min-h-[600px] flex items-end sm:items-center overflow-hidden hero-bg" style="background-image: url('{{ $heroBg }}')">
    <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-black/30"></div>
    <div class="absolute top-1/2 right-0 -translate-y-1/2 translate-x-1/4 w-[350px] sm:w-[450px] md:w-[550px] lg:w-[650px] h-[350px] sm:h-[450px] md:h-[550px] lg:h-[650px] border-[3px] border-white/10 rounded-full pointer-events-none"></div>
    <div class="absolute top-1/2 right-6 sm:right-8 -translate-y-1/2 w-[240px] sm:w-[320px] md:w-[400px] lg:w-[480px] h-[240px] sm:h-[320px] md:h-[400px] lg:h-[480px] border-[2px] border-white/[0.08] rounded-full pointer-events-none"></div>
    <div class="relative z-10 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10 w-full py-10 sm:py-14 md:py-20 lg:py-24">
        <div class="max-w-3xl">
            <span class="inline-block bg-primary text-white font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.14em] px-4 sm:px-5 py-2 sm:py-2.5 rounded-full shadow-lg shadow-primary/30 mb-4 sm:mb-5 md:mb-6">{{ $hero['eyebrow'] }}</span>
            <h1 class="font-headline text-[32px] sm:text-[40px] md:text-[52px] lg:text-[64px] font-extrabold tracking-tight text-white leading-[1.05] mb-3 sm:mb-4 md:mb-5">
                {{ $hero['title'] }}
            </h1>
            <p class="text-[14px] sm:text-sm md:text-base lg:text-lg max-w-xl text-white/60 leading-relaxed mb-6 sm:mb-7 md:mb-8">
                {{ $hero['description'] }}
            </p>
            <div class="flex flex-nowrap gap-2.5 sm:gap-3">
                <a href="#join-form" class="group inline-flex items-center gap-2 bg-primary text-white font-headline text-[10px] sm:text-xs md:text-sm font-bold uppercase tracking-[0.06em] px-5 sm:px-7 py-2.5 sm:py-3 rounded-full shadow-lg shadow-primary/30 hover:bg-primary-container hover:shadow-xl transition-all duration-300">
                    Become a Partner
                    <span class="material-symbols-outlined text-[14px] sm:text-[16px] md:text-[18px]">arrow_forward</span>
                </a>
                <a href="#impact" class="group inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white font-headline text-[10px] sm:text-xs md:text-sm font-bold uppercase tracking-[0.06em] px-5 sm:px-7 py-2.5 sm:py-3 rounded-full border border-white/20 hover:bg-white/20 transition-all duration-300">
                    <span class="material-symbols-outlined text-[14px] sm:text-[16px] md:text-[18px]">visibility</span>
                    Our Impact
                </a>
            </div>
        </div>
    </div>
</section>

{{-- IMPACT --}}
<section id="impact" class="py-14 sm:py-18 md:py-24 lg:py-28 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 sm:gap-5 md:gap-8 mb-10 sm:mb-12 md:mb-16 lg:mb-20">
        <div class="max-w-xl">
            <div class="inline-flex items-center gap-2 bg-surface-container-high rounded-full px-3.5 sm:px-4 py-1.5 sm:py-2 mb-4 sm:mb-5">
                <span class="w-1.5 h-1.5 bg-primary rounded-full"></span>
                <span class="font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.15em] text-on-surface-variant">OUR GLOBAL MISSION</span>
            </div>
            <h2 class="font-headline text-[22px] sm:text-[28px] md:text-[34px] lg:text-[40px] leading-[1.15] sm:leading-[1.2] font-bold text-on-surface">
                The Covenant Impact
            </h2>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-5 md:gap-6">
        @foreach($impact as $item)
            <div class="p-6 sm:p-7 md:p-8 bg-white rounded-[20px] sm:rounded-[24px] border border-outline-variant/50 shadow-[0_2px_16px_rgba(0,0,0,0.04)] flex flex-col items-center text-center group hover:shadow-[0_8px_40px_rgba(0,0,0,0.08)] hover:-translate-y-1 transition-all duration-500">
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-surface-container-high flex items-center justify-center mb-5 sm:mb-6 group-hover:bg-primary transition-colors duration-500">
                    <span class="material-symbols-outlined text-on-surface-variant text-[24px] sm:text-[26px] group-hover:text-white transition-colors duration-500">{{ $item['icon'] }}</span>
                </div>
                <h3 class="font-headline text-[15px] sm:text-base md:text-lg font-bold text-on-surface mb-3 sm:mb-4">{{ $item['title'] }}</h3>
                <p class="text-[13px] sm:text-sm text-on-surface-variant leading-relaxed">{{ $item['description'] }}</p>
            </div>
        @endforeach
    </div>
</section>

{{-- STATS --}}
<section class="py-14 sm:py-18 md:py-24 lg:py-28 bg-surface-container-low overflow-hidden">
    <div class="max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8 items-stretch">
            <div class="lg:col-span-7 bg-white p-8 sm:p-10 md:p-12 shadow-[0_2px_20px_rgba(0,0,0,0.04)] relative overflow-hidden flex flex-col justify-center rounded-[20px] sm:rounded-[24px] border border-outline-variant/50">
                <span class="material-symbols-outlined text-primary text-[40px] sm:text-[60px] absolute top-6 right-6 sm:top-8 sm:right-8">format_quote</span>
                <h2 class="font-headline text-[22px] sm:text-[28px] md:text-[34px] lg:text-[38px] leading-[1.15] sm:leading-[1.2] font-bold text-on-surface mb-4 sm:mb-5 md:mb-6">A New Creation Institution</h2>
                <p class="text-[14px] sm:text-sm md:text-base lg:text-lg text-on-surface-variant leading-relaxed italic">
                    "Wisdom Envoys Ministry is a Prophetic and Apostolic Mandate, a New Creation Institution and a Non-Denominational Christian Organization created to engendering a Kingdom Army of Spirit-filled, thoroughly trained believers with a Passion to see God's Kingdom come as agents of Transformation."
                </p>
            </div>
            <div class="lg:col-span-5 grid grid-rows-2 gap-4 sm:gap-5 md:gap-6">
                @foreach($stats as $stat)
                    <div class="p-8 sm:p-9 md:p-10 text-white flex flex-col justify-end rounded-[20px] sm:rounded-[24px] relative overflow-hidden {{ $loop->first ? 'bg-primary shadow-lg shadow-primary/15' : 'bg-on-secondary-fixed' }}">
                        <div class="absolute -top-6 -right-6 w-28 h-28 sm:w-32 sm:h-32 rounded-full border-[3px] border-white/20 pointer-events-none"></div>
                        <div class="absolute -bottom-4 -left-4 w-20 h-20 sm:w-24 sm:h-24 rounded-full border-[3px] border-white/15 pointer-events-none"></div>
                        <span class="font-headline text-[36px] sm:text-[42px] md:text-[48px] font-extrabold block mb-1 sm:mb-2 relative z-10">{{ $stat['value'] }}</span>
                        <p class="font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.1em] opacity-80 relative z-10">{{ $stat['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- FORM --}}
<section class="py-14 sm:py-18 md:py-24 lg:py-28 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10" id="join-form">
    <div class="flex flex-col lg:flex-row gap-10 sm:gap-12 md:gap-16">
        <div class="lg:w-1/2">
            <div class="inline-flex items-center gap-2 bg-primary rounded-full px-3.5 sm:px-4 py-1.5 sm:py-2 mb-4 sm:mb-5">
                <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
                <span class="font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.15em] text-white">JOIN US</span>
            </div>
            <h2 class="font-headline text-[24px] sm:text-[30px] md:text-[36px] lg:text-[40px] leading-[1.15] sm:leading-[1.2] font-bold text-on-surface mb-4 sm:mb-5 md:mb-6">Become a Covenant Partner</h2>
            <p class="text-[14px] sm:text-sm md:text-base lg:text-lg text-on-surface-variant mb-6 sm:mb-7 md:mb-8 leading-relaxed">Your monthly seed ensures the consistent proclamation of the gospel and the raising of kingdom ambassadors.</p>
            <ul class="space-y-4 sm:space-y-5">
                @foreach(['Access to exclusive partner-only webinars and spiritual resources.', 'Monthly prayer focus for your family and business.', 'First-hand updates on global outreach missions and school initiatives.'] as $benefit)
                    <li class="flex gap-3 sm:gap-4 items-start">
                        <span class="w-6 h-6 sm:w-7 sm:h-7 bg-primary rounded-full flex items-center justify-center shrink-0 mt-0.5">
                            <span class="material-symbols-outlined text-white text-[14px] sm:text-[16px]">check</span>
                        </span>
                        <span class="text-[13px] sm:text-sm md:text-base text-on-surface-variant leading-relaxed">{{ $benefit }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="lg:w-1/2">
            <form class="p-6 sm:p-8 md:p-10 bg-white border border-outline-variant/50 shadow-[0_4px_30px_rgba(0,0,0,0.06)] flex flex-col gap-5 sm:gap-6 rounded-[20px] sm:rounded-[24px]">
                <div>
                    <label class="font-headline text-[11px] sm:text-xs font-bold uppercase tracking-[0.1em] text-on-surface block mb-2">Full Name</label>
                    <input class="w-full border border-outline-variant/50 bg-surface-container-low px-4 sm:px-5 py-3 sm:py-3.5 text-[13px] sm:text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all rounded-xl" placeholder="Enter your name" type="text" required>
                </div>
                <div>
                    <label class="font-headline text-[11px] sm:text-xs font-bold uppercase tracking-[0.1em] text-on-surface block mb-2">Email Address</label>
                    <input class="w-full border border-outline-variant/50 bg-surface-container-low px-4 sm:px-5 py-3 sm:py-3.5 text-[13px] sm:text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all rounded-xl" placeholder="email@example.com" type="email" required>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
                    <div>
                        <label class="font-headline text-[11px] sm:text-xs font-bold uppercase tracking-[0.1em] text-on-surface block mb-2">Partner Type</label>
                        <select class="w-full border border-outline-variant/50 bg-surface-container-low px-4 sm:px-5 py-3 sm:py-3.5 text-[13px] sm:text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all appearance-none rounded-xl">
                            <option>Monthly Partner</option>
                            <option>Quarterly Partner</option>
                            <option>Annual Partner</option>
                        </select>
                    </div>
                    <div>
                        <label class="font-headline text-[11px] sm:text-xs font-bold uppercase tracking-[0.1em] text-on-surface block mb-2">Amount ($)</label>
                        <input class="w-full border border-outline-variant/50 bg-surface-container-low px-4 sm:px-5 py-3 sm:py-3.5 text-[13px] sm:text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all rounded-xl" placeholder="50.00" type="number" min="1">
                    </div>
                </div>
                <button class="bg-primary text-white py-3.5 sm:py-4 font-headline text-[11px] sm:text-xs font-bold uppercase tracking-[0.1em] hover:bg-primary-container transition-all shadow-lg shadow-primary/20 mt-2 rounded-full" type="submit">Commit to Partnership</button>
            </form>
        </div>
    </div>
</section>

{{-- MOBILE MONEY --}}
<section class="py-14 sm:py-18 md:py-24 lg:py-28 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10">
    <div class="text-center mb-10 sm:mb-12 md:mb-16">
        <div class="inline-flex items-center gap-2 bg-surface-container-high rounded-full px-3.5 sm:px-4 py-1.5 sm:py-2 mb-4 sm:mb-5">
            <span class="w-1.5 h-1.5 bg-primary rounded-full"></span>
            <span class="font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.15em] text-on-surface-variant">MOBILE MONEY</span>
        </div>
        <h2 class="font-headline text-[24px] sm:text-[30px] md:text-[36px] lg:text-[40px] leading-[1.15] sm:leading-[1.2] font-bold text-on-surface">Send Your Partnership</h2>
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

{{-- GIVE CTA --}}
<section class="py-14 sm:py-18 md:py-24 lg:py-28 bg-on-secondary-fixed text-white relative overflow-hidden">
    <div class="absolute top-0 left-0 w-64 h-64 bg-primary/10 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-48 h-48 bg-primary/10 rounded-full blur-[80px] pointer-events-none"></div>
    <div class="max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10 text-center relative z-10">
        <h2 class="font-headline text-[24px] sm:text-[30px] md:text-[36px] lg:text-[40px] leading-[1.15] sm:leading-[1.2] font-bold mb-4 sm:mb-5 md:mb-6">Support the Prophetic Mandate</h2>
        <p class="text-[14px] sm:text-sm md:text-base lg:text-lg text-white/60 max-w-2xl mx-auto mb-6 sm:mb-8 md:mb-10 leading-relaxed">Beyond partnership, you can give a one-time offering to support specific missions or upcoming camp meetings.</p>
        <a class="inline-flex items-center gap-2 bg-primary text-white py-3 sm:py-3.5 px-8 sm:px-10 font-headline text-[11px] sm:text-xs font-bold uppercase tracking-[0.08em] hover:bg-primary-container hover:shadow-lg hover:shadow-primary/30 transition-all duration-300 rounded-full" href="https://givings.thecovenantoflife.com" target="_blank">
            Give Now
            <span class="material-symbols-outlined text-[14px] sm:text-[16px]">arrow_forward</span>
        </a>
    </div>
</section>

@endsection
