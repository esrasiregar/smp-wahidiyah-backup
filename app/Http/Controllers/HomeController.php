<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Activity;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = News::orderByDesc('published_at')
            ->limit(6)
            ->get();

        // Ambil 6 kegiatan terbaru.
        // Jika event_date ada yang null, fallback ke created_at supaya tetap ikut.
        $latestActivities = Activity::orderByDesc('event_date')
            ->orderByDesc('id')          // fallback sederhana
            ->limit(6)
            ->get();

        return view('pages.home', compact('latestNews', 'latestActivities'));
    }
}
