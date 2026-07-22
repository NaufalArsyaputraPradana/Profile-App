@extends('layouts.admin')
@section('title', 'Edit Proyek')
@section('page-title', 'Edit Proyek')
@section('breadcrumb')
<a href="{{ route('admin.projects.index') }}" class="hover:text-slate-300">Proyek</a>
<span class="mx-1">›</span><span class="text-slate-300">Edit</span>
@endsection

@section('content')
<div class="max-w-4xl">
    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf @method('PUT')
        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Informasi Utama</h3>
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <label class="block mb-2">Judul Proyek *</label>
                    <input type="text" name="title" value="{{ old('title', $project->title) }}" required>
                </div>
                <div>
                    <label class="block mb-2">Kategori *</label>
                    <input type="text" name="category" value="{{ old('category', $project->category) }}" required>
                </div>
                <div>
                    <label class="block mb-2">Peran (Role)</label>
                    <input type="text" name="role" value="{{ old('role', $project->role) }}">
                </div>
                <div>
                    <label class="block mb-2">Tahun</label>
                    <input type="number" name="year" value="{{ old('year', $project->year) }}">
                </div>
                <div>
                    <label class="block mb-2">Status</label>
                    <select name="status">
                        <option value="active" {{ old('status', $project->status) === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="archived" {{ old('status', $project->status) === 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block mb-2">Deskripsi Proyek</label>
                <textarea name="description" rows="5">{{ old('description', $project->description) }}</textarea>
            </div>
        </div>

        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Fitur & Teknologi</h3>
            <div>
                <label class="block mb-2">Fitur Utama <span class="text-slate-500 text-xs">(Satu per baris)</span></label>
                <textarea name="features" rows="4">{{ old('features', is_array($project->features) ? implode("\n", $project->features) : '') }}</textarea>
            </div>
            <div>
                <label class="block mb-2">Tech Stack <span class="text-slate-500 text-xs">(Pisahkan dengan koma)</span></label>
                <input type="text" name="technologies" value="{{ old('technologies', is_array($project->technologies) ? implode(', ', $project->technologies) : '') }}">
            </div>
        </div>

        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Media & Tautan</h3>
            <div>
                <label class="block mb-2">Thumbnail (Gambar Utama)</label>
                @if($project->thumbnail)
                <div class="mb-3">
                    <img src="{{ Storage::url($project->thumbnail) }}" alt="" class="max-h-32 rounded-lg border border-white/10">
                </div>
                @endif
                <input type="file" name="thumbnail" accept="image/*">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Link Demo (Live)</label>
                    <input type="url" name="demo_url" value="{{ old('demo_url', $project->demo_url) }}">
                </div>
                <div>
                    <label class="block mb-2">Link Source Code (GitHub)</label>
                    <input type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}">
                </div>
            </div>
        </div>

        <div class="card p-6 space-y-4">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Pengaturan</h3>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block mb-2">Urutan (sort_order)</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order) }}" min="0">
                </div>
                <div class="flex items-center gap-2 mt-7">
                    <input type="checkbox" name="featured" id="featured" value="1" {{ old('featured', $project->featured) ? 'checked' : '' }}>
                    <label for="featured" class="cursor-pointer">Featured (Tampil di Home)</label>
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> Update Proyek
            </button>
            <a href="{{ route('admin.projects.index') }}" class="btn-outline">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection
