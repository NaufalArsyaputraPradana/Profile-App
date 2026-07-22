@extends('layouts.admin')
@section('title', 'Tambah Sertifikasi')
@section('page-title', 'Tambah Sertifikasi Profesi')
@section('breadcrumb')<a href="{{ route('admin.certifications.index') }}" class="hover:text-slate-300">Sertifikasi</a><span class="mx-1">›</span><span class="text-slate-300">Tambah</span>@endsection
@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.certifications.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="card p-6 space-y-5">
            <div><label class="block mb-2">Nama Sertifikasi *</label><input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. Skema Sertifikasi Pengembang Web"></div>
            <div><label class="block mb-2">Penerbit / Issuer *</label><input type="text" name="issuer" value="{{ old('issuer') }}" required placeholder="e.g. LSP UDINUS"></div>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block mb-2">Credential ID</label><input type="text" name="credential_id" value="{{ old('credential_id') }}"></div>
                <div><label class="block mb-2">Level</label><input type="text" name="level" value="{{ old('level') }}" placeholder="e.g. Muda / Junior"></div>
                <div><label class="block mb-2">Tanggal Terbit</label><input type="date" name="issue_date" value="{{ old('issue_date') }}"></div>
                <div><label class="block mb-2">Tanggal Kedaluwarsa</label><input type="date" name="expiry_date" value="{{ old('expiry_date') }}"></div>
            </div>
            <div class="flex items-center gap-2"><input type="checkbox" name="no_expiry" id="no_expiry" value="1" {{ old('no_expiry') ? 'checked' : '' }}><label for="no_expiry" class="cursor-pointer">Tidak Kedaluwarsa</label></div>
            <div><label class="block mb-2">URL Verifikasi</label><input type="url" name="credential_url" value="{{ old('credential_url') }}" placeholder="https://..."></div>
            <div><label class="block mb-2">Badge / Gambar</label><input type="file" name="badge_image" accept="image/*"></div>
            <div><label class="block mb-2">Deskripsi</label><textarea name="description" rows="3">{{ old('description') }}</textarea></div>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex items-center gap-2 mt-1"><input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}><label class="cursor-pointer">Featured</label></div>
                <div class="flex items-center gap-2 mt-1"><input type="checkbox" name="is_active" value="1" checked><label class="cursor-pointer">Tampilkan</label></div>
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <a href="{{ route('admin.certifications.index') }}" class="btn-outline"><i class="fas fa-times"></i> Batal</a>
        </div>
    </form>
</div>
@endsection
