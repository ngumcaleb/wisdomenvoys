<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Vision;
class AboutController extends Controller
{
    public function index()
    {
        return view('about', [
            'settings' => \App\Models\Setting::instance(),
            'hero' => [
                'eyebrow' => 'DISCOVER US',
                'title' => 'Who We Are',
                'description' => 'Wisdom Envoys Ministry is a Prophetic and Apostolic Mandate, a New Creation Institution and a Non-Denominational Christian Organization created to engendering a Kingdom Army of Spirit-filled, thoroughly trained believers with a Passion to see God\'s Kingdom come.',
            ],
            'team_leader' => Leader::teamLeader()->first(),
            'leaders' => Leader::ordered()->get(),
            'visions' => Vision::ordered()->get(),
        ]);
    }
}
