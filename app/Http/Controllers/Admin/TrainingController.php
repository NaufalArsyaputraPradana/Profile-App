<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::orderBy('sort_order')->orderByDesc('start_date')->get();
        return view('admin.trainings.index', compact('trainings'));
    }

    public function create()
    {
        return view('admin.trainings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'organizer' => 'required|string|max:255',
            'category' => 'nullable|in:workshop,bootcamp,online-course,webinar,seminar',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'duration' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'topics' => 'nullable|string',
            'certificate_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'badge_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'credential_url' => 'nullable|url',
            'featured' => 'boolean',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        foreach (['certificate_image', 'badge_image', 'cover_image'] as $fileField) {
            if ($request->hasFile($fileField)) {
                $validated[$fileField] = $request->file($fileField)->store('trainings', 'public');
            }
        }

        if (!empty($validated['topics'])) {
            $validated['topics'] = array_filter(explode("\n", trim($validated['topics'])));
        }

        $validated['featured'] = $request->boolean('featured');
        $validated['is_active'] = $request->boolean('is_active', true);

        Training::create($validated);

        return redirect()->route('admin.trainings.index')->with('success', 'Pelatihan berhasil ditambahkan!');
    }

    public function edit(Training $training)
    {
        return view('admin.trainings.edit', compact('training'));
    }

    public function update(Request $request, Training $training)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'organizer' => 'required|string|max:255',
            'category' => 'nullable|in:workshop,bootcamp,online-course,webinar,seminar',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'duration' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'topics' => 'nullable|string',
            'certificate_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'badge_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'credential_url' => 'nullable|url',
            'featured' => 'boolean',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        foreach (['certificate_image', 'badge_image', 'cover_image'] as $fileField) {
            if ($request->hasFile($fileField)) {
                if ($training->$fileField) {
                    Storage::disk('public')->delete($training->$fileField);
                }
                $validated[$fileField] = $request->file($fileField)->store('trainings', 'public');
            }
        }

        if (!empty($validated['topics'])) {
            $validated['topics'] = array_filter(explode("\n", trim($validated['topics'])));
        }

        $validated['featured'] = $request->boolean('featured');
        $validated['is_active'] = $request->boolean('is_active', true);

        $training->update($validated);

        return redirect()->route('admin.trainings.index')->with('success', 'Pelatihan berhasil diperbarui!');
    }

    public function destroy(Training $training)
    {
        foreach (['certificate_image', 'badge_image', 'cover_image'] as $field) {
            if ($training->$field) {
                Storage::disk('public')->delete($training->$field);
            }
        }
        $training->delete();

        return redirect()->route('admin.trainings.index')->with('success', 'Pelatihan berhasil dihapus!');
    }
}
