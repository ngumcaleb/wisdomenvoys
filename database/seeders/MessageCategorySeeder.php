<?php

namespace Database\Seeders;

use App\Models\MessageCategory;
use Illuminate\Database\Seeder;

class MessageCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Teaching',
            'Series',
            'Preaching',
            'Worship',
            'Testimony',
            'Leadership',
        ];

        foreach ($categories as $name) {
            MessageCategory::create(['name' => $name]);
        }
    }
}
