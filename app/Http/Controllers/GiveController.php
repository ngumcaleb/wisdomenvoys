<?php

namespace App\Http\Controllers;

use App\Models\Setting;

class GiveController extends Controller
{
    public function index()
    {
        return view('give', [
            'settings' => Setting::instance(),
        ]);
    }
}
