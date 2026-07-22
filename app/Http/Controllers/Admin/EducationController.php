<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::orderBy('sort_order')->orderByDesc('start_date')->get();
        return view('admin.educations.index', compact('educations'));
    }

    public function create()
    {
        return view('admin.educations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'institution_name' => 'required|string|max:255',
            'institution_logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'degree' => 'nullable|string|max:100',
            'field_of_study' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'is_current' => 'boolean',
            'gpa' => 'nullable|numeric|min:0|max:4',
            'gpa_scale' => 'nullable|string|max:10',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'achievements' => 'nullable|string',
            'activities' => 'nullable|string',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('institution_logo')) {
            $validated['institution_logo'] = $request->file('institution_logo')->store('educations', 'public');
        }

        if (!empty($validated['achievements'])) {
            $validated['achievements'] = array_filter(explode("\n", trim($validated['achievements'])));
        }
        if (!empty($validated['activities'])) {
            $validated['activities'] = array_filter(explode("\n", trim($validated['activities'])));
        }

        $validated['is_current'] = $request->boolean('is_current');
        $validated['is_active'] = $request->boolean('is_active', true);

        Education::create($validated);

        return redirect()->route('admin.educations.index')->with('success', 'Pendidikan berhasil ditambahkan!');
    }

    public function edit(Education $education)
    {
        return view('admin.educations.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'institution_name' => 'required|string|max:255',
            'institution_logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'degree' => 'nullable|string|max:100',
            'field_of_study' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'is_current' => 'boolean',
            'gpa' => 'nullable|numeric|min:0|max:4',
            'gpa_scale' => 'nullable|string|max:10',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'achievements' => 'nullable|string',
            'activities' => 'nullable|string',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('institution_logo')) {
            if ($education->institution_logo) {
                Storage::disk('public')->delete($education->institution_logo);
            }
            $validated['institution_logo'] = $request->file('institution_logo')->store('educations', 'public');
        }

        if (!empty($validated['achievements'])) {
            $validated['achievements'] = array_filter(explode("\n", trim($validated['achievements'])));
        }
        if (!empty($validated['activities'])) {
            $validated['activities'] = array_filter(explode("\n", trim($validated['activities'])));
        }

        $validated['is_current'] = $request->boolean('is_current');
        $validated['is_active'] = $request->boolean('is_active', true);

        $education->update($validated);

        return redirect()->route('admin.educations.index')->with('success', 'Pendidikan berhasil diperbarui!');
    }

    public function destroy(Education $education)
    {
        if ($education->institution_logo) {
            Storage::disk('public')->delete($education->institution_logo);
        }
        $education->delete();

        return redirect()->route('admin.educations.index')->with('success', 'Pendidikan berhasil dihapus!');
    }
}
