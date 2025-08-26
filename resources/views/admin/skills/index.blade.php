@extends('layouts.admin')

@section('title', 'Kelola Skills')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Daftar Skill</h2>
        <a href="{{ route('admin.skills.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Tambah Skill
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Persentase</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($skills as $skill)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            @if($skill->icon)
                                <i class="{{ $skill->icon }} mr-2"></i>
                            @endif
                            <div class="text-sm font-medium text-gray-900">{{ $skill->name }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $skill->category === 'frontend' ? 'bg-green-100 text-green-800' : 
                               ($skill->category === 'backend' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800') }}">
                            {{ ucfirst($skill->category) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $skill->percentage }}%"></div>
                        </div>
                        <span class="text-sm text-gray-600">{{ $skill->percentage }}%</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                            Edit
                        </a>
                        <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus skill ini?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $skills->links() }}
    </div>
</div>
@endsection
