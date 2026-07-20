<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::create([
            'site_name' => 'Wisdom Envoys Ministry',
            'email' => 'admin@wisdomenvoys.org',
            'phone' => '+237 6 53 76 67 93',
            'address' => 'Christ Gentle Whisper Ministry, Opposite Bocom Filling Station, Mile 16, Cameroon',
            'facebook' => 'https://facebook.com/wisdomenvoys',
            'instagram' => 'https://instagram.com/wisdomenvoys',
            'youtube' => 'https://youtube.com/@wisdomenvoys',
            'tiktok' => 'https://tiktok.com/@wisdomenvoys',
            'copyright' => '© ' . date('Y') . ' Wisdom Envoys Ministry. All Rights Reserved.',
        ]);
    }
}
