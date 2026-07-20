<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(TeamMember::with('stream')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'stream_id' => 'nullable|exists:streams,id',
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'featured' => 'sometimes|boolean',
            'status' => 'sometimes|boolean',
            'is_founder' => 'sometimes|boolean',
            'is_stream_lead' => 'sometimes|boolean',
        ]);

        $member = TeamMember::create($validated);

        return response()->json([
            'message' => 'Team member created successfully.',
            'data' => $member->load('stream'),
        ], 201);
    }

    public function show(TeamMember $teamMember): JsonResponse
    {
        return response()->json($teamMember->load('stream'));
    }

    public function update(Request $request, TeamMember $teamMember): JsonResponse
    {
        $validated = $request->validate([
            'stream_id' => 'nullable|exists:streams,id',
            'name' => 'sometimes|required|string|max:255',
            'role' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'featured' => 'sometimes|boolean',
            'status' => 'sometimes|boolean',
            'is_founder' => 'sometimes|boolean',
            'is_stream_lead' => 'sometimes|boolean',
        ]);

        $teamMember->update($validated);

        return response()->json([
            'message' => 'Team member updated successfully.',
            'data' => $teamMember->load('stream'),
        ]);
    }

    public function destroy(TeamMember $teamMember): JsonResponse
    {
        $teamMember->delete();

        return response()->json([
            'message' => 'Team member deleted successfully.',
        ]);
    }
}
