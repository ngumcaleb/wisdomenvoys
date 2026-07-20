<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Message;
use App\Models\Newsletter;
use App\Models\Setting;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'messages' => Message::count(),
            'contacts_unread' => Contact::unread()->count(),
            'newsletter_subscribers' => Newsletter::where('is_active', true)->count(),
            'settings_complete' => (bool) Setting::instance()->logo,
        ];

        return response()->json([
            'message' => 'Admin Dashboard',
            'stats' => $stats,
        ]);
    }
}
