<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

            $validated['thumbnail'] = $request
                ->file('thumbnail')
                ->store('news', 'public');
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

            if ($news->thumbnail) {

                Storage::disk('public')->delete($news->thumbnail);
            }

            $validated['thumbnail'] = $request
                ->file('thumbnail')
                ->store('news', 'public');
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

            Storage::disk('public')->delete($news->thumbnail);
        }

        $news->delete();

        return redirect()
            ->route('news.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
