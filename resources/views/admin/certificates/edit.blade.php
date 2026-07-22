@extends('layouts.admin')
@section('title', 'Edit Sertifikat')
@section('page-title', 'Edit Sertifikat')
@section('breadcrumb')
<a href="{{ route('admin.certificates.index') }}" class="hover:text-slate-300">Sertifikat</a>
<span class="mx-1">›</span><span class="text-slate-300">Edit</span>
@endsection

@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.certificates.update', $certificate) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf @method('PUT')
        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Informasi Sertifikat</h3>
            <div>
                <label class="block mb-2">Nama Sertifikat *</label>
                <input type="text" name="name" value="{{ old('name', $certificate->name) }}" required>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Kategori *</label>
                    <select name="category" required>
                        @foreach(['certification'=>'Sertifikasi Profesi', 'training'=>'Pelatihan', 'workshop'=>'Workshop', 'seminar'=>'Seminar', 'webinar'=>'Webinar', 'achievement'=>'Prestasi', 'competition'=>'Kompetisi'] as $val => $label)
                        <option value="{{ $val }}" {{ old('category', $certificate->category) === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block mb-2">Penyelenggara</label>
                    <input type="text" name="issuer" value="{{ old('issuer', $certificate->issuer) }}">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Tanggal Terbit</label>
                    <input type="date" name="date" value="{{ old('date', $certificate->date?->format('Y-m-d')) }}">
                </div>
                <div>
                    <label class="block mb-2">No. Sertifikat</label>
                    <input type="text" name="certificate_number" value="{{ old('certificate_number', $certificate->certificate_number) }}">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Tanggal Kedaluwarsa</label>
                    <input type="date" name="expired_date" value="{{ old('expired_date', $certificate->expired_date?->format('Y-m-d')) }}">
                </div>
                <div class="flex items-center gap-2 mt-7">
                    <input type="checkbox" name="no_expiry" id="no_expiry" value="1" {{ old('no_expiry', $certificate->no_expiry) ? 'checked' : '' }}>
                    <label for="no_expiry" class="cursor-pointer">Tidak Kedaluwarsa</label>
                </div>
            </div>
            <div>
                <label class="block mb-2">Deskripsi</label>
                <textarea name="description" rows="3">{{ old('description', $certificate->description) }}</textarea>
            </div>
        </div>

        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Berkas</h3>
            <div>
                <label class="block mb-2">Gambar Sertifikat (Biarkan kosong jika tidak ingin mengganti)</label>
                @if($certificate->image)
                <div class="mb-3">
                    <img src="{{ Storage::url($certificate->image) }}" alt="" class="max-h-32 rounded-lg border border-white/10">
                </div>
                @endif
                <input type="file" name="image" accept="image/*">
            </div>
            <div>
                <label class="block mb-2">Thumbnail</label>
                @if($certificate->thumbnail)
                <div class="mb-3">
                    <img src="{{ Storage::url($certificate->thumbnail) }}" alt="" class="max-h-24 rounded-lg border border-white/10">
                </div>
                @endif
                <input type="file" name="thumbnail" accept="image/*">
            </div>
            <div>
                <label class="block mb-2">File PDF</label>
                @if($certificate->file_pdf)
                <div class="mb-3">
                    <a href="{{ Storage::url($certificate->file_pdf) }}" target="_blank" class="text-blue-400 text-sm flex items-center gap-2">
                        <i class="fas fa-file-pdf text-red-400"></i> PDF Tersedia - Lihat
                    </a>
                </div>
                @endif
                <input type="file" name="file_pdf" accept=".pdf">
            </div>
        </div>

        <div class="card p-6 space-y-4">
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block mb-2">Urutan</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $certificate->sort_order) }}" min="0">
                </div>
                <div>
                    <label class="block mb-2">Status</label>
                    <select name="status">
                        @foreach(['active'=>'Aktif', 'expired'=>'Kedaluwarsa', 'pending'=>'Pending'] as $val => $label)
                        <option value="{{ $val }}" {{ old('status', $certificate->status) === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="space-y-3 mt-1">
                    <div class="flex items-center gap-2 mt-6">
                        <input type="checkbox" name="featured" id="featured" value="1" {{ old('featured', $certificate->featured) ? 'checked' : '' }}>
                        <label for="featured" class="cursor-pointer">Featured</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $certificate->is_active) ? 'checked' : '' }}>
                        <label for="is_active" class="cursor-pointer">Tampilkan</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-primary"><i class="fas fa-save"></i> Update</button>
            <a href="{{ route('admin.certificates.index') }}" class="btn-outline"><i class="fas fa-times"></i> Batal</a>
        </div>
    </form>
</div>
@endsection
