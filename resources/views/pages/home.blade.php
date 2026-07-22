@extends('layouts.app')

@section('title', 'Naufal Arsyaputra Pradana')

@push('styles')
<style>
/* ===== HERO SECTION ===== */
.hero-section {
    min-height: 100vh;
    position: relative;
    display: flex;
    align-items: center;
    overflow: hidden;
    background: #0a0a0f;
}

.hero-bg-grid {
    position: absolute;
    inset: 0;
    background-image: 
        linear-gradient(rgba(37, 99, 235, 0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(37, 99, 235, 0.03) 1px, transparent 1px);
    background-size: 60px 60px;
}

.hero-glow-1 {
    position: absolute;
    top: -20%;
    right: -10%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(37, 99, 235, 0.12) 0%, transparent 70%);
    pointer-events: none;
}

.hero-glow-2 {
    position: absolute;
    bottom: -20%;
    left: -10%;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(99, 102, 241, 0.1) 0%, transparent 70%);
    pointer-events: none;
}

/* Typing effect */
.typing-cursor::after {
    content: '|';
    animation: blink 1s step-end infinite;
    color: #2563eb;
}
@keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0; } }

/* Particle canvas */
#particles-canvas {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

/* Avatar ring animation */
.avatar-ring {
    position: absolute;
    inset: -4px;
    border-radius: 50%;
    background: conic-gradient(from 0deg, #2563eb, #6366f1, #06b6d4, #2563eb);
    animation: spin-ring 3s linear infinite;
}

@keyframes spin-ring {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* ===== STATS COUNTER ===== */
.stat-card {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 1rem;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
}
.stat-card:hover {
    border-color: rgba(37, 99, 235, 0.4);
    background: rgba(37, 99, 235, 0.05);
    transform: translateY(-4px);
}

html.light .stat-card {
    background: white;
    border-color: rgba(0,0,0,0.06);
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}

/* ===== SKILL PROGRESS BARS ===== */
.skill-bar-fill {
    height: 6px;
    border-radius: 9999px;
    background: linear-gradient(90deg, #2563eb, #6366f1);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 1.2s cubic-bezier(0.4, 0, 0.2, 1);
}

.skill-bar-fill.animated {
    transform: scaleX(1);
}

/* ===== PROJECT CARDS ===== */
.project-card {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 1.25rem;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
}

.project-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(37, 99, 235, 0.05), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.project-card:hover {
    border-color: rgba(37, 99, 235, 0.35);
    transform: translateY(-6px);
    box-shadow: 0 24px 48px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(37, 99, 235, 0.15);
}

.project-card:hover::before { opacity: 1; }

html.light .project-card {
    background: white;
    border-color: rgba(0,0,0,0.06);
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
}

/* Project image overlay */
.project-img-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, transparent 30%, rgba(0,0,0,0.8));
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: flex-end;
    padding: 1.5rem;
}

.project-card:hover .project-img-overlay { opacity: 1; }

/* ===== TECH STACK ICONS ===== */
.tech-icon-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    padding: 1.25rem;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 1rem;
    transition: all 0.3s ease;
    cursor: default;
}

.tech-icon-card:hover {
    background: rgba(255,255,255,0.08);
    border-color: rgba(37, 99, 235, 0.3);
    transform: translateY(-4px) scale(1.05);
}

html.light .tech-icon-card {
    background: white;
    border-color: rgba(0,0,0,0.06);
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}

/* ===== TIMELINE ===== */
.timeline-item {
    position: relative;
    padding-left: 2.5rem;
}
.timeline-item::before {
    content: '';
    position: absolute;
    left: 0.5rem;
    top: 1.5rem;
    bottom: -1rem;
    width: 2px;
    background: linear-gradient(to bottom, #2563eb, rgba(37,99,235,0.1));
}
.timeline-item:last-child::before { display: none; }
.timeline-dot {
    position: absolute;
    left: 0;
    top: 1.25rem;
    width: 1rem;
    height: 1rem;
    background: #2563eb;
    border-radius: 50%;
    border: 3px solid rgba(37,99,235,0.3);
    box-shadow: 0 0 10px rgba(37,99,235,0.5);
}

/* ===== AVAILABLE BADGE ===== */
.available-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(16, 185, 129, 0.1);
    border: 1px solid rgba(16, 185, 129, 0.3);
    color: #34d399;
    padding: 0.375rem 1rem;
    border-radius: 9999px;
    font-size: 0.8rem;
    font-weight: 600;
}

.available-dot {
    width: 6px;
    height: 6px;
    background: #34d399;
    border-radius: 50%;
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.5; transform: scale(0.8); }
}

