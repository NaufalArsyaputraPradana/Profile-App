@extends('layouts.admin')
@section('title', 'Organisasi')
@section('page-title', 'Pengalaman Organisasi')
@section('breadcrumb')<span class="text-slate-300">Organisasi</span>@endsection
@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.organizations.create') }}" class="btn-primary"><i class="fas fa-plus text-xs"></i> Tambah Organisasi</a>
</div>
<div class="table-container">
    <table>
        <thead><tr><th>#</th><th>Organisasi</th><th>Jabatan</th><th>Divisi</th><th>Institusi</th><th>Periode</th><th class="text-right">Aksi</th></tr></thead>
        <tbody>
            @forelse($organizations as $org)
            <tr>
                <td class="text-slate-500">{{ $loop->iteration }}</td>
                <td class="text-white font-medium">{{ $org->organization_name }}</td>
                <td class="text-slate-400">{{ $org->role }}</td>
                <td class="text-slate-500 text-xs">{{ $org->division ?? '-' }}</td>
                <td class="text-slate-500 text-xs">{{ $org->institution ?? '-' }}</td>
                <td class="text-slate-500 text-xs">{{ $org->start_date->format('Y') }} - {{ $org->is_current ? 'Sekarang' : ($org->end_date?->format('Y') ?? '-') }}</td>
                <td class="text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.organizations.edit', $org) }}" class="text-slate-400 hover:text-blue-400 p-1"><i class="fas fa-edit text-sm"></i></a>
                        <form method="POST" action="{{ route('admin.organizations.destroy', $org) }}">@csrf @method('DELETE')
                            <button type="submit" class="text-slate-400 hover:text-red-400 p-1" onclick="return confirm('Hapus?')"><i class="fas fa-trash text-sm"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center py-12 text-slate-500"><i class="fas fa-users text-4xl opacity-20 block mb-3"></i>Belum ada data.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
