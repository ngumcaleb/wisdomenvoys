@extends('layouts.public')

@section('title', $service->title . ' - ' . ($settings->site_name ?? 'Wisdom Envoys Ministry'))

@section('content')

@if($service->type === 'weekly-convergence')
    {{-- ============================================ --}}
    {{-- WEEKLY CONVERGENCE LAYOUT --}}
    {{-- ============================================ --}}

    {{-- HERO --}}
    <section class="bg-white py-20 px-6">
        <div class="max-w-[1280px] mx-auto text-center">
            <span class="text-primary font-headline text-xs font-bold uppercase tracking-[0.1em] mb-4 block">WEEKLY SERVICES</span>
            <h1 class="font-headline text-[48px] md:text-[56px] font-extrabold mb-6 text-on-surface">{{ $service->title }}</h1>
            <div class="w-24 h-1 bg-primary mx-auto mb-8"></div>
            <p class="max-w-3xl mx-auto text-lg text-on-surface-variant leading-relaxed">
                {{ $service->meta['hero_description'] ?? $service->description }}
            </p>
        </div>
    </section>

    {{-- APOSTOLIC MANDATE --}}
    @if(!empty($service->meta['mandates']))
    <section class="py-24 px-6 bg-surface-container-low">
        <div class="max-w-[1280px] mx-auto">
            <div class="mb-16 text-center">
                <h2 class="font-headline text-[40px] leading-[1.2] font-bold text-on-surface">The Apostolic Mandate</h2>
                <p class="text-on-surface-variant mt-2">Equipping you for five-fold influence in the Kingdom</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($service->meta['mandates'] as $item)
                    <div class="bg-white p-8 rounded-xl shadow-[0px_4px_20px_rgba(0,0,0,0.05)] border border-surface-container-high hover:-translate-y-1 transition-transform duration-300">
                        <div class="text-primary mb-4">
                            <span class="material-symbols-outlined text-4xl">{{ $item['icon'] }}</span>
                        </div>
                        <h3 class="font-headline text-base font-semibold text-on-surface mb-3">{{ $item['title'] }}</h3>
                        <p class="text-on-surface-variant text-sm">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- LOCATIONS --}}
    @if(!empty($service->meta['locations']))
    <section class="py-24 px-6 bg-white">
        <div class="max-w-[1280px] mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
                <div class="max-w-2xl">
                    <h2 class="font-headline text-[40px] leading-[1.2] font-bold text-on-surface">Join Us This Sunday</h2>
                    <p class="text-on-surface-variant mt-2">Find a location near you or join our global online community for an encounter with the Word.</p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($service->meta['locations'] as $loc)
                    <div class="group border border-surface-container-high rounded-xl overflow-hidden hover:border-primary transition-colors">
                        <div class="h-48 overflow-hidden bg-surface-container relative">
                            <div class="absolute inset-0 bg-primary/10 group-hover:bg-primary/0 transition-colors"></div>
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary/20 text-[80px]">{{ ($loc['type'] ?? 'physical') === 'online' ? 'language' : 'location_on' }}</span>
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="font-headline text-[28px] leading-[1.3] font-bold text-on-surface mb-2">{{ $loc['name'] }}</h3>
                            <div class="flex items-start gap-2 text-on-surface-variant mb-4">
                                <span class="material-symbols-outlined text-primary">{{ ($loc['type'] ?? 'physical') === 'online' ? 'language' : 'location_on' }}</span>
                                <p class="text-sm">{{ $loc['address'] }}</p>
                            </div>
                            <div class="flex items-center gap-2 text-on-surface-variant mb-6">
                                <span class="material-symbols-outlined text-primary">schedule</span>
                                <p class="text-sm font-bold">{{ $loc['time'] }}</p>
                            </div>
                            <button class="w-full py-3 {{ ($loc['type'] ?? 'physical') === 'online' ? 'bg-primary text-white hover:bg-primary/90' : 'border border-primary text-primary hover:bg-primary hover:text-white' }} font-headline text-xs font-bold uppercase tracking-[0.1em] transition-all">
                                {{ ($loc['type'] ?? 'physical') === 'online' ? 'WATCH LIVE' : 'GET DIRECTIONS' }}
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- PRAYER / TESTIMONY FORM --}}
    <section class="py-24 px-6 bg-surface-container-low">
        <div class="max-w-[1280px] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="font-headline text-[40px] leading-[1.2] font-bold text-on-surface mb-6">Prayer Requests & Testimonies</h2>
                <p class="text-lg text-on-surface-variant mb-8">
                    We believe in the power of prayer and the strength of shared testimonies. Whether you are seeking a breakthrough or celebrating a miracle, we are here to stand with you.
                </p>
                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">volunteer_activism</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-on-surface">Intercessory Support</h4>
                            <p class="text-sm text-on-surface-variant">Our prayer department stands in the gap daily.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">record_voice_over</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-on-surface">Global Testimonies</h4>
                            <p class="text-sm text-on-surface-variant">Your victory can inspire faith in someone else.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white p-8 md:p-12 rounded-2xl shadow-xl border border-surface-container">
                <form class="space-y-6" onsubmit="event.preventDefault(); fetch('/contact', {method:'POST', headers:{'Content-Type':'application/json','X-CSRF-TOKEN':document.querySelector('meta[name=csrf-token]').content}, body:JSON.stringify({name:this.name.value, email:this.email.value, type:this.type.value, message:this.message.value})}).then(r=>r.json()).then(d=>{alert(d.message || 'Submitted successfully'); this.reset()})">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface-variant mb-2">FULL NAME</label>
                            <input name="name" class="w-full px-4 py-3 border border-surface-container-high rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all" type="text" required>
                        </div>
                        <div>
                            <label class="block font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface-variant mb-2">EMAIL ADDRESS</label>
                            <input name="email" class="w-full px-4 py-3 border border-surface-container-high rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all" type="email" required>
                        </div>
                    </div>
                    <div>
                        <label class="block font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface-variant mb-2">SUBMISSION TYPE</label>
                        <select name="type" class="w-full px-4 py-3 border border-surface-container-high rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all">
                            <option>Prayer Request</option>
                            <option>Testimony</option>
                            <option>Counseling</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface-variant mb-2">YOUR MESSAGE</label>
                        <textarea name="message" class="w-full px-4 py-3 border border-surface-container-high rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all" rows="4" required></textarea>
                    </div>
                    <button class="w-full bg-primary text-white font-headline text-xs font-bold uppercase tracking-[0.1em] py-4 rounded-full hover:bg-primary/90 transition-all active:scale-[0.98] shadow-lg shadow-primary/20" type="submit">SUBMIT TO THE MANDATE</button>
                </form>
            </div>
        </div>
    </section>

