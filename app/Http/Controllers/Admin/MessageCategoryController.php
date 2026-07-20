<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MessageCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageCategoryController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(MessageCategory::withCount('messages')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
        ]);

        $category = MessageCategory::create($validated);

        return response()->json([
            'message' => 'Category created successfully.',
            'data' => $category,
        ], 201);
    }

    public function show(MessageCategory $messageCategory): JsonResponse
    {
        return response()->json($messageCategory->load('messages'));
    }

    public function update(Request $request, MessageCategory $messageCategory): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'slug' => 'nullable|string|max:255',
        ]);

        $messageCategory->update($validated);

        return response()->json([
            'message' => 'Category updated successfully.',
            'data' => $messageCategory,
        ]);
    }

    public function destroy(MessageCategory $messageCategory): JsonResponse
    {
        $messageCategory->delete();

        return response()->json([
            'message' => 'Category deleted successfully.',
        ]);
    }
}
