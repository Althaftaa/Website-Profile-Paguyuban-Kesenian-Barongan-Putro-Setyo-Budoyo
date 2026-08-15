<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Profile;
use App\Models\Schedule;
use App\Models\Video;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $profile = Profile::first();

        $stats = [
            'gallery'   => Gallery::count(),
            'video'     => Video::count(),
            'schedule'  => Schedule::count(),
            'news'      => News::count(),
        ];

        $upcomingSchedules = Schedule::where('event_date', '>=', now())
            ->orderBy('event_date')
            ->take(5)
            ->get();

        $latestNews = News::latest()
            ->take(5)
            ->get();

        return view(
            'admin.dashboard',
            compact('profile', 'stats', 'upcomingSchedules', 'latestNews')
        );
    }
}