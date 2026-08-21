<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Profile;
use App\Models\Schedule;
use App\Models\News;
use App\Models\Video;
use App\Models\Contact;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();

        $galleries = Gallery::latest()
            ->get();

        $videos = $videos = Video::latest()->get();
        $schedules = Schedule::orderBy('event_date')
            ->take(6)
            ->get();

        $latestNews = News::latest()
            ->take(3)
            ->get();

        $contact = Contact::first();

        return view(
            'frontend.home',
            compact(
                'profile',
                'galleries',
                'videos',
                'schedules',
                'latestNews',
                'contact'
            )
        );
    }
}
