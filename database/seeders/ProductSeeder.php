<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'title' => 'Wisdom Envoys Kingdom Manual',
            'description' => 'A comprehensive guide to understanding and living out the principles of the Wisdom Envoys mandate. Essential reading for every member and partner.',
            'type' => 'book',
            'button_text' => 'Get Product',
            'button_url' => '#',
            'status' => true,
            'display_order' => 0,
        ]);

        Product::create([
            'title' => 'Kingdom Governance Series',
            'description' => 'A digital resource series covering the foundational teachings on Kingdom governance, apostolic mandate, and societal transformation.',
            'type' => 'digital',
            'button_text' => 'Access Now',
            'button_url' => '#',
            'status' => true,
            'display_order' => 1,
        ]);

        Product::create([
            'title' => 'TIAG 2025 Conference Recordings',
            'description' => 'Complete audio and video recordings from the This Is Our Day Apologetic Gathering 2025, featuring all sessions and breakout teachings.',
            'type' => 'digital',
            'button_text' => 'Get Access',
            'button_url' => '#',
            'status' => true,
            'display_order' => 2,
        ]);

        Product::create([
            'title' => 'The Emergence of Kingdom Envoys Handbook',
            'description' => 'The official handbook for the annual Emergence gathering, containing teaching notes, reflection guides, and kingdom advancement strategies.',
            'type' => 'manual',
            'button_text' => 'Get Product',
            'button_url' => '#',
            'status' => true,
            'display_order' => 3,
        ]);
    }
}
