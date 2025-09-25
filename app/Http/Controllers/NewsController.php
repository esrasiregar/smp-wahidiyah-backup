<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        // Ambil semua berita terbaru, lalu kelompokkan per Bulan Tahun
        $newsByMonth = News::orderByDesc('published_at')
            ->get()
            ->groupBy(fn ($n) => $n->published_at->translatedFormat('F Y'));

        // Kalau view kamu bernama pages/main-berita.blade.php, ganti ke 'pages.main-berita'
        return view('pages.berita', compact('newsByMonth'));
        $latestNews = News::orderByDesc('published_at')
            ->limit(6)
            ->get();

        return view('pages.home', compact('latestNews'));
    }

    public function show(string $slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        $otherNews = News::where('id', '!=', $news->id)
            ->orderByDesc('published_at')
            ->limit(6)
            ->get();

        // Kalau file kamu bernama pages/detailberita.blade.php biarkan seperti ini
        return view('pages.detailberita', compact('news', 'otherNews'));
    }
}