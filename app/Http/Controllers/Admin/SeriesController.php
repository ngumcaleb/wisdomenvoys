<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Series::withCount('messages')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'cover' => 'nullable|string|max:255',
        ]);

        $series = Series::create($validated);

        return response()->json([
            'message' => 'Series created successfully.',
            'data' => $series,
        ], 201);
    }

    public function show(Series $series): JsonResponse
    {
        return response()->json($series->load('messages'));
    }

    public function update(Request $request, Series $series): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'cover' => 'nullable|string|max:255',
        ]);

        $series->update($validated);

        return response()->json([
            'message' => 'Series updated successfully.',
            'data' => $series,
        ]);
    }

    public function destroy(Series $series): JsonResponse
    {
        $series->delete();

        return response()->json([
            'message' => 'Series deleted successfully.',
        ]);
    }
}
