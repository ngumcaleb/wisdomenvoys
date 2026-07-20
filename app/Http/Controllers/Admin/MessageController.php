<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $messages = Message::with(['year', 'series', 'category'])
            ->search($request->input('search'))
            ->latest('published_at')
            ->paginate(20);

        return response()->json($messages);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'year_id' => 'required|exists:message_years,id',
            'series_id' => 'nullable|exists:series,id',
            'category_id' => 'nullable|exists:message_categories,id',
            'speaker' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|string|max:255',
            'audio' => 'nullable|string|max:255',
            'video' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'featured' => 'sometimes|boolean',
            'downloads' => 'sometimes|integer|min:0',
            'status' => 'sometimes|boolean',
        ]);

        $message = Message::create($validated);

        return response()->json([
            'message' => 'Message created successfully.',
            'data' => $message->load(['year', 'series', 'category']),
        ], 201);
    }

    public function show(Message $message): JsonResponse
    {
        return response()->json(
            $message->load(['year', 'series', 'category', 'podcast'])
        );
    }

    public function update(Request $request, Message $message): JsonResponse
    {
        $validated = $request->validate([
            'year_id' => 'sometimes|required|exists:message_years,id',
            'series_id' => 'nullable|exists:series,id',
            'category_id' => 'nullable|exists:message_categories,id',
            'speaker' => 'sometimes|required|string|max:255',
            'title' => 'sometimes|required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|string|max:255',
            'audio' => 'nullable|string|max:255',
            'video' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'featured' => 'sometimes|boolean',
            'downloads' => 'sometimes|integer|min:0',
            'status' => 'sometimes|boolean',
        ]);

        $message->update($validated);

        return response()->json([
            'message' => 'Message updated successfully.',
            'data' => $message->load(['year', 'series', 'category']),
        ]);
    }

    public function destroy(Message $message): JsonResponse
    {
        $message->delete();

        return response()->json([
            'message' => 'Message deleted successfully.',
        ]);
    }
}