/* ===== SECTION SEPARATOR ===== */
.section-divider {
    width: 60px;
    height: 4px;
    background: linear-gradient(90deg, #2563eb, #6366f1);
    border-radius: 9999px;
    margin: 1rem 0 2rem;
}
</style>
@endpush

@section('content')

<!-- =================== HERO SECTION =================== -->
<section class="hero-section" id="hero">
    <div class="hero-bg-grid"></div>
    <div class="hero-glow-1"></div>
    <div class="hero-glow-2"></div>
    <canvas id="particles-canvas"></canvas>

    <div class="max-w-7xl mx-auto px-6 py-24 relative z-10 w-full">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <!-- Left: Text Content -->
            <div>
                <!-- Available badge -->
                <div class="available-badge mb-6" data-aos="fade-up">
                    <span class="available-dot"></span>
                    Available for Work
                </div>

                <!-- Name -->
                <div data-aos="fade-up" data-aos-delay="100">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-2">
                        Halo, Saya
                    </h1>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold gradient-text leading-tight mb-6">
                        Naufal Arsyaputra
                    </h1>
                </div>

                <!-- Typing animation -->
                <div data-aos="fade-up" data-aos-delay="200" class="mb-6">
                    <p class="text-xl md:text-2xl text-slate-400 font-medium">
                        Saya seorang <span id="typing-text" class="text-blue-400 font-semibold typing-cursor"></span>
                    </p>
                </div>

                <!-- Description -->
                <p class="text-slate-400 text-base leading-relaxed mb-8 max-w-lg" data-aos="fade-up" data-aos-delay="300">
                    Fresh Graduate Full Stack Web Developer dengan pengalaman magang 8 bulan. 
                    Passionate dalam membangun aplikasi web modern menggunakan <strong class="text-slate-200">Laravel, React, Next.js</strong>, dan ekosistem JavaScript.
                </p>

                <!-- Info badges -->
                <div class="flex flex-wrap gap-3 mb-8" data-aos="fade-up" data-aos-delay="350">
                    <span class="flex items-center gap-2 px-3 py-1.5 rounded-lg glass text-sm text-slate-300">
                        <i class="fas fa-map-marker-alt text-blue-500 text-xs"></i>
                        Jepara, Indonesia
                    </span>
                    <span class="flex items-center gap-2 px-3 py-1.5 rounded-lg glass text-sm text-slate-300">
                        <i class="fas fa-graduation-cap text-blue-500 text-xs"></i>
                        S1 Teknik Informatika UDINUS
                    </span>
                    <span class="flex items-center gap-2 px-3 py-1.5 rounded-lg glass text-sm text-slate-300">
                        <i class="fas fa-star text-yellow-500 text-xs"></i>
                        IPK 3.75 / 4.00
                    </span>
                    <span class="flex items-center gap-2 px-3 py-1.5 rounded-lg glass text-sm text-slate-300">
                        <i class="fas fa-briefcase text-blue-500 text-xs"></i>
                        8 Bulan Pengalaman Magang
                    </span>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-wrap gap-4" data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ route('projects') }}" class="btn-primary">
                        <i class="fas fa-eye"></i> Lihat Portfolio
                    </a>
                    @if($about && $about->cv_ats)
                    <a href="{{ Storage::url($about->cv_ats) }}" target="_blank" class="btn-outline" style="border-color: rgba(16, 185, 129, 0.3); color: #34d399;">
                        <i class="fas fa-file-invoice text-green-500"></i> CV ATS
                    </a>
                    @endif
                    @if($about && $about->cv_kreatif)
                    <a href="{{ Storage::url($about->cv_kreatif) }}" target="_blank" class="btn-outline">
                        <i class="fas fa-file-alt text-blue-500"></i> CV Kreatif
                    </a>
                    @endif
                </div>

                <!-- Social Links -->
                <div class="flex items-center gap-4 mt-8" data-aos="fade-up" data-aos-delay="500">
                    <span class="text-slate-500 text-sm">Temukan saya di:</span>
                    <a href="https://github.com/NaufalArsyaputraPradana" target="_blank" rel="noopener"
                       class="w-10 h-10 rounded-xl glass flex items-center justify-center text-slate-400 hover:text-white hover:border-blue-500/40 transition-all">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/naufalarsyaputrapradana" target="_blank" rel="noopener"
                       class="w-10 h-10 rounded-xl glass flex items-center justify-center text-slate-400 hover:text-blue-400 hover:border-blue-500/40 transition-all">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="mailto:arsyapradana546@gmail.com"
                       class="w-10 h-10 rounded-xl glass flex items-center justify-center text-slate-400 hover:text-red-400 transition-all">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <a href="{{ route('contact') }}" class="text-sm text-blue-400 hover:text-blue-300 transition-colors ml-2 flex items-center gap-1">
                        Contact Me <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- Right: Avatar & Stats -->
            <div class="flex flex-col items-center" data-aos="fade-left" data-aos-delay="200">
                <!-- Avatar with ring -->
                <div class="relative mb-8">
                    <div class="relative w-64 h-64 md:w-72 md:h-72">
                        <div class="avatar-ring rounded-full absolute inset-0 -z-10"></div>
                        <div class="w-full h-full rounded-full overflow-hidden border-4 border-dark-card bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center">
                            @php $profilePhoto = null; @endphp
                            @if($about && $about->photo)
                                <img src="{{ Storage::url($about->photo) }}" alt="Naufal Arsyaputra Pradana"
                                     class="w-full h-full object-cover">
                            @elseif(file_exists(public_path('images/profile.jpg')))
                                <img src="{{ asset('images/profile.jpg') }}" alt="Naufal Arsyaputra Pradana"
                                     class="w-full h-full object-cover">
                            @else
                                <div class="text-center text-white">
                                    <i class="fas fa-user text-6xl opacity-60"></i>
                                    <p class="text-xs mt-2 opacity-60">NAP</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Floating badges -->
                    <div class="absolute -top-4 -right-4 bg-blue-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-lg animate-float">
                        <i class="fas fa-code mr-1"></i> Full Stack Dev
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-indigo-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-lg animate-float" style="animation-delay: 1s;">
                        <i class="fas fa-star mr-1"></i> IPK 3.75
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-2 gap-4 w-full max-w-sm">
                    <div class="stat-card">
                        <div class="text-3xl font-bold gradient-text mb-1" data-count="8">0</div>
                        <div class="text-slate-400 text-sm">Bulan Magang</div>
                    </div>
                    <div class="stat-card">
                        <div class="text-3xl font-bold gradient-text mb-1" data-count="{{ $projects->count() }}">0</div>
                        <div class="text-slate-400 text-sm">Portfolio Project</div>
                    </div>
                    <div class="stat-card">
                        <div class="text-3xl font-bold gradient-text mb-1">3.75</div>
                        <div class="text-slate-400 text-sm">IPK UDINUS</div>
                    </div>
                    <div class="stat-card">
                        <div class="text-3xl font-bold gradient-text mb-1" data-count="{{ $certifications->count() + 2 }}">0</div>
                        <div class="text-slate-400 text-sm">Sertifikat</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-slate-500 animate-bounce">
            <span class="text-xs">Scroll</span>
            <div class="w-5 h-8 border-2 border-slate-600 rounded-full flex justify-center pt-1">
                <div class="w-1 h-2 bg-blue-500 rounded-full animate-float"></div>
            </div>
        </div>
    </div>
</section>

<!-- =================== TECH STACK SECTION =================== -->
<section class="py-16 border-t border-white/5" id="tech-stack">
    <div class="max-w-7xl mx-auto px-6">
        <p class="text-center text-slate-500 text-sm mb-8 uppercase tracking-wider" data-aos="fade-up">Tech Stack yang Saya Kuasai</p>
        <div class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-10 gap-3">
            @php
            $techStack = [
                ['name' => 'Laravel', 'icon' => 'fab fa-laravel', 'color' => '#FF2D20'],
                ['name' => 'PHP', 'icon' => 'fab fa-php', 'color' => '#777BB4'],
                ['name' => 'JavaScript', 'icon' => 'fab fa-js', 'color' => '#F7DF1E'],
                ['name' => 'React', 'icon' => 'fab fa-react', 'color' => '#61DAFB'],
                ['name' => 'Node.js', 'icon' => 'fab fa-node-js', 'color' => '#339933'],
                ['name' => 'HTML5', 'icon' => 'fab fa-html5', 'color' => '#E34F26'],
                ['name' => 'CSS3', 'icon' => 'fab fa-css3-alt', 'color' => '#1572B6'],
                ['name' => 'Bootstrap', 'icon' => 'fab fa-bootstrap', 'color' => '#7952B3'],
                ['name' => 'Git', 'icon' => 'fab fa-git-alt', 'color' => '#F05032'],
                ['name' => 'GitHub', 'icon' => 'fab fa-github', 'color' => '#ffffff'],
                ['name' => 'MySQL', 'icon' => 'fas fa-database', 'color' => '#4479A1'],
                ['name' => 'Figma', 'icon' => 'fab fa-figma', 'color' => '#F24E1E'],
            ];
            @endphp
            @foreach($techStack as $i => $tech)
            <div class="tech-icon-card" data-aos="zoom-in" data-aos-delay="{{ $i * 40 }}">
                <i class="{{ $tech['icon'] }} text-2xl" style="color: {{ $tech['color'] }}"></i>
                <span class="text-slate-400 text-xs text-center leading-tight">{{ $tech['name'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- =================== ABOUT SECTION =================== -->
<section class="py-24" id="about">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <div class="section-badge"><i class="fas fa-user-circle"></i> Tentang Saya</div>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-2">Fresh Graduate</h2>
                <h2 class="text-3xl md:text-4xl font-bold gradient-text mb-6">Full Stack Developer</h2>
                <div class="section-divider"></div>
                @if($about)
                <p class="text-slate-400 leading-relaxed mb-8 text-base">
                    {{ $about->description }}
                </p>
                @else
                <p class="text-slate-400 leading-relaxed mb-8">
                    Fresh Graduate Full Stack Web Developer dengan pengalaman magang 8 bulan di Firstudio sebagai Web Developer. Memiliki passion dalam membangun aplikasi web modern menggunakan Laravel, PHP, JavaScript, React, Next.js, Express.js, dan MySQL.
                </p>
                @endif

                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl glass flex items-center justify-center text-blue-500 flex-shrink-0">
                            <i class="fas fa-envelope text-sm"></i>
                        </div>
                        <div>
                            <p class="text-slate-500 text-xs">Email</p>
                            <p class="text-slate-300 text-sm font-medium">arsyapradana546@gmail.com</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl glass flex items-center justify-center text-blue-500 flex-shrink-0">
                            <i class="fas fa-phone text-sm"></i>
                        </div>
                        <div>
                            <p class="text-slate-500 text-xs">Phone</p>
                            <p class="text-slate-300 text-sm font-medium">082223199601</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl glass flex items-center justify-center text-blue-500 flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-sm"></i>
                        </div>
                        <div>
                            <p class="text-slate-500 text-xs">Lokasi</p>
                            <p class="text-slate-300 text-sm font-medium">Jepara, Jawa Tengah</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl glass flex items-center justify-center text-blue-500 flex-shrink-0">
                            <i class="fas fa-graduation-cap text-sm"></i>
                        </div>
                        <div>
                            <p class="text-slate-500 text-xs">Pendidikan</p>
                            <p class="text-slate-300 text-sm font-medium">S1 Teknik Informatika</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('about') }}" class="btn-primary">
                        <i class="fas fa-arrow-right"></i> Selengkapnya
                    </a>
                    <a href="{{ asset('CV_ATS_NAUFAL ARSYAPUTRA PRADANA.pdf') }}" target="_blank" class="btn-outline">
                        <i class="fas fa-download"></i> Download CV
                    </a>
                </div>
            </div>

            <!-- Skills Preview -->
            <div data-aos="fade-left" data-aos-delay="100">
                <h3 class="text-white font-semibold text-lg mb-6">Kemampuan Utama</h3>
                @php
                $topSkills = [
                    ['name' => 'Laravel / PHP', 'pct' => 90, 'icon' => 'fab fa-laravel'],
                    ['name' => 'JavaScript', 'pct' => 85, 'icon' => 'fab fa-js'],
                    ['name' => 'React.js / Next.js', 'pct' => 80, 'icon' => 'fab fa-react'],
                    ['name' => 'MySQL / Database', 'pct' => 82, 'icon' => 'fas fa-database'],
                    ['name' => 'HTML5 / CSS3', 'pct' => 92, 'icon' => 'fab fa-html5'],
                    ['name' => 'REST API', 'pct' => 85, 'icon' => 'fas fa-code'],
                ];
                @endphp
                <div class="space-y-5">
                    @foreach($topSkills as $i => $skill)
                    <div class="skill-item" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-2">
                                <i class="{{ $skill['icon'] }} text-blue-500 text-sm w-5"></i>
                                <span class="text-slate-300 text-sm font-medium">{{ $skill['name'] }}</span>
                            </div>
                            <span class="text-blue-400 text-sm font-bold">{{ $skill['pct'] }}%</span>
                        </div>
                        <div class="w-full h-1.5 bg-white/5 rounded-full overflow-hidden">
                            <div class="skill-bar-fill" data-width="{{ $skill['pct'] }}" style="width: {{ $skill['pct'] }}%; transform: scaleX(0);"></div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-8 pt-6 border-t border-white/5 flex items-center justify-between">
                    <a href="{{ route('skills') }}" class="text-blue-400 hover:text-blue-300 text-sm flex items-center gap-2 transition-colors">
                        Lihat Semua Skill <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                    <a href="{{ route('experience') }}" class="text-slate-400 hover:text-white text-sm flex items-center gap-2 transition-colors">
                        <i class="fas fa-briefcase text-xs"></i> Lihat Pengalaman
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =================== EXPERIENCE PREVIEW =================== -->
@if($experiences->count() > 0)
<section class="py-24 border-t border-white/5" id="experience-preview">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="section-badge justify-center"><i class="fas fa-briefcase"></i> Pengalaman Kerja</div>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-2">Perjalanan Profesional</h2>
            <p class="text-slate-400 mt-4 max-w-xl mx-auto">Pengalaman nyata dalam membangun aplikasi web di lingkungan profesional selama 8 bulan.</p>
        </div>

        <div class="max-w-3xl mx-auto space-y-6">
            @foreach($experiences as $i => $exp)
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="timeline-dot"></div>
                <div class="card p-6 ml-4">
                    <div class="flex flex-col sm:flex-row sm:items-start gap-4">
                        <div class="w-12 h-12 rounded-xl glass flex items-center justify-center text-blue-500 flex-shrink-0">
                            @if($exp->company_logo)
                                <img src="{{ Storage::url($exp->company_logo) }}" alt="{{ $exp->company_name }}" class="w-full h-full rounded-xl object-cover">
                            @else
                                <i class="fas fa-building text-lg"></i>
                            @endif
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center gap-3 mb-1">
                                <h3 class="text-white font-semibold">{{ $exp->position }}</h3>
                                <span class="text-xs px-2.5 py-0.5 rounded-full {{ $exp->type === 'internship' ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20' : 'bg-green-500/10 text-green-400 border border-green-500/20' }}">
                                    {{ ucfirst($exp->type) }}
                                </span>
                            </div>
                            <p class="text-blue-400 text-sm font-medium mb-2">{{ $exp->company_name }}</p>
                            <div class="flex flex-wrap gap-3 text-slate-500 text-xs mb-3">
                                <span><i class="fas fa-calendar mr-1"></i>
                                    {{ $exp->start_date->format('M Y') }} - {{ $exp->is_current ? 'Sekarang' : ($exp->end_date ? $exp->end_date->format('M Y') : '-') }}
                                </span>
                                <span><i class="fas fa-clock mr-1"></i>{{ $exp->duration }}</span>
                                @if($exp->location)
                                <span><i class="fas fa-map-marker-alt mr-1"></i>{{ $exp->location }}</span>
                                @endif
                            </div>
                            @if($exp->technologies)
                            <div class="flex flex-wrap gap-2">
                                @foreach(array_slice($exp->technologies, 0, 5) as $tech)
                                <span class="tech-badge">{{ $tech }}</span>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12" data-aos="fade-up">
            <a href="{{ route('experience') }}" class="btn-outline">
                <i class="fas fa-briefcase"></i> Lihat Detail Pengalaman
            </a>
        </div>
    </div>
</section>
@endif

<!-- =================== PORTFOLIO PREVIEW =================== -->
@if($projects->count() > 0)
<section class="py-24 border-t border-white/5" id="portfolio-preview">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16" data-aos="fade-up">
            <div>
                <div class="section-badge"><i class="fas fa-code"></i> Portfolio</div>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-2">Proyek Terbaru</h2>
                <p class="text-slate-400 max-w-lg">Karya terbaik yang mencerminkan kemampuan teknis dan kreativitas saya dalam membangun solusi digital.</p>
            </div>
            <a href="{{ route('projects') }}" class="btn-outline mt-6 md:mt-0 self-start md:self-auto">
                Semua Proyek <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-6">
            @foreach($projects->take(4) as $i => $project)
            <div class="project-card" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <!-- Project Image -->
                <div class="relative h-48 bg-gradient-to-br from-blue-900/40 to-indigo-900/40 overflow-hidden">
                    @if($project->thumbnail)
                        <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->title }}"
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-900/30 to-indigo-900/30">
                            <div class="text-center">
                                <i class="fas fa-code text-blue-500/40 text-5xl mb-2"></i>
                                <p class="text-slate-500 text-sm">{{ $project->title }}</p>
                            </div>
                        </div>
                    @endif
                    <!-- Overlay on hover -->
                    <div class="project-img-overlay">
                        <div class="flex gap-3">
                            @if($project->demo_url ?? $project->url)
                            <a href="{{ $project->demo_url ?? $project->url }}" target="_blank" rel="noopener"
                               class="flex items-center gap-2 text-white text-sm font-medium bg-blue-600 px-3 py-1.5 rounded-lg hover:bg-blue-500 transition-colors">
                                <i class="fas fa-external-link-alt text-xs"></i> Live Demo
                            </a>
                            @endif
                            @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank" rel="noopener"
                               class="flex items-center gap-2 text-white text-sm font-medium bg-gray-700 px-3 py-1.5 rounded-lg hover:bg-gray-600 transition-colors">
                                <i class="fab fa-github text-xs"></i> GitHub
                            </a>
                            @endif
                        </div>
                    </div>

                    <!-- Status badge -->
                    <div class="absolute top-3 left-3">
                        <span class="text-xs px-2.5 py-0.5 rounded-full font-medium
                            {{ $project->status === 'active' ? 'bg-green-500/20 text-green-400 border border-green-500/30' :
                               ($project->status === 'development' ? 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/30' :
                               'bg-slate-500/20 text-slate-400 border border-slate-500/30') }}">
                            {{ $project->status === 'active' ? 'Live' : ($project->status === 'development' ? 'In Dev' : 'Archived') }}
                        </span>
                    </div>
                    @if($project->featured)
                    <div class="absolute top-3 right-3">
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-blue-500/20 text-blue-400 border border-blue-500/30 font-medium">
                            <i class="fas fa-star text-xs"></i> Featured
                        </span>
                    </div>
                    @endif
                </div>

                <!-- Project Info -->
                <div class="p-6">
                    <div class="flex items-start justify-between gap-4 mb-3">
                        <div>
                            <h3 class="text-white font-semibold text-lg leading-tight">{{ $project->title }}</h3>
                            @if($project->role)
                            <p class="text-slate-500 text-xs mt-0.5">{{ $project->role }}</p>
                            @endif
                        </div>
                        @if($project->category)
                        <span class="tech-badge text-xs flex-shrink-0">{{ $project->category }}</span>
                        @endif
                    </div>

                    <p class="text-slate-400 text-sm leading-relaxed mb-4 line-clamp-2">
                        {{ Str::limit($project->description, 120) }}
                    </p>

                    @if($project->technologies && count($project->technologies) > 0)
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach(array_slice($project->technologies, 0, 4) as $tech)
                        <span class="tech-badge text-xs">{{ $tech }}</span>
                        @endforeach
                        @if(count($project->technologies) > 4)
                        <span class="tech-badge text-xs">+{{ count($project->technologies) - 4 }}</span>
                        @endif
                    </div>
                    @endif

                    <div class="flex items-center justify-between pt-4 border-t border-white/5">
                        <a href="{{ route('projects.show', $project->slug ?? $project->id) }}" class="text-blue-400 hover:text-blue-300 text-sm flex items-center gap-2 transition-colors font-medium">
                            Detail Proyek <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                        <div class="flex gap-2">
                            @if($project->demo_url ?? $project->url)
                            <a href="{{ $project->demo_url ?? $project->url }}" target="_blank" rel="noopener"
                               class="w-8 h-8 rounded-lg glass flex items-center justify-center text-slate-400 hover:text-blue-400 transition-all text-xs">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                            @endif
                            @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank" rel="noopener"
                               class="w-8 h-8 rounded-lg glass flex items-center justify-center text-slate-400 hover:text-white transition-all text-xs">
                                <i class="fab fa-github"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- =================== EDUCATION PREVIEW =================== -->
