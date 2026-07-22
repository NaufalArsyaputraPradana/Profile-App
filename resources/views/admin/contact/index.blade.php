@extends('layouts.admin')
@section('title', 'Contact Section')
@section('page-title', 'Pengaturan Kontak')
@section('breadcrumb')<span class="text-slate-300">Contact Section</span>@endsection

@section('content')
<div class="max-w-3xl">
    <form method="POST" action="{{ route('admin.contact.update') }}" class="space-y-6">
        @csrf @method('PUT')
        
        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Informasi Kontak</h3>
            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $contact->email ?? '') }}" placeholder="e.g. hello@example.com">
                </div>
                <div>
                    <label class="block mb-2">Telepon / WhatsApp</label>
                    <input type="text" name="phone" value="{{ old('phone', $contact->phone ?? '') }}" placeholder="e.g. +62 812-3456-7890">
                </div>
            </div>
            <div>
                <label class="block mb-2">Lokasi / Alamat</label>
                <input type="text" name="location" value="{{ old('location', $contact->location ?? '') }}" placeholder="e.g. Semarang, Jawa Tengah, Indonesia">
            </div>
            <div>
                <label class="block mb-2">Pesan Singkat (Deskripsi)</label>
                <textarea name="description" rows="3">{{ old('description', $contact->description ?? '') }}</textarea>
            </div>
        </div>

        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Sosial Media</h3>
            <div>
                <label class="block mb-2">URL GitHub</label>
                <input type="url" name="github" value="{{ old('github', $contact->github ?? '') }}" placeholder="https://github.com/...">
            </div>
            <div>
                <label class="block mb-2">URL LinkedIn</label>
                <input type="url" name="linkedin" value="{{ old('linkedin', $contact->linkedin ?? '') }}" placeholder="https://linkedin.com/in/...">
            </div>
            <div>
                <label class="block mb-2">URL Instagram</label>
                <input type="url" name="instagram" value="{{ old('instagram', $contact->instagram ?? '') }}" placeholder="https://instagram.com/...">
            </div>
            <div>
                <label class="block mb-2">URL Twitter / X</label>
                <input type="url" name="twitter" value="{{ old('twitter', $contact->twitter ?? '') }}" placeholder="https://twitter.com/...">
            </div>
        </div>

        <div class="card p-6 space-y-5">
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $contact->is_active ?? true) ? 'checked' : '' }}>
                <label for="is_active" class="cursor-pointer">Aktifkan Contact Section</label>
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
