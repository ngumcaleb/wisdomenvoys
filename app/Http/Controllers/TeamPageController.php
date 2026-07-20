<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Stream;
use App\Models\TeamMember;

class TeamPageController extends Controller
{
    public function index()
    {
        return view('team', [
            'settings' => Setting::instance(),
            'founder' => TeamMember::active()->where('is_founder', true)->first(),
            'streams' => Stream::active()
                ->with(['teamMembers' => fn ($q) => $q->active()->orderBy('is_stream_lead', 'desc')->orderBy('name')])
                ->orderBy('name')
                ->get(),
        ]);
    }
}
