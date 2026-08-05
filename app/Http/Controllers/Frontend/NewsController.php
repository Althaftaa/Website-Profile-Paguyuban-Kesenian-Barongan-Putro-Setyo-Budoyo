<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()
            ->paginate(6);

        return view(
            'frontend.news.index',
            compact('news')
        );
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)
            ->firstOrFail();

        $latestNews = News::where('id', '!=', $news->id)
            ->latest()
            ->take(5)
            ->get();

        return view(
            'frontend.news.show',
            compact('news', 'latestNews')
        );
    }
}
