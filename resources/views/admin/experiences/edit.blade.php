@extends('layouts.admin')
@section('title', 'Edit Pengalaman')
@section('page-title', 'Edit Pengalaman Kerja')
@section('breadcrumb')
<a href="{{ route('admin.experiences.index') }}" class="hover:text-slate-300">Pengalaman</a>
<span class="mx-1">›</span><span class="text-slate-300">Edit</span>
@endsection

@section('content')
<div class="max-w-3xl">
    <form method="POST" action="{{ route('admin.experiences.update', $experience) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf @method('PUT')
        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Informasi Perusahaan</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Nama Perusahaan *</label>
                    <input type="text" name="company_name" value="{{ old('company_name', $experience->company_name) }}" required>
                </div>
                <div>
                    <label class="block mb-2">Logo Perusahaan</label>
                    @if($experience->company_logo)
                    <div class="mb-2">
                        <img src="{{ Storage::url($experience->company_logo) }}" class="w-12 h-12 rounded-lg object-cover">
                    </div>
                    @endif
                    <input type="file" name="company_logo" accept="image/*">
                </div>
            </div>
            <div>
                <label class="block mb-2">Website Perusahaan</label>
                <input type="url" name="company_website" value="{{ old('company_website', $experience->company_website) }}" placeholder="https://...">
            </div>
            <div>
                <label class="block mb-2">Deskripsi Perusahaan</label>
                <textarea name="company_description" rows="3">{{ old('company_description', $experience->company_description) }}</textarea>
            </div>
        </div>

        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Detail Posisi</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Posisi / Jabatan *</label>
                    <input type="text" name="position" value="{{ old('position', $experience->position) }}" required>
                </div>
                <div>
                    <label class="block mb-2">Tipe Pekerjaan *</label>
                    <select name="type" required>
                        @foreach(['internship'=>'Magang / Internship', 'full-time'=>'Full Time', 'part-time'=>'Part Time', 'freelance'=>'Freelance', 'contract'=>'Contract'] as $val => $label)
                        <option value="{{ $val }}" {{ old('type', $experience->type) === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label class="block mb-2">Lokasi</label>
                <input type="text" name="location" value="{{ old('location', $experience->location) }}">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Tanggal Mulai *</label>
                    <input type="date" name="start_date" value="{{ old('start_date', $experience->start_date?->format('Y-m-d')) }}" required>
                </div>
                <div>
                    <label class="block mb-2">Tanggal Selesai</label>
                    <input type="date" name="end_date" value="{{ old('end_date', $experience->end_date?->format('Y-m-d')) }}">
                </div>
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_current" id="is_current" value="1" {{ old('is_current', $experience->is_current) ? 'checked' : '' }}>
                <label for="is_current" class="cursor-pointer">Masih berlangsung / Current</label>
            </div>
            <div>
                <label class="block mb-2">Deskripsi Pekerjaan</label>
                <textarea name="description" rows="4">{{ old('description', $experience->description) }}</textarea>
            </div>
        </div>

        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Detail & Pencapaian</h3>
            <div>
                <label class="block mb-2">Tanggung Jawab <span class="text-slate-500 text-xs">(satu per baris)</span></label>
                <textarea name="responsibilities" rows="5">{{ old('responsibilities', is_array($experience->responsibilities) ? implode("\n", $experience->responsibilities) : '') }}</textarea>
            </div>
            <div>
                <label class="block mb-2">Pencapaian <span class="text-slate-500 text-xs">(satu per baris)</span></label>
                <textarea name="achievements" rows="4">{{ old('achievements', is_array($experience->achievements) ? implode("\n", $experience->achievements) : '') }}</textarea>
            </div>
            <div>
                <label class="block mb-2">Tech Stack <span class="text-slate-500 text-xs">(pisahkan dengan koma)</span></label>
                <input type="text" name="technologies" value="{{ old('technologies', is_array($experience->technologies) ? implode(', ', $experience->technologies) : '') }}">
            </div>
        </div>

        <div class="card p-6 space-y-4">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Pengaturan</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Urutan</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $experience->sort_order) }}" min="0">
                </div>
                <div class="flex items-center gap-2 mt-6">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $experience->is_active) ? 'checked' : '' }}>
                    <label for="is_active" class="cursor-pointer">Tampilkan (Aktif)</label>
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> Update
            </button>
            <a href="{{ route('admin.experiences.index') }}" class="btn-outline">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection
