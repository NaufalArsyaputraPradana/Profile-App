<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel | @yield('title', 'Dashboard')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: { dark: '#0a0a0f', 'dark-card': '#111118' }
                }
            }
        }
    </script>
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #0a0a0f; color: #e2e8f0; }
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #0a0a0f; }
        ::-webkit-scrollbar-thumb { background: rgba(37,99,235,0.5); border-radius: 3px; }
        
        .glass { background: rgba(255,255,255,0.04); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.08); }
        .card { background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 1rem; }
        .gradient-text { background: linear-gradient(135deg, #2563eb, #6366f1); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        
        .sidebar { background: rgba(5, 5, 15, 0.95); border-right: 1px solid rgba(255,255,255,0.06); }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.65rem 0.85rem;
            border-radius: 0.75rem;
            font-size: 0.875rem;
            color: #94a3b8;
            transition: all 0.2s ease;
            border: 1px solid transparent;
        }
        .sidebar-link:hover {
            color: #f8fafc;
            background: rgba(255,255,255,0.06);
            border-color: rgba(255,255,255,0.08);
        }
        .sidebar-link.active {
            color: #93c5fd;
            background: rgba(37,99,235,0.12);
            border-color: rgba(37,99,235,0.25);
        }
        .sidebar-group-title {
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #475569;
            padding: 0.5rem 0.85rem 0.25rem;
            margin-top: 0.75rem;
        }
        
        .btn-primary {
            display: inline-flex; align-items: center; gap: 0.5rem;
            background: linear-gradient(135deg, #2563eb, #6366f1);
            color: white; font-weight: 600; padding: 0.625rem 1.25rem;
            border-radius: 0.75rem; transition: all 0.3s ease;
            font-size: 0.875rem; border: none; cursor: pointer; text-decoration: none;
        }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(37,99,235,0.4); }
        
        .btn-outline {
            display: inline-flex; align-items: center; gap: 0.5rem;
            background: transparent; color: #94a3b8; font-weight: 500;
            padding: 0.625rem 1.25rem; border-radius: 0.75rem;
            border: 1px solid rgba(255,255,255,0.12); transition: all 0.2s ease;
            font-size: 0.875rem; cursor: pointer; text-decoration: none;
        }
        .btn-outline:hover { color: white; background: rgba(255,255,255,0.06); }
        
        .btn-danger {
            display: inline-flex; align-items: center; gap: 0.5rem;
            background: rgba(239,68,68,0.12); color: #f87171;
            padding: 0.625rem 1.25rem; border-radius: 0.75rem;
            border: 1px solid rgba(239,68,68,0.25); transition: all 0.2s ease;
            font-size: 0.875rem; cursor: pointer; text-decoration: none; font-weight: 500;
        }
        .btn-danger:hover { background: rgba(239,68,68,0.2); }
        
        input, textarea, select {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            color: #e2e8f0;
            border-radius: 0.75rem;
            padding: 0.625rem 1rem;
            width: 100%;
            font-size: 0.875rem;
            transition: border-color 0.2s ease;
            font-family: 'Inter', sans-serif;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: rgba(37,99,235,0.5);
            background: rgba(255,255,255,0.07);
        }
        input[type="checkbox"] {
            width: auto;
            accent-color: #2563eb;
        }
        select option { background: #111118; color: #e2e8f0; }
        label { font-size: 0.875rem; color: #94a3b8; font-weight: 500; }
        
        .table-container { background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); border-radius: 1rem; overflow: hidden; }
        table { width: 100%; border-collapse: collapse; }
        th { background: rgba(255,255,255,0.04); color: #64748b; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.875rem 1.25rem; text-align: left; }
        td { padding: 0.875rem 1.25rem; border-top: 1px solid rgba(255,255,255,0.04); color: #cbd5e1; font-size: 0.875rem; }
        tr:hover td { background: rgba(255,255,255,0.02); }

        /* Alert */
        .alert-success { background: rgba(16,185,129,0.1); border: 1px solid rgba(16,185,129,0.25); color: #34d399; padding: 0.875rem 1.25rem; border-radius: 0.75rem; font-size: 0.875rem; }
        .alert-error { background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.25); color: #f87171; padding: 0.875rem 1.25rem; border-radius: 0.75rem; font-size: 0.875rem; }
    </style>
    @stack('styles')
</head>
<body class="antialiased">
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="sidebar w-64 fixed top-0 left-0 h-full z-40 flex flex-col overflow-y-auto">
        <!-- Logo -->
        <div class="p-5 border-b border-white/5">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-blue-500/20 border border-blue-500/30 flex items-center justify-center">
                    <i class="fas fa-code text-blue-400 text-sm"></i>
                </div>
                <span class="text-white font-bold text-sm">Admin Panel</span>
            </a>
            <div class="mt-3 text-xs text-slate-500">Naufal Arsyaputra Pradana</div>
        </div>

        <!-- Nav -->
        <nav class="flex-1 p-3 space-y-0.5">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-grid-2 w-4 text-center"></i> Dashboard
            </a>

            <div class="sidebar-group-title">Portfolio</div>
            <a href="{{ route('admin.projects.index') }}" class="sidebar-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                <i class="fas fa-code w-4 text-center"></i> Portfolio
            </a>
            <a href="{{ route('admin.skills.index') }}" class="sidebar-link {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
                <i class="fas fa-tools w-4 text-center"></i> Skills
            </a>

            <div class="sidebar-group-title">Riwayat</div>
            <a href="{{ route('admin.experiences.index') }}" class="sidebar-link {{ request()->routeIs('admin.experiences.*') ? 'active' : '' }}">
                <i class="fas fa-briefcase w-4 text-center"></i> Pengalaman
            </a>
            <a href="{{ route('admin.educations.index') }}" class="sidebar-link {{ request()->routeIs('admin.educations.*') ? 'active' : '' }}">
                <i class="fas fa-graduation-cap w-4 text-center"></i> Pendidikan
            </a>
            <a href="{{ route('admin.organizations.index') }}" class="sidebar-link {{ request()->routeIs('admin.organizations.*') ? 'active' : '' }}">
                <i class="fas fa-users w-4 text-center"></i> Organisasi
            </a>

            <div class="sidebar-group-title">Sertifikat</div>
            <a href="{{ route('admin.certifications.index') }}" class="sidebar-link {{ request()->routeIs('admin.certifications.*') ? 'active' : '' }}">
                <i class="fas fa-medal w-4 text-center"></i> Sertifikasi
            </a>
            <a href="{{ route('admin.trainings.index') }}" class="sidebar-link {{ request()->routeIs('admin.trainings.*') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher w-4 text-center"></i> Pelatihan
            </a>
            <a href="{{ route('admin.certificates.index') }}" class="sidebar-link {{ request()->routeIs('admin.certificates.*') ? 'active' : '' }}">
                <i class="fas fa-certificate w-4 text-center"></i> Gallery Sertifikat
            </a>

            <div class="sidebar-group-title">Pengaturan</div>
            <a href="{{ route('admin.hero.index') }}" class="sidebar-link {{ request()->routeIs('admin.hero.*') ? 'active' : '' }}">
                <i class="fas fa-star w-4 text-center"></i> Hero Section
            </a>
            <a href="{{ route('admin.about.index') }}" class="sidebar-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
                <i class="fas fa-user w-4 text-center"></i> About Section
            </a>
            <a href="{{ route('admin.contact.index') }}" class="sidebar-link {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
                <i class="fas fa-envelope w-4 text-center"></i> Contact Section
            </a>
        </nav>

        <!-- Bottom -->
        <div class="p-3 border-t border-white/5 space-y-1">
            <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
                <i class="fas fa-external-link-alt w-4 text-center text-xs"></i> Lihat Website
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-link w-full text-left text-red-400 hover:text-red-300">
                    <i class="fas fa-sign-out-alt w-4 text-center text-xs"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main -->
    <div class="ml-64 flex-1 flex flex-col min-h-screen">
        <!-- Top Bar -->
        <header class="sticky top-0 z-30 px-6 py-4 border-b border-white/5" style="background: rgba(10,10,15,0.95); backdrop-filter: blur(20px);">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-white font-semibold">@yield('page-title', 'Dashboard')</h1>
                    <nav class="text-slate-500 text-xs mt-0.5">
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-slate-300">Dashboard</a>
                        @hasSection('breadcrumb')
                        <span class="mx-1">›</span>
                        @yield('breadcrumb')
                        @endif
                    </nav>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-slate-400 text-sm hidden sm:block">{{ Auth::user()->name }}</span>
                    <div class="w-8 h-8 rounded-full bg-blue-500/20 border border-blue-500/30 flex items-center justify-center text-blue-400 text-sm font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 p-6">
            @if(session('success'))
            <div class="alert-success mb-6 flex items-center gap-2">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert-error mb-6 flex items-center gap-2">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert-error mb-6">
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-exclamation-circle"></i>
                    <strong>Terdapat kesalahan:</strong>
                </div>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

<script>
// Confirm delete
document.querySelectorAll('[data-confirm]').forEach(el => {
    el.addEventListener('click', function(e) {
        if (!confirm(this.dataset.confirm || 'Yakin ingin menghapus?')) {
            e.preventDefault();
        }
    });
});
</script>
@stack('scripts')
</body>
</html>
