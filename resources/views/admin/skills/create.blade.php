@extends('layouts.admin')
@section('title', 'Tambah Keahlian')
@section('page-title', 'Tambah Keahlian Baru')
@section('breadcrumb')
<a href="{{ route('admin.skills.index') }}" class="hover:text-slate-300">Skills</a>
<span class="mx-1">›</span><span class="text-slate-300">Tambah</span>
@endsection

@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.skills.store') }}" class="space-y-6">
        @csrf
        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Informasi Skill</h3>
            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Nama Skill *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. Laravel, React, Figma">
                </div>
                <div>
                    <label class="block mb-2">Kategori *</label>
                    <select name="category" required>
                        <option value="frontend" {{ old('category') === 'frontend' ? 'selected' : '' }}>Frontend</option>
                        <option value="backend" {{ old('category') === 'backend' ? 'selected' : '' }}>Backend</option>
                        <option value="design" {{ old('category') === 'design' ? 'selected' : '' }}>Design / UI/UX</option>
                        <option value="tools" {{ old('category') === 'tools' ? 'selected' : '' }}>Tools & DevOps</option>
                        <option value="soft" {{ old('category') === 'soft' ? 'selected' : '' }}>Soft Skills</option>
                    </select>
                </div>
            </div>
            
            <div>
                <label class="block mb-2 flex justify-between">
                    <span>Tingkat Kemahiran (Percentage) *</span>
                    <span id="prof-val" class="text-blue-400 font-bold">{{ old('percentage', 80) }}%</span>
                </label>
                <input type="range" name="percentage" min="0" max="100" step="5" value="{{ old('percentage', 80) }}" 
                       class="w-full accent-blue-500" id="prof-slider">
            </div>

            <div>
                <label class="block mb-2">Icon (FontAwesome Class) <span class="text-slate-500 text-xs">Atau nama file gambar di public/assets/icons</span></label>
                <input type="text" name="icon" value="{{ old('icon') }}" placeholder="e.g. fab fa-laravel">
                <p class="text-xs text-slate-500 mt-2">
                    Referensi FontAwesome: <a href="https://fontawesome.com/search?o=r&m=free" target="_blank" class="text-blue-400">fontawesome.com</a>
                </p>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> Simpan Skill
            </button>
            <a href="{{ route('admin.skills.index') }}" class="btn-outline">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('prof-slider')?.addEventListener('input', function() {
    document.getElementById('prof-val').textContent = this.value + '%';
});
</script>
@endpush
