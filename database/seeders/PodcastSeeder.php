<?php

namespace Database\Seeders;

use App\Models\Podcast;
use App\Models\Message;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PodcastSeeder extends Seeder
{
    public function run(): void
    {
        $featuredMessages = Message::where('featured', true)->get();

        $allMessages = Message::all();

        foreach ($allMessages as $message) {
            Podcast::create([
                'message_id' => $message->id,
                'audio' => 'https://pub-aa5be4a8c7f74e1b96ef629d14f27bb6.r2.dev/messages/' . Str::slug($message->title) . '.mp3',
                'spotify' => 'https://open.spotify.com/episode/' . Str::random(22),
                'apple' => 'https://podcasts.apple.com/episode/' . Str::random(10),
                'google' => 'https://podcasts.google.com/episode/' . Str::random(10),
            ]);
        }
    }
}
