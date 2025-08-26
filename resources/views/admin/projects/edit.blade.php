@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="space-y-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Project</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('title', $project->title) }}" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="technologies" class="block text-sm font-medium text-gray-700">Technologies</label>
                <div class="mt-1" id="technologies-container">
                    @foreach($project->technologies as $tech)
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="technologies[]" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ $tech }}" placeholder="Masukkan teknologi">
                        <button type="button" class="px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="this.parentElement.remove()">-</button>
                    </div>
                    @endforeach
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="technologies[]" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Masukkan teknologi">
                        <button type="button" class="px-3 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600" onclick="addTechnology()">+</button>
                    </div>
                </div>
                @error('technologies')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Gambar Project</label>
                @if($project->image)
                    <div class="mt-2 mb-4">
                        <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-32 h-32 object-cover rounded">
                    </div>
                @endif
                <input type="file" name="image" id="image" class="mt-1 block w-full" accept="image/*">
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="url" class="block text-sm font-medium text-gray-700">URL Project</label>
                <input type="url" name="url" id="url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('url', $project->url) }}">
                @error('url')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Update Project
                </button>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
function addTechnology() {
    const container = document.getElementById('technologies-container');
    const div = document.createElement('div');
    div.className = 'flex gap-2 mb-2';
    div.innerHTML = `
        <input type="text" name="technologies[]" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Masukkan teknologi">
        <button type="button" class="px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="this.parentElement.remove()">-</button>
    `;
    container.appendChild(div);
}
</script>
@endpush
@endsection
