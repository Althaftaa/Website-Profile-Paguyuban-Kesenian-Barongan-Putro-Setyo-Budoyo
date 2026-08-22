<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

        // Folder penyimpanan gambar publik
        $destination = public_path('storage/galleries');

        // Pastikan folder tersedia
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        // Ambil file upload
        $file = $request->file('image');

        // Buat nama file unik
        $filename = $file->hashName();

        // Simpan langsung ke public/storage/galleries
        $file->move($destination, $filename);

        // Simpan path ke database
        $validated['image'] = 'galleries/' . $filename;

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

            // Hapus foto lama dari public/storage
            if ($gallery->image) {
                $publicFile = public_path('storage/' . $gallery->image);

                if (File::exists($publicFile)) {
                    File::delete($publicFile);
                }

                // Hapus juga dari storage/app/public jika masih ada
                Storage::disk('public')->delete($gallery->image);
            }

            // Folder penyimpanan
            $destination = public_path('storage/galleries');

            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            // Upload foto baru
            $file = $request->file('image');
            $filename = $file->hashName();

            $file->move($destination, $filename);

            $validated['image'] = 'galleries/' . $filename;
        }

        $gallery->update($validated);

        return redirect()
            ->route('gallery.index')
            ->with(
                'success',
                'Foto berhasil diperbarui.'
            );
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {

            // Hapus file dari public/storage
            $publicFile = public_path('storage/' . $gallery->image);

            if (File::exists($publicFile)) {
                File::delete($publicFile);
            }

            // Hapus juga dari storage/app/public jika masih ada
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()
            ->route('gallery.index')
            ->with(
                'success',
                'Foto berhasil dihapus.'
            );
    }
}
