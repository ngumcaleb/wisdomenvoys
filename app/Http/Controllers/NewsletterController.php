<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $newsletter = Newsletter::updateOrCreate(
            ['email' => $validated['email']],
            ['is_active' => true]
        );

        return response()->json([
            'message' => 'Thank you for subscribing!',
        ], 201);
    }
}
