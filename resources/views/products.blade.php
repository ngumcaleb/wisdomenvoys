@extends('layouts.public')

@section('title', 'Our Products - ' . ($settings->site_name ?? 'Wisdom Envoys Ministry'))

@section('content')

{{-- HERO --}}
@php $heroBg = !empty($settings->hero_products_image) ? $settings->hero_products_image : '/images/download-hero-bg.jpg'; @endphp
<section class="relative min-h-[320px] sm:min-h-[360px] md:min-h-[420px] lg:min-h-[460px] flex items-end sm:items-end overflow-hidden hero-bg" style="background-image: url('{{ $heroBg }}')">
    <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-black/30"></div>
    <div class="relative z-10 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10 w-full py-10 sm:py-12 md:py-16 lg:py-20">
        <div class="max-w-2xl">
            <span class="inline-block bg-primary text-white font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.14em] px-4 sm:px-5 py-2 sm:py-2.5 rounded-full shadow-lg shadow-primary/30 mb-4 sm:mb-5 md:mb-6">{{ $hero['eyebrow'] }}</span>
            <h1 class="font-headline text-[32px] sm:text-[40px] md:text-[52px] lg:text-[60px] font-extrabold tracking-tight text-white leading-[1.05] mb-3 sm:mb-4">
                {{ $hero['title'] }}
            </h1>
            <p class="text-[14px] sm:text-sm md:text-base lg:text-lg max-w-xl text-white/60 leading-relaxed mb-6 sm:mb-7 md:mb-8">
                {{ $hero['description'] }}
            </p>
            <a href="#products" class="group inline-flex items-center gap-2 bg-primary text-white font-headline text-[11px] sm:text-xs md:text-sm font-bold uppercase tracking-[0.06em] px-5 sm:px-7 py-2.5 sm:py-3 rounded-full shadow-lg shadow-primary/30 hover:bg-primary-container hover:shadow-xl transition-all duration-300">
                <span class="material-symbols-outlined text-[16px] sm:text-[18px]">arrow_downward</span>
                Browse Products
            </a>
        </div>
    </div>
</section>

{{-- PRODUCTS --}}
<section id="products" class="py-14 sm:py-18 md:py-24 lg:py-28 max-w-[1280px] mx-auto px-5 sm:px-8 md:px-10">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 sm:gap-5 md:gap-8 mb-10 sm:mb-12 md:mb-16 lg:mb-20">
        <div class="max-w-xl">
            <div class="inline-flex items-center gap-2 bg-surface-container rounded-full px-3.5 sm:px-4 py-1.5 sm:py-2 mb-4 sm:mb-5">
                <span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
                <span class="font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.15em] text-primary">KINGDOM RESOURCES</span>
            </div>
            <h2 class="font-headline text-[22px] sm:text-[28px] md:text-[34px] lg:text-[40px] leading-[1.15] sm:leading-[1.2] font-bold text-on-surface">
                Books, Manuals &<br class="hidden sm:block"> Training Materials
            </h2>
        </div>
        <p class="text-[13px] sm:text-sm md:text-base text-on-surface-variant leading-relaxed max-w-md md:text-right">
            Resources to equip you for the mandate.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 md:gap-6">
        @forelse($products as $product)
            <div class="bg-white rounded-[20px] sm:rounded-[24px] overflow-hidden shadow-[0_2px_16px_rgba(0,0,0,0.05)] hover:shadow-[0_6px_30px_rgba(0,0,0,0.09)] transition-all duration-500 border border-outline-variant/50 group flex flex-col h-full hover:-translate-y-1">
                <div class="aspect-[4/3] sm:aspect-square relative overflow-hidden">
                    @if($product->image)
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $product->image }}" alt="{{ $product->title }}">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-primary/5 via-surface-container to-primary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-on-surface-variant/40 text-[50px] sm:text-[60px]">{{ match($product->type) { 'book' => 'menu_book', 'manual' => 'description', 'training' => 'school', 'digital' => 'devices', default => 'inventory_2' } }}</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>
                    <div class="absolute top-3 left-3 sm:top-4 sm:left-4">
                        <span class="bg-primary text-white text-[10px] sm:text-[11px] font-bold px-2.5 sm:px-3 py-1 sm:py-1.5 rounded-full uppercase tracking-wider">{{ $product->type }}</span>
                    </div>
                </div>
                <div class="p-4 sm:p-5 md:p-6 flex flex-col flex-grow">
                    <h3 class="font-headline text-[14px] sm:text-[15px] md:text-base font-bold text-on-surface mb-2 sm:mb-3 leading-snug">{{ $product->title }}</h3>
                    <p class="text-[12px] sm:text-[13px] md:text-sm text-on-surface-variant flex-grow mb-4 sm:mb-5 leading-relaxed line-clamp-3">{{ $product->description }}</p>
                    @if($product->button_url)
                        <a class="inline-flex items-center gap-1.5 bg-primary text-white font-headline text-[10px] sm:text-[11px] md:text-xs font-bold uppercase tracking-[0.08em] px-4 sm:px-5 py-2 sm:py-2.5 rounded-full transition-all duration-300 hover:bg-primary-container hover:shadow-md hover:shadow-primary/20 w-fit" href="{{ $product->button_url }}" target="_blank">
                            {{ $product->button_text }}
                            <span class="material-symbols-outlined text-[13px] sm:text-[14px]">open_in_new</span>
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-16 sm:py-20">
                <span class="material-symbols-outlined text-on-surface-variant/50 text-[60px] sm:text-[80px]">inventory_2</span>
                <p class="text-[13px] sm:text-sm md:text-base text-on-surface-variant mt-3 sm:mt-4">No products available yet.</p>
            </div>
        @endforelse
    </div>
</section>

@endsection
