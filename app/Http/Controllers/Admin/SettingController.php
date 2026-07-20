<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Setting::instance());
    }

    public function update(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'site_name' => 'sometimes|string|max:255',
            'logo' => 'sometimes|nullable|string|max:255',
            'favicon' => 'sometimes|nullable|string|max:255',
            'email' => 'sometimes|nullable|email|max:255',
            'phone' => 'sometimes|nullable|string|max:255',
            'address' => 'sometimes|nullable|string',
            'facebook' => 'sometimes|nullable|url|max:255',
            'instagram' => 'sometimes|nullable|url|max:255',
            'youtube' => 'sometimes|nullable|url|max:255',
            'tiktok' => 'sometimes|nullable|url|max:255',
            'linkedin' => 'sometimes|nullable|url|max:255',
            'spotify' => 'sometimes|nullable|url|max:255',
            'copyright' => 'sometimes|nullable|string|max:255',
            'hero_home_image' => 'sometimes|nullable|string|max:255',
            'hero_about_image' => 'sometimes|nullable|string|max:255',
            'hero_download_image' => 'sometimes|nullable|string|max:255',
            'hero_services_image' => 'sometimes|nullable|string|max:255',
            'hero_products_image' => 'sometimes|nullable|string|max:255',
            'hero_podcasts_image' => 'sometimes|nullable|string|max:255',
            'hero_partnership_image' => 'sometimes|nullable|string|max:255',
        ]);

        $settings = Setting::instance();
        $settings->update($validated);

        return response()->json([
            'message' => 'Settings updated successfully.',
            'data' => $settings,
        ]);
    }
}
