<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Stream;

class TeamPageController extends Controller
{
    public function index()
    {
        return view('team', [
            'settings' => Setting::instance(),
            'streams' => Stream::active()
                ->with(['teamMembers' => fn ($q) => $q->where('status', true)])
                ->orderBy('name')
                ->get(),
        ]);
    }
}
