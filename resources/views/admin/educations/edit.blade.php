@extends('layouts.admin')
@section('title', 'Edit Pendidikan')
@section('page-title', 'Edit Pendidikan')
@section('breadcrumb')
<a href="{{ route('admin.educations.index') }}" class="hover:text-slate-300">Pendidikan</a>
<span class="mx-1">›</span><span class="text-slate-300">Edit</span>
@endsection

@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.educations.update', $education) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf @method('PUT')
        <div class="card p-6 space-y-5">
            <h3 class="text-white font-semibold border-b border-white/5 pb-3">Informasi Pendidikan</h3>
            <div>
                <label class="block mb-2">Nama Institusi *</label>
                <input type="text" name="institution_name" value="{{ old('institution_name', $education->institution_name) }}" required>
            </div>
            <div>
                <label class="block mb-2">Logo</label>
                @if($education->institution_logo)<div class="mb-2"><img src="{{ Storage::url($education->institution_logo) }}" class="w-12 h-12 rounded-lg object-cover"></div>@endif
                <input type="file" name="institution_logo" accept="image/*">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Jenjang</label>
                    <input type="text" name="degree" value="{{ old('degree', $education->degree) }}">
                </div>
                <div>
                    <label class="block mb-2">Jurusan</label>
                    <input type="text" name="field_of_study" value="{{ old('field_of_study', $education->field_of_study) }}">
                </div>
                <div>
                    <label class="block mb-2">Tanggal Mulai</label>
                    <input type="date" name="start_date" value="{{ old('start_date', $education->start_date?->format('Y-m-d')) }}" required>
                </div>
                <div>
                    <label class="block mb-2">Tanggal Selesai</label>
                    <input type="date" name="end_date" value="{{ old('end_date', $education->end_date?->format('Y-m-d')) }}">
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="is_current" id="is_current" value="1" {{ old('is_current', $education->is_current) ? 'checked' : '' }}>
                    <label for="is_current" class="cursor-pointer">Masih berlangsung</label>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">IPK</label>
                    <input type="number" name="gpa" step="0.01" min="0" max="4" value="{{ old('gpa', $education->gpa) }}">
                </div>
                <div>
                    <label class="block mb-2">Skala</label>
                    <input type="text" name="gpa_scale" value="{{ old('gpa_scale', $education->gpa_scale ?? '4.00') }}">
                </div>
            </div>
            <div>
                <label class="block mb-2">Lokasi</label>
                <input type="text" name="location" value="{{ old('location', $education->location) }}">
            </div>
            <div>
                <label class="block mb-2">Deskripsi</label>
                <textarea name="description" rows="3">{{ old('description', $education->description) }}</textarea>
            </div>
            <div>
                <label class="block mb-2">Pencapaian</label>
                <textarea name="achievements" rows="3">{{ old('achievements', is_array($education->achievements) ? implode("\n", $education->achievements) : '') }}</textarea>
            </div>
            <div>
                <label class="block mb-2">Kegiatan</label>
                <textarea name="activities" rows="3">{{ old('activities', is_array($education->activities) ? implode("\n", $education->activities) : '') }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Urutan</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $education->sort_order) }}" min="0">
                </div>
                <div class="flex items-center gap-2 mt-6">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $education->is_active) ? 'checked' : '' }}>
                    <label for="is_active" class="cursor-pointer">Aktif / Tampilkan</label>
                </div>
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="btn-primary"><i class="fas fa-save"></i> Update</button>
            <a href="{{ route('admin.educations.index') }}" class="btn-outline"><i class="fas fa-times"></i> Batal</a>
        </div>
    </form>
</div>
@endsection
