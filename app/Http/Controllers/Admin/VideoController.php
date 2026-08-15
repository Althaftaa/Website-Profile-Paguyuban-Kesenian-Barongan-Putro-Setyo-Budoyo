<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $validated = $this->validateRequest($request);

        $validated = $this->handlePlatformFields($request, $validated);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request
                ->file('thumbnail')
                ->store('videos/thumbnails', 'public');
        }

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
        $validated = $this->validateRequest($request);

        $validated = $this->handlePlatformFields($request, $validated);

        if ($request->hasFile('thumbnail')) {

            if ($video->thumbnail) {
                Storage::disk('public')->delete($video->thumbnail);
            }

            $validated['thumbnail'] = $request
                ->file('thumbnail')
                ->store('videos/thumbnails', 'public');
        }

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
        if ($video->thumbnail) {
            Storage::disk('public')->delete($video->thumbnail);
        }

        $video->delete();

        return back()->with(
            'success',
            'Video berhasil dihapus.'
        );
    }

    private function validateRequest(Request $request): array
    {
        return $request->validate([

            'title' => 'required|max:255',

            'platform' => 'required|in:youtube,instagram,tiktok',

            'description' => 'nullable',

            'youtube_url' => 'required|url',

            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'activity_date' => 'nullable|date',

        ]);
    }

    private function handlePlatformFields(Request $request, array $validated): array
    {
        // Ekstrak ID video HANYA kalau platformnya YouTube, supaya thumbnail
        // otomatis bisa dibuat. Instagram & TikTok tidak punya konsep ini,
        // thumbnail-nya pakai upload manual dari admin.
        $validated['youtube_id'] = $validated['platform'] === 'youtube'
            ? $this->extractYoutubeId($validated['youtube_url'])
            : null;

        return $validated;
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