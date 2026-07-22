@extends('layouts.admin')
@section('title', 'Upload Sertifikat')
@section('page-title', 'Upload Sertifikat Baru')
@section('breadcrumb')
<a href="{{ route('admin.certificates.index') }}" class="hover:text-slate-300">Sertifikat</a>
<span class="mx-1">›</span><span class="text-slate-300">Upload</span>
@endsection

@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.certificates.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Informasi Sertifikat</h3>
            <div>
                <label class="block mb-2">Nama Sertifikat *</label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. Belajar Dasar Pemrograman Web">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Kategori *</label>
                    <select name="category" required>
                        <option value="">Pilih Kategori</option>
                        <option value="certification" {{ old('category') === 'certification' ? 'selected' : '' }}>Sertifikasi Profesi</option>
                        <option value="training" {{ old('category') === 'training' ? 'selected' : '' }}>Pelatihan</option>
                        <option value="workshop" {{ old('category') === 'workshop' ? 'selected' : '' }}>Workshop</option>
                        <option value="seminar" {{ old('category') === 'seminar' ? 'selected' : '' }}>Seminar</option>
                        <option value="webinar" {{ old('category') === 'webinar' ? 'selected' : '' }}>Webinar</option>
                        <option value="achievement" {{ old('category') === 'achievement' ? 'selected' : '' }}>Prestasi</option>
                        <option value="competition" {{ old('category') === 'competition' ? 'selected' : '' }}>Kompetisi</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-2">Penyelenggara / Issuer</label>
                    <input type="text" name="issuer" value="{{ old('issuer') }}" placeholder="e.g. Dicoding Indonesia">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Tanggal Terbit</label>
                    <input type="date" name="date" value="{{ old('date') }}">
                </div>
                <div>
                    <label class="block mb-2">No. Sertifikat</label>
                    <input type="text" name="certificate_number" value="{{ old('certificate_number') }}" placeholder="e.g. CERT-2024-0001">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Tanggal Kedaluwarsa</label>
                    <input type="date" name="expired_date" value="{{ old('expired_date') }}">
                </div>
                <div class="flex items-center gap-2 mt-7">
                    <input type="checkbox" name="no_expiry" id="no_expiry" value="1" {{ old('no_expiry', true) ? 'checked' : '' }}>
                    <label for="no_expiry" class="cursor-pointer">Tidak Kedaluwarsa</label>
                </div>
            </div>
            <div>
                <label class="block mb-2">Deskripsi</label>
                <textarea name="description" rows="3" placeholder="Deskripsi singkat sertifikat...">{{ old('description') }}</textarea>
            </div>
        </div>

        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Upload Berkas</h3>
            <div>
                <label class="block mb-2">Gambar Sertifikat / Foto <span class="text-slate-500 text-xs">(JPG, PNG - Max 5MB)</span></label>
                <input type="file" name="image" accept="image/*" id="image-input">
                <div id="image-preview" class="mt-3 hidden">
                    <img id="preview-img" src="" alt="" class="max-h-40 rounded-lg border border-white/10">
                </div>
            </div>
            <div>
                <label class="block mb-2">Thumbnail <span class="text-slate-500 text-xs">(Opsional - untuk tampilan gallery, Max 3MB)</span></label>
                <input type="file" name="thumbnail" accept="image/*">
            </div>
            <div>
                <label class="block mb-2">File PDF <span class="text-slate-500 text-xs">(Opsional - Max 10MB)</span></label>
                <input type="file" name="file_pdf" accept=".pdf">
            </div>
        </div>

        <div class="card p-6 space-y-4">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Pengaturan</h3>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block mb-2">Urutan</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                </div>
                <div>
                    <label class="block mb-2">Status</label>
                    <select name="status">
                        <option value="active">Aktif</option>
                        <option value="expired">Kedaluwarsa</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>
                <div class="space-y-3 mt-1">
                    <div class="flex items-center gap-2 mt-6">
                        <input type="checkbox" name="featured" id="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                        <label for="featured" class="cursor-pointer">Featured</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                        <label for="is_active" class="cursor-pointer">Tampilkan</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-primary">
                <i class="fas fa-upload"></i> Upload Sertifikat
            </button>
            <a href="{{ route('admin.certificates.index') }}" class="btn-outline">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('image-input')?.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-img').src = e.target.result;
            document.getElementById('image-preview').classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endpush