@elseif($service->type === 'the-life-community')
    {{-- ============================================ --}}
    {{-- THE LIFE COMMUNITY LAYOUT --}}
    {{-- ============================================ --}}

    {{-- HERO --}}
    <section class="relative min-h-[70vh] flex items-center overflow-hidden bg-on-secondary-fixed">
        <div class="absolute inset-0 bg-gradient-to-r from-on-secondary-fixed via-on-secondary-fixed/80 to-transparent z-10"></div>
        <div class="relative z-20 max-w-[1280px] mx-auto px-6 w-full">
            <div class="max-w-3xl">
                <span class="inline-block py-1 px-4 bg-primary/20 text-primary-fixed-dim border border-primary/30 font-headline text-xs font-bold uppercase tracking-[0.1em] rounded-full mb-6">{{ $service->meta['eyebrow'] ?? 'THE LIFE COMMUNITY' }}</span>
                <h1 class="font-headline text-[48px] md:text-[56px] font-extrabold text-white mb-8 tracking-tight">{{ $service->title }}</h1>
                <p class="text-lg text-white/80 max-w-2xl leading-relaxed">
                    {{ $service->meta['hero_description'] ?? $service->description }}
                </p>
                <div class="mt-10 flex flex-wrap gap-4">
                    <a class="bg-primary text-white px-8 py-4 font-headline text-xs font-bold uppercase tracking-[0.1em] rounded-full hover:bg-primary/90 transition-all flex items-center gap-2" href="#register">
                        GET STARTED <span class="material-symbols-outlined text-lg">arrow_forward</span>
                    </a>
                    <a class="bg-white/10 backdrop-blur-sm text-white border border-white/20 px-8 py-4 font-headline text-xs font-bold uppercase tracking-[0.1em] rounded-full hover:bg-white/20 transition-all" href="#about">
                        LEARN MORE
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ABOUT --}}
    <section class="py-24 max-w-[1280px] mx-auto px-6" id="about">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            <div class="lg:col-span-7">
                <h2 class="font-headline text-[40px] leading-[1.2] font-bold text-primary mb-8">{{ $service->meta['about_title'] ?? 'About' }}</h2>
                <div class="space-y-6 text-lg text-on-surface-variant">
                    @foreach($service->meta['about_paragraphs'] ?? [$service->description] as $p)
                        <p>{{ $p }}</p>
                    @endforeach
                    @if(!empty($service->meta['scripture_quote']))
                        <div class="bg-surface-container-low p-8 border-l-4 border-primary italic rounded-r-xl">
                            <span class="material-symbols-outlined text-primary text-4xl mb-4 block">format_quote</span>
                            <p class="font-headline text-[28px] leading-[1.3] font-bold text-on-surface mb-4">
                                "{{ $service->meta['scripture_quote'] }}"
                            </p>
                            <cite class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-primary not-italic">— {{ $service->meta['scripture_ref'] ?? '' }}</cite>
                        </div>
                    @endif
                </div>
            </div>
            <div class="lg:col-span-5 grid grid-cols-2 gap-4">
                <div class="space-y-4">
                    <div class="rounded-2xl overflow-hidden h-64 bg-surface-container shadow-sm">
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary/5 to-surface-container">
                            <span class="material-symbols-outlined text-primary/20 text-[60px]">groups</span>
                        </div>
                    </div>
                    <div class="rounded-2xl overflow-hidden h-80 bg-surface-container shadow-sm">
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary/5 to-surface-container">
                            <span class="material-symbols-outlined text-primary/20 text-[60px]">church</span>
                        </div>
                    </div>
                </div>
                <div class="space-y-4 pt-8">
                    <div class="rounded-2xl overflow-hidden h-80 bg-surface-container shadow-sm">
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary/5 to-surface-container">
                            <span class="material-symbols-outlined text-primary/20 text-[60px]">handshake</span>
                        </div>
                    </div>
                    <div class="rounded-2xl overflow-hidden h-64 bg-surface-container shadow-sm">
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary/5 to-surface-container">
                            <span class="material-symbols-outlined text-primary/20 text-[60px]">diversity_3</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- REGISTRATION --}}
    <section class="py-24 relative overflow-hidden" id="register">
        <div class="max-w-[1280px] mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">
                <div class="p-8 md:p-12 flex flex-col justify-center">
                    <h2 class="font-headline text-[28px] leading-[1.3] font-bold text-primary mb-4">Join Our Next Event</h2>
                    <p class="text-on-surface-variant mb-8">{{ $service->title }} Registration Portal. Secure your spot and join the family.</p>
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface-variant mb-2 block">FULL NAME</label>
                                <input class="w-full border-outline-variant rounded-lg p-3 focus:ring-primary focus:border-primary" placeholder="Enter your full name" type="text" required>
                            </div>
                            <div>
                                <label class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface-variant mb-2 block">GENDER</label>
                                <div class="flex gap-4">
                                    <label class="flex items-center gap-2 cursor-pointer group">
                                        <input class="text-primary focus:ring-primary" name="gender" type="radio" value="male">
                                        <span class="text-on-surface-variant group-hover:text-primary transition-colors">Male</span>
                                    </label>
                                    <label class="flex items-center gap-2 cursor-pointer group">
                                        <input class="text-primary focus:ring-primary" name="gender" type="radio" value="female">
                                        <span class="text-on-surface-variant group-hover:text-primary transition-colors">Female</span>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <label class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface-variant mb-2 block">HOW DID YOU HEAR ABOUT US?</label>
                                <select class="w-full border-outline-variant rounded-lg p-3 focus:ring-primary focus:border-primary">
                                    <option>Social Media</option>
                                    <option>Friend/Family</option>
                                    <option>Church Broadcast</option>
                                    <option>Website</option>
                                </select>
                            </div>
                        </div>
                        <button class="w-full bg-primary text-white py-4 rounded-full font-headline text-xs font-bold uppercase tracking-[0.1em] hover:bg-primary/90 transition-all shadow-lg active:scale-95 flex justify-center items-center gap-2" type="submit">
                            SUBMIT REGISTRATION <span class="material-symbols-outlined">send</span>
                        </button>
                    </form>
                </div>
                <div class="hidden md:block relative bg-on-secondary-fixed">
                    <div class="absolute inset-0 flex items-center justify-center p-12 text-center text-white bg-gradient-to-t from-primary/80 to-transparent">
                        <div>
                            <h3 class="font-headline text-[28px] leading-[1.3] font-bold mb-2">{{ $service->meta['cta_title'] ?? 'Engendering Atmosphere' }}</h3>
                            <p class="text-sm opacity-90">{{ $service->meta['cta_description'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@elseif($service->type === 'quarterly-congress')
    {{-- ============================================ --}}
    {{-- QUARTERLY CONGRESS LAYOUT --}}
    {{-- ============================================ --}}
    @php $congresses = $service->meta['congresses'] ?? []; @endphp

    {{-- HERO --}}
    <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden bg-primary text-white py-20 px-6">
        <div class="absolute inset-0 opacity-20 pointer-events-none">
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-primary via-primary-container to-transparent"></div>
        </div>
        <div class="relative z-10 max-w-[1280px] w-full text-center">
            <h1 class="font-headline text-[48px] md:text-[56px] font-extrabold mb-6 leading-tight">{{ $service->title }}</h1>
            <p class="text-lg max-w-3xl mx-auto opacity-90 mb-10">
                {{ $service->meta['hero_description'] ?? $service->description }}
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a class="bg-white text-primary font-headline text-xs font-bold uppercase tracking-[0.1em] px-10 py-4 rounded-full shadow-lg hover:shadow-xl transition-all" href="#register">Register Now</a>
                <a class="border-2 border-white text-white font-headline text-xs font-bold uppercase tracking-[0.1em] px-10 py-4 rounded-full hover:bg-white/10 transition-all" href="#details">Learn More</a>
            </div>
        </div>
    </section>

    {{-- CONGRESS CARDS --}}
    @if(count($congresses))
    <section class="py-24 px-6 max-w-[1280px] mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($congresses as $c)
                <div class="bg-surface-container-low p-8 border-l-4 border-primary rounded shadow-sm hover:-translate-y-1 transition-transform">
                    <h3 class="font-headline text-[28px] leading-[1.3] font-bold text-primary mb-2">{{ $c['name'] }}</h3>
                    <p class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface-variant mb-4">{{ $c['date'] }}</p>
                    <p class="text-on-surface-variant opacity-75">{{ $c['short_desc'] ?? '' }}</p>
                </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- CONGRESS DETAILS --}}
    @if(count($congresses))
    <section class="py-24 space-y-24" id="details">
        @foreach($congresses as $c)
            @if($loop->iteration === 2)
                <div class="bg-surface-container-low py-24">
                    <div class="max-w-[1280px] mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            @else
                <div class="max-w-[1280px] mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            @endif

                <div class="{{ $loop->iteration === 2 ? '' : 'order-2 md:order-1' }}">
                    <span class="text-primary font-bold text-[40px] leading-[1.2] opacity-20 block mb-2">{{ $c['number'] ?? $loop->iteration }}</span>
                    <h2 class="font-headline text-[40px] leading-[1.2] font-bold mb-6">{{ $c['full_title'] ?? $c['name'] }}</h2>
                    <p class="text-lg mb-6 text-on-surface-variant">{{ $c['full_desc'] ?? '' }}</p>

                    @if(!empty($c['features']))
                        <ul class="space-y-4 mb-8">
                            @foreach($c['features'] as $f)
                                <li class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
                                    <span class="text-on-surface-variant">{{ $f }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if(!empty($c['focus_areas']))
                        <div class="bg-white p-6 rounded shadow-sm border-t-2 border-primary">
                            <h4 class="font-headline text-base font-semibold text-on-surface mb-2">Key Focus Areas</h4>
                            <p class="text-on-surface-variant opacity-80">{{ $c['focus_areas'] }}</p>
                        </div>
                    @endif

                    @if(!empty($c['grid_items']))
                        <div class="grid grid-cols-2 gap-4">
                            @foreach($c['grid_items'] as $gi)
                                <div class="p-4 border border-outline-variant rounded">
                                    <span class="material-symbols-outlined text-primary mb-2">{{ $gi['icon'] }}</span>
                                    <h5 class="font-bold text-on-surface">{{ $gi['title'] }}</h5>
                                    <p class="text-sm text-on-surface-variant opacity-70">{{ $gi['desc'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="{{ $loop->iteration === 2 ? '' : 'order-1 md:order-2' }}">
                    <div class="rounded-xl overflow-hidden shadow-2xl transform {{ $loop->iteration === 2 ? '-rotate-1' : 'rotate-1' }}">
                        <div class="w-full h-80 bg-gradient-to-br from-primary/10 to-surface-container flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary/20 text-[100px]">{{ ['local_fire_department', 'school', 'volunteer_activism'][$loop->index] ?? 'church' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    @endif

    {{-- REGISTRATION --}}
    <section class="py-24 bg-on-secondary-fixed text-white overflow-hidden relative" id="register">
        <div class="max-w-[800px] mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h2 class="font-headline text-[40px] leading-[1.2] font-bold mb-4">Congress Registration Form</h2>
                <p class="opacity-70">Secure your place in the upcoming assembly of the Elect.</p>
            </div>
            <form class="space-y-8 bg-white/5 p-10 rounded-2xl backdrop-blur-md border border-white/10 shadow-2xl">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="font-headline text-xs font-bold uppercase tracking-[0.1em] opacity-70">Full Name</label>
                        <input class="w-full bg-transparent border-white/20 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-white px-4 py-3" placeholder="John Doe" type="text" required>
                    </div>
                    <div class="space-y-2">
                        <label class="font-headline text-xs font-bold uppercase tracking-[0.1em] opacity-70">Email Address</label>
                        <input class="w-full bg-transparent border-white/20 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-white px-4 py-3" placeholder="john@example.com" type="email" required>
                    </div>
                    <div class="space-y-2">
                        <label class="font-headline text-xs font-bold uppercase tracking-[0.1em] opacity-70">Phone Number</label>
                        <input class="w-full bg-transparent border-white/20 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-white px-4 py-3" placeholder="+237 ..." type="tel">
                    </div>
                    <div class="space-y-2">
                        <label class="font-headline text-xs font-bold uppercase tracking-[0.1em] opacity-70">Congress Selection</label>
                        <select class="w-full bg-neutral-900 border-white/20 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-white px-4 py-3">
                            <option>Select Congress</option>
                            @foreach($congresses as $c)
                                <option>{{ $c['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="font-headline text-xs font-bold uppercase tracking-[0.1em] opacity-70">Gender</label>
                        <select class="w-full bg-neutral-900 border-white/20 rounded-lg px-4 py-3">
                            <option>Male</option><option>Female</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="font-headline text-xs font-bold uppercase tracking-[0.1em] opacity-70">Marital Status</label>
                        <select class="w-full bg-neutral-900 border-white/20 rounded-lg px-4 py-3">
                            <option>Single</option><option>Married</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="font-headline text-xs font-bold uppercase tracking-[0.1em] opacity-70">Volunteer?</label>
                        <select class="w-full bg-neutral-900 border-white/20 rounded-lg px-4 py-3">
                            <option>No</option><option>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="font-headline text-xs font-bold uppercase tracking-[0.1em] opacity-70">Your Expectations</label>
                    <textarea class="w-full bg-transparent border-white/20 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-white px-4 py-3" placeholder="What do you hope to receive from this congress?" rows="3"></textarea>
                </div>
                <button class="w-full bg-primary py-4 rounded-full font-headline text-xs font-bold uppercase tracking-[0.1em] hover:bg-primary/90 transition-colors shadow-lg active:scale-95" type="submit">Complete Registration</button>
            </form>
        </div>
    </section>

@else
    {{-- ============================================ --}}
    {{-- DEFAULT LAYOUT --}}
    {{-- ============================================ --}}
    <section class="relative min-h-[400px] flex items-center overflow-hidden bg-on-secondary-fixed">
        <div class="max-w-[1280px] mx-auto px-6 relative z-10 py-20 text-center">
            <h1 class="font-headline text-[48px] md:text-[56px] font-extrabold text-white mb-6">{{ $service->title }}</h1>
            <p class="text-lg text-white/80 max-w-2xl leading-relaxed mx-auto">{{ $service->description }}</p>
        </div>
    </section>

    <section class="py-24 max-w-[1280px] mx-auto px-6">
        <div class="max-w-3xl mx-auto text-center">
            <p class="text-lg text-on-surface-variant leading-relaxed">{{ $service->description }}</p>
            @if($service->button_url && $service->button_url !== '#')
                <a class="inline-flex items-center gap-2 bg-primary text-white font-headline text-xs font-bold uppercase tracking-[0.1em] px-8 py-3 rounded-full mt-10 hover:bg-primary/90 transition-all" href="{{ $service->button_url }}" {{ str_starts_with($service->button_url, 'http') ? 'target="_blank"' : '' }}>
                    {{ $service->button_text }} <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            @endif
        </div>
    </section>
@endif

@endsection
