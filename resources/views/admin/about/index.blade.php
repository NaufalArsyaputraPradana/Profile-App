@extends('layouts.admin')
@section('title', 'About Section')
@section('page-title', 'Pengaturan About Section')
@section('breadcrumb')<span class="text-slate-300">About Section</span>@endsection

@section('content')
<div class="max-w-3xl">
    <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf @method('PUT')
        
        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Profil Utama</h3>
            <div>
                <label class="block mb-2">Judul Bagian</label>
                <input type="text" name="title" value="{{ old('title', $about->title ?? 'Membangun solusi digital dengan kode dan kreativitas.') }}" required>
            </div>
            <div>
                <label class="block mb-2">Deskripsi Diri</label>
                <textarea name="description" rows="5" required>{{ old('description', $about->description ?? '') }}</textarea>
            </div>
            <div>
                <label class="block mb-2">Foto Profil (About)</label>
                @if(isset($about) && $about->profile_image)
                <div class="mb-3">
                    <img src="{{ Storage::url($about->profile_image) }}" class="max-h-40 rounded-xl border border-white/10">
                </div>
                @endif
                <input type="file" name="profile_image" accept="image/*">
            </div>
        </div>

        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Visi & Misi</h3>
            <div>
                <label class="block mb-2">Visi</label>
                <textarea name="vision" rows="3">{{ old('vision', $about->vision ?? '') }}</textarea>
            </div>
            <div>
                <label class="block mb-2">Misi</label>
                <textarea name="mission" rows="3">{{ old('mission', $about->mission ?? '') }}</textarea>
            </div>
        </div>

        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Berkas CV/Resume</h3>
            <div>
                <label class="block mb-2">File CV Kreatif (PDF)</label>
                @if(isset($about) && $about->cv_kreatif)
                <div class="mb-3">
                    <a href="{{ Storage::url($about->cv_kreatif) }}" target="_blank" class="text-blue-400 text-sm flex items-center gap-2">
                        <i class="fas fa-file-pdf text-red-400"></i> Lihat CV Kreatif Saat Ini
                    </a>
                </div>
                @endif
                <input type="file" name="cv_kreatif" accept=".pdf">
            </div>

            <div>
                <label class="block mb-2">File CV ATS (PDF)</label>
                @if(isset($about) && $about->cv_ats)
                <div class="mb-3">
                    <a href="{{ Storage::url($about->cv_ats) }}" target="_blank" class="text-blue-400 text-sm flex items-center gap-2">
                        <i class="fas fa-file-pdf text-red-400"></i> Lihat CV ATS Saat Ini
                    </a>
                </div>
                @endif
                <input type="file" name="cv_ats" accept=".pdf">
            </div>

            <div class="flex items-center gap-2 mt-6">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $about->is_active ?? true) ? 'checked' : '' }}>
                <label for="is_active" class="cursor-pointer">Aktifkan Section Ini</label>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
