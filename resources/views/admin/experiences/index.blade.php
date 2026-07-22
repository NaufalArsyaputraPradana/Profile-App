@extends('layouts.admin')
@section('title', 'Pengalaman Kerja')
@section('page-title', 'Pengalaman Kerja')
@section('breadcrumb')<span class="text-slate-300">Pengalaman</span>@endsection

@section('content')
<div class="flex items-center justify-between mb-6">
    <div></div>
    <a href="{{ route('admin.experiences.create') }}" class="btn-primary">
        <i class="fas fa-plus text-xs"></i> Tambah Pengalaman
    </a>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Perusahaan</th>
                <th>Posisi</th>
                <th>Tipe</th>
                <th>Periode</th>
                <th>Status</th>
                <th class="text-right">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($experiences as $exp)
            <tr>
                <td class="text-slate-500">{{ $loop->iteration }}</td>
                <td>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg glass flex items-center justify-center text-blue-400 flex-shrink-0 text-xs">
                            @if($exp->company_logo)
                                <img src="{{ Storage::url($exp->company_logo) }}" class="w-full h-full rounded-lg object-cover">
                            @else
                                <i class="fas fa-building"></i>
                            @endif
                        </div>
                        <span class="text-white font-medium">{{ $exp->company_name }}</span>
                    </div>
                </td>
                <td>{{ $exp->position }}</td>
                <td>
                    <span class="text-xs px-2.5 py-1 rounded-full {{ $exp->type === 'internship' ? 'bg-blue-500/10 text-blue-400' : 'bg-green-500/10 text-green-400' }}">
                        {{ ucfirst($exp->type) }}
                    </span>
                </td>
                <td class="text-slate-400 text-xs">
                    {{ $exp->start_date->format('M Y') }} - {{ $exp->is_current ? 'Sekarang' : ($exp->end_date ? $exp->end_date->format('M Y') : '-') }}
                </td>
                <td>
                    <span class="text-xs px-2 py-0.5 rounded-full {{ $exp->is_active ? 'bg-green-500/10 text-green-400' : 'bg-red-500/10 text-red-400' }}">
                        {{ $exp->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td class="text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.experiences.edit', $exp) }}" class="text-slate-400 hover:text-blue-400 text-sm transition-colors p-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.experiences.destroy', $exp) }}" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-slate-400 hover:text-red-400 text-sm transition-colors p-1"
                                    onclick="return confirm('Hapus pengalaman ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center py-12 text-slate-500">
                    <i class="fas fa-briefcase text-4xl opacity-20 mb-3 block"></i>
                    Belum ada data pengalaman kerja.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
