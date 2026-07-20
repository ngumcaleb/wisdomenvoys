<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Service::ordered()->get());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'type' => 'sometimes|string|max:255',
            'image' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'meta' => 'nullable|array',
            'button_text' => 'sometimes|string|max:255',
            'button_url' => 'nullable|url|max:255',
            'status' => 'sometimes|boolean',
            'display_order' => 'sometimes|integer|min:0',
        ]);

        $service = Service::create($validated);

        return response()->json([
            'message' => 'Service created successfully.',
            'data' => $service,
        ], 201);
    }

    public function show(Service $service): JsonResponse
    {
        return response()->json($service);
    }

    public function update(Request $request, Service $service): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'type' => 'sometimes|string|max:255',
            'image' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'meta' => 'nullable|array',
            'button_text' => 'sometimes|string|max:255',
            'button_url' => 'nullable|url|max:255',
            'status' => 'sometimes|boolean',
            'display_order' => 'sometimes|integer|min:0',
        ]);

        $service->update($validated);

        return response()->json([
            'message' => 'Service updated successfully.',
            'data' => $service,
        ]);
    }

    public function destroy(Service $service): JsonResponse
    {
        $service->delete();

        return response()->json([
            'message' => 'Service deleted successfully.',
        ]);
    }
}
