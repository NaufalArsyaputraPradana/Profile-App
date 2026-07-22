@extends('layouts.admin')
@section('title', 'Keahlian (Skills)')
@section('page-title', 'Keahlian & Tech Stack')
@section('breadcrumb')<span class="text-slate-300">Skills</span>@endsection

@section('content')
<div class="flex items-center justify-between mb-6">
    <div class="flex gap-3">
        <select class="text-sm bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-slate-300" id="category-filter">
            <option value="all">Semua Kategori</option>
            <option value="frontend">Frontend</option>
            <option value="backend">Backend</option>
            <option value="design">Design</option>
            <option value="tools">Tools</option>
            <option value="soft">Soft Skills</option>
        </select>
    </div>
    <a href="{{ route('admin.skills.create') }}" class="btn-primary">
        <i class="fas fa-plus text-xs"></i> Tambah Skill
    </a>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nama Skill</th>
                <th>Kategori</th>
                <th>Proficiency</th>
                <th>Icon</th>
                <th class="text-right">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($skills as $skill)
            <tr data-category="{{ $skill->category }}">
                <td>
                    <div class="font-medium text-white flex items-center gap-2">
                        @if($skill->icon)
                            @if(Str::startsWith($skill->icon, 'fa'))
                                <i class="{{ $skill->icon }} text-slate-400 w-5 text-center"></i>
                            @else
                                <span class="w-5 h-5 block bg-slate-700 rounded-sm" title="Image Icon"></span>
                            @endif
                        @else
                            <i class="fas fa-code text-slate-400 w-5 text-center"></i>
                        @endif
                        {{ $skill->name }}
                    </div>
                </td>
                <td>
                    @php
                    $colors = [
                        'frontend' => 'bg-blue-500/10 text-blue-400',
                        'backend' => 'bg-green-500/10 text-green-400',
                        'design' => 'bg-pink-500/10 text-pink-400',
                        'tools' => 'bg-orange-500/10 text-orange-400',
                        'soft' => 'bg-indigo-500/10 text-indigo-400'
                    ];
                    @endphp
                    <span class="text-xs px-2.5 py-1 rounded-full {{ $colors[$skill->category] ?? 'bg-slate-500/10 text-slate-400' }}">
                        {{ ucfirst($skill->category) }}
                    </span>
                </td>
                <td class="w-1/3">
                    <div class="flex items-center gap-3">
                        <span class="text-slate-400 text-xs w-8">{{ $skill->percentage }}%</span>
                        <div class="flex-1 h-1.5 bg-white/5 rounded-full overflow-hidden">
                            <div class="h-full bg-blue-500 rounded-full" style="width: {{ $skill->percentage }}%"></div>
                        </div>
                    </div>
                </td>
                <td class="text-slate-500 text-xs font-mono">{{ Str::limit($skill->icon, 20) }}</td>
                <td class="text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="text-slate-400 hover:text-blue-400 text-sm p-1"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{ route('admin.skills.destroy', $skill) }}" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-slate-400 hover:text-red-400 text-sm p-1" onclick="return confirm('Hapus skill ini?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-12 text-slate-500">
                    <i class="fas fa-tools text-4xl opacity-20 mb-3 block"></i>
                    Belum ada data skill.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $skills->links() }}
</div>
@endsection

@push('scripts')
<script>
document.getElementById('category-filter')?.addEventListener('change', function() {
    const val = this.value;
    document.querySelectorAll('tbody tr').forEach(row => {
        if(val === 'all' || row.dataset.category === val) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>
@endpush
