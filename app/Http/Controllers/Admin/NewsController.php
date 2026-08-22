<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'content' => 'required',
            'published_at' => 'required|date',
        ]);

        if ($request->hasFile('thumbnail')) {

            // Folder penyimpanan thumbnail berita
            $destination = public_path('storage/news');

            // Pastikan folder tersedia
            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            // Ambil file
            $file = $request->file('thumbnail');

            // Buat nama file unik
            $filename = $file->hashName();

            // Simpan langsung ke public/storage/news
            $file->move($destination, $filename);

            // Simpan path ke database
            $validated['thumbnail'] = 'news/' . $filename;
        }

        $validated['slug'] = Str::slug($validated['title']);

        News::create($validated);

        return redirect()
            ->route('news.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'content' => 'required',
            'published_at' => 'required|date',
        ]);

        if ($request->hasFile('thumbnail')) {

            // Hapus thumbnail lama
            if ($news->thumbnail) {

                $oldFile = public_path('storage/' . $news->thumbnail);

                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            // Folder penyimpanan
            $destination = public_path('storage/news');

            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            // Upload thumbnail baru
            $file = $request->file('thumbnail');
            $filename = $file->hashName();

            $file->move($destination, $filename);

            // Simpan path ke database
            $validated['thumbnail'] = 'news/' . $filename;
        }

        $validated['slug'] = Str::slug($validated['title']);

        $news->update($validated);

        return redirect()
            ->route('news.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $news)
    {
        if ($news->thumbnail) {

            $file = public_path('storage/' . $news->thumbnail);

            if (File::exists($file)) {
                File::delete($file);
            }
        }

        $news->delete();

        return redirect()
            ->route('news.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
