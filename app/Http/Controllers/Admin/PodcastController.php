<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Podcast;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            Podcast::with('message')->get()
        );
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'message_id' => 'required|exists:messages,id',
            'audio' => 'nullable|string|max:255',
            'spotify' => 'nullable|url|max:255',
            'apple' => 'nullable|url|max:255',
            'google' => 'nullable|url|max:255',
        ]);

        $podcast = Podcast::create($validated);

        return response()->json([
            'message' => 'Podcast created successfully.',
            'data' => $podcast->load('message'),
        ], 201);
    }

    public function show(Podcast $podcast): JsonResponse
    {
        return response()->json($podcast->load('message'));
    }

    public function update(Request $request, Podcast $podcast): JsonResponse
    {
        $validated = $request->validate([
            'message_id' => 'sometimes|required|exists:messages,id',
            'audio' => 'nullable|string|max:255',
            'spotify' => 'nullable|url|max:255',
            'apple' => 'nullable|url|max:255',
            'google' => 'nullable|url|max:255',
        ]);

        $podcast->update($validated);

        return response()->json([
            'message' => 'Podcast updated successfully.',
            'data' => $podcast->load('message'),
        ]);
    }

    public function destroy(Podcast $podcast): JsonResponse
    {
        $podcast->delete();

        return response()->json([
            'message' => 'Podcast deleted successfully.',
        ]);
    }
}
