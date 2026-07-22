@extends('layouts.admin')
@section('title', 'Gallery Sertifikat')
@section('page-title', 'Gallery Sertifikat')
@section('breadcrumb')<span class="text-slate-300">Sertifikat</span>@endsection

@section('content')
<div class="flex items-center justify-between mb-6">
    <div class="flex gap-3">
        <input type="text" placeholder="Cari sertifikat..." id="search-input" class="w-64 text-sm">
    </div>
    <a href="{{ route('admin.certificates.create') }}" class="btn-primary">
        <i class="fas fa-plus text-xs"></i> Upload Sertifikat
    </a>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Penyelenggara</th>
                <th>Tanggal</th>
                <th>Thumbnail</th>
                <th>Status</th>
                <th class="text-right">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($certificates as $cert)
            <tr>
                <td class="text-slate-500">{{ $loop->iteration }}</td>
                <td>
                    <div class="font-medium text-white">{{ Str::limit($cert->name, 40) }}</div>
                </td>
                <td>
                    <span class="text-xs px-2.5 py-1 rounded-full bg-blue-500/10 text-blue-400">
                        {{ $cert->category_label }}
                    </span>
                </td>
                <td class="text-slate-400">{{ Str::limit($cert->issuer ?? '-', 30) }}</td>
                <td class="text-slate-400 text-xs">{{ $cert->date ? $cert->date->format('M Y') : '-' }}</td>
                <td>
                    @if($cert->thumbnail || $cert->image)
                    <div class="w-10 h-10 rounded-lg overflow-hidden bg-white/5">
                        <img src="{{ Storage::url($cert->thumbnail ?? $cert->image) }}" class="w-full h-full object-cover">
                    </div>
                    @else
                    <span class="text-slate-600 text-xs">No Image</span>
                    @endif
                </td>
                <td>
                    <div class="flex items-center gap-2">
                        <span class="text-xs px-2 py-0.5 rounded-full {{ $cert->is_active ? 'bg-green-500/10 text-green-400' : 'bg-red-500/10 text-red-400' }}">
                            {{ $cert->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                        @if($cert->featured)
                        <i class="fas fa-star text-yellow-500 text-xs"></i>
                        @endif
                    </div>
                </td>
                <td class="text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.certificates.edit', $cert) }}" class="text-slate-400 hover:text-blue-400 text-sm transition-colors p-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.certificates.destroy', $cert) }}" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-slate-400 hover:text-red-400 text-sm transition-colors p-1"
                                    onclick="return confirm('Hapus sertifikat ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center py-12 text-slate-500">
                    <i class="fas fa-certificate text-4xl opacity-20 mb-3 block"></i>
                    Belum ada sertifikat. Upload sertifikat pertama Anda!
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $certificates->links() }}
@endsection

@push('scripts')
<script>
document.getElementById('search-input')?.addEventListener('input', function() {
    const val = this.value.toLowerCase();
    document.querySelectorAll('tbody tr').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(val) ? '' : 'none';
    });
});
</script>
@endpush
