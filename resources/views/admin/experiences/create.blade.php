@extends('layouts.admin')
@section('title', 'Tambah Pengalaman')
@section('page-title', 'Tambah Pengalaman Kerja')
@section('breadcrumb')
<a href="{{ route('admin.experiences.index') }}" class="hover:text-slate-300">Pengalaman</a>
<span class="mx-1">›</span><span class="text-slate-300">Tambah</span>
@endsection

@section('content')
<div class="max-w-3xl">
    <form method="POST" action="{{ route('admin.experiences.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Informasi Perusahaan</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Nama Perusahaan *</label>
                    <input type="text" name="company_name" value="{{ old('company_name') }}" required>
                </div>
                <div>
                    <label class="block mb-2">Logo Perusahaan</label>
                    <input type="file" name="company_logo" accept="image/*">
                </div>
            </div>
            <div>
                <label class="block mb-2">Website Perusahaan</label>
                <input type="url" name="company_website" value="{{ old('company_website') }}" placeholder="https://...">
            </div>
            <div>
                <label class="block mb-2">Deskripsi Perusahaan</label>
                <textarea name="company_description" rows="3" placeholder="Deskripsi singkat tentang perusahaan...">{{ old('company_description') }}</textarea>
            </div>
        </div>

        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Detail Posisi</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Posisi / Jabatan *</label>
                    <input type="text" name="position" value="{{ old('position') }}" required placeholder="e.g. Full Stack Web Developer Intern">
                </div>
                <div>
                    <label class="block mb-2">Tipe Pekerjaan *</label>
                    <select name="type" required>
                        <option value="internship" {{ old('type') === 'internship' ? 'selected' : '' }}>Magang / Internship</option>
                        <option value="full-time" {{ old('type') === 'full-time' ? 'selected' : '' }}>Full Time</option>
                        <option value="part-time" {{ old('type') === 'part-time' ? 'selected' : '' }}>Part Time</option>
                        <option value="freelance" {{ old('type') === 'freelance' ? 'selected' : '' }}>Freelance</option>
                        <option value="contract" {{ old('type') === 'contract' ? 'selected' : '' }}>Contract</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block mb-2">Lokasi</label>
                <input type="text" name="location" value="{{ old('location') }}" placeholder="e.g. Semarang, Jawa Tengah / Remote">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Tanggal Mulai *</label>
                    <input type="date" name="start_date" value="{{ old('start_date') }}" required>
                </div>
                <div>
                    <label class="block mb-2">Tanggal Selesai</label>
                    <input type="date" name="end_date" value="{{ old('end_date') }}">
                </div>
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_current" id="is_current" value="1" {{ old('is_current') ? 'checked' : '' }}>
                <label for="is_current" class="cursor-pointer">Masih berlangsung / Current</label>
            </div>
            <div>
                <label class="block mb-2">Deskripsi Pekerjaan</label>
                <textarea name="description" rows="4" placeholder="Deskripsi singkat tentang pekerjaan...">{{ old('description') }}</textarea>
            </div>
        </div>

        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Detail & Pencapaian</h3>
            <div>
                <label class="block mb-2">Tanggung Jawab <span class="text-slate-500 text-xs">(satu per baris)</span></label>
                <textarea name="responsibilities" rows="5" placeholder="Mengembangkan fitur frontend&#10;Membangun REST API&#10;Mengelola database MySQL">{{ old('responsibilities', is_array(old('responsibilities')) ? implode("\n", old('responsibilities')) : '') }}</textarea>
            </div>
            <div>
                <label class="block mb-2">Pencapaian <span class="text-slate-500 text-xs">(satu per baris)</span></label>
                <textarea name="achievements" rows="4" placeholder="Berhasil menyelesaikan proyek CMS&#10;Meningkatkan performa API 30%">{{ old('achievements') }}</textarea>
            </div>
            <div>
                <label class="block mb-2">Tech Stack <span class="text-slate-500 text-xs">(pisahkan dengan koma)</span></label>
                <input type="text" name="technologies" value="{{ old('technologies') }}" placeholder="Laravel, PHP, JavaScript, React, MySQL">
            </div>
        </div>

        <div class="card p-6 space-y-4">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Pengaturan</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Urutan (sort_order)</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                </div>
                <div class="flex items-center gap-2 mt-6">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                    <label for="is_active" class="cursor-pointer">Tampilkan (Aktif)</label>
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('admin.experiences.index') }}" class="btn-outline">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection
