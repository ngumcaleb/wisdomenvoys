<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\Setting;

class PodcastPageController extends Controller
{
    public function index()
    {
        $podcasts = Podcast::with('message')
            ->get()
            ->groupBy(fn ($p) => $p->message->year->year ?? 'Unknown');

        return view('podcasts', [
            'settings' => Setting::instance(),
            'hero' => [
                'title' => 'The Voice of Life Podcasts',
                'description' => 'Deepen your spiritual walk with our curated collection of teachings, apostolic instructions, and prophetic encounters grouped by divine seasons.',
                'eyebrow' => 'Apostolic Audio Mandate',
            ],
            'podcasts' => $podcasts,
        ]);
    }
}
