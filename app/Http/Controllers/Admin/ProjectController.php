<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order')->latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072',
            'role' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:100',
            'technologies' => 'nullable|string',
            'features' => 'nullable|string',
            'github_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
            'url' => 'nullable|url',
            'status' => 'in:active,development,archived',
            'year' => 'nullable|integer|min:2000|max:2100',
            'duration' => 'nullable|string|max:100',
            'featured' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('projects', 'public');
        }

        // Auto-generate slug
        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);

        // Parse technologies from comma-separated string to array
        if (!empty($validated['technologies'])) {
            $validated['technologies'] = array_map('trim', array_filter(explode(',', $validated['technologies'])));
        }
        if (!empty($validated['features'])) {
            $validated['features'] = array_filter(explode("\n", trim($validated['features'])));
        }

        $validated['featured'] = $request->boolean('featured');

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil ditambahkan!');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug,' . $project->id,
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072',
            'role' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:100',
            'technologies' => 'nullable|string',
            'features' => 'nullable|string',
            'github_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
            'url' => 'nullable|url',
            'status' => 'in:active,development,archived',
            'year' => 'nullable|integer|min:2000|max:2100',
            'duration' => 'nullable|string|max:100',
            'featured' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($project->thumbnail) {
                Storage::disk('public')->delete($project->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('projects', 'public');
        }

        if (!empty($validated['technologies'])) {
            $validated['technologies'] = array_map('trim', array_filter(explode(',', $validated['technologies'])));
        }
        if (!empty($validated['features'])) {
            $validated['features'] = array_filter(explode("\n", trim($validated['features'])));
        }

        $validated['featured'] = $request->boolean('featured');

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        if ($project->thumbnail) {
            Storage::disk('public')->delete($project->thumbnail);
        }
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dihapus!');
    }
}
