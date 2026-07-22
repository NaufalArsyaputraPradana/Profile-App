@extends('layouts.admin')
@section('title', 'Edit Keahlian')
@section('page-title', 'Edit Keahlian')
@section('breadcrumb')
<a href="{{ route('admin.skills.index') }}" class="hover:text-slate-300">Skills</a>
<span class="mx-1">›</span><span class="text-slate-300">Edit</span>
@endsection

@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.skills.update', $skill) }}" class="space-y-6">
        @csrf @method('PUT')
        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Informasi Skill</h3>
            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Nama Skill *</label>
                    <input type="text" name="name" value="{{ old('name', $skill->name) }}" required>
                </div>
                <div>
                    <label class="block mb-2">Kategori *</label>
                    <select name="category" required>
                        <option value="frontend" {{ old('category', $skill->category) === 'frontend' ? 'selected' : '' }}>Frontend</option>
                        <option value="backend" {{ old('category', $skill->category) === 'backend' ? 'selected' : '' }}>Backend</option>
                        <option value="design" {{ old('category', $skill->category) === 'design' ? 'selected' : '' }}>Design / UI/UX</option>
                        <option value="tools" {{ old('category', $skill->category) === 'tools' ? 'selected' : '' }}>Tools & DevOps</option>
                        <option value="soft" {{ old('category', $skill->category) === 'soft' ? 'selected' : '' }}>Soft Skills</option>
                    </select>
                </div>
            </div>
            
            <div>
                <label class="block mb-2 flex justify-between">
                    <span>Tingkat Kemahiran (Percentage) *</span>
                    <span id="prof-val" class="text-blue-400 font-bold">{{ old('percentage', $skill->percentage) }}%</span>
                </label>
                <input type="range" name="percentage" min="0" max="100" step="5" value="{{ old('percentage', $skill->percentage) }}" 
                       class="w-full accent-blue-500" id="prof-slider">
            </div>

            <div>
                <label class="block mb-2">Icon (FontAwesome Class) <span class="text-slate-500 text-xs">Atau nama file gambar</span></label>
                <div class="flex gap-4 mb-3">
                    <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-xl text-slate-300">
                        @if($skill->icon && Str::startsWith($skill->icon, 'fa'))
                            <i class="{{ $skill->icon }}" id="icon-preview"></i>
                        @else
                            <i class="fas fa-tools" id="icon-preview"></i>
                        @endif
                    </div>
                    <input type="text" name="icon" value="{{ old('icon', $skill->icon) }}" class="flex-1" id="icon-input">
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> Update Skill
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
document.getElementById('icon-input')?.addEventListener('input', function() {
    if(this.value.startsWith('fa')) {
        document.getElementById('icon-preview').className = this.value;
    }
});
</script>
@endpush