@if($educations->count() > 0)
<section class="py-24 border-t border-white/5" id="education-preview">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="section-badge justify-center"><i class="fas fa-graduation-cap"></i> Pendidikan</div>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-2">Latar Belakang</h2>
            <h2 class="text-3xl md:text-4xl font-bold gradient-text">Pendidikan Formal</h2>
        </div>

        <div class="max-w-3xl mx-auto grid gap-6">
            @foreach($educations as $i => $edu)
            <div class="card p-6" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="flex flex-col sm:flex-row gap-4 items-start">
                    <div class="w-14 h-14 rounded-xl glass flex items-center justify-center text-blue-500 flex-shrink-0">
                        @if($edu->institution_logo)
                            <img src="{{ Storage::url($edu->institution_logo) }}" alt="{{ $edu->institution_name }}" class="w-full h-full rounded-xl object-cover">
                        @else
                            <i class="fas fa-university text-xl"></i>
                        @endif
                    </div>
                    <div class="flex-1">
                        <div class="flex flex-wrap items-center gap-3 mb-1">
                            <h3 class="text-white font-semibold text-lg">{{ $edu->institution_name }}</h3>
                            @if($edu->is_current)
                            <span class="text-xs px-2.5 py-0.5 rounded-full bg-green-500/10 text-green-400 border border-green-500/20">Current</span>
                            @endif
                        </div>
                        <p class="text-blue-400 text-sm mb-1">{{ $edu->degree }} - {{ $edu->field_of_study }}</p>
                        <p class="text-slate-500 text-xs mb-3">
                            <i class="fas fa-calendar mr-1"></i>
                            {{ $edu->start_date->format('Y') }} - {{ $edu->is_current ? 'Sekarang' : ($edu->end_date ? $edu->end_date->format('Y') : '-') }}
                            @if($edu->location) · <i class="fas fa-map-marker-alt mr-1"></i>{{ $edu->location }} @endif
                        </p>
                        @if($edu->gpa)
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-slate-400">IPK:</span>
                            <span class="text-white font-bold text-sm">{{ number_format($edu->gpa, 2) }}</span>
                            <span class="text-slate-500 text-xs">/ {{ $edu->gpa_scale }}</span>
                            <div class="flex-1 h-1.5 bg-white/5 rounded-full overflow-hidden ml-2 max-w-24">
                                <div class="h-full bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full" style="width: {{ ($edu->gpa / 4) * 100 }}%"></div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10" data-aos="fade-up">
            <a href="{{ route('education') }}" class="btn-outline">
                <i class="fas fa-graduation-cap"></i> Detail Pendidikan & Organisasi
            </a>
        </div>
    </div>
