<?php

namespace Database\Seeders;

use App\Models\Vision;
use Illuminate\Database\Seeder;

class VisionSeeder extends Seeder
{
    public function run(): void
    {
        Vision::create([
            'title' => 'Vision',
            'icon' => 'auto_awesome',
            'description' => 'Revealing Christ as the Embodiment of God\'s Wisdom across spheres of influence. (Ephesians 3:9-11) Wisdom Envoys exists to reveal Jesus Christ as the ultimate expression of God\'s wisdom and to manifest this wisdom as a strategy for establishing God\'s Kingdom on earth.',
            'display_order' => 0,
        ]);

        Vision::create([
            'title' => 'Mission',
            'icon' => 'account_balance',
            'description' => 'To establish God\'s Kingdom on earth by raising righteous leaders: Kings, Priests, and Prophets. We develop leaders who reflect the character and wisdom of God, spark spiritual awakening through prayer and the work of the Holy Spirit, and create kingdom-based platforms that impact society.',
            'display_order' => 1,
        ]);
    }
}
