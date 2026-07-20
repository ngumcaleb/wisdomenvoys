<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stream;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StreamController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Stream::withCount('teamMembers')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'status' => 'sometimes|boolean',
        ]);

        $stream = Stream::create($validated);

        return response()->json([
            'message' => 'Stream created successfully.',
            'data' => $stream,
        ], 201);
    }

    public function show(Stream $stream): JsonResponse
    {
        return response()->json($stream->load('teamMembers'));
    }

    public function update(Request $request, Stream $stream): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'status' => 'sometimes|boolean',
        ]);

        $stream->update($validated);

        return response()->json([
            'message' => 'Stream updated successfully.',
            'data' => $stream,
        ]);
    }

    public function destroy(Stream $stream): JsonResponse
    {
        $stream->delete();

        return response()->json([
            'message' => 'Stream deleted successfully.',
        ]);
    }
}
