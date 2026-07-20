<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vision;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Vision::ordered()->get());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'required|string',
            'display_order' => 'sometimes|integer|min:0',
        ]);

        $vision = Vision::create($validated);

        return response()->json([
            'message' => 'Vision created successfully.',
            'data' => $vision,
        ], 201);
    }

    public function show(Vision $vision): JsonResponse
    {
        return response()->json($vision);
    }

    public function update(Request $request, Vision $vision): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'sometimes|required|string',
            'display_order' => 'sometimes|integer|min:0',
        ]);

        $vision->update($validated);

        return response()->json([
            'message' => 'Vision updated successfully.',
            'data' => $vision,
        ]);
    }

    public function destroy(Vision $vision): JsonResponse
    {
        $vision->delete();

        return response()->json([
            'message' => 'Vision deleted successfully.',
        ]);
    }
}
