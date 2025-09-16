@extends('layouts.admin')

@section('title', 'Tambah Hero Section')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Hero</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" value="{{ old('title') }}" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="subtitle" class="block text-sm font-medium text-gray-700">Subtitle</label>
                <textarea name="subtitle" id="subtitle" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" required>{{ old('subtitle') }}</textarea>
                @error('subtitle')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="button_text" class="block text-sm font-medium text-gray-700">Text Button</label>
                    <input type="text" name="button_text" id="button_text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" value="{{ old('button_text') }}" required>
                    @error('button_text')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="button_link" class="block text-sm font-medium text-gray-700">Link Button</label>
                    <input type="text" name="button_link" id="button_link" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" value="{{ old('button_link') }}" required>
                    @error('button_link')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="background_image" class="block text-sm font-medium text-gray-700">Background Image</label>
                <input type="file" name="background_image" id="background_image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
                @error('background_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" id="is_active" value="1" class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded" {{ old('is_active') ? 'checked' : '' }}>
                <label for="is_active" class="ml-2 block text-sm text-gray-900">
                    Aktifkan sebagai hero section utama
                </label>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.hero.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600">
                    Simpan Hero Section
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
