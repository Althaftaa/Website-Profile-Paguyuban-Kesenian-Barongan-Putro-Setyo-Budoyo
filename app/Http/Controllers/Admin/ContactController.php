<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function edit()
    {
        $contact = Contact::first();

        if (!$contact) {

            $contact = Contact::create([]);
        }

        return view(
            'admin.contact.edit',
            compact('contact')
        );
    }

    public function update(Request $request)
    {
        $validated = $request->validate([

            'address' => 'nullable',

            'phone' => 'nullable|max:30',

            'email' => 'nullable|email',

            'google_maps' => 'nullable',

            'instagram' => 'nullable|url',

            'facebook' => 'nullable|url',

            'youtube' => 'nullable|url',

            'tiktok' => 'nullable|url',

        ]);

        $contact = Contact::first();

        $contact->update($validated);

        return back()->with(
            'success',
            'Kontak berhasil diperbarui.'
        );
    }
}
