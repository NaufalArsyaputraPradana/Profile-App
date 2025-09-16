@extends('layouts.admin')

@section('title', 'Kelola Hero Sections')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Daftar Hero Section</h2>
        <a href="{{ route('admin.hero.create') }}" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600">
            Tambah Hero Section
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Background</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtitle</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Button</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($heroes as $hero)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($hero->background_image)
                            <img src="{{ Storage::url($hero->background_image) }}" alt="Background" class="w-16 h-10 object-cover rounded">
                        @else
                            <div class="w-16 h-10 bg-gray-300 rounded flex items-center justify-center">
                                <i class="fas fa-image text-gray-500"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ Str::limit($hero->title, 30) }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-600">{{ Str::limit($hero->subtitle, 50) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-600">{{ $hero->button_text }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $hero->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $hero->is_active ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.hero.edit', $hero) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.hero.destroy', $hero) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus hero section ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($heroes->isEmpty())
        <div class="text-center py-12">
            <i class="fas fa-star text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-lg">Belum ada hero section yang dibuat</p>
            <a href="{{ route('admin.hero.create') }}" class="mt-4 inline-block bg-orange-500 text-white px-6 py-2 rounded-lg hover:bg-orange-600">
                Buat Hero Section Pertama
            </a>
        </div>
    @endif
</div>
@endsection
