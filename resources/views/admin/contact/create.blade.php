@extends('layouts.admin')

@section('title', 'Tambah Contact Section')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <form action="{{ route('admin.contact.store') }}" method="POST">
        @csrf
        <div class="space-y-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Contact</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" value="{{ old('title') }}" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                    <input type="text" name="phone" id="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" value="{{ old('phone') }}" required>
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" name="address" id="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" value="{{ old('address') }}" required>
                @error('address')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="github_url" class="block text-sm font-medium text-gray-700">URL GitHub</label>
                    <input type="url" name="github_url" id="github_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" value="{{ old('github_url') }}">
                    @error('github_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="linkedin_url" class="block text-sm font-medium text-gray-700">URL LinkedIn</label>
                    <input type="url" name="linkedin_url" id="linkedin_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" value="{{ old('linkedin_url') }}">
                    @error('linkedin_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="twitter_url" class="block text-sm font-medium text-gray-700">URL Twitter</label>
                    <input type="url" name="twitter_url" id="twitter_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" value="{{ old('twitter_url') }}">
                    @error('twitter_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="instagram_url" class="block text-sm font-medium text-gray-700">URL Instagram</label>
                    <input type="url" name="instagram_url" id="instagram_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" value="{{ old('instagram_url') }}">
                    @error('instagram_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" id="is_active" value="1" class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded" {{ old('is_active') ? 'checked' : '' }}>
                <label for="is_active" class="ml-2 block text-sm text-gray-900">
                    Aktifkan sebagai contact section utama
                </label>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.contact.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                    Simpan Contact Section
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
