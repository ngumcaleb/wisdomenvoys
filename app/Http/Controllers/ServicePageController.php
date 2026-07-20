<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use App\Models\Service;
use App\Models\Setting;

class ServicePageController extends Controller
{
    public function index()
    {
        return view('services', [
            'settings' => Setting::instance(),
            'hero' => [
                'eyebrow' => 'WE WIN, INFLUENCE, ESTABLISH',
                'title' => 'Our Services',
                'description' => 'Wisdom Envoys Ministry is a Prophetic and Apostolic Mandate, a New Creation Institution created to engendering a Kingdom Army of Spirit-filled, thoroughly trained believers.',
            ],
            'services' => Service::active()->ordered()->get(),
            'team_leader' => Leader::teamLeader()->first(),
        ]);
    }

    public function show(Service $service)
    {
        return view('services.show', [
            'settings' => Setting::instance(),
            'service' => $service,
        ]);
    }
}
