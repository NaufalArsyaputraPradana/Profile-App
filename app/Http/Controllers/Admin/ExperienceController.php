<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('sort_order')->orderByDesc('start_date')->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'company_website' => 'nullable|url',
            'company_description' => 'nullable|string',
            'position' => 'required|string|max:255',
            'type' => 'required|in:internship,full-time,part-time,freelance,contract',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'boolean',
            'description' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'achievements' => 'nullable|string',
            'technologies' => 'nullable|string',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('company_logo')) {
            $validated['company_logo'] = $request->file('company_logo')->store('experiences', 'public');
        }

        // Convert newline separated text to arrays
        if (!empty($validated['responsibilities'])) {
            $validated['responsibilities'] = array_filter(explode("\n", trim($validated['responsibilities'])));
        }
        if (!empty($validated['achievements'])) {
            $validated['achievements'] = array_filter(explode("\n", trim($validated['achievements'])));
        }
        if (!empty($validated['technologies'])) {
            $validated['technologies'] = array_map('trim', array_filter(explode(',', $validated['technologies'])));
        }

        $validated['is_current'] = $request->boolean('is_current');
        $validated['is_active'] = $request->boolean('is_active', true);

        Experience::create($validated);

        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman kerja berhasil ditambahkan!');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'company_website' => 'nullable|url',
            'company_description' => 'nullable|string',
            'position' => 'required|string|max:255',
            'type' => 'required|in:internship,full-time,part-time,freelance,contract',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'boolean',
            'description' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'achievements' => 'nullable|string',
            'technologies' => 'nullable|string',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('company_logo')) {
            if ($experience->company_logo) {
                Storage::disk('public')->delete($experience->company_logo);
            }
            $validated['company_logo'] = $request->file('company_logo')->store('experiences', 'public');
        }

        if (!empty($validated['responsibilities'])) {
            $validated['responsibilities'] = array_filter(explode("\n", trim($validated['responsibilities'])));
        }
        if (!empty($validated['achievements'])) {
            $validated['achievements'] = array_filter(explode("\n", trim($validated['achievements'])));
        }
        if (!empty($validated['technologies'])) {
            $validated['technologies'] = array_map('trim', array_filter(explode(',', $validated['technologies'])));
        }

        $validated['is_current'] = $request->boolean('is_current');
        $validated['is_active'] = $request->boolean('is_active', true);

        $experience->update($validated);

        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman kerja berhasil diperbarui!');
    }

    public function destroy(Experience $experience)
    {
        if ($experience->company_logo) {
            Storage::disk('public')->delete($experience->company_logo);
        }
        $experience->delete();

        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman kerja berhasil dihapus!');
    }
}
