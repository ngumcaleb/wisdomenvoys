@extends('layouts.public')

@section('title', 'Podcasts - ' . ($settings->site_name ?? 'Wisdom Envoys Ministry'))

@section('content')

{{-- HERO --}}
<section class="relative py-32 overflow-hidden hero-bg bg-on-secondary-fixed" @if($settings->hero_podcasts_image) style="background-image: url('{{ $settings->hero_podcasts_image }}')" @endif>
    @if($settings->hero_podcasts_image)
        <div class="absolute inset-0 bg-black/50"></div>
    @endif
    <div class="max-w-[1280px] mx-auto px-6 text-center relative z-10">
        <span class="inline-block px-4 py-1.5 bg-white/10 text-white font-headline text-xs font-bold uppercase tracking-[0.1em] rounded-full mb-6">{{ $hero['eyebrow'] }}</span>
        <h1 class="font-headline text-[48px] md:text-[56px] font-extrabold text-white mb-6 max-w-4xl mx-auto">
            The Voice of <span class="text-primary-fixed-dim">Life</span> Podcasts
        </h1>
        <p class="text-lg text-white/80 max-w-2xl mx-auto mb-12">{{ $hero['description'] }}</p>
    </div>
</section>

{{-- PODCASTS --}}
<section class="max-w-[1280px] mx-auto px-6 pb-32">
    @forelse($podcasts as $year => $items)
        <div class="mb-16">
            <h2 class="font-headline text-[28px] leading-[1.3] font-bold text-on-surface mb-8">{{ $year }}</h2>
            <div class="space-y-4">
                @foreach($items as $podcast)
                    <x-audio-player
                        src="{{ $podcast->audio }}"
                        :title="$podcast->message->title"
                        :speaker="$podcast->message->speaker ?? null"
                        :thumbnail="$podcast->message->thumbnail"
                    />
                @endforeach
            </div>
        </div>
    @empty
        <div class="text-center py-20">
            <span class="material-symbols-outlined text-on-surface-variant/70 text-[80px]">podcasts</span>
            <p class="text-on-surface-variant mt-4">No podcasts available yet.</p>
        </div>
    @endforelse
</section>

{{-- NEWSLETTER --}}
<section class="w-full py-32 bg-primary relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="max-w-[1280px] mx-auto px-6 relative z-10 text-center text-white">
        <h2 class="font-headline text-[40px] leading-[1.2] font-bold mb-6">Never Miss a Teaching</h2>
        <p class="text-lg opacity-90 max-w-xl mx-auto mb-10">Subscribe to our weekly audio newsletter and receive apostolic summaries and exclusive podcast clips directly in your inbox.</p>
        <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto" onsubmit="event.preventDefault(); fetch('/newsletter', {method:'POST', headers:{'Content-Type':'application/json','X-CSRF-TOKEN':document.querySelector('meta[name=csrf-token]').content}, body:JSON.stringify({email:this.email.value})}).then(r=>r.json()).then(d=>{alert(d.message); this.reset()})">
            <input name="email" class="flex-grow px-6 py-4 rounded-full bg-white/10 border border-white/20 text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-white/50" placeholder="Your email address" type="email" required>
            <button class="bg-white text-primary px-8 py-4 rounded-full font-headline text-xs font-bold uppercase tracking-[0.1em] hover:bg-surface-container-low transition-colors" type="submit">Subscribe</button>
        </form>
    </div>
</section>

@endsection
