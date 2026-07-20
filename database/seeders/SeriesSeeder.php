<?php

namespace Database\Seeders;

use App\Models\Series;
use Illuminate\Database\Seeder;

class SeriesSeeder extends Seeder
{
    public function run(): void
    {
        $series = [
            'This Is Our Day — TIAG 2025',
            'Dimensional Realities',
            'The Administrative Dimension of the Believer',
            'The Theology of Work',
            'The Consecrated Life',
            'Foundational Truths of the Mandate',
            'Strategic Intercession for Nations',
            'Kingdom Governance',
            'Marketplace Expressions',
            'The Covenant Wealth',
        ];

        foreach ($series as $title) {
            Series::create(['title' => $title]);
        }
    }
}
