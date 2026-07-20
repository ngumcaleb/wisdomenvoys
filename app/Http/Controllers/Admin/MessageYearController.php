<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MessageYear;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageYearController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(MessageYear::latest()->withCount('messages')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'cover_image' => 'nullable|string|max:255',
            'status' => 'sometimes|boolean',
        ]);

        $year = MessageYear::create($validated);

        return response()->json([
            'message' => 'Message year created successfully.',
            'data' => $year,
        ], 201);
    }

    public function show(MessageYear $messageYear): JsonResponse
    {
        return response()->json(
            $messageYear->load(['messages' => function ($q) {
                $q->active()->latest('published_at');
            }])
        );
    }

    public function update(Request $request, MessageYear $messageYear): JsonResponse
    {
        $validated = $request->validate([
            'year' => 'sometimes|required|integer|min:2000',
            'cover_image' => 'nullable|string|max:255',
            'status' => 'sometimes|boolean',
        ]);

        $messageYear->update($validated);

        return response()->json([
            'message' => 'Message year updated successfully.',
            'data' => $messageYear,
        ]);
    }

    public function destroy(MessageYear $messageYear): JsonResponse
    {
        $messageYear->delete();

        return response()->json([
            'message' => 'Message year deleted successfully.',
        ]);
    }
}
