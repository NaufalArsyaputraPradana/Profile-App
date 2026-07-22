@extends('layouts.admin')
@section('title', 'Hero Section')
@section('page-title', 'Pengaturan Hero Section')
@section('breadcrumb')<span class="text-slate-300">Hero Section</span>@endsection

@section('content')
<div class="max-w-3xl">
    <div class="alert-success mb-6 bg-blue-500/10 border border-blue-500/20 text-blue-400">
        <i class="fas fa-info-circle mr-2"></i> Hero section adalah bagian pertama yang dilihat pengunjung saat membuka website Anda.
    </div>

    <form method="POST" action="{{ route('admin.hero.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf @method('PUT')
        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Teks Utama</h3>
            <div>
                <label class="block mb-2">Salam / Sapaan (Greeting)</label>
                <input type="text" name="greeting" value="{{ old('greeting', $hero->greeting ?? 'Halo, Saya') }}" placeholder="e.g. Halo, Saya">
            </div>
            <div>
                <label class="block mb-2">Nama Utama (Headline)</label>
                <input type="text" name="headline" value="{{ old('headline', $hero->headline ?? '') }}" required placeholder="e.g. Naufal Arsyaputra Pradana">
            </div>
            <div>
                <label class="block mb-2">Sub-headline / Peran <span class="text-slate-500 text-xs">(Gunakan koma untuk animasi typing, misal: Full Stack Developer, UI/UX Designer)</span></label>
                <input type="text" name="subheadline" value="{{ old('subheadline', $hero->subheadline ?? '') }}" placeholder="e.g. Full Stack Web Developer, Software Architect">
            </div>
            <div>
                <label class="block mb-2">Deskripsi Singkat</label>
                <textarea name="description" rows="3" placeholder="Deskripsi singkat yang muncul di bawah peran...">{{ old('description', $hero->description ?? '') }}</textarea>
            </div>
        </div>

        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Media (Opsional)</h3>
            <div>
                <label class="block mb-2">Gambar / Avatar Hero</label>
                @if(isset($hero) && $hero->image)
                <div class="mb-3">
                    <img src="{{ Storage::url($hero->image) }}" alt="Hero Image" class="max-h-40 rounded-xl border border-white/10">
                </div>
                @endif
                <input type="file" name="image" accept="image/*">
            </div>
            
            <div class="flex items-center gap-2 mt-6">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $hero->is_active ?? true) ? 'checked' : '' }}>
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
