@extends('layouts.admin')
@section('title', 'Edit Sertifikasi')
@section('page-title', 'Edit Sertifikasi')
@section('breadcrumb')<a href="{{ route('admin.certifications.index') }}" class="hover:text-slate-300">Sertifikasi</a><span class="mx-1">›</span><span class="text-slate-300">Edit</span>@endsection
@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.certifications.update', $certification) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf @method('PUT')
        <div class="card p-6 space-y-5">
            <div><label class="block mb-2">Nama *</label><input type="text" name="name" value="{{ old('name', $certification->name) }}" required></div>
            <div><label class="block mb-2">Penerbit *</label><input type="text" name="issuer" value="{{ old('issuer', $certification->issuer) }}" required></div>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block mb-2">Credential ID</label><input type="text" name="credential_id" value="{{ old('credential_id', $certification->credential_id) }}"></div>
                <div><label class="block mb-2">Level</label><input type="text" name="level" value="{{ old('level', $certification->level) }}"></div>
                <div><label class="block mb-2">Tanggal Terbit</label><input type="date" name="issue_date" value="{{ old('issue_date', $certification->issue_date?->format('Y-m-d')) }}"></div>
                <div><label class="block mb-2">Tanggal Kedaluwarsa</label><input type="date" name="expiry_date" value="{{ old('expiry_date', $certification->expiry_date?->format('Y-m-d')) }}"></div>
            </div>
            <div class="flex items-center gap-2"><input type="checkbox" name="no_expiry" value="1" {{ old('no_expiry', $certification->no_expiry) ? 'checked' : '' }}><label class="cursor-pointer">Tidak Kedaluwarsa</label></div>
            <div><label class="block mb-2">URL Verifikasi</label><input type="url" name="credential_url" value="{{ old('credential_url', $certification->credential_url) }}"></div>
            <div>
                <label class="block mb-2">Badge / Gambar</label>
                @if($certification->badge_image)<div class="mb-2"><img src="{{ Storage::url($certification->badge_image) }}" class="w-16 h-16 rounded-lg object-cover"></div>@endif
                <input type="file" name="badge_image" accept="image/*">
            </div>
            <div><label class="block mb-2">Deskripsi</label><textarea name="description" rows="3">{{ old('description', $certification->description) }}</textarea></div>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex items-center gap-2"><input type="checkbox" name="featured" value="1" {{ old('featured', $certification->featured) ? 'checked' : '' }}><label class="cursor-pointer">Featured</label></div>
                <div class="flex items-center gap-2"><input type="checkbox" name="is_active" value="1" {{ old('is_active', $certification->is_active) ? 'checked' : '' }}><label class="cursor-pointer">Tampilkan</label></div>
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="btn-primary"><i class="fas fa-save"></i> Update</button>
            <a href="{{ route('admin.certifications.index') }}" class="btn-outline"><i class="fas fa-times"></i> Batal</a>
        </div>
    </form>
</div>
@endsection
