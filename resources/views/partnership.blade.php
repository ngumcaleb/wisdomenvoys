@extends('layouts.public')

@section('title', 'Partnership - ' . ($settings->site_name ?? 'Wisdom Envoys Ministry'))

@section('content')

{{-- HERO --}}
<section class="relative min-h-[716px] flex items-center overflow-hidden hero-bg bg-on-secondary-fixed" @if($settings->hero_partnership_image) style="background-image: url('{{ $settings->hero_partnership_image }}')" @endif>
    @if($settings->hero_partnership_image)
        <div class="absolute inset-0 bg-black/50"></div>
    @endif
    <div class="relative z-10 max-w-[1280px] mx-auto px-6 w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="text-white">
            <span class="font-headline text-xs font-bold uppercase tracking-[0.2em] text-primary-fixed-dim mb-4 block">{{ $hero['eyebrow'] }}</span>
            <h1 class="font-headline text-[48px] md:text-[56px] font-extrabold mb-6 leading-none">{{ $hero['title'] }}</h1>
            <p class="text-lg text-white/80 mb-10 max-w-xl">{{ $hero['description'] }}</p>
            <div class="flex flex-wrap gap-4">
                <a href="#join-form" class="bg-white text-primary hover:bg-surface-dim font-headline text-xs font-bold uppercase tracking-[0.1em] py-4 px-10 rounded-full transition-all">BECOME A PARTNER</a>
                <a href="#" class="bg-white/10 border border-white text-white hover:bg-white/20 font-headline text-xs font-bold uppercase tracking-[0.1em] py-4 px-10 rounded-full transition-all">VIEW OUR IMPACT</a>
            </div>
        </div>
        <div class="hidden lg:flex justify-center">
            <div class="relative w-80 h-80">
                <div class="absolute inset-0 bg-white/10 rounded-full"></div>
                <div class="absolute inset-4 rounded-full border-4 border-white/20 bg-primary-container/30 flex items-center justify-center">
                    <span class="material-symbols-outlined text-white text-[120px]">handshake</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- IMPACT --}}
<section class="py-32 max-w-[1280px] mx-auto px-6">
    <div class="text-center mb-16">
        <span class="text-primary font-headline text-xs font-bold uppercase tracking-[0.1em]">OUR GLOBAL MISSION</span>
        <h2 class="font-headline text-[40px] leading-[1.2] font-bold mt-2">The Covenant Impact</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($impact as $item)
            <div class="p-8 bg-white border border-outline-variant/50 flex flex-col items-center text-center group hover:-translate-y-2 transition-transform duration-300 rounded-xl">
                <div class="w-16 h-16 rounded-full bg-primary-container flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-white text-3xl">{{ $item['icon'] }}</span>
                </div>
                <h3 class="font-headline text-base font-semibold mb-4">{{ $item['title'] }}</h3>
                <p class="text-sm text-on-surface-variant">{{ $item['description'] }}</p>
            </div>
        @endforeach
    </div>
</section>

{{-- STATS --}}
<section class="bg-surface-container-low py-32 overflow-hidden">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-stretch">
            <div class="md:col-span-7 bg-white p-12 shadow-sm relative overflow-hidden flex flex-col justify-center rounded-xl">
                <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-bl-full"></div>
                <h2 class="font-headline text-[40px] leading-[1.2] font-bold text-primary mb-6">A New Creation Institution</h2>
                <p class="text-lg text-on-surface leading-relaxed italic">
                    "Wisdom Envoys Ministry is a Prophetic and Apostolic Mandate, a New Creation Institution and a Non-Denominational Christian Organization created to engendering a Kingdom Army of Spirit-filled, thoroughly trained believers with a Passion to see God's Kingdom come as agents of Transformation."
                </p>
            </div>
            <div class="md:col-span-5 grid grid-rows-2 gap-8">
                @foreach($stats as $stat)
                    <div class="p-8 text-white flex flex-col justify-end rounded-xl {{ $loop->first ? 'bg-primary' : 'bg-on-secondary-fixed' }}">
                        <span class="font-headline text-[40px] font-extrabold block mb-2">{{ $stat['value'] }}</span>
                        <p class="font-headline text-xs font-bold uppercase tracking-[0.1em] opacity-80">{{ $stat['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- PARTNERSHIP FORM --}}
<section class="py-32 max-w-[1280px] mx-auto px-6" id="join-form">
    <div class="flex flex-col lg:flex-row gap-16">
        <div class="lg:w-1/2">
            <h2 class="font-headline text-[40px] leading-[1.2] font-bold mb-6">Become a Covenant Partner</h2>
            <p class="text-lg text-on-surface-variant mb-8">Your monthly seed ensures the consistent proclamation of the gospel and the raising of kingdom ambassadors.</p>
            <ul class="space-y-6">
                @foreach(['Access to exclusive partner-only webinars and spiritual resources.', 'Monthly prayer focus for your family and business.', 'First-hand updates on global outreach missions and school initiatives.'] as $benefit)
                    <li class="flex gap-4">
                        <span class="material-symbols-outlined text-primary">check_circle</span>
                        <span class="text-base">{{ $benefit }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="lg:w-1/2">
            <form class="p-10 bg-white border border-outline-variant/50 shadow-lg flex flex-col gap-6 rounded-xl">
                <div>
                    <label class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface block mb-2">Full Name</label>
                    <input class="w-full border-outline border bg-surface p-4 focus:ring-2 focus:ring-primary outline-none rounded" placeholder="Enter your name" type="text" required>
                </div>
                <div>
                    <label class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface block mb-2">Email Address</label>
                    <input class="w-full border-outline border bg-surface p-4 focus:ring-2 focus:ring-primary outline-none rounded" placeholder="email@example.com" type="email" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface block mb-2">Partner Type</label>
                        <select class="w-full border-outline border bg-surface p-4 focus:ring-2 focus:ring-primary outline-none appearance-none rounded">
                            <option>Monthly Partner</option>
                            <option>Quarterly Partner</option>
                            <option>Annual Partner</option>
                        </select>
                    </div>
                    <div>
                        <label class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface block mb-2">Amount ($)</label>
                        <input class="w-full border-outline border bg-surface p-4 focus:ring-2 focus:ring-primary outline-none rounded" placeholder="50.00" type="number" min="1">
                    </div>
                </div>
                <button class="bg-primary text-white py-5 font-headline text-xs font-bold uppercase tracking-[0.1em] hover:bg-primary/90 transition-all shadow-md mt-4 rounded-full" type="submit">COMMIT TO PARTNERSHIP</button>
            </form>
        </div>
    </div>
</section>

{{-- GIVE CTA --}}
<section class="py-32 bg-on-secondary-fixed text-white relative overflow-hidden">
    <div class="max-w-[1280px] mx-auto px-6 text-center relative z-10">
        <h2 class="font-headline text-[40px] leading-[1.2] font-bold mb-6">Support the Prophetic Mandate</h2>
        <p class="text-lg text-primary-fixed max-w-2xl mx-auto mb-10">Beyond partnership, you can give a one-time offering to support specific missions or upcoming camp meetings.</p>
        <a class="bg-primary-container text-white py-4 px-12 font-headline text-xs font-bold uppercase tracking-[0.1em] hover:bg-white hover:text-primary transition-all duration-300 inline-block rounded-full" href="https://givings.thecovenantoflife.com">GIVE NOW</a>
    </div>
</section>

@endsection
