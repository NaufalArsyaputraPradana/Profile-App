<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::orderBy('sort_order')->orderByDesc('start_date')->get();
        return view('admin.organizations.index', compact('organizations'));
    }

    public function create()
    {
        return view('admin.organizations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'organization_name' => 'required|string|max:255',
            'organization_logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'division' => 'nullable|string|max:255',
            'role' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'is_current' => 'boolean',
            'institution' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'achievements' => 'nullable|string',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('organization_logo')) {
            $validated['organization_logo'] = $request->file('organization_logo')->store('organizations', 'public');
        }

        if (!empty($validated['achievements'])) {
            $validated['achievements'] = array_filter(explode("\n", trim($validated['achievements'])));
        }

        $validated['is_current'] = $request->boolean('is_current');
        $validated['is_active'] = $request->boolean('is_active', true);

        Organization::create($validated);

        return redirect()->route('admin.organizations.index')->with('success', 'Organisasi berhasil ditambahkan!');
    }

    public function edit(Organization $organization)
    {
        return view('admin.organizations.edit', compact('organization'));
    }

    public function update(Request $request, Organization $organization)
    {
        $validated = $request->validate([
            'organization_name' => 'required|string|max:255',
            'organization_logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'division' => 'nullable|string|max:255',
            'role' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'is_current' => 'boolean',
            'institution' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'achievements' => 'nullable|string',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('organization_logo')) {
            if ($organization->organization_logo) {
                Storage::disk('public')->delete($organization->organization_logo);
            }
            $validated['organization_logo'] = $request->file('organization_logo')->store('organizations', 'public');
        }

        if (!empty($validated['achievements'])) {
            $validated['achievements'] = array_filter(explode("\n", trim($validated['achievements'])));
        }

        $validated['is_current'] = $request->boolean('is_current');
        $validated['is_active'] = $request->boolean('is_active', true);

        $organization->update($validated);

        return redirect()->route('admin.organizations.index')->with('success', 'Organisasi berhasil diperbarui!');
    }

    public function destroy(Organization $organization)
    {
        if ($organization->organization_logo) {
            Storage::disk('public')->delete($organization->organization_logo);
        }
        $organization->delete();

        return redirect()->route('admin.organizations.index')->with('success', 'Organisasi berhasil dihapus!');
    }
}
