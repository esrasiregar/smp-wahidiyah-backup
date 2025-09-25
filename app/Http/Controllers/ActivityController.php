<?php
namespace App\Http\Controllers;

use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        
        $activitiesByMonth = \App\Models\Activity::orderByDesc('event_date')
        ->get()
        ->groupBy(fn ($a) => $a->event_date->translatedFormat('F Y'));
        return view('pages.kegiatan', compact('activitiesByMonth'));
        
    }

    public function show(string $slug)
    {
        $activity = Activity::where('slug', $slug)->firstOrFail();

        $otherActivities = Activity::where('id', '!=', $activity->id)
            ->orderByDesc('event_date')
            ->limit(6)
            ->get();

        return view('pages.detailkegiatan', compact('activity', 'otherActivities'));
    }
}