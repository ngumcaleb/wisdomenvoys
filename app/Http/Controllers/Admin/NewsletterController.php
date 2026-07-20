<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\JsonResponse;

class NewsletterController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Newsletter::latest()->get());
    }

    public function destroy(Newsletter $newsletter): JsonResponse
    {
        $newsletter->update(['is_active' => false]);

        return response()->json([
            'message' => 'Subscriber removed successfully.',
        ]);
    }
}
