@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-8">
    <!-- Welcome Banner -->
    <div class="rounded-2xl overflow-hidden relative" style="background: linear-gradient(135deg, #1e3a5f, #1e1b4b);">
        <div class="absolute inset-0 opacity-20" style="background-image: linear-gradient(rgba(37,99,235,0.2) 1px, transparent 1px), linear-gradient(90deg, rgba(37,99,235,0.2) 1px, transparent 1px); background-size: 40px 40px;"></div>
        <div class="relative p-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-white mb-2">Selamat Datang, Admin! 👋</h1>
                    <p class="text-blue-300 text-sm">Kelola konten portfolio Naufal Arsyaputra Pradana dari sini.</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-xl text-sm transition-all border border-white/20">
                        <i class="fas fa-eye text-xs"></i> Lihat Website
                    </a>
                    <a href="{{ url('/artisan/migrate-fresh-seed') }}" class="flex items-center gap-2 bg-red-500/20 hover:bg-red-500/30 text-red-300 px-4 py-2 rounded-xl text-sm transition-all border border-red-500/30" 
                       onclick="return confirm('⚠️ WARNING: Ini akan menghapus SEMUA data dan menjalankan ulang seed. Lanjutkan?')">
                        <i class="fas fa-database text-xs"></i> Reset DB + Seed
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        @php
        $statsItems = [
            ['label' => 'Portfolio', 'count' => $stats['projects'], 'icon' => 'fas fa-code', 'color' => 'blue', 'route' => 'admin.projects.index'],
            ['label' => 'Sertifikat', 'count' => $stats['certificates'], 'icon' => 'fas fa-certificate', 'color' => 'yellow', 'route' => 'admin.certificates.index'],
            ['label' => 'Pengalaman', 'count' => $stats['experiences'], 'icon' => 'fas fa-briefcase', 'color' => 'green', 'route' => 'admin.experiences.index'],
            ['label' => 'Pendidikan', 'count' => $stats['educations'], 'icon' => 'fas fa-graduation-cap', 'color' => 'indigo', 'route' => 'admin.educations.index'],
            ['label' => 'Sertifikasi', 'count' => $stats['certifications'], 'icon' => 'fas fa-medal', 'color' => 'purple', 'route' => 'admin.certifications.index'],
            ['label' => 'Pelatihan', 'count' => $stats['trainings'], 'icon' => 'fas fa-chalkboard-teacher', 'color' => 'cyan', 'route' => 'admin.trainings.index'],
        ];
        @endphp

        @foreach($statsItems as $stat)
        @php
        $colors = [
            'blue' => ['bg' => 'bg-blue-500/10', 'border' => 'border-blue-500/25', 'text' => 'text-blue-400', 'num' => 'text-blue-300'],
            'yellow' => ['bg' => 'bg-yellow-500/10', 'border' => 'border-yellow-500/25', 'text' => 'text-yellow-400', 'num' => 'text-yellow-300'],
            'green' => ['bg' => 'bg-green-500/10', 'border' => 'border-green-500/25', 'text' => 'text-green-400', 'num' => 'text-green-300'],
            'indigo' => ['bg' => 'bg-indigo-500/10', 'border' => 'border-indigo-500/25', 'text' => 'text-indigo-400', 'num' => 'text-indigo-300'],
            'purple' => ['bg' => 'bg-purple-500/10', 'border' => 'border-purple-500/25', 'text' => 'text-purple-400', 'num' => 'text-purple-300'],
            'cyan' => ['bg' => 'bg-cyan-500/10', 'border' => 'border-cyan-500/25', 'text' => 'text-cyan-400', 'num' => 'text-cyan-300'],
        ];
        $c = $colors[$stat['color']];
        @endphp
        <a href="{{ route($stat['route']) }}" class="{{ $c['bg'] }} border {{ $c['border'] }} rounded-xl p-4 hover:scale-105 transition-all block">
            <div class="flex items-center gap-2 mb-3">
                <i class="{{ $stat['icon'] }} {{ $c['text'] }} text-sm"></i>
                <span class="text-slate-400 text-xs">{{ $stat['label'] }}</span>
            </div>
            <div class="text-2xl font-bold {{ $c['num'] }}">{{ $stat['count'] }}</div>
        </a>
        @endforeach
    </div>

    <!-- Quick Actions Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Portfolio Section -->
        <div class="bg-white/4 border border-white/8 rounded-2xl p-6">
            <div class="flex items-center justify-between mb-5">
                <h2 class="text-white font-semibold flex items-center gap-2">
                    <i class="fas fa-code text-blue-500 text-sm"></i> Portfolio
                </h2>
                <a href="{{ route('admin.projects.create') }}" class="text-xs bg-blue-500/15 border border-blue-500/25 text-blue-400 px-3 py-1.5 rounded-lg hover:bg-blue-500/25 transition-all">
                    + Tambah
                </a>
            </div>
            <div class="space-y-3">
                @foreach(\App\Models\Project::orderBy('sort_order')->take(4)->get() as $project)
                <div class="flex items-center justify-between py-2 border-b border-white/5 last:border-0">
                    <div class="min-w-0">
                        <p class="text-white text-sm font-medium truncate">{{ $project->title }}</p>
                        <p class="text-slate-500 text-xs">{{ $project->category }}</p>
                    </div>
                    <div class="flex gap-2 ml-3 flex-shrink-0">
                        <span class="text-xs px-2 py-0.5 rounded-full {{ $project->status === 'active' ? 'text-green-400 bg-green-500/10' : 'text-yellow-400 bg-yellow-500/10' }}">
                            {{ $project->status }}
                        </span>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="text-slate-500 hover:text-white text-xs">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <a href="{{ route('admin.projects.index') }}" class="block mt-4 text-blue-400 hover:text-blue-300 text-xs text-center transition-colors">
                Lihat Semua →
            </a>
        </div>

        <!-- Certificates Section -->
        <div class="bg-white/4 border border-white/8 rounded-2xl p-6">
            <div class="flex items-center justify-between mb-5">
                <h2 class="text-white font-semibold flex items-center gap-2">
                    <i class="fas fa-certificate text-yellow-500 text-sm"></i> Sertifikat
                </h2>
                <a href="{{ route('admin.certificates.create') }}" class="text-xs bg-yellow-500/15 border border-yellow-500/25 text-yellow-400 px-3 py-1.5 rounded-lg hover:bg-yellow-500/25 transition-all">
                    + Tambah
                </a>
            </div>
            <div class="space-y-3">
                @foreach(\App\Models\Certificate::orderBy('sort_order')->take(4)->get() as $cert)
                <div class="flex items-center justify-between py-2 border-b border-white/5 last:border-0">
                    <div class="min-w-0">
                        <p class="text-white text-sm font-medium truncate">{{ $cert->name }}</p>
                        <p class="text-slate-500 text-xs capitalize">{{ $cert->category }}</p>
                    </div>
                    <div class="flex gap-2 ml-3 flex-shrink-0">
                        <a href="{{ route('admin.certificates.edit', $cert) }}" class="text-slate-500 hover:text-white text-xs">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <a href="{{ route('admin.certificates.index') }}" class="block mt-4 text-yellow-400 hover:text-yellow-300 text-xs text-center transition-colors">
                Lihat Semua →
            </a>
        </div>

        <!-- Quick Links -->
        <div class="bg-white/4 border border-white/8 rounded-2xl p-6">
            <h2 class="text-white font-semibold mb-5 flex items-center gap-2">
                <i class="fas fa-rocket text-indigo-500 text-sm"></i> Quick Actions
            </h2>
            <div class="space-y-2">
                @foreach([
                    ['route' => 'admin.experiences.create', 'icon' => 'fas fa-briefcase', 'label' => 'Tambah Pengalaman', 'color' => 'green'],
                    ['route' => 'admin.educations.create', 'icon' => 'fas fa-graduation-cap', 'label' => 'Tambah Pendidikan', 'color' => 'indigo'],
                    ['route' => 'admin.certifications.create', 'icon' => 'fas fa-medal', 'label' => 'Tambah Sertifikasi', 'color' => 'purple'],
                    ['route' => 'admin.trainings.create', 'icon' => 'fas fa-chalkboard-teacher', 'label' => 'Tambah Pelatihan', 'color' => 'cyan'],
                    ['route' => 'admin.skills.create', 'icon' => 'fas fa-tools', 'label' => 'Tambah Skill', 'color' => 'orange'],
                    ['route' => 'admin.organizations.create', 'icon' => 'fas fa-users', 'label' => 'Tambah Organisasi', 'color' => 'pink'],
                ] as $action)
                <a href="{{ route($action['route']) }}" class="flex items-center gap-3 py-2.5 px-3 rounded-xl hover:bg-white/5 transition-all group">
                    <i class="{{ $action['icon'] }} text-slate-500 group-hover:text-white text-sm w-4"></i>
                    <span class="text-slate-400 group-hover:text-white text-sm">{{ $action['label'] }}</span>
                    <i class="fas fa-arrow-right text-slate-600 group-hover:text-slate-300 text-xs ml-auto"></i>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Content Management Links -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach([
            ['route' => 'admin.hero.index', 'icon' => 'fas fa-home', 'label' => 'Hero Section', 'sub' => 'Edit halaman utama'],
            ['route' => 'admin.about.index', 'icon' => 'fas fa-user', 'label' => 'About Section', 'sub' => 'Edit profil diri'],
            ['route' => 'admin.contact.index', 'icon' => 'fas fa-envelope', 'label' => 'Contact Section', 'sub' => 'Edit info kontak'],
            ['route' => 'admin.skills.index', 'icon' => 'fas fa-code', 'label' => 'Skills', 'sub' => 'Kelola kemampuan'],
        ] as $item)
        <a href="{{ route($item['route']) }}" class="card p-5 hover:border-blue-500/40 transition-all">
            <i class="{{ $item['icon'] }} text-blue-500 text-lg mb-3 block"></i>
            <p class="text-white text-sm font-semibold">{{ $item['label'] }}</p>
            <p class="text-slate-500 text-xs mt-0.5">{{ $item['sub'] }}</p>
        </a>
        @endforeach
    </div>
</div>
@endsection
