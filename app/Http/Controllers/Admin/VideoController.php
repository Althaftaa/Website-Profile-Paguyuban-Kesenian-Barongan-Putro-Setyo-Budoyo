<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->get();

        return view(
            'admin.video.index',
            compact('videos')
        );
    }

    public function create()
    {
        return view('admin.video.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'title' => 'required|max:255',

            'description' => 'nullable',

            'youtube_url' => 'required|url',

            'activity_date' => 'nullable|date',

        ]);

        $validated['youtube_id'] =
            $this->extractYoutubeId(
                $validated['youtube_url']
            );

        Video::create($validated);

        return redirect()
            ->route('video.index')
            ->with(
                'success',
                'Video berhasil ditambahkan.'
            );
    }

    public function edit(Video $video)
    {
        return view(
            'admin.video.edit',
            compact('video')
        );
    }

    public function update(Request $request, Video $video)
    {
        $validated = $request->validate([

            'title' => 'required|max:255',

            'description' => 'nullable',

            'youtube_url' => 'required|url',

            'activity_date' => 'nullable|date',

        ]);

        $validated['youtube_id'] =
            $this->extractYoutubeId(
                $validated['youtube_url']
            );

        $video->update($validated);

        return redirect()
            ->route('video.index')
            ->with(
                'success',
                'Video berhasil diperbarui.'
            );
    }

    public function destroy(Video $video)
    {
        $video->delete();

        return back()->with(
            'success',
            'Video berhasil dihapus.'
        );
    }

    private function extractYoutubeId($url)
    {
        preg_match(
            '/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/))([^\&\?\/]+)/',
            $url,
            $matches
        );

        return $matches[1] ?? null;
    }
}
