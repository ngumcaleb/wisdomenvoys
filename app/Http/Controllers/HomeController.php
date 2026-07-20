<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Leader;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Vision;

class HomeController extends Controller
{
    public function __invoke()
    {
        $settings = Setting::instance();
        $hero = [
            'title' => 'WISDOM ENVOYS MINISTRY',
            'subtitle' => 'Wisdom Envoys Ministry is a Prophetic and Apostolic Mandate, a New Creation Institution and a Non-Denominational Christian Organization created to engendering a Kingdom Army of Spirit-filled, thoroughly trained believers.',
            'eyebrow' => 'We Win, Influence, Establish',
            'button_one' => 'Discover Us',
            'button_one_url' => '/about',
            'button_two' => null,
            'button_two_url' => null,
        ];

        return view('home', [
            'settings' => $settings,
            'hero' => $hero,
            'services' => Service::active()->ordered()->get(),
            'team_leader' => Leader::teamLeader()->first(),
            'leaders' => Leader::ordered()->get(),
            'branches' => Branch::active()->ordered()->get(),
            'visions' => Vision::ordered()->get(),
        ]);
    }
}
