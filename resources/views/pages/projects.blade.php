@extends('layouts.app')
@section('title', 'Portfolio & Proyek')

@section('content')
<div class="min-h-screen pt-8 pb-24">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <!-- Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="section-badge justify-center"><i class="fas fa-code"></i> Portfolio</div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mt-4 mb-4">Karya & <span class="gradient-text">Proyek</span></h1>
            <p class="text-slate-400 max-w-2xl mx-auto text-lg">
                Kumpulan hasil karya, proyek open source, dan aplikasi yang telah saya kembangkan.
            </p>
        </div>

        @if($projects->count() > 0)
        <!-- Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            @foreach($projects as $i => $project)
            <div class="card group overflow-hidden flex flex-col h-full" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 100 }}">
                <div class="relative h-56 overflow-hidden">
                    @if($project->thumbnail)
                    <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 group-hover:rotate-1">
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-blue-900/50 to-indigo-900/50 flex items-center justify-center">
                        <i class="fas fa-code text-4xl text-blue-500/30"></i>
                    </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-[#111118] via-transparent to-transparent opacity-80"></div>
                    
                    <div class="absolute top-4 left-4 flex gap-2">
                        @if($project->featured)
                        <span class="px-3 py-1 rounded-full bg-yellow-500/20 backdrop-blur-md border border-yellow-500/30 text-yellow-400 text-xs font-semibold flex items-center gap-1 shadow-lg">
                            <i class="fas fa-star"></i> Featured
                        </span>
                        @endif
                        <span class="px-3 py-1 rounded-full bg-blue-500/20 backdrop-blur-md border border-blue-500/30 text-blue-300 text-xs font-semibold shadow-lg">
                            {{ $project->category }}
                        </span>
                    </div>
                </div>
                
                <div class="p-6 flex flex-col flex-1">
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-blue-400 transition-colors line-clamp-1">
                        <a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a>
                    </h3>
                    <p class="text-slate-400 text-sm mb-6 line-clamp-3 flex-1">{{ $project->description }}</p>
                    
                    @if($project->technologies)
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach(array_slice($project->technologies, 0, 4) as $tech)
                        <span class="text-xs px-2.5 py-1 rounded-md bg-white/5 border border-white/10 text-slate-300 group-hover:border-blue-500/30 group-hover:text-blue-300 transition-colors">{{ $tech }}</span>
                        @endforeach
                        @if(count($project->technologies) > 4)
                        <span class="text-xs px-2.5 py-1 rounded-md bg-white/5 border border-white/10 text-slate-400">+{{ count($project->technologies) - 4 }}</span>
                        @endif
                    </div>
                    @endif
                    
                    <div class="flex items-center justify-between mt-auto pt-4 border-t border-white/5">
                        <div class="flex gap-3">
                            @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank" class="text-slate-400 hover:text-white transition-colors" title="Source Code">
                                <i class="fab fa-github text-lg"></i>
                            </a>
                            @endif
                            @if($project->demo_url)
                            <a href="{{ $project->demo_url }}" target="_blank" class="text-slate-400 hover:text-blue-400 transition-colors" title="Live Demo">
                                <i class="fas fa-external-link-alt text-lg"></i>
                            </a>
                            @endif
                        </div>
                        <a href="{{ route('projects.show', $project->slug) }}" class="text-sm font-medium text-blue-400 hover:text-blue-300 flex items-center gap-1 group/link">
                            Detail <i class="fas fa-arrow-right text-xs transform group-hover/link:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="flex justify-center" data-aos="fade-up">
            {{ $projects->links() }}
        </div>
        @else
        <div class="text-center py-24">
            <i class="fas fa-folder-open text-6xl text-slate-600 mb-6 block"></i>
            <h3 class="text-xl font-medium text-slate-300">Belum ada proyek</h3>
            <p class="text-slate-500 mt-2">Karya-karya terbaik akan segera ditampilkan di sini.</p>
        </div>
        @endif
    </div>
</div>
@endsection
