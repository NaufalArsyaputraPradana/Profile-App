<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
    public function index()
    {
        $heroes = HeroSection::all();
        return view('admin.hero.index', compact('heroes'));
    }

    public function create()
    {
        return view('admin.hero.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'required',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'required|max:255',
            'button_link' => 'required|max:255',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('background_image')) {
            $path = $request->file('background_image')->store('hero', 'public');
            $validated['background_image'] = $path;
        }

        if ($validated['is_active']) {
            HeroSection::where('is_active', true)->update(['is_active' => false]);
        }

        HeroSection::create($validated);

        return redirect()->route('admin.hero.index')
            ->with('success', 'Hero section berhasil ditambahkan.');
    }

    public function edit(HeroSection $hero)
    {
        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request, HeroSection $hero)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'required',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'required|max:255',
            'button_link' => 'required|max:255',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('background_image')) {
            if ($hero->background_image) {
                Storage::disk('public')->delete($hero->background_image);
            }
            $path = $request->file('background_image')->store('hero', 'public');
            $validated['background_image'] = $path;
        }

        if ($validated['is_active']) {
            HeroSection::where('id', '!=', $hero->id)
                      ->where('is_active', true)
                      ->update(['is_active' => false]);
        }

        $hero->update($validated);

        return redirect()->route('admin.hero.index')
            ->with('success', 'Hero section berhasil diperbarui.');
    }

    public function destroy(HeroSection $hero)
    {
        if ($hero->background_image) {
            Storage::disk('public')->delete($hero->background_image);
        }
        
        $hero->delete();

        return redirect()->route('admin.hero.index')
            ->with('success', 'Hero section berhasil dihapus.');
    }
}
