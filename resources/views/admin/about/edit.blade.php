@extends('layouts.admin')

@section('title', 'Edit About Section')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <form action="{{ route('admin.about.update', $about) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" value="{{ old('name', $about->name) }}" required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" required>{{ old('description', $about->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="age" class="block text-sm font-medium text-gray-700">Umur</label>
                    <input type="number" name="age" id="age" min="1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" value="{{ old('age', $about->age) }}" required>
                    @error('age')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" value="{{ old('email', $about->email) }}" required>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                    <input type="text" name="phone" id="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" value="{{ old('phone', $about->phone) }}">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <input type="text" name="address" id="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" value="{{ old('address', $about->address) }}" required>
                    @error('address')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700">Foto Profile</label>
                @if($about->photo)
                    <div class="mb-2">
                        <img src="{{ Storage::url($about->photo) }}" alt="Current photo" class="w-20 h-20 object-cover rounded-full">
                        <p class="text-sm text-gray-500 mt-1">Foto saat ini</p>
                    </div>
                @endif
                <input type="file" name="photo" id="photo" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                @error('photo')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="cv_file" class="block text-sm font-medium text-gray-700">File CV (PDF)</label>
                @if($about->cv_file)
                    <div class="mb-2">
                        <a href="{{ Storage::url($about->cv_file) }}" target="_blank" class="text-purple-600 hover:text-purple-800">
                            <i class="fas fa-file-pdf mr-1"></i> Lihat CV saat ini
                        </a>
                    </div>
                @endif
                <input type="file" name="cv_file" id="cv_file" accept=".pdf" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                @error('cv_file')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" id="is_active" value="1" class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded" {{ old('is_active', $about->is_active) ? 'checked' : '' }}>
                <label for="is_active" class="ml-2 block text-sm text-gray-900">
                    Aktifkan sebagai about section utama
                </label>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.about.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-purple-500 text-white rounded-md hover:bg-purple-600">
                    Update About Section
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
