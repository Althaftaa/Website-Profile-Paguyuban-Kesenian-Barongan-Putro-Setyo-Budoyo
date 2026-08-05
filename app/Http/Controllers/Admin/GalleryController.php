<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();

        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'activity_date' => [
                'nullable',
                'date',
            ],

            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);

        $validated['image'] = $request
            ->file('image')
            ->store('galleries', 'public');

        Gallery::create($validated);

        return redirect()
            ->route('gallery.index')
            ->with(
                'success',
                'Foto berhasil ditambahkan ke galeri.'
            );
    }
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'activity_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {

            // Hapus foto lama
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }

            $validated['image'] = $request
                ->file('image')
                ->store('galleries', 'public');
        }

        $gallery->update($validated);

        return redirect()
            ->route('gallery.index')
            ->with('success', 'Foto berhasil diperbarui.');
    }
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()
            ->route('gallery.index')
            ->with('success', 'Foto berhasil dihapus.');
    }
}
