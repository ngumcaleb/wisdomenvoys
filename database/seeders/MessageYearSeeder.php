<?php

namespace Database\Seeders;

use App\Models\MessageYear;
use Illuminate\Database\Seeder;

class MessageYearSeeder extends Seeder
{
    public function run(): void
    {
        $years = [2025, 2024, 2023, 2022, 2021, 2020, 2019, 2018];

        foreach ($years as $year) {
            MessageYear::create([
                'year' => $year,
                'status' => true,
            ]);
        }
    }
}
