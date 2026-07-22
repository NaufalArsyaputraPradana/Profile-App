<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Naufal Arsyaputra Pradana - Full Stack Web Developer | Laravel, React, Next.js | Fresh Graduate UDINUS">
    <meta name="keywords" content="Naufal Arsyaputra Pradana, Full Stack Developer, Laravel, React, Next.js, Web Developer, UDINUS">
    <meta name="author" content="Naufal Arsyaputra Pradana">
    <meta property="og:title" content="@yield('title', 'Naufal Arsyaputra Pradana') - Full Stack Web Developer">
    <meta property="og:description" content="Portfolio profesional Naufal Arsyaputra Pradana - Full Stack Web Developer">
    <meta property="og:type" content="website">
    <title>@yield('title', 'Naufal Arsyaputra Pradana') | Full Stack Web Developer</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('icon/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('icon/logo.png') }}">

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                    colors: {
                        primary: '#2563eb',
                        'primary-dark': '#1d4ed8',
                        secondary: '#6366f1',
                        accent: '#06b6d4',
                        dark: '#0a0a0f',
                        'dark-card': '#111118',
                        'dark-border': 'rgba(255,255,255,0.08)',
                    },
                }
            }
        }
    </script>

    <style>
        /* ===== BASE STYLES ===== */
        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #0a0a0f;
            color: #e2e8f0;
            overflow-x: hidden;
        }

        /* Dark Mode = Default */
        :root {
            --bg: #0a0a0f;
            --bg-card: rgba(255, 255, 255, 0.04);
            --bg-card-hover: rgba(255, 255, 255, 0.08);
            --border: rgba(255, 255, 255, 0.08);
            --border-hover: rgba(37, 99, 235, 0.4);
            --text: #e2e8f0;
            --text-muted: #94a3b8;
            --primary: #2563eb;
            --primary-glow: rgba(37, 99, 235, 0.3);
        }

        html.light {
            --bg: #f8fafc;
            --bg-card: rgba(255, 255, 255, 0.9);
            --bg-card-hover: rgba(255, 255, 255, 1);
            --border: rgba(0, 0, 0, 0.08);
            --border-hover: rgba(37, 99, 235, 0.4);
            --text: #0f172a;
            --text-muted: #64748b;
        }

        html.light body {
            background-color: #f1f5f9;
            color: #0f172a;
        }

        /* ===== GLASSMORPHISM ===== */
        .glass {
            background: var(--bg-card);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--border);
        }

        .glass-hover:hover {
            background: var(--bg-card-hover);
            border-color: var(--border-hover);
        }

        /* ===== GRADIENT TEXT ===== */
        .gradient-text {
            background: linear-gradient(135deg, #2563eb, #6366f1, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ===== GLOW EFFECTS ===== */
        .glow-blue {
            box-shadow: 0 0 30px rgba(37, 99, 235, 0.3), 0 0 60px rgba(37, 99, 235, 0.1);
        }

        .glow-purple {
            box-shadow: 0 0 30px rgba(99, 102, 241, 0.3), 0 0 60px rgba(99, 102, 241, 0.1);
        }

        /* ===== NAVBAR ===== */
        #main-navbar {
            background: rgba(10, 10, 15, 0.8);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            transition: all 0.3s ease;
        }

        html.light #main-navbar {
            background: rgba(248, 250, 252, 0.85);
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
        }

        #main-navbar.scrolled {
            background: rgba(10, 10, 15, 0.95);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
        }

        html.light #main-navbar.scrolled {
            background: rgba(248, 250, 252, 0.97);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            position: relative;
            font-size: 0.875rem;
            font-weight: 500;
            color: #94a3b8;
            transition: color 0.2s ease;
            padding: 0.25rem 0;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #2563eb, #6366f1);
            transition: width 0.3s ease;
            border-radius: 2px;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #f8fafc;
        }

        html.light .nav-link {
            color: #64748b;
        }

        html.light .nav-link:hover,
        html.light .nav-link.active {
            color: #0f172a;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        /* ===== LOGO ===== */
        .logo-text {
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: -0.025em;
        }

        /* ===== BUTTONS ===== */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #2563eb, #6366f1);
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.75rem;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(37, 99, 235, 0.4);
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: transparent;
            color: #e2e8f0;
            font-weight: 500;
            padding: 0.75rem 1.75rem;
            border-radius: 0.75rem;
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9rem;
        }

        html.light .btn-outline {
            color: #0f172a;
            border-color: rgba(0, 0, 0, 0.15);
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(37, 99, 235, 0.5);
            transform: translateY(-2px);
        }

        /* ===== SECTION TITLES ===== */
        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(37, 99, 235, 0.1);
            border: 1px solid rgba(37, 99, 235, 0.25);
            color: #60a5fa;
            padding: 0.375rem 1rem;
            border-radius: 9999px;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        /* ===== CARD STYLES ===== */
        .card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 1rem;
            transition: all 0.3s ease;
        }

        .card:hover {
            border-color: var(--border-hover);
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(37, 99, 235, 0.1);
        }

        html.light .card {
            background: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
        }

        html.light .card:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1), 0 0 0 1px rgba(37, 99, 235, 0.1);
        }

        /* ===== TECH BADGE ===== */
        .tech-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            background: rgba(37, 99, 235, 0.08);
            border: 1px solid rgba(37, 99, 235, 0.2);
            color: #93c5fd;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        html.light .tech-badge {
            background: rgba(37, 99, 235, 0.06);
            color: #2563eb;
        }

        .tech-badge:hover {
            background: rgba(37, 99, 235, 0.15);
            border-color: rgba(37, 99, 235, 0.4);
        }

        /* ===== CUSTOM SCROLLBAR ===== */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #0a0a0f; }
        ::-webkit-scrollbar-thumb { background: rgba(37, 99, 235, 0.5); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #2563eb; }

        /* ===== ANIMATIONS ===== */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(37, 99, 235, 0.3); }
            50% { box-shadow: 0 0 40px rgba(37, 99, 235, 0.6); }
        }

        @keyframes gradient-shift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
        .animate-gradient { 
            background-size: 200% 200%;
            animation: gradient-shift 4s ease infinite; 
        }
        .animate-spin-slow { animation: spin-slow 8s linear infinite; }

        /* ===== FOOTER ===== */
        .footer {
            background: rgba(5, 5, 10, 0.95);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        html.light .footer {
            background: #f1f5f9;
            border-top: 1px solid rgba(0, 0, 0, 0.08);
        }

        /* ===== CURSOR CUSTOM ===== */
        .cursor-dot {
            width: 8px;
            height: 8px;
            background: #2563eb;
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            transition: transform 0.1s ease;
        }

        .cursor-outline {
            width: 32px;
            height: 32px;
            border: 2px solid rgba(37, 99, 235, 0.5);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9998;
            transition: transform 0.15s ease, width 0.2s ease, height 0.2s ease;
        }

        /* ===== MOBILE MENU ===== */
        #mobile-menu {
            background: rgba(10, 10, 15, 0.98);
            backdrop-filter: blur(30px);
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        html.light #mobile-menu {
            background: rgba(248, 250, 252, 0.98);
        }

        /* ===== PAGE TRANSITION ===== */
        .page-transition {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #2563eb, #6366f1, #06b6d4);
            z-index: 9999;
            transform-origin: left;
        }

        /* Light Mode Overrides */
        html.light .text-slate-400 { color: #64748b; }
        html.light .text-slate-300 { color: #475569; }
        html.light .text-slate-200 { color: #1e293b; }
    </style>

    @stack('styles')
</head>
<body class="antialiased">

    <!-- Custom Cursor -->
    <div class="cursor-dot" id="cursor-dot"></div>
    <div class="cursor-outline" id="cursor-outline"></div>

    <!-- Page Progress Bar -->
    <div class="page-transition" id="page-progress"></div>

    <!-- Floating CV Button -->
    @php
        $aboutData = \App\Models\AboutSection::where('is_active', true)->first();
    @endphp
    @if($aboutData && ($aboutData->cv_kreatif || $aboutData->cv_ats))
    <div class="fixed bottom-6 right-6 z-50 group">
        <button class="w-14 h-14 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-full shadow-lg shadow-blue-500/30 flex items-center justify-center hover:scale-110 transition-transform focus:outline-none">
            <i class="fas fa-file-download text-xl"></i>
        </button>
        <div class="absolute bottom-16 right-0 mb-2 w-48 bg-[#111118] border border-white/10 rounded-xl shadow-xl opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 flex flex-col overflow-hidden">
            <div class="px-4 py-2 bg-white/5 border-b border-white/5 text-xs text-slate-400 font-semibold uppercase tracking-wider">
                Unduh CV Saya
            </div>
            @if($aboutData->cv_kreatif)
            <a href="{{ Storage::url($aboutData->cv_kreatif) }}" target="_blank" class="px-4 py-3 text-sm text-slate-300 hover:text-blue-400 hover:bg-white/5 transition-colors flex items-center gap-2">
                <i class="fas fa-file-alt text-blue-500"></i> CV Kreatif
            </a>
            @endif
            @if($aboutData->cv_ats)
            <a href="{{ Storage::url($aboutData->cv_ats) }}" target="_blank" class="px-4 py-3 text-sm text-slate-300 hover:text-green-400 hover:bg-white/5 transition-colors flex items-center gap-2">
                <i class="fas fa-file-invoice text-green-500"></i> CV ATS
            </a>
            @endif
        </div>
    </div>
    @endif

    <!-- Navbar -->
    <nav class="fixed w-full z-50 transition-all duration-300" id="main-navbar">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="logo-text gradient-text hover:opacity-80 transition-opacity">
                    NAP<span class="text-blue-500">.</span>
                </a>

                <!-- Desktop Nav -->
                <div class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Tentang</a>
                    <a href="{{ route('experience') }}" class="nav-link {{ request()->routeIs('experience') ? 'active' : '' }}">Pengalaman</a>
                    <a href="{{ route('education') }}" class="nav-link {{ request()->routeIs('education') ? 'active' : '' }}">Pendidikan</a>
                    <a href="{{ route('projects') }}" class="nav-link {{ request()->routeIs('projects*') ? 'active' : '' }}">Portfolio</a>
                    <a href="{{ route('skills') }}" class="nav-link {{ request()->routeIs('skills') ? 'active' : '' }}">Skills</a>
                    <a href="{{ route('certificates') }}" class="nav-link {{ request()->routeIs('certificates') ? 'active' : '' }}">Sertifikat</a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a>
                </div>

                <!-- Right Controls -->
                <div class="hidden lg:flex items-center gap-3">
                    <!-- Language Toggle -->
                    <button id="lang-toggle" onclick="toggleLanguage()" class="flex items-center gap-2 px-3 py-1.5 rounded-lg glass text-sm font-medium text-slate-300 hover:text-white transition-all">
                        <canvas id="flagCanvas" width="20" height="15" class="rounded-sm"></canvas>
                        <span id="lang-text">ID</span>
                    </button>

                    <!-- Dark/Light Toggle -->
                    <button id="theme-toggle" class="p-2 rounded-lg glass text-slate-400 hover:text-white transition-all" title="Toggle theme">
                        <i class="fas fa-moon text-sm" id="theme-icon"></i>
                    </button>

                    @guest
                        <a href="{{ route('login') }}" class="btn-primary text-sm py-2 px-4">
                            <i class="fas fa-sign-in-alt text-xs"></i> Login
                        </a>
                    @else
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="btn-outline text-sm py-2 px-4">
                                <i class="fas fa-cog text-xs"></i> Admin
                            </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="btn-outline text-sm py-2 px-4">
                                <i class="fas fa-sign-out-alt text-xs"></i> Logout
                            </button>
                        </form>
                    @endguest
                </div>

                <!-- Mobile Menu Button -->
                <button class="lg:hidden p-2 rounded-lg glass text-slate-400 hover:text-white transition-all" id="mobile-menu-btn">
                    <i class="fas fa-bars text-lg" id="mobile-menu-icon"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="lg:hidden hidden" id="mobile-menu">
            <div class="px-6 py-4 space-y-1">
                <a href="{{ route('home') }}" class="block py-3 px-4 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all {{ request()->routeIs('home') ? 'text-white bg-white/5' : '' }}">
                    <i class="fas fa-home mr-3 text-blue-500"></i> Beranda
                </a>
                <a href="{{ route('about') }}" class="block py-3 px-4 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all {{ request()->routeIs('about') ? 'text-white bg-white/5' : '' }}">
                    <i class="fas fa-user mr-3 text-blue-500"></i> Tentang
                </a>
                <a href="{{ route('experience') }}" class="block py-3 px-4 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all">
                    <i class="fas fa-briefcase mr-3 text-blue-500"></i> Pengalaman
                </a>
                <a href="{{ route('education') }}" class="block py-3 px-4 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all">
                    <i class="fas fa-graduation-cap mr-3 text-blue-500"></i> Pendidikan
                </a>
                <a href="{{ route('projects') }}" class="block py-3 px-4 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all">
                    <i class="fas fa-code mr-3 text-blue-500"></i> Portfolio
                </a>
                <a href="{{ route('skills') }}" class="block py-3 px-4 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all">
                    <i class="fas fa-tools mr-3 text-blue-500"></i> Skills
                </a>
                <a href="{{ route('certificates') }}" class="block py-3 px-4 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all">
                    <i class="fas fa-certificate mr-3 text-blue-500"></i> Sertifikat
                </a>
                <a href="{{ route('contact') }}" class="block py-3 px-4 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all">
                    <i class="fas fa-envelope mr-3 text-blue-500"></i> Kontak
                </a>

                <div class="pt-4 border-t border-white/5 flex items-center gap-3">
                    <button onclick="toggleLanguage()" class="flex items-center gap-2 px-3 py-2 rounded-lg glass text-sm text-slate-300">
                        <canvas id="flagCanvasMobile" width="18" height="13" class="rounded-sm"></canvas>
                        <span id="lang-text-mobile">ID</span>
                    </button>
                    <button id="theme-toggle-mobile" class="p-2 rounded-lg glass text-slate-400">
                        <i class="fas fa-moon text-sm"></i>
                    </button>
                    @guest
                        <a href="{{ route('login') }}" class="btn-primary text-sm py-2 px-4 flex-1 text-center justify-center">Login</a>
                    @else
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="btn-outline text-sm py-2 px-4">Admin</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn-outline text-sm py-2 px-4">Logout</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer mt-0">
        <div class="max-w-7xl mx-auto px-6 py-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Brand -->
                <div>
                    <div class="logo-text gradient-text text-2xl mb-4">NAP<span class="text-blue-500">.</span></div>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6">
                        Full Stack Web Developer yang passionate dalam membangun aplikasi web modern, scalable, dan berdampak nyata.
                    </p>
                    <div class="flex items-center gap-3">
                        <a href="https://github.com/NaufalArsyaputraPradana" target="_blank" rel="noopener"
                           class="w-9 h-9 rounded-lg glass flex items-center justify-center text-slate-400 hover:text-white hover:border-blue-500/50 transition-all">
                            <i class="fab fa-github text-sm"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/naufalarsyaputrapradana" target="_blank" rel="noopener"
                           class="w-9 h-9 rounded-lg glass flex items-center justify-center text-slate-400 hover:text-blue-400 hover:border-blue-500/50 transition-all">
                            <i class="fab fa-linkedin text-sm"></i>
                        </a>
                        <a href="mailto:arsyapradana546@gmail.com"
                           class="w-9 h-9 rounded-lg glass flex items-center justify-center text-slate-400 hover:text-red-400 hover:border-red-500/50 transition-all">
                            <i class="fas fa-envelope text-sm"></i>
                        </a>
                        <a href="https://wa.me/6282223199601" target="_blank" rel="noopener"
                           class="w-9 h-9 rounded-lg glass flex items-center justify-center text-slate-400 hover:text-green-400 hover:border-green-500/50 transition-all">
                            <i class="fab fa-whatsapp text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white font-semibold text-sm mb-4 uppercase tracking-wider">Navigasi</h4>
                    <ul class="space-y-2">
                        @foreach([['home', 'Beranda'], ['about', 'Tentang Saya'], ['experience', 'Pengalaman'], ['education', 'Pendidikan'], ['projects', 'Portfolio'], ['skills', 'Skills'], ['certificates', 'Sertifikat'], ['contact', 'Kontak']] as [$route, $label])
                        <li>
                            <a href="{{ route($route) }}" class="text-slate-400 hover:text-white text-sm transition-colors flex items-center gap-2">
                                <span class="w-1 h-1 bg-blue-500 rounded-full"></span>
                                {{ $label }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-white font-semibold text-sm mb-4 uppercase tracking-wider">Kontak</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-slate-400 text-sm">
                            <i class="fas fa-envelope text-blue-500 w-4"></i>
                            <a href="mailto:arsyapradana546@gmail.com" class="hover:text-white transition-colors">arsyapradana546@gmail.com</a>
                        </li>
                        <li class="flex items-center gap-3 text-slate-400 text-sm">
                            <i class="fas fa-phone text-blue-500 w-4"></i>
                            <a href="tel:082223199601" class="hover:text-white transition-colors">082223199601</a>
                        </li>
                        <li class="flex items-center gap-3 text-slate-400 text-sm">
                            <i class="fas fa-map-marker-alt text-blue-500 w-4"></i>
                            <span>Jepara, Jawa Tengah, Indonesia</span>
                        </li>
                        <li class="flex items-center gap-3 text-slate-400 text-sm">
                            <i class="fas fa-graduation-cap text-blue-500 w-4"></i>
                            <span>S1 Teknik Informatika, UDINUS</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="mt-12 pt-8 border-t border-white/5 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-slate-500 text-sm">
                    &copy; {{ date('Y') }} <span class="text-slate-400">Naufal Arsyaputra Pradana</span>. All rights reserved.
                </p>
                <div class="flex items-center gap-2 text-slate-500 text-sm">
                    <span>Built with</span>
                    <i class="fas fa-heart text-red-500 text-xs animate-pulse"></i>
                    <span>using Laravel & Tailwind CSS</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Google Translate Hidden Element -->
    <div id="google_translate_element2" style="display:none;"></div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
    // ===== AOS INIT =====
    AOS.init({
        duration: 700,
        easing: 'ease-out-cubic',
        once: true,
        offset: 80,
    });

    // ===== THEME =====
    (function() {
        const html = document.documentElement;
        const saved = localStorage.getItem('theme');
        if (saved === 'light') {
            html.classList.add('light');
        }
    })();

    function toggleTheme() {
        const html = document.documentElement;
        const isLight = html.classList.toggle('light');
        localStorage.setItem('theme', isLight ? 'light' : 'dark');
        updateThemeIcon(isLight);
    }

    function updateThemeIcon(isLight) {
        const icons = document.querySelectorAll('#theme-icon, #theme-icon-mobile');
        icons.forEach(icon => {
            icon.className = isLight ? 'fas fa-sun text-sm text-yellow-400' : 'fas fa-moon text-sm';
        });
    }

    document.getElementById('theme-toggle')?.addEventListener('click', toggleTheme);
    document.getElementById('theme-toggle-mobile')?.addEventListener('click', toggleTheme);

    // Init icon on load
    updateThemeIcon(document.documentElement.classList.contains('light'));

    // ===== NAVBAR SCROLL =====
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('main-navbar');
        if (window.scrollY > 20) {
            navbar?.classList.add('scrolled');
        } else {
            navbar?.classList.remove('scrolled');
        }

        // Page progress
        const doc = document.documentElement;
        const scrollPct = (doc.scrollTop / (doc.scrollHeight - doc.clientHeight)) * 100;
        const progress = document.getElementById('page-progress');
        if (progress) progress.style.transform = `scaleX(${scrollPct / 100})`;
    });

    // ===== MOBILE MENU =====
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuIcon = document.getElementById('mobile-menu-icon');
    let menuOpen = false;

    mobileMenuBtn?.addEventListener('click', function() {
        menuOpen = !menuOpen;
        if (menuOpen) {
            mobileMenu?.classList.remove('hidden');
            mobileMenuIcon.className = 'fas fa-times text-lg';
        } else {
            mobileMenu?.classList.add('hidden');
            mobileMenuIcon.className = 'fas fa-bars text-lg';
        }
    });

    // Close menu on outside click
    document.addEventListener('click', function(e) {
        if (menuOpen && !mobileMenuBtn?.contains(e.target) && !mobileMenu?.contains(e.target)) {
            mobileMenu?.classList.add('hidden');
            mobileMenuIcon.className = 'fas fa-bars text-lg';
            menuOpen = false;
        }
    });

    // ===== CUSTOM CURSOR (desktop only) =====
    if (window.innerWidth > 768) {
        const dot = document.getElementById('cursor-dot');
        const outline = document.getElementById('cursor-outline');
        let mouseX = 0, mouseY = 0;
        let outlineX = 0, outlineY = 0;

        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
            if (dot) {
                dot.style.left = mouseX - 4 + 'px';
                dot.style.top = mouseY - 4 + 'px';
            }
        });

        function animateCursor() {
            outlineX += (mouseX - outlineX) * 0.12;
            outlineY += (mouseY - outlineY) * 0.12;
            if (outline) {
                outline.style.left = outlineX - 16 + 'px';
                outline.style.top = outlineY - 16 + 'px';
            }
            requestAnimationFrame(animateCursor);
        }
        animateCursor();

        document.querySelectorAll('a, button').forEach(el => {
            el.addEventListener('mouseenter', () => {
                if (dot) dot.style.transform = 'scale(2)';
                if (outline) {
                    outline.style.width = '50px';
                    outline.style.height = '50px';
                    outline.style.borderColor = 'rgba(37, 99, 235, 0.8)';
                }
            });
            el.addEventListener('mouseleave', () => {
                if (dot) dot.style.transform = 'scale(1)';
                if (outline) {
                    outline.style.width = '32px';
                    outline.style.height = '32px';
                    outline.style.borderColor = 'rgba(37, 99, 235, 0.5)';
                }
            });
        });
    } else {
        // Hide cursor elements on mobile
        document.getElementById('cursor-dot')?.remove();
        document.getElementById('cursor-outline')?.remove();
    }

    // ===== LANGUAGE TOGGLE =====
    let currentLang = 'id';

    function drawFlag(canvasId, lang) {
        const canvas = document.getElementById(canvasId);
        if (!canvas) return;
        const ctx = canvas.getContext('2d');
        const w = canvas.width, h = canvas.height;
        ctx.clearRect(0, 0, w, h);

        if (lang === 'id') {
            ctx.fillStyle = '#CE1126';
            ctx.fillRect(0, 0, w, h/2);
            ctx.fillStyle = '#FFFFFF';
            ctx.fillRect(0, h/2, w, h/2);
        } else {
            // UK Flag simplified
            ctx.fillStyle = '#012169';
            ctx.fillRect(0, 0, w, h);
            ctx.strokeStyle = '#FFFFFF';
            ctx.lineWidth = h * 0.2;
            ctx.beginPath();
            ctx.moveTo(0, 0); ctx.lineTo(w, h);
            ctx.moveTo(w, 0); ctx.lineTo(0, h);
            ctx.moveTo(0, h/2); ctx.lineTo(w, h/2);
            ctx.moveTo(w/2, 0); ctx.lineTo(w/2, h);
            ctx.stroke();
            ctx.strokeStyle = '#C8102E';
            ctx.lineWidth = h * 0.1;
            ctx.beginPath();
            ctx.moveTo(0, h/2); ctx.lineTo(w, h/2);
            ctx.moveTo(w/2, 0); ctx.lineTo(w/2, h);
            ctx.stroke();
        }
        ctx.strokeStyle = 'rgba(255,255,255,0.15)';
        ctx.lineWidth = 0.5;
        ctx.strokeRect(0, 0, w, h);
    }

    function toggleLanguage() {
        if (currentLang === 'id') {
            doGTranslate('id|en');
            currentLang = 'en';
            document.getElementById('lang-text').textContent = 'EN';
            document.getElementById('lang-text-mobile').textContent = 'EN';
            drawFlag('flagCanvas', 'en');
            drawFlag('flagCanvasMobile', 'en');
        } else {
            doGTranslate('en|id');
            currentLang = 'id';
            document.getElementById('lang-text').textContent = 'ID';
            document.getElementById('lang-text-mobile').textContent = 'ID';
            drawFlag('flagCanvas', 'id');
            drawFlag('flagCanvasMobile', 'id');
        }
    }

    function googleTranslateElementInit2() {
        new google.translate.TranslateElement({ pageLanguage: 'id', autoDisplay: false }, 'google_translate_element2');
    }

    function doGTranslate(lang_pair) {
        if (lang_pair.value) lang_pair = lang_pair.value;
        if (lang_pair == '') return;
        var lang = lang_pair.split('|')[1];
        var sel = document.getElementsByTagName('select');
        for (var i = 0; i < sel.length; i++) {
            if (/goog-te-combo/.test(sel[i].className)) {
                sel[i].value = lang;
                sel[i].dispatchEvent(new Event('change'));
                break;
            }
        }
    }

    // Init flags
    document.addEventListener('DOMContentLoaded', function() {
        drawFlag('flagCanvas', 'id');
        drawFlag('flagCanvasMobile', 'id');
        // Hide Google Translate bar
        document.body.style.top = '0 !important';
    });

    // Hide Google Translate banner
    const style = document.createElement('style');
    style.textContent = `
        .goog-te-banner-frame, .goog-te-gadget img, .skiptranslate { display: none !important; }
        body { top: 0 !important; }
        .VIpgJd-ZVi9od-ORHb-OEVmcd { display: none !important; }
    `;
    document.head.appendChild(style);
    </script>

    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
</body>
</html>