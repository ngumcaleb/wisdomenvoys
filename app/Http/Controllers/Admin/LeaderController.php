<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Leader::ordered()->get());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'photo' => 'nullable|string|max:255',
            'bio' => 'required|string',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'is_team_leader' => 'sometimes|boolean',
            'display_order' => 'sometimes|integer|min:0',
        ]);

        $leader = Leader::create($validated);

        return response()->json([
            'message' => 'Leader created successfully.',
            'data' => $leader,
        ], 201);
    }

    public function show(Leader $leader): JsonResponse
    {
        return response()->json($leader);
    }

    public function update(Request $request, Leader $leader): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'title' => 'sometimes|required|string|max:255',
            'photo' => 'nullable|string|max:255',
            'bio' => 'sometimes|required|string',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'is_team_leader' => 'sometimes|boolean',
            'display_order' => 'sometimes|integer|min:0',
        ]);

        $leader->update($validated);

        return response()->json([
            'message' => 'Leader updated successfully.',
            'data' => $leader,
        ]);
    }

    public function destroy(Leader $leader): JsonResponse
    {
        $leader->delete();

        return response()->json([
            'message' => 'Leader deleted successfully.',
        ]);
    }
}
