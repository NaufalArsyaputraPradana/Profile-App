<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Certification::orderBy('sort_order')->orderByDesc('issue_date')->get();
        return view('admin.certifications.index', compact('certifications'));
    }

    public function create()
    {
        return view('admin.certifications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'credential_id' => 'nullable|string|max:255',
            'credential_url' => 'nullable|url',
            'issue_date' => 'nullable|date',
            'expiry_date' => 'nullable|date',
            'no_expiry' => 'boolean',
            'level' => 'nullable|string|max:100',
            'badge_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'description' => 'nullable|string',
            'sort_order' => 'integer|min:0',
            'featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('badge_image')) {
            $validated['badge_image'] = $request->file('badge_image')->store('certifications', 'public');
        }

        $validated['no_expiry'] = $request->boolean('no_expiry');
        $validated['featured'] = $request->boolean('featured');
        $validated['is_active'] = $request->boolean('is_active', true);

        Certification::create($validated);

        return redirect()->route('admin.certifications.index')->with('success', 'Sertifikasi berhasil ditambahkan!');
    }

    public function edit(Certification $certification)
    {
        return view('admin.certifications.edit', compact('certification'));
    }

    public function update(Request $request, Certification $certification)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'credential_id' => 'nullable|string|max:255',
            'credential_url' => 'nullable|url',
            'issue_date' => 'nullable|date',
            'expiry_date' => 'nullable|date',
            'no_expiry' => 'boolean',
            'level' => 'nullable|string|max:100',
            'badge_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'description' => 'nullable|string',
            'sort_order' => 'integer|min:0',
            'featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('badge_image')) {
            if ($certification->badge_image) {
                Storage::disk('public')->delete($certification->badge_image);
            }
            $validated['badge_image'] = $request->file('badge_image')->store('certifications', 'public');
        }

        $validated['no_expiry'] = $request->boolean('no_expiry');
        $validated['featured'] = $request->boolean('featured');
        $validated['is_active'] = $request->boolean('is_active', true);

        $certification->update($validated);

        return redirect()->route('admin.certifications.index')->with('success', 'Sertifikasi berhasil diperbarui!');
    }

    public function destroy(Certification $certification)
    {
        if ($certification->badge_image) {
            Storage::disk('public')->delete($certification->badge_image);
        }
        $certification->delete();

        return redirect()->route('admin.certifications.index')->with('success', 'Sertifikasi berhasil dihapus!');
    }
}
