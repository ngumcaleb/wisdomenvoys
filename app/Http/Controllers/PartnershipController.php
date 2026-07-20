<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Setting;

class PartnershipController extends Controller
{
    public function index()
    {
        return view('partnership', [
            'settings' => Setting::instance(),
            'hero' => [
                'eyebrow' => 'THE APOSTOLIC MANDATE',
                'title' => 'Partner with Us',
                'description' => 'Become a vital part of a prophetic and apostolic mandate. Your partnership fuels our mission to engineer a Kingdom Army of spirit-filled believers across the globe.',
            ],
            'impact' => [
                ['icon' => 'public', 'title' => 'Global Outreach', 'description' => 'Funding evangelical missions and convergence centers in Lagos, Ogun, and beyond to spread the word of the Kingdom.'],
                ['icon' => 'school', 'title' => 'Leadership Training', 'description' => 'Supporting our MLTP programs to raise thoroughly trained believers as agents of transformation in every sector.'],
                ['icon' => 'menu_book', 'title' => 'Resource Distribution', 'description' => 'Providing free messages, manuals, and workbooks to those seeking spiritual growth through our digital platforms.'],
            ],
            'stats' => [
                ['value' => '10k+', 'label' => 'TRAINED LEADERS ANNUALLY'],
                ['value' => '50+', 'label' => 'GLOBAL MISSIONS SUPPORTED'],
            ],
            'branches' => Branch::active()->ordered()->get(),
        ]);
    }
}
