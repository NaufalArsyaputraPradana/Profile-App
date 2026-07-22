@extends('layouts.admin')
@section('title', 'Riwayat Pendidikan')
@section('page-title', 'Riwayat Pendidikan')
@section('breadcrumb')<span class="text-slate-300">Pendidikan</span>@endsection

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.educations.create') }}" class="btn-primary"><i class="fas fa-plus text-xs"></i> Tambah Pendidikan</a>
</div>
<div class="table-container">
    <table>
        <thead><tr><th>#</th><th>Institusi</th><th>Jenjang</th><th>Jurusan</th><th>Tahun</th><th>IPK</th><th>Status</th><th class="text-right">Aksi</th></tr></thead>
        <tbody>
            @forelse($educations as $edu)
            <tr>
                <td class="text-slate-500">{{ $loop->iteration }}</td>
                <td class="text-white font-medium">{{ $edu->institution_name }}</td>
                <td class="text-slate-400">{{ $edu->degree }}</td>
                <td class="text-slate-400">{{ $edu->field_of_study }}</td>
                <td class="text-slate-500 text-xs">{{ $edu->start_date->format('Y') }} - {{ $edu->is_current ? 'Sekarang' : ($edu->end_date?->format('Y') ?? '-') }}</td>
                <td>{{ $edu->gpa ? number_format($edu->gpa, 2) : '-' }}</td>
                <td>
                    <span class="text-xs px-2 py-0.5 rounded-full {{ $edu->is_current ? 'bg-green-500/10 text-green-400' : 'bg-slate-500/10 text-slate-400' }}">
                        {{ $edu->is_current ? 'Aktif' : 'Selesai' }}
                    </span>
                </td>
                <td class="text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.educations.edit', $edu) }}" class="text-slate-400 hover:text-blue-400 p-1"><i class="fas fa-edit text-sm"></i></a>
                        <form method="POST" action="{{ route('admin.educations.destroy', $edu) }}">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-slate-400 hover:text-red-400 p-1" onclick="return confirm('Hapus data pendidikan?')"><i class="fas fa-trash text-sm"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="8" class="text-center py-12 text-slate-500"><i class="fas fa-graduation-cap text-4xl opacity-20 block mb-3"></i>Belum ada data pendidikan.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
