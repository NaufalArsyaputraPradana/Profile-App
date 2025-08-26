<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSection;
use Illuminate\Http\Request;

class ContactSectionController extends Controller
{
    public function index()
    {
        $contacts = ContactSection::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contact.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'github_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'is_active' => 'boolean'
        ]);

        if ($validated['is_active']) {
            ContactSection::where('is_active', true)->update(['is_active' => false]);
        }

        ContactSection::create($validated);

        return redirect()->route('admin.contact.index')
            ->with('success', 'Contact section berhasil ditambahkan.');
    }

    public function edit(ContactSection $contact)
    {
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(Request $request, ContactSection $contact)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'github_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'is_active' => 'boolean'
        ]);

        if ($validated['is_active']) {
            ContactSection::where('id', '!=', $contact->id)
                      ->where('is_active', true)
                      ->update(['is_active' => false]);
        }

        $contact->update($validated);

        return redirect()->route('admin.contact.index')
            ->with('success', 'Contact section berhasil diperbarui.');
    }

    public function destroy(ContactSection $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contact.index')
            ->with('success', 'Contact section berhasil dihapus.');
    }
}
