<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller
{
    public function index()
    {
        $abouts = AboutSection::all();
        return view('admin.about.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'age' => 'required|integer|min:1',
            'email' => 'required|email',
            'phone' => 'nullable|max:255',
            'address' => 'required|max:255',
            'cv_file' => 'nullable|mimes:pdf|max:5120',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('about', 'public');
            $validated['photo'] = $path;
        }

        if ($request->hasFile('cv_file')) {
            $path = $request->file('cv_file')->store('cv', 'public');
            $validated['cv_file'] = $path;
        }

        if ($validated['is_active']) {
            AboutSection::where('is_active', true)->update(['is_active' => false]);
        }

        AboutSection::create($validated);

        return redirect()->route('admin.about.index')
            ->with('success', 'About section berhasil ditambahkan.');
    }

    public function edit(AboutSection $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, AboutSection $about)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'age' => 'required|integer|min:1',
            'email' => 'required|email',
            'phone' => 'nullable|max:255',
            'address' => 'required|max:255',
            'cv_file' => 'nullable|mimes:pdf|max:5120',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('photo')) {
            if ($about->photo) {
                Storage::disk('public')->delete($about->photo);
            }
            $path = $request->file('photo')->store('about', 'public');
            $validated['photo'] = $path;
        }

        if ($request->hasFile('cv_file')) {
            if ($about->cv_file) {
                Storage::disk('public')->delete($about->cv_file);
            }
            $path = $request->file('cv_file')->store('cv', 'public');
            $validated['cv_file'] = $path;
        }

        if ($validated['is_active']) {
            AboutSection::where('id', '!=', $about->id)
                      ->where('is_active', true)
                      ->update(['is_active' => false]);
        }

        $about->update($validated);

        return redirect()->route('admin.about.index')
            ->with('success', 'About section berhasil diperbarui.');
    }

    public function destroy(AboutSection $about)
    {
        if ($about->photo) {
            Storage::disk('public')->delete($about->photo);
        }
        if ($about->cv_file) {
            Storage::disk('public')->delete($about->cv_file);
        }
        
        $about->delete();

        return redirect()->route('admin.about.index')
            ->with('success', 'About section berhasil dihapus.');
    }
}
