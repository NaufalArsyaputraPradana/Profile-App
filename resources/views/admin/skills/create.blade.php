@extends('layouts.admin')

@section('title', 'Tambah Skill')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <form action="{{ route('admin.skills.store') }}" method="POST">
        @csrf
        <div class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Skill</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('name') }}" required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="category" id="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    <option value="">Pilih Kategori</option>
                    <option value="frontend" {{ old('category') === 'frontend' ? 'selected' : '' }}>Frontend</option>
                    <option value="backend" {{ old('category') === 'backend' ? 'selected' : '' }}>Backend</option>
                    <option value="design" {{ old('category') === 'design' ? 'selected' : '' }}>Design</option>
                </select>
                @error('category')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="percentage" class="block text-sm font-medium text-gray-700">Persentase</label>
                <div class="mt-1 flex items-center gap-4">
                    <input type="range" name="percentage" id="percentage" min="0" max="100" class="w-full" value="{{ old('percentage', 50) }}" oninput="updatePercentageValue(this.value)">
                    <span id="percentageValue" class="text-sm text-gray-600">50%</span>
                </div>
                @error('percentage')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="icon" class="block text-sm font-medium text-gray-700">Icon (Font Awesome Class)</label>
                <input type="text" name="icon" id="icon" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('icon') }}" placeholder="fas fa-code">
                <p class="mt-1 text-sm text-gray-500">Contoh: fas fa-code, fab fa-react, dll.</p>
                @error('icon')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Simpan Skill
                </button>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
function updatePercentageValue(value) {
    document.getElementById('percentageValue').textContent = value + '%';
}
</script>
@endpush
@endsection
