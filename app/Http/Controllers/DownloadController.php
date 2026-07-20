<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessageYear;
use App\Models\Setting;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $years = MessageYear::active()
            ->latest()
            ->withCount([
                'messages' => fn ($q) => $q->active(),
                'podcasts',
            ])
            ->get();

        $messageYears = $years->filter(fn ($y) => $y->messages_count > 0)->values();
        $podcastYears = $years->filter(fn ($y) => $y->podcasts_count > 0)->values();

        return view('download.index', [
            'settings' => Setting::instance(),
            'hero' => [
                'title' => 'Download',
                'description' => 'Spiritual resources at your fingertips. Access audio messages and podcast series designed to empower your mandate and mission.',
            ],
            'years' => $years,
            'messageYears' => $messageYears,
            'podcastYears' => $podcastYears,
        ]);
    }

    public function year(Request $request, string $year)
    {
        $yearRecord = MessageYear::where('year', $year)->firstOrFail();

        $messages = Message::where('year_id', $yearRecord->id)
            ->active()
            ->search($request->input('search'))
            ->with(['series', 'category', 'podcast'])
            ->latest('published_at')
            ->get();

        return view('download.year', [
            'settings' => Setting::instance(),
            'year' => $yearRecord,
            'messages' => $messages,
        ]);
    }

    public function podcastsYear(Request $request, string $year)
    {
        $yearRecord = MessageYear::where('year', $year)->firstOrFail();

        $podcasts = \App\Models\Podcast::whereHas('message', fn ($q) => $q->where('year_id', $yearRecord->id)->active())
            ->with('message')
            ->get();

        return view('download.podcasts-year', [
            'settings' => Setting::instance(),
            'year' => $yearRecord,
            'podcasts' => $podcasts,
        ]);
    }

    public function show(Message $message)
    {
        $message->load(['year', 'series', 'category', 'podcast']);

        return view('download.show', [
            'settings' => Setting::instance(),
            'message' => $message,
        ]);
    }
}
