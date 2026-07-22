<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index(Request $request)
    {
        $query = Certificate::query();
        
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $certificates = $query->orderBy('sort_order')->orderByDesc('date')->paginate(15);
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:seminar,workshop,certification,training,achievement,webinar,competition',
            'issuer' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'certificate_number' => 'nullable|string|max:255',
            'expired_date' => 'nullable|date',
            'no_expiry' => 'boolean',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:3072',
            'file_pdf' => 'nullable|mimes:pdf|max:10240',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120',
            'featured' => 'boolean',
            'status' => 'in:active,expired,pending',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('certificates/thumbnails', 'public');
        }
        if ($request->hasFile('file_pdf')) {
            $validated['file_pdf'] = $request->file('file_pdf')->store('certificates/pdfs', 'public');
        }
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('certificates/images', 'public');
        }

        $validated['no_expiry'] = $request->boolean('no_expiry', true);
        $validated['featured'] = $request->boolean('featured');
        $validated['is_active'] = $request->boolean('is_active', true);

        Certificate::create($validated);

        return redirect()->route('admin.certificates.index')->with('success', 'Sertifikat berhasil ditambahkan!');
    }

    public function show(Certificate $certificate)
    {
        return view('admin.certificates.show', compact('certificate'));
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:seminar,workshop,certification,training,achievement,webinar,competition',
            'issuer' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'certificate_number' => 'nullable|string|max:255',
            'expired_date' => 'nullable|date',
            'no_expiry' => 'boolean',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:3072',
            'file_pdf' => 'nullable|mimes:pdf|max:10240',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120',
            'featured' => 'boolean',
            'status' => 'in:active,expired,pending',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($certificate->thumbnail) Storage::disk('public')->delete($certificate->thumbnail);
            $validated['thumbnail'] = $request->file('thumbnail')->store('certificates/thumbnails', 'public');
        }
        if ($request->hasFile('file_pdf')) {
            if ($certificate->file_pdf) Storage::disk('public')->delete($certificate->file_pdf);
            $validated['file_pdf'] = $request->file('file_pdf')->store('certificates/pdfs', 'public');
        }
        if ($request->hasFile('image')) {
            if ($certificate->image) Storage::disk('public')->delete($certificate->image);
            $validated['image'] = $request->file('image')->store('certificates/images', 'public');
        }

        $validated['no_expiry'] = $request->boolean('no_expiry', true);
        $validated['featured'] = $request->boolean('featured');
        $validated['is_active'] = $request->boolean('is_active', true);

        $certificate->update($validated);

        return redirect()->route('admin.certificates.index')->with('success', 'Sertifikat berhasil diperbarui!');
    }

    public function destroy(Certificate $certificate)
    {
        foreach (['thumbnail', 'file_pdf', 'image'] as $field) {
            if ($certificate->$field) {
                Storage::disk('public')->delete($certificate->$field);
            }
        }
        $certificate->delete();

        return redirect()->route('admin.certificates.index')->with('success', 'Sertifikat berhasil dihapus!');
    }
}
