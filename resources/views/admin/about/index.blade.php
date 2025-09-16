@extends('layouts.admin')

@section('title', 'Kelola About Sections')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Daftar About Section</h2>
        <a href="{{ route('admin.about.create') }}" class="bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600">
            Tambah About Section
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Age</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($abouts as $about)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($about->photo)
                            <img src="{{ Storage::url($about->photo) }}" alt="{{ $about->name }}" class="w-12 h-12 object-cover rounded-full">
                        @else
                            <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-gray-500"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $about->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-600">{{ $about->email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-600">{{ $about->age }} tahun</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $about->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $about->is_active ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.about.edit', $about) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.about.destroy', $about) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus about section ini?')">
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

    @if($abouts->isEmpty())
        <div class="text-center py-12">
            <i class="fas fa-user text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-lg">Belum ada about section yang dibuat</p>
            <a href="{{ route('admin.about.create') }}" class="mt-4 inline-block bg-purple-500 text-white px-6 py-2 rounded-lg hover:bg-purple-600">
                Buat About Section Pertama
            </a>
        </div>
    @endif
</div>
@endsection
