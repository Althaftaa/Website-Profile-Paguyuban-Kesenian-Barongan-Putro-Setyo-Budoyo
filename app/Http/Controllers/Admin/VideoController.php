<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VideoController extends Controller
{
    /**
     * Menampilkan daftar video.
     */
    public function index()
    {
        $videos = Video::latest()->get();

        return view(
            'admin.video.index',
            compact('videos')
        );
    }

    /**
     * Menampilkan halaman tambah video.
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Menyimpan video baru.
     */
    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);

        /*
         * Menentukan field berdasarkan platform.
         */
        $validated = $this->handlePlatformFields(
            $request,
            $validated
        );

        /*
         * Simpan thumbnail manual jika ada.
         */
        if ($request->hasFile('thumbnail')) {

            $destination = public_path('storage/videos/thumbnails');

            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            $file = $request->file('thumbnail');
            $filename = $file->hashName();

            $file->move($destination, $filename);

            $validated['thumbnail'] =
                'videos/thumbnails/' . $filename;
        }

        Video::create($validated);

        return redirect()
            ->route('video.index')
            ->with(
                'success',
                'Video berhasil ditambahkan.'
            );
    }

    /**
     * Menampilkan halaman edit video.
     */
    public function edit(Video $video)
    {
        return view(
            'admin.video.edit',
            compact('video')
        );
    }

    /**
     * Memperbarui video.
     */
    public function update(
        Request $request,
        Video $video
    ) {
        $validated = $this->validateRequest($request);

        /*
         * Menentukan youtube_id berdasarkan platform.
         */
        $validated = $this->handlePlatformFields(
            $request,
            $validated
        );

        /*
         * Jika admin mengupload thumbnail baru,
         * hapus thumbnail lama terlebih dahulu.
         */
        if ($request->hasFile('thumbnail')) {

            if ($video->thumbnail) {

                $oldFile = public_path(
                    'storage/' . $video->thumbnail
                );

                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            $destination =
                public_path('storage/videos/thumbnails');

            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            $file = $request->file('thumbnail');
            $filename = $file->hashName();

            $file->move($destination, $filename);

            $validated['thumbnail'] =
                'videos/thumbnails/' . $filename;
        }

        $video->update($validated);

        return redirect()
            ->route('video.index')
            ->with(
                'success',
                'Video berhasil diperbarui.'
            );
    }

    /**
     * Menghapus video.
     */
    public function destroy(Video $video)
    {
        /*
         * Hapus thumbnail manual jika ada.
         */
        if ($video->thumbnail) {

            $file = public_path(
                'storage/' . $video->thumbnail
            );

            if (File::exists($file)) {
                File::delete($file);
            }
        }

        $video->delete();

        return back()->with(
            'success',
            'Video berhasil dihapus.'
        );
    }

    /**
     * Validasi data video.
     */
    private function validateRequest(
        Request $request
    ): array {
        return $request->validate([
            'title' => [
                'required',
                'max:255'
            ],

            'platform' => [
                'required',
                'in:youtube,instagram,tiktok'
            ],

            'description' => [
                'nullable'
            ],

            'youtube_url' => [
                'required',
                'url'
            ],

            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'activity_date' => [
                'nullable',
                'date'
            ],
        ]);
    }

    /**
     * Menentukan data tambahan berdasarkan platform.
     */
    private function handlePlatformFields(
        Request $request,
        array $validated
    ): array {
        /*
         * Jika YouTube:
         * ambil ID video untuk membuat thumbnail otomatis.
         */
        if ($validated['platform'] === 'youtube') {

            $validated['youtube_id'] =
                $this->extractYoutubeId(
                    $validated['youtube_url']
                );
        } else {

            $validated['youtube_id'] = null;
        }

        return $validated;
    }

    /**
     * Mengambil ID video dari URL YouTube.
     */
    private function extractYoutubeId(
        string $url
    ): ?string {
        preg_match(
            '/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/))([^&?\/]+)/',
            $url,
            $matches
        );

        return $matches[1] ?? null;
    }
}
