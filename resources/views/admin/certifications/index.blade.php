@extends('layouts.admin')
@section('title', 'Sertifikasi Profesi')
@section('page-title', 'Sertifikasi Profesi')
@section('breadcrumb')<span class="text-slate-300">Sertifikasi</span>@endsection
@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.certifications.create') }}" class="btn-primary"><i class="fas fa-plus text-xs"></i> Tambah Sertifikasi</a>
</div>
<div class="table-container">
    <table>
        <thead><tr><th>#</th><th>Nama</th><th>Penerbit</th><th>Level</th><th>Tanggal</th><th>Kedaluwarsa</th><th class="text-right">Aksi</th></tr></thead>
        <tbody>
            @forelse($certifications as $cert)
            <tr>
                <td class="text-slate-500">{{ $loop->iteration }}</td>
                <td class="text-white font-medium">{{ $cert->name }}</td>
                <td class="text-slate-400 text-sm">{{ $cert->issuer }}</td>
                <td>{{ $cert->level ? '<span class="text-xs px-2 py-0.5 rounded-full bg-purple-500/10 text-purple-400">' . $cert->level . '</span>' : '-' }}</td>
                <td class="text-slate-500 text-xs">{{ $cert->issue_date?->format('M Y') ?? '-' }}</td>
                <td class="text-xs">
                    @if($cert->no_expiry)
                    <span class="text-green-400">Tidak Kedaluwarsa</span>
                    @elseif($cert->expiry_date)
                    <span class="text-yellow-400">{{ $cert->expiry_date->format('M Y') }}</span>
                    @else -
                    @endif
                </td>
                <td class="text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.certifications.edit', $cert) }}" class="text-slate-400 hover:text-blue-400 p-1"><i class="fas fa-edit text-sm"></i></a>
                        <form method="POST" action="{{ route('admin.certifications.destroy', $cert) }}">@csrf @method('DELETE')
                            <button type="submit" class="text-slate-400 hover:text-red-400 p-1" onclick="return confirm('Hapus?')"><i class="fas fa-trash text-sm"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center py-12 text-slate-500"><i class="fas fa-medal text-4xl opacity-20 block mb-3"></i>Belum ada data.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
