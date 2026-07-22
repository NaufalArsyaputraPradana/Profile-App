@extends('layouts.admin')
@section('title', 'Portfolio / Proyek')
@section('page-title', 'Daftar Proyek')
@section('breadcrumb')<span class="text-slate-300">Proyek</span>@endsection

@section('content')
<div class="flex items-center justify-between mb-6">
    <div class="flex gap-3">
        <input type="text" placeholder="Cari proyek..." id="search-input" class="w-64 text-sm">
    </div>
    <a href="{{ route('admin.projects.create') }}" class="btn-primary">
        <i class="fas fa-plus text-xs"></i> Tambah Proyek
    </a>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Urutan</th>
                <th>Thumbnail</th>
                <th>Judul Proyek</th>
                <th>Kategori</th>
                <th>Tahun</th>
                <th>Status</th>
                <th class="text-right">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr>
                <td class="text-slate-500 text-center w-16">{{ $project->sort_order }}</td>
                <td class="w-24">
                    @if($project->thumbnail)
                    <div class="w-16 h-10 rounded overflow-hidden bg-white/5 border border-white/10">
                        <img src="{{ Storage::url($project->thumbnail) }}" class="w-full h-full object-cover">
                    </div>
                    @else
                    <div class="w-16 h-10 rounded bg-white/5 border border-white/10 flex items-center justify-center text-slate-500 text-xs">No Img</div>
                    @endif
                </td>
                <td>
                    <div class="font-medium text-white">{{ Str::limit($project->title, 40) }}</div>
                </td>
                <td><span class="text-xs px-2.5 py-1 rounded-full bg-blue-500/10 text-blue-400">{{ $project->category }}</span></td>
                <td class="text-slate-400 text-xs">{{ $project->year ?? '-' }}</td>
                <td>
                    <div class="flex items-center gap-2">
                        <span class="text-xs px-2 py-0.5 rounded-full {{ $project->status === 'active' ? 'bg-green-500/10 text-green-400' : 'bg-yellow-500/10 text-yellow-400' }}">
                            {{ ucfirst($project->status) }}
                        </span>
                        @if($project->featured)
                        <i class="fas fa-star text-yellow-500 text-xs"></i>
                        @endif
                    </div>
                </td>
                <td class="text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="text-slate-400 hover:text-blue-400 text-sm p-1"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-slate-400 hover:text-red-400 text-sm p-1" onclick="return confirm('Hapus proyek ini?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center py-12 text-slate-500">
                    <i class="fas fa-folder-open text-4xl opacity-20 mb-3 block"></i>
                    Belum ada data proyek.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $projects->links() }}</div>
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
