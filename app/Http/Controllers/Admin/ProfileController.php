<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first() ?? new Profile();

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'description'   => ['nullable', 'string'],
            'history'       => ['nullable', 'string'],
            'philosophy'    => ['nullable', 'string'],

            'logo'          => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'cover_image'   => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $profile = Profile::first() ?? new Profile();


        if ($request->hasFile('logo')) {

            // Hapus logo lama
            if ($profile->logo) {
                $oldFile = public_path('storage/' . $profile->logo);

                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            // Folder tujuan
            $destination = public_path('storage/profiles/logo');

            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            // Upload logo baru
            $file = $request->file('logo');
            $filename = $file->hashName();

            $file->move($destination, $filename);

            // Simpan path ke database
            $validated['logo'] = 'profiles/logo/' . $filename;
        }


        if ($request->hasFile('profile_image')) {


            if ($profile->profile_image) {
                $oldFile = public_path('storage/' . $profile->profile_image);

                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            // Folder tujuan
            $destination = public_path('storage/profiles/images');

            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            // Upload foto profil baru
            $file = $request->file('profile_image');
            $filename = $file->hashName();

            $file->move($destination, $filename);

            // Simpan path ke database
            $validated['profile_image'] = 'profiles/images/' . $filename;
        }


        if ($request->hasFile('cover_image')) {

            if ($profile->cover_image) {
                $oldFile = public_path('storage/' . $profile->cover_image);

                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            // Folder tujuan
            $destination = public_path('storage/profiles/cover');

            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            // Upload cover baru
            $file = $request->file('cover_image');
            $filename = $file->hashName();

            $file->move($destination, $filename);

            // Simpan path ke database
            $validated['cover_image'] = 'profiles/cover/' . $filename;
        }


        $profile->fill($validated);
        $profile->save();


        return redirect()
            ->route('admin.profile.edit')
            ->with('success', 'Profil sanggar berhasil disimpan.');
    }
}
