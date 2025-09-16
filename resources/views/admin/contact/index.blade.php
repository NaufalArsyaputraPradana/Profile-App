@extends('layouts.admin')

@section('title', 'Kelola Contact Sections')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Daftar Contact Section</h2>
        <a href="{{ route('admin.contact.create') }}" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
            Tambah Contact Section
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Social Links</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($contacts as $contact)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ Str::limit($contact->title, 30) }}</div>
                        <div class="text-sm text-gray-500">{{ Str::limit($contact->description, 50) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-600">{{ $contact->email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-600">{{ $contact->phone }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex space-x-2">
                            @if($contact->github_url)
                                <a href="{{ $contact->github_url }}" target="_blank" class="text-gray-700">
                                    <i class="fab fa-github"></i>
                                </a>
                            @endif
                            @if($contact->linkedin_url)
                                <a href="{{ $contact->linkedin_url }}" target="_blank" class="text-blue-600">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            @endif
                            @if($contact->twitter_url)
                                <a href="{{ $contact->twitter_url }}" target="_blank" class="text-blue-400">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            @endif
                            @if($contact->instagram_url)
                                <a href="{{ $contact->instagram_url }}" target="_blank" class="text-pink-600">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $contact->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $contact->is_active ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.contact.edit', $contact) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.contact.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus contact section ini?')">
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

    @if($contacts->isEmpty())
        <div class="text-center py-12">
            <i class="fas fa-envelope text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-lg">Belum ada contact section yang dibuat</p>
            <a href="{{ route('admin.contact.create') }}" class="mt-4 inline-block bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600">
                Buat Contact Section Pertama
            </a>
        </div>
    @endif
</div>
@endsection