</section>
@endif

<!-- =================== CERTIFICATIONS PREVIEW =================== -->
@if($certifications->count() > 0)
<section class="py-24 border-t border-white/5" id="cert-preview">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="section-badge justify-center"><i class="fas fa-medal"></i> Sertifikasi Profesi</div>
            <h2 class="text-3xl md:text-4xl font-bold text-white">Sertifikasi Resmi</h2>
        </div>

        <div class="grid md:grid-cols-2 gap-6 max-w-3xl mx-auto">
            @foreach($certifications as $i => $cert)
            <div class="card p-6" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="flex gap-4 items-start">
                    <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-blue-500/20 to-indigo-500/20 border border-blue-500/20 flex items-center justify-center text-blue-400 flex-shrink-0">
                        @if($cert->badge_image)
                            <img src="{{ Storage::url($cert->badge_image) }}" alt="{{ $cert->name }}" class="w-full h-full rounded-xl object-cover">
                        @else
                            <i class="fas fa-certificate text-xl"></i>
                        @endif
                    </div>
                    <div>
                        <h3 class="text-white font-semibold text-sm leading-tight mb-1">{{ $cert->name }}</h3>
                        <p class="text-blue-400 text-xs mb-2">{{ $cert->issuer }}</p>
                        @if($cert->issue_date)
                        <p class="text-slate-500 text-xs">
                            <i class="fas fa-calendar mr-1"></i>
                            {{ $cert->issue_date->format('Y') }}
                            {{ $cert->no_expiry ? '· Tidak Kedaluwarsa' : '' }}
                        </p>
                        @endif
                        @if($cert->level)
                        <span class="mt-2 inline-block text-xs px-2 py-0.5 rounded-full bg-blue-500/10 text-blue-400 border border-blue-500/20">
                            {{ $cert->level }}
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10" data-aos="fade-up">
            <a href="{{ route('certifications') }}" class="btn-outline">
                <i class="fas fa-medal"></i> Lihat Semua Sertifikasi
            </a>
        </div>
    </div>
