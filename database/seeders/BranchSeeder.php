<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        Branch::create([
            'name' => 'Wisdom Envoys Cameroon',
            'description' => 'The headquarters of Wisdom Envoys Ministry, a vibrant community of spirit-filled believers gathered for weekly convergence, prayer, and apostolic impartation at Christ Gentle Whisper Ministry.',
            'location' => 'Mile 16, Cameroon',
            'button_text' => 'VISIT US',
            'button_url' => '#',
            'status' => true,
            'display_order' => 0,
        ]);

        Branch::create([
            'name' => 'Online Community',
            'description' => 'A digital convergence point for prayer gatherings, leadership trainings, and kingdom teachings. Connect with Wisdom Envoys from anywhere in the world.',
            'location' => 'Online',
            'button_text' => 'CONNECT',
            'button_url' => '#',
            'status' => true,
            'display_order' => 1,
        ]);
    }
}
