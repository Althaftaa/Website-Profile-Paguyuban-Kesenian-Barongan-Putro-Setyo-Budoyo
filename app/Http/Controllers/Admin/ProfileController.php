<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = new Profile();

        return view('admin.profile.edit', compact('profile'));
    }


    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'description'   => ['nullable', 'string'],
            'history'       => ['nullable', 'string'],
            'philosophy'    => ['nullable', 'string'],
            'vision'        => ['nullable', 'string'],
            'mission'       => ['nullable', 'string'],

            'address'       => ['nullable', 'string'],
            'phone'         => ['nullable', 'string', 'max:30'],
            'email'         => ['nullable', 'email', 'max:255'],
            'google_maps'   => ['nullable', 'string'],

            'instagram'     => ['nullable', 'url', 'max:255'],
            'facebook'      => ['nullable', 'url', 'max:255'],
            'youtube'       => ['nullable', 'url', 'max:255'],

            'logo'          => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);


        $profile = new Profile();

        if (!$profile) {
            $profile = new Profile();
        }


        if ($request->hasFile('logo')) {

            if ($profile->logo) {
                Storage::disk('public')->delete($profile->logo);
            }

            $validated['logo'] = $request
                ->file('logo')
                ->store('profiles/logo', 'public');
        }


        if ($request->hasFile('profile_image')) {

            if ($profile->profile_image) {
                Storage::disk('public')->delete($profile->profile_image);
            }

            $validated['profile_image'] = $request
                ->file('profile_image')
                ->store('profiles/images', 'public');
        }


        $profile->fill($validated);
        $profile->save();


        return redirect()
            ->route('admin.profile.edit')
            ->with('success', 'Profil sanggar berhasil disimpan.');
    }
}
