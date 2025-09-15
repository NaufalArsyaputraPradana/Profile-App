@extends('layouts.app')

@section('title', 'Proyek')

@section('content')
    <div class="pt-24">
        <!-- Projects Header -->
        <section class="py-20 bg-gradient-to-br from-primary to-blue-600">
            <div class="container mx-auto px-6">
                <div class="text-center text-white" data-aos="fade-up">
                    <span class="inline-block px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-medium mb-4 backdrop-blur-md">
                        Portfolio
                    </span>
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">Proyek Saya</h1>
                    <div class="w-24 h-1 bg-white mx-auto mb-6"></div>
                    <p class="text-xl text-blue-100 max-w-3xl mx-auto leading-relaxed">
                        Kumpulan proyek-proyek yang telah saya kerjakan dengan berbagai teknologi modern. 
                        Setiap proyek memiliki tantangan unik dan solusi kreatif yang saya terapkan.
                    </p>
                </div>
            </div>
        </section>

        <!-- Filter Section -->
        <section class="py-10 bg-white dark:bg-dark border-b border-gray-200 dark:border-gray-700">
            <div class="container mx-auto px-6">
                <div class="flex flex-wrap justify-center gap-4" data-aos="fade-up">
                    <button class="filter-btn active px-6 py-2 rounded-full border-2 border-primary text-primary bg-primary bg-opacity-10 hover:bg-primary hover:text-white transition-all duration-300" data-filter="all">
                        Semua Proyek
                    </button>
                    <button class="filter-btn px-6 py-2 rounded-full border-2 border-gray-300 text-gray-600 hover:border-primary hover:text-primary transition-all duration-300" data-filter="laravel">
                        Laravel
                    </button>
                    <button class="filter-btn px-6 py-2 rounded-full border-2 border-gray-300 text-gray-600 hover:border-primary hover:text-primary transition-all duration-300" data-filter="vue">
                        Vue.js
                    </button>
                    <button class="filter-btn px-6 py-2 rounded-full border-2 border-gray-300 text-gray-600 hover:border-primary hover:text-primary transition-all duration-300" data-filter="react">
                        React
                    </button>
                    <button class="filter-btn px-6 py-2 rounded-full border-2 border-gray-300 text-gray-600 hover:border-primary hover:text-primary transition-all duration-300" data-filter="design">
                        UI/UX Design
                    </button>
                </div>
            </div>
        </section>

        <!-- Projects Grid -->
        <section class="py-20 bg-gray-50 dark:bg-gray-900">
            <div class="container mx-auto px-6">
                @if($projects->count() > 0)
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="projects-grid">
                        @foreach($projects as $index => $project)
                            <div class="project-item bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group" 
                                 data-aos="fade-up" 
                                 data-aos-delay="{{ $index * 100 }}"
                                 data-category="{{ collect($project->technologies)->map(function($tech) { return strtolower($tech); })->implode(' ') }}">
                                
                                @if($project->image)
                                    <div class="relative overflow-hidden">
                                        <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <div class="flex space-x-3">
                                                <a href="{{ route('projects.show', $project) }}" class="bg-white text-primary px-4 py-2 rounded-lg font-medium hover:bg-primary hover:text-white transition-colors duration-300">
                                                    <i class="fas fa-eye mr-2"></i>Detail
                                                </a>
                                                @if($project->url)
                                                    <a href="{{ $project->url }}" target="_blank" class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-700 transition-colors duration-300">
                                                        <i class="fas fa-external-link-alt mr-2"></i>Live
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="h-64 bg-gradient-to-br from-primary to-blue-600 flex items-center justify-center relative overflow-hidden">
                                        <i class="fas fa-code text-white text-4xl"></i>
                                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    </div>
                                @endif
                                
                                <div class="p-6">
                                    <div class="flex items-start justify-between mb-3">
                                        <h3 class="text-xl font-bold text-dark dark:text-white group-hover:text-primary transition-colors duration-300 line-clamp-2">
                                            {{ $project->title }}
                                        </h3>
                                        <span class="text-xs text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded-full ml-2">
                                            {{ $project->created_at->format('Y') }}
                                        </span>
                                    </div>
                                    
                                    <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed line-clamp-3">
                                        {{ Str::limit($project->description, 120) }}
                                    </p>
                                    
                                    @if($project->technologies && count($project->technologies) > 0)
                                        <div class="flex flex-wrap gap-2 mb-4">
                                            @foreach(array_slice($project->technologies, 0, 4) as $tech)
                                                <span class="px-3 py-1 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-medium">
                                                    {{ $tech }}
                                                </span>
                                            @endforeach
                                            @if(count($project->technologies) > 4)
                                                <span class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-full text-sm">
                                                    +{{ count($project->technologies) - 4 }}
                                                </span>
                                            @endif
                                        </div>
                                    @endif
                                    
                                    <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-700">
                                        <a href="{{ route('projects.show', $project) }}" class="text-primary hover:text-blue-700 font-medium flex items-center group/link">
                                            Lihat Detail 
                                            <i class="fas fa-arrow-right ml-2 transform group-hover/link:translate-x-1 transition-transform duration-300"></i>
                                        </a>
                                        
                                        <div class="flex space-x-2">
                                            @if($project->url)
                                                <a href="{{ $project->url }}" target="_blank" class="w-8 h-8 bg-gray-100 dark:bg-gray-700 hover:bg-primary dark:hover:bg-primary text-gray-600 dark:text-gray-300 hover:text-white rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110">
                                                    <i class="fas fa-external-link-alt text-xs"></i>
                                                </a>
                                            @endif
                                            <button class="w-8 h-8 bg-gray-100 dark:bg-gray-700 hover:bg-primary dark:hover:bg-primary text-gray-600 dark:text-gray-300 hover:text-white rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110" onclick="shareProject('{{ $project->title }}', '{{ route('projects.show', $project) }}')">
                                                <i class="fas fa-share-alt text-xs"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-16 flex justify-center" data-aos="fade-up">
                        {{ $projects->links() }}
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-20" data-aos="fade-up">
                        <div class="w-24 h-24 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-folder-open text-gray-400 text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-dark dark:text-white mb-4">Belum Ada Proyek</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-8 max-w-md mx-auto">
                            Proyek-proyek menarik sedang dalam tahap pengembangan. Silakan kunjungi kembali nanti!
                        </p>
                        <a href="{{ route('contact') }}" class="inline-flex items-center bg-primary text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 font-medium">
                            <i class="fas fa-envelope mr-2"></i>
                            Hubungi Saya
                        </a>
                    </div>
                @endif
            </div>
        </section>

        <!-- Call to Action -->
        <section class="py-20 bg-white dark:bg-dark">
            <div class="container mx-auto px-6">
                <div class="text-center" data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold text-dark dark:text-white mb-6">Ada Proyek yang Menarik?</h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-2xl mx-auto">
                        Saya selalu terbuka untuk kolaborasi dalam proyek-proyek yang menantang dan inovatif. 
                        Mari diskusikan ide Anda!
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('contact') }}" class="bg-primary text-white px-8 py-4 rounded-full hover:bg-blue-700 transition-all duration-300 transform hover:scale-105 font-medium inline-flex items-center justify-center">
                            <i class="fas fa-envelope mr-2"></i>
                            Mulai Diskusi
                        </a>
                        <a href="{{ route('about') }}" class="border-2 border-primary text-primary px-8 py-4 rounded-full hover:bg-primary hover:text-white transition-all duration-300 transform hover:scale-105 font-medium inline-flex items-center justify-center">
                            <i class="fas fa-user mr-2"></i>
                            Tentang Saya
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
    <script>
        // Project filtering
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const projectItems = document.querySelectorAll('.project-item');
            
            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const filter = this.dataset.filter;
                    
                    // Update active button
                    filterBtns.forEach(b => {
                        b.classList.remove('active', 'bg-primary', 'bg-opacity-10', 'text-white');
                        b.classList.add('border-gray-300', 'text-gray-600');
                    });
                    this.classList.add('active', 'bg-primary', 'bg-opacity-10');
                    this.classList.remove('border-gray-300', 'text-gray-600');
                    if (filter !== 'all') {
                        this.classList.add('text-white');
                    }
                    
                    // Filter projects
                    projectItems.forEach(item => {
                        const category = item.dataset.category;
                        if (filter === 'all' || category.includes(filter)) {
                            item.style.display = 'block';
                            item.classList.add('animate-fadeIn');
                        } else {
                            item.style.display = 'none';
                            item.classList.remove('animate-fadeIn');
                        }
                    });
                });
            });
        });
        
        // Share project function
        function shareProject(title, url) {
            if (navigator.share) {
                navigator.share({
                    title: title,
                    url: url
                });
            } else {
                // Fallback: copy to clipboard
                navigator.clipboard.writeText(url).then(() => {
                    alert('Link proyek telah disalin ke clipboard!');
                });
            }
        }
    </script>
    @endpush

    @push('styles')
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    @endpush
@endsection