</section>
@endif

<!-- =================== CONTACT CTA =================== -->
<section class="py-24 border-t border-white/5" id="contact-cta">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="section-badge justify-center"><i class="fas fa-handshake"></i> Mari Berkolaborasi</div>
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
            Ada proyek menarik? <span class="gradient-text">Hubungi saya!</span>
        </h2>
        <p class="text-slate-400 text-lg mb-10 max-w-2xl mx-auto leading-relaxed">
            Saya terbuka untuk peluang kerja, freelance project, atau sekadar diskusi tentang teknologi. Let's build something amazing together!
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('contact') }}" class="btn-primary text-base py-3 px-8">
                <i class="fas fa-envelope"></i> Kirim Pesan
            </a>
            <a href="mailto:arsyapradana546@gmail.com" class="btn-outline text-base py-3 px-8">
                <i class="fas fa-at"></i> arsyapradana546@gmail.com
            </a>
        </div>

        <div class="mt-10 flex justify-center gap-4">
            <a href="https://github.com/NaufalArsyaputraPradana" target="_blank" rel="noopener"
               class="flex items-center gap-2 text-slate-400 hover:text-white transition-colors text-sm">
                <i class="fab fa-github"></i> NaufalArsyaputraPradana
            </a>
            <span class="text-slate-600">·</span>
            <a href="https://www.linkedin.com/in/naufalarsyaputrapradana" target="_blank" rel="noopener"
               class="flex items-center gap-2 text-slate-400 hover:text-blue-400 transition-colors text-sm">
                <i class="fab fa-linkedin"></i> naufalarsyaputrapradana
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
// ===== PARTICLES =====
const canvas = document.getElementById('particles-canvas');
if (canvas) {
    const ctx = canvas.getContext('2d');
    let particles = [];
    
    function resize() {
        canvas.width = canvas.offsetWidth;
        canvas.height = canvas.offsetHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    class Particle {
        constructor() {
            this.reset();
        }
        reset() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 1.5 + 0.3;
            this.speedX = (Math.random() - 0.5) * 0.3;
            this.speedY = (Math.random() - 0.5) * 0.3;
            this.opacity = Math.random() * 0.4 + 0.1;
        }
        update() {
            this.x += this.speedX;
            this.y += this.speedY;
            if (this.x < 0 || this.x > canvas.width || this.y < 0 || this.y > canvas.height) {
                this.reset();
            }
        }
        draw() {
            ctx.save();
            ctx.globalAlpha = this.opacity;
            ctx.fillStyle = '#2563eb';
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
            ctx.restore();
        }
    }

    for (let i = 0; i < 60; i++) {
        particles.push(new Particle());
    }

    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach(p => { p.update(); p.draw(); });
        
        // Draw connections
        particles.forEach((p1, i) => {
            particles.slice(i + 1).forEach(p2 => {
                const dist = Math.hypot(p1.x - p2.x, p1.y - p2.y);
                if (dist < 100) {
                    ctx.save();
                    ctx.globalAlpha = (1 - dist / 100) * 0.1;
                    ctx.strokeStyle = '#2563eb';
                    ctx.lineWidth = 0.5;
                    ctx.beginPath();
                    ctx.moveTo(p1.x, p1.y);
                    ctx.lineTo(p2.x, p2.y);
                    ctx.stroke();
                    ctx.restore();
                }
            });
        });
        requestAnimationFrame(animate);
    }
    animate();
}

