@extends('layouts.app')
@section('title', $project->title . ' - Portfolio')

@section('content')
<!-- Hero Section -->
<div class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 z-0">
        @if($project->thumbnail)
        <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-full object-cover opacity-20 filter blur-sm">
        @else
        <div class="w-full h-full bg-gradient-to-br from-blue-900/20 to-indigo-900/20"></div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0f] via-[#0a0a0f]/80 to-transparent"></div>
    </div>
    
    <div class="max-w-4xl mx-auto px-6 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-sm font-medium mb-6" data-aos="fade-down">
            <i class="fas fa-folder"></i> {{ $project->category }}
        </div>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight" data-aos="fade-up">
            {{ $project->title }}
        </h1>
        <div class="flex flex-wrap items-center justify-center gap-4 sm:gap-8 text-slate-400 text-sm" data-aos="fade-up" data-aos-delay="100">
            @if($project->year)
            <div class="flex items-center gap-2">
                <i class="fas fa-calendar text-blue-500"></i>
                {{ $project->year }}
            </div>
            @endif
            @if($project->role)
            <div class="flex items-center gap-2">
                <i class="fas fa-user-tie text-blue-500"></i>
                {{ $project->role }}
            </div>
            @endif
            <div class="flex items-center gap-2">
                <i class="fas fa-circle text-[8px] {{ $project->status === 'active' ? 'text-green-500' : 'text-yellow-500' }}"></i>
                {{ ucfirst($project->status) }}
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-6 py-12">
    <div class="grid lg:grid-cols-3 gap-12">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-12">
            <!-- Thumbnail -->
            @if($project->thumbnail)
            <div class="rounded-2xl overflow-hidden border border-white/10 shadow-2xl" data-aos="fade-up">
                <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->title }}" class="w-full">
            </div>
            @endif

            <!-- Description -->
            <div data-aos="fade-up">
                <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                    <i class="fas fa-align-left text-blue-500"></i> Deskripsi Proyek
                </h2>
                <div class="prose prose-invert prose-p:text-slate-400 prose-p:leading-relaxed prose-a:text-blue-400 max-w-none text-justify">
                    {!! nl2br(e($project->description)) !!}
                </div>
            </div>

            <!-- Features -->
            @if($project->features && count($project->features) > 0)
            <div data-aos="fade-up">
                <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                    <i class="fas fa-list-check text-blue-500"></i> Fitur Utama
                </h2>
                <div class="grid sm:grid-cols-2 gap-4">
                    @foreach($project->features as $feature)
                    <div class="card p-4 flex items-start gap-3 bg-white/5 hover:bg-white/10 transition-colors">
                        <i class="fas fa-check-circle text-green-500 mt-1"></i>
                        <span class="text-slate-300">{{ $feature }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-8">
            <!-- Action Buttons -->
            <div class="card p-6 flex flex-col gap-3" data-aos="fade-left">
                @if($project->demo_url)
                <a href="{{ $project->demo_url }}" target="_blank" rel="noopener" class="btn-primary justify-center w-full py-3">
                    <i class="fas fa-external-link-alt"></i> Kunjungi Live Demo
                </a>
                @endif
                @if($project->github_url)
                <a href="{{ $project->github_url }}" target="_blank" rel="noopener" class="btn-outline justify-center w-full py-3">
                    <i class="fab fa-github"></i> Lihat Source Code
                </a>
                @endif
                @if(!$project->demo_url && !$project->github_url)
                <div class="text-center text-slate-500 text-sm py-2">
                    <i class="fas fa-lock mb-2 text-xl block"></i>
                    Private Project / Internal System
                </div>
                @endif
            </div>

            <!-- Tech Stack -->
            @if($project->technologies && count($project->technologies) > 0)
            <div class="card p-6" data-aos="fade-left" data-aos-delay="100">
                <h3 class="text-white font-bold mb-4 flex items-center gap-2">
                    <i class="fas fa-layer-group text-blue-500"></i> Teknologi Digunakan
                </h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($project->technologies as $tech)
                    <span class="px-3 py-1.5 rounded-lg bg-blue-500/10 border border-blue-500/20 text-blue-300 text-sm font-medium">
                        {{ $tech }}
                    </span>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Related Projects -->
    @if($relatedProjects->count() > 0)
    <div class="mt-32 border-t border-white/5 pt-16">
        <h2 class="text-3xl font-bold text-white mb-10 text-center">Proyek <span class="gradient-text">Lainnya</span></h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($relatedProjects as $relProject)
            <a href="{{ route('projects.show', $relProject->slug) }}" class="card group overflow-hidden block">
                <div class="h-48 overflow-hidden">
                    @if($relProject->thumbnail)
                    <img src="{{ Storage::url($relProject->thumbnail) }}" alt="{{ $relProject->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-blue-900/50 to-indigo-900/50 flex items-center justify-center">
                        <i class="fas fa-code text-3xl text-blue-500/30"></i>
                    </div>
                    @endif
                </div>
                <div class="p-5">
                    <div class="text-xs text-blue-400 mb-2">{{ $relProject->category }}</div>
                    <h3 class="text-lg font-bold text-white group-hover:text-blue-400 transition-colors line-clamp-1">{{ $relProject->title }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
