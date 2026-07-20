@extends('layouts.public')

@section('title', 'Our Products - ' . ($settings->site_name ?? 'Wisdom Envoys Ministry'))

@section('content')

{{-- HERO --}}
<section class="relative py-24 md:py-32 overflow-hidden hero-bg bg-on-secondary-fixed" @if($settings->hero_products_image) style="background-image: url('{{ $settings->hero_products_image }}')" @endif>
    @if($settings->hero_products_image)
        <div class="absolute inset-0 bg-black/50"></div>
    @endif
    <div class="max-w-[1280px] mx-auto px-6 relative z-10 text-center">
        <span class="inline-block font-headline text-xs font-bold uppercase tracking-[0.2em] text-primary-fixed-dim mb-4">{{ $hero['eyebrow'] }}</span>
        <h1 class="font-headline text-[48px] md:text-[56px] font-extrabold text-white mb-6 uppercase">{{ $hero['title'] }}</h1>
        <div class="w-24 h-1 bg-primary mx-auto mb-8"></div>
        <p class="max-w-3xl mx-auto text-lg text-white/80 leading-relaxed">{{ $hero['description'] }}</p>
    </div>
</section>

{{-- PRODUCTS GRID --}}
<section class="py-32 max-w-[1280px] mx-auto px-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @forelse($products as $product)
            <div class="bg-white rounded-xl overflow-hidden card-shadow group flex flex-col h-full hover:-translate-y-2 transition-all duration-300">
                <div class="h-56 overflow-hidden relative">
                    @if($product->image)
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ $product->image }}" alt="{{ $product->title }}">
                    @else
                        <div class="w-full h-full bg-surface-container flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary/20 text-[60px]">{{ match($product->type) { 'book' => 'menu_book', 'manual' => 'description', 'training' => 'school', 'digital' => 'devices', default => 'inventory_2' } }}</span>
                        </div>
                    @endif
                    <div class="absolute top-4 left-4">
                        <span class="bg-primary-container text-white text-[12px] font-bold px-3 py-1 rounded uppercase tracking-wider">{{ $product->type }}</span>
                    </div>
                </div>
                <div class="p-8 flex flex-col flex-grow">
                    <h3 class="font-headline text-base font-semibold text-on-surface mb-3">{{ $product->title }}</h3>
                    <p class="text-sm text-on-surface-variant flex-grow mb-6 leading-relaxed">{{ Str::limit($product->description, 120) }}</p>
                    @if($product->button_url)
                        <a class="inline-flex items-center gap-2 bg-primary text-white font-headline text-xs font-bold uppercase tracking-[0.1em] px-6 py-2.5 rounded-full transition-colors hover:bg-primary-container" href="{{ $product->button_url }}" target="_blank">
                            {{ $product->button_text }}
                            <span class="material-symbols-outlined text-sm">open_in_new</span>
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-20">
                <span class="material-symbols-outlined text-primary/30 text-[80px]">inventory_2</span>
                <p class="text-on-surface-variant mt-4">No products available yet.</p>
            </div>
        @endforelse
    </div>
</section>

@endsection