// ===== TYPING ANIMATION =====
const typingTexts = [
    'Full Stack Developer',
    'Laravel Developer',
    'React Developer',
    'Next.js Developer',
    'PHP Developer',
    'Web Enthusiast',
];
let typingIndex = 0;
let charIndex = 0;
let isDeleting = false;
const typingEl = document.getElementById('typing-text');

function typeEffect() {
    if (!typingEl) return;
    const current = typingTexts[typingIndex];
    if (isDeleting) {
        typingEl.textContent = current.substring(0, charIndex - 1);
        charIndex--;
        if (charIndex === 0) {
            isDeleting = false;
            typingIndex = (typingIndex + 1) % typingTexts.length;
            setTimeout(typeEffect, 400);
            return;
        }
    } else {
        typingEl.textContent = current.substring(0, charIndex + 1);
        charIndex++;
        if (charIndex === current.length) {
            isDeleting = true;
            setTimeout(typeEffect, 1800);
            return;
        }
    }
    setTimeout(typeEffect, isDeleting ? 60 : 100);
}
typeEffect();

// ===== COUNTER ANIMATION =====
function animateCounter(el, target, duration = 1500) {
    let start = 0;
    const increment = target / (duration / 16);
    const timer = setInterval(() => {
        start += increment;
        if (start >= target) {
            el.textContent = target;
            clearInterval(timer);
        } else {
            el.textContent = Math.floor(start);
        }
    }, 16);
}

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const el = entry.target;
            const count = parseInt(el.getAttribute('data-count'));
            if (!isNaN(count)) animateCounter(el, count);
            observer.unobserve(el);
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('[data-count]').forEach(el => observer.observe(el));

// ===== SKILL BAR ANIMATION =====
const skillObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const fills = entry.target.querySelectorAll('.skill-bar-fill');
            fills.forEach((fill, i) => {
                setTimeout(() => fill.classList.add('animated'), i * 100);
            });
            skillObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.3 });

const aboutSection = document.getElementById('about');
if (aboutSection) skillObserver.observe(aboutSection);
</script>
@endpush
