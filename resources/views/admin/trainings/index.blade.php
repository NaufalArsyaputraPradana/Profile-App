@extends('layouts.admin')
@section('title', 'Pelatihan')
@section('page-title', 'Pelatihan & Training')
@section('breadcrumb')<span class="text-slate-300">Pelatihan</span>@endsection
@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.trainings.create') }}" class="btn-primary"><i class="fas fa-plus text-xs"></i> Tambah Pelatihan</a>
</div>
<div class="table-container">
    <table>
        <thead><tr><th>#</th><th>Nama</th><th>Penyelenggara</th><th>Kategori</th><th>Durasi</th><th>Tahun</th><th>Featured</th><th class="text-right">Aksi</th></tr></thead>
        <tbody>
            @forelse($trainings as $training)
            <tr>
                <td class="text-slate-500">{{ $loop->iteration }}</td>
                <td class="text-white font-medium">{{ Str::limit($training->name, 40) }}</td>
                <td class="text-slate-400 text-sm">{{ $training->organizer }}</td>
                <td><span class="text-xs px-2 py-0.5 rounded-full bg-cyan-500/10 text-cyan-400">{{ $training->category ?? '-' }}</span></td>
                <td class="text-slate-500 text-xs">{{ $training->duration ?? '-' }}</td>
                <td class="text-slate-500 text-xs">{{ $training->start_date?->format('Y') ?? '-' }}</td>
                <td>{{ $training->featured ? '<i class="fas fa-star text-yellow-500"></i>' : '' }}</td>
                <td class="text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.trainings.edit', $training) }}" class="text-slate-400 hover:text-blue-400 p-1"><i class="fas fa-edit text-sm"></i></a>
                        <form method="POST" action="{{ route('admin.trainings.destroy', $training) }}">@csrf @method('DELETE')
                            <button type="submit" class="text-slate-400 hover:text-red-400 p-1" onclick="return confirm('Hapus?')"><i class="fas fa-trash text-sm"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="8" class="text-center py-12 text-slate-500"><i class="fas fa-chalkboard-teacher text-4xl opacity-20 block mb-3"></i>Belum ada data pelatihan.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
