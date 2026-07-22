@extends('layouts.admin')
@section('title', 'Edit Organisasi')
@section('page-title', 'Edit Organisasi')
@section('breadcrumb')<a href="{{ route('admin.organizations.index') }}" class="hover:text-slate-300">Organisasi</a><span class="mx-1">›</span><span class="text-slate-300">Edit</span>@endsection
@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.organizations.update', $organization) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf @method('PUT')
        <div class="card p-6 space-y-5">
            <div><label class="block mb-2">Nama Organisasi *</label><input type="text" name="organization_name" value="{{ old('organization_name', $organization->organization_name) }}" required></div>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block mb-2">Jabatan *</label><input type="text" name="role" value="{{ old('role', $organization->role) }}" required></div>
                <div><label class="block mb-2">Divisi</label><input type="text" name="division" value="{{ old('division', $organization->division) }}"></div>
            </div>
            <div><label class="block mb-2">Institusi</label><input type="text" name="institution" value="{{ old('institution', $organization->institution) }}"></div>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block mb-2">Mulai</label><input type="date" name="start_date" value="{{ old('start_date', $organization->start_date?->format('Y-m-d')) }}" required></div>
                <div><label class="block mb-2">Selesai</label><input type="date" name="end_date" value="{{ old('end_date', $organization->end_date?->format('Y-m-d')) }}"></div>
                <div class="flex items-center gap-2"><input type="checkbox" name="is_current" value="1" {{ old('is_current', $organization->is_current) ? 'checked' : '' }}><label class="cursor-pointer">Masih aktif</label></div>
            </div>
            <div><label class="block mb-2">Deskripsi</label><textarea name="description" rows="3">{{ old('description', $organization->description) }}</textarea></div>
            <div><label class="block mb-2">Pencapaian</label><textarea name="achievements" rows="3">{{ old('achievements', is_array($organization->achievements) ? implode("\n", $organization->achievements) : '') }}</textarea></div>
            <div class="flex items-center gap-2"><input type="checkbox" name="is_active" value="1" {{ old('is_active', $organization->is_active) ? 'checked' : '' }}><label class="cursor-pointer">Tampilkan</label></div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="btn-primary"><i class="fas fa-save"></i> Update</button>
            <a href="{{ route('admin.organizations.index') }}" class="btn-outline"><i class="fas fa-times"></i> Batal</a>
        </div>
    </form>
</div>
@endsection
