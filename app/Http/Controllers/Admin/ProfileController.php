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

            'hero_media_type' => ['required', 'in:image,video'],

            'hero_video' => [
                'nullable',
                'file',
                'mimes:mp4,webm',
                'max:51200',
            ],
        ]);

        $profile = Profile::first() ?? new Profile();

        /*
        |--------------------------------------------------------------------------
        | LOGO
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo')) {

            if ($profile->logo) {
                $oldFile = public_path('storage/' . $profile->logo);

                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            $destination = public_path('storage/profiles/logo');

            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            $file = $request->file('logo');
            $filename = $file->hashName();

            $file->move($destination, $filename);

            $validated['logo'] = 'profiles/logo/' . $filename;
        }


        /*
        |--------------------------------------------------------------------------
        | FOTO PROFIL
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_image')) {

            if ($profile->profile_image) {
                $oldFile = public_path('storage/' . $profile->profile_image);

                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            $destination = public_path('storage/profiles/images');

            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            $file = $request->file('profile_image');
            $filename = $file->hashName();

            $file->move($destination, $filename);

            $validated['profile_image'] = 'profiles/images/' . $filename;
        }


        /*
        |--------------------------------------------------------------------------
        | FOTO SAMPUL
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('cover_image')) {

            if ($profile->cover_image) {
                $oldFile = public_path('storage/' . $profile->cover_image);

                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            $destination = public_path('storage/profiles/cover');

            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            $file = $request->file('cover_image');
            $filename = $file->hashName();

            $file->move($destination, $filename);

            $validated['cover_image'] = 'profiles/cover/' . $filename;
        }


        /*
        |--------------------------------------------------------------------------
        | VIDEO HERO
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('hero_video')) {

            // Hapus video Hero lama
            if ($profile->hero_video) {
                $oldVideo = public_path('storage/' . $profile->hero_video);

                if (File::exists($oldVideo)) {
                    File::delete($oldVideo);
                }
            }

            // Folder video Hero
            $destination = public_path('storage/profiles/hero');

            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            // Upload video baru
            $file = $request->file('hero_video');
            $filename = $file->hashName();

            $file->move($destination, $filename);

            // Simpan path
            $validated['hero_video'] = 'profiles/hero/' . $filename;

            // Kalau upload video, otomatis aktifkan video
            $validated['hero_media_type'] = 'video';
        }


        /*
        |--------------------------------------------------------------------------
        | JIKA MEMILIH FOTO
        |--------------------------------------------------------------------------
        */

        if (
            $request->hero_media_type === 'image'
            && $profile->hero_video
        ) {
            $oldVideo = public_path('storage/' . $profile->hero_video);

            if (File::exists($oldVideo)) {
                File::delete($oldVideo);
            }

            $validated['hero_video'] = null;
        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN
        |--------------------------------------------------------------------------
        */

        $profile->fill($validated);
        $profile->save();

        return redirect()
            ->route('admin.profile.edit')
            ->with('success', 'Profil sanggar berhasil disimpan.');
    }
}
