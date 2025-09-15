@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    @if($hero)
    <section class="hero-bg min-h-screen flex items-center relative overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-20 h-20 bg-primary rounded-full animate-pulse floating"></div>
            <div class="absolute top-32 right-20 w-16 h-16 bg-white rounded-full animate-bounce floating" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-20 left-1/4 w-12 h-12 bg-primary rounded-full animate-ping floating" style="animation-delay: 2s;"></div>
            <div class="absolute bottom-32 right-1/3 w-24 h-24 bg-white rounded-full animate-pulse floating" style="animation-delay: 0.5s;"></div>
            <div class="absolute top-1/2 left-1/2 w-32 h-32 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full opacity-20 floating" style="animation-delay: 1.5s;"></div>
        </div>
        
        <!-- Gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/20 via-purple-900/20 to-pink-900/20"></div>
        
        <div class="container mx-auto px-6 py-24 relative z-10">
            <div class="text-center">
                <div class="mb-8">
                    <span class="inline-block px-6 py-3 bg-white bg-opacity-20 rounded-full text-white text-sm font-medium mb-4 backdrop-blur-md glass wave">
                        👋 Selamat Datang di Portfolio Saya
                    </span>
                </div>
                <h1 class="text-4xl md:text-7xl font-bold text-white mb-6 leading-tight">
                    {{ $hero->title }}
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-12 max-w-3xl mx-auto leading-relaxed">
                    {{ $hero->subtitle }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="{{ $hero->button_link }}" class="bg-primary hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl btn-glow">
                        {{ $hero->button_text }}
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="{{ route('projects') }}" class="border-2 border-white text-white hover:bg-white hover:text-primary font-bold py-4 px-8 rounded-full transition-all duration-300 transform hover:scale-105 glass">
                        Lihat Portfolio
                        <i class="fas fa-eye ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <div class="w-6 h-10 border-2 border-white rounded-full flex justify-center pulse-notification">
                <div class="w-1 h-3 bg-white rounded-full mt-2 floating"></div>
            </div>
        </div>
    </section>
    @endif

    <!-- About Preview Section -->
    @if($about)
    <section class="py-20 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="relative" data-aos="fade-right">
                    @if($about->photo)
                        <img src="{{ Storage::url($about->photo) }}" alt="{{ $about->name }}" class="rounded-2xl shadow-2xl w-full object-cover h-96">
                    @else
                        <div class="w-full h-96 bg-gradient-to-br from-primary to-blue-600 rounded-2xl shadow-2xl flex items-center justify-center">
                            <i class="fas fa-user text-white text-6xl"></i>
                        </div>
                    @endif
                    <!-- Decorative elements -->
                    <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-primary rounded-2xl -z-10 opacity-20"></div>
                    <div class="absolute -top-6 -left-6 w-32 h-32 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full -z-10 opacity-30"></div>
                </div>
                <div data-aos="fade-left">
                    <div class="mb-6">
                        <span class="inline-block px-4 py-2 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-medium mb-4">
                            Tentang Saya
                        </span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-dark dark:text-white mb-6">
                        {{ $about->name }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-8 text-lg leading-relaxed">
                        {{ Str::limit($about->description, 300) }}
                    </p>
                    
                    <!-- Stats -->
                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div class="text-center p-4 bg-white dark:bg-gray-800 rounded-xl shadow-md">
                            <div class="text-2xl font-bold text-primary mb-1">{{ $about->age }}</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">Tahun</div>
                        </div>
                        <div class="text-center p-4 bg-white dark:bg-gray-800 rounded-xl shadow-md">
                            <div class="text-2xl font-bold text-primary mb-1">{{ $projects->count() }}+</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">Proyek</div>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('about') }}" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 font-medium">
                            Selengkapnya
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        @if($about->cv_file)
                            <a href="{{ Storage::url($about->cv_file) }}" target="_blank" class="border-2 border-primary text-primary px-6 py-3 rounded-lg hover:bg-primary hover:text-white transition duration-300 font-medium">
                                <i class="fas fa-download mr-2"></i>
                                Download CV
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Featured Projects -->
    @if($projects->count() > 0)
    <section class="py-20 bg-white dark:bg-dark">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-block px-4 py-2 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-medium mb-4">
                    Portfolio
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-dark dark:text-white mb-4">Proyek Unggulan</h2>
                <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Berikut adalah beberapa proyek terbaik yang telah saya kerjakan dengan teknologi modern dan solusi inovatif.
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $index => $project)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        @if($project->image)
                            <div class="relative overflow-hidden">
                                <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
                                <div class="absolute inset-0 bg-primary bg-opacity-0 group-hover:bg-opacity-80 transition-all duration-300 flex items-center justify-center">
                                    <a href="{{ route('projects.show', $project) }}" class="opacity-0 group-hover:opacity-100 bg-white text-primary px-4 py-2 rounded-lg font-medium transition-opacity duration-300">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br from-primary to-blue-600 flex items-center justify-center">
                                <i class="fas fa-code text-white text-3xl"></i>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-dark dark:text-white mb-3 group-hover:text-primary transition-colors duration-300">
                                {{ $project->title }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">
                                {{ Str::limit($project->description, 100) }}
                            </p>
                            
                            @if($project->technologies && count($project->technologies) > 0)
                                <div class="flex flex-wrap gap-2 mb-4">
                                    @foreach(array_slice($project->technologies, 0, 3) as $tech)
                                        <span class="px-3 py-1 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-medium">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                    @if(count($project->technologies) > 3)
                                        <span class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-full text-sm">
                                            +{{ count($project->technologies) - 3 }}
                                        </span>
                                    @endif
                                </div>
                            @endif
                            
                            <div class="flex items-center justify-between">
                                <a href="{{ route('projects.show', $project) }}" class="text-primary hover:text-blue-700 font-medium flex items-center">
                                    Lihat Detail 
                                    <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform duration-300"></i>
                                </a>
                                @if($project->url)
                                    <a href="{{ $project->url }}" target="_blank" class="text-gray-500 hover:text-primary transition-colors duration-300">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('projects') }}" class="inline-flex items-center bg-primary text-white px-8 py-4 rounded-full hover:bg-blue-700 transition-all duration-300 transform hover:scale-105 font-medium shadow-lg">
                    Lihat Semua Proyek
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Skills Preview -->
    @if($skills->count() > 0)
    <section class="py-20 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-block px-4 py-2 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-medium mb-4">
                    Keahlian
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-dark dark:text-white mb-4">Teknologi & Kemampuan</h2>
                <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Berbagai teknologi dan tools yang saya kuasai untuk menciptakan solusi digital yang berkualitas.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $categories = $skills->groupBy('category');
                    $categoryIcons = [
                        'frontend' => 'fas fa-code',
                        'backend' => 'fas fa-server', 
                        'design' => 'fas fa-paint-brush'
                    ];
                    $categoryTitles = [
                        'frontend' => 'Frontend Development',
                        'backend' => 'Backend Development',
                        'design' => 'UI/UX Design'
                    ];
                @endphp
                
                @foreach($categories as $category => $categorySkills)
                    <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="text-primary text-4xl mb-6 text-center">
                            <i class="{{ $categoryIcons[$category] ?? 'fas fa-tools' }}"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-dark dark:text-white mb-6 text-center">
                            {{ $categoryTitles[$category] ?? ucfirst($category) }}
                        </h3>
                        <div class="space-y-4">
                            @foreach($categorySkills->take(4) as $skill)
                                <div>
                                    <div class="flex justify-between mb-2">
                                        <span class="text-gray-600 dark:text-gray-300 font-medium">{{ $skill->name }}</span>
                                        <span class="text-gray-600 dark:text-gray-300">{{ $skill->percentage }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                        <div class="bg-gradient-to-r from-primary to-blue-500 h-2 rounded-full transition-all duration-1000 ease-out" style="width: {{ $skill->percentage }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('skills') }}" class="inline-flex items-center border-2 border-primary text-primary px-8 py-4 rounded-full hover:bg-primary hover:text-white transition-all duration-300 transform hover:scale-105 font-medium">
                    Lihat Semua Keahlian
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Contact Preview -->
    @if($contact)
    <section class="py-20 bg-white dark:bg-dark">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <span class="inline-block px-4 py-2 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-medium mb-4">
                    Mari Berkolaborasi
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-dark dark:text-white mb-6">
                    {{ $contact->title ?? 'Hubungi Saya' }}
                </h2>
                <div class="w-24 h-1 bg-primary mx-auto mb-8"></div>
                <p class="text-xl text-gray-600 dark:text-gray-300 mb-12 leading-relaxed">
                    {{ $contact->description ?? 'Mari berdiskusi tentang proyek atau kolaborasi yang menarik.' }}
                </p>
                
                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <div class="flex flex-col items-center p-6 bg-gray-50 dark:bg-gray-800 rounded-xl">
                        <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-envelope text-primary text-xl"></i>
                        </div>
                        <h3 class="font-semibold text-dark dark:text-white mb-2">Email</h3>
                        <p class="text-gray-600 dark:text-gray-300">{{ $contact->email ?? 'contact@example.com' }}</p>
                    </div>
                    
                    <div class="flex flex-col items-center p-6 bg-gray-50 dark:bg-gray-800 rounded-xl">
                        <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-phone text-primary text-xl"></i>
                        </div>
                        <h3 class="font-semibold text-dark dark:text-white mb-2">Telepon</h3>
                        <p class="text-gray-600 dark:text-gray-300">{{ $contact->phone ?? '+62 000 0000 0000' }}</p>
                    </div>
                    
                    <div class="flex flex-col items-center p-6 bg-gray-50 dark:bg-gray-800 rounded-xl">
                        <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-map-marker-alt text-primary text-xl"></i>
                        </div>
                        <h3 class="font-semibold text-dark dark:text-white mb-2">Lokasi</h3>
                        <p class="text-gray-600 dark:text-gray-300">{{ $contact->address ?? 'Indonesia' }}</p>
                    </div>
                </div>
                
                <div class="flex justify-center space-x-6 mb-8">
                    @if($contact->github_url)
                        <a href="{{ $contact->github_url }}" target="_blank" class="w-12 h-12 bg-gray-200 dark:bg-gray-700 hover:bg-primary dark:hover:bg-primary text-gray-600 dark:text-gray-300 hover:text-white rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110">
                            <i class="fab fa-github text-xl"></i>
                        </a>
                    @endif
                    @if($contact->linkedin_url)
                        <a href="{{ $contact->linkedin_url }}" target="_blank" class="w-12 h-12 bg-gray-200 dark:bg-gray-700 hover:bg-primary dark:hover:bg-primary text-gray-600 dark:text-gray-300 hover:text-white rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                    @endif
                    @if($contact->twitter_url)
                        <a href="{{ $contact->twitter_url }}" target="_blank" class="w-12 h-12 bg-gray-200 dark:bg-gray-700 hover:bg-primary dark:hover:bg-primary text-gray-600 dark:text-gray-300 hover:text-white rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                    @endif
                    @if($contact->instagram_url)
                        <a href="{{ $contact->instagram_url }}" target="_blank" class="w-12 h-12 bg-gray-200 dark:bg-gray-700 hover:bg-primary dark:hover:bg-primary text-gray-600 dark:text-gray-300 hover:text-white rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                    @endif
                </div>
                
                <a href="{{ route('contact') }}" class="inline-flex items-center bg-primary text-white px-8 py-4 rounded-full hover:bg-blue-700 transition-all duration-300 transform hover:scale-105 font-medium shadow-lg">
                    Hubungi Saya
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Testimonials Section -->
    <section class="py-20 bg-gradient-to-br from-purple-50 via-blue-50 to-indigo-50 dark:from-gray-800 dark:via-gray-900 dark:to-gray-800">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-block px-4 py-2 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-medium mb-4">
                    Testimoni
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-dark dark:text-white mb-6">Apa Kata Mereka</h2>
                <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Feedback dari klien dan kolega yang pernah bekerja sama dengan saya.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Testimonial 1 -->
                <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="0">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                            J
                        </div>
                        <div>
                            <h4 class="font-semibold text-dark dark:text-white">John Doe</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">CEO, TechCorp</p>
                        </div>
                    </div>
                    <div class="text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 italic">
                        "Kualitas kerja yang luar biasa! Website yang dibuat sangat responsif dan sesuai dengan kebutuhan bisnis kami."
                    </p>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                            S
                        </div>
                        <div>
                            <h4 class="font-semibold text-dark dark:text-white">Sarah Johnson</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Product Manager</p>
                        </div>
                    </div>
                    <div class="text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 italic">
                        "Profesional, tepat waktu, dan hasil yang melampaui ekspektasi. Sangat recommended untuk proyek development!"
                    </p>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-pink-400 to-red-500 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                            M
                        </div>
                        <div>
                            <h4 class="font-semibold text-dark dark:text-white">Mike Chen</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Startup Founder</p>
                        </div>
                    </div>
                    <div class="text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 italic">
                        "Komunikasi yang baik dan pemahaman mendalam terhadap kebutuhan proyek. Hasil akhir sangat memuaskan!"
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20 bg-white dark:bg-dark">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-block px-4 py-2 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-medium mb-4">
                    Layanan
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-dark dark:text-white mb-6">Apa Yang Saya Tawarkan</h2>
                <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Berbagai layanan pengembangan web dan solusi digital yang dapat membantu bisnis Anda berkembang.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="group p-8 bg-gray-50 dark:bg-gray-800 rounded-2xl hover:bg-primary hover:text-white transition-all duration-300 transform hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-16 h-16 bg-primary group-hover:bg-white rounded-xl flex items-center justify-center mb-6 transition-all duration-300">
                        <i class="fas fa-code text-white group-hover:text-primary text-2xl transition-all duration-300"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-dark dark:text-white group-hover:text-white mb-4 transition-all duration-300">
                        Web Development
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 group-hover:text-blue-100 transition-all duration-300">
                        Pembuatan website responsif dan modern dengan teknologi terkini seperti Laravel, React, dan Vue.js.
                    </p>
                </div>

                <!-- Service 2 -->
                <div class="group p-8 bg-gray-50 dark:bg-gray-800 rounded-2xl hover:bg-primary hover:text-white transition-all duration-300 transform hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-primary group-hover:bg-white rounded-xl flex items-center justify-center mb-6 transition-all duration-300">
                        <i class="fas fa-mobile-alt text-white group-hover:text-primary text-2xl transition-all duration-300"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-dark dark:text-white group-hover:text-white mb-4 transition-all duration-300">
                        Mobile Responsive
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 group-hover:text-blue-100 transition-all duration-300">
                        Desain dan development yang optimal untuk semua device, dari smartphone hingga desktop.
                    </p>
                </div>

                <!-- Service 3 -->
                <div class="group p-8 bg-gray-50 dark:bg-gray-800 rounded-2xl hover:bg-primary hover:text-white transition-all duration-300 transform hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-primary group-hover:bg-white rounded-xl flex items-center justify-center mb-6 transition-all duration-300">
                        <i class="fas fa-paint-brush text-white group-hover:text-primary text-2xl transition-all duration-300"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-dark dark:text-white group-hover:text-white mb-4 transition-all duration-300">
                        UI/UX Design
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 group-hover:text-blue-100 transition-all duration-300">
                        Desain antarmuka yang menarik dan user experience yang optimal untuk meningkatkan konversi.
                    </p>
                </div>

                <!-- Service 4 -->
                <div class="group p-8 bg-gray-50 dark:bg-gray-800 rounded-2xl hover:bg-primary hover:text-white transition-all duration-300 transform hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-primary group-hover:bg-white rounded-xl flex items-center justify-center mb-6 transition-all duration-300">
                        <i class="fas fa-server text-white group-hover:text-primary text-2xl transition-all duration-300"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-dark dark:text-white group-hover:text-white mb-4 transition-all duration-300">
                        Backend Development
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 group-hover:text-blue-100 transition-all duration-300">
                        Pembangunan sistem backend yang robust dengan API yang secure dan performa tinggi.
                    </p>
                </div>

                <!-- Service 5 -->
                <div class="group p-8 bg-gray-50 dark:bg-gray-800 rounded-2xl hover:bg-primary hover:text-white transition-all duration-300 transform hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-16 h-16 bg-primary group-hover:bg-white rounded-xl flex items-center justify-center mb-6 transition-all duration-300">
                        <i class="fas fa-shopping-cart text-white group-hover:text-primary text-2xl transition-all duration-300"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-dark dark:text-white group-hover:text-white mb-4 transition-all duration-300">
                        E-Commerce
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 group-hover:text-blue-100 transition-all duration-300">
                        Solusi e-commerce lengkap dengan payment gateway, inventory management, dan dashboard admin.
                    </p>
                </div>

                <!-- Service 6 -->
                <div class="group p-8 bg-gray-50 dark:bg-gray-800 rounded-2xl hover:bg-primary hover:text-white transition-all duration-300 transform hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="500">
                    <div class="w-16 h-16 bg-primary group-hover:bg-white rounded-xl flex items-center justify-center mb-6 transition-all duration-300">
                        <i class="fas fa-tools text-white group-hover:text-primary text-2xl transition-all duration-300"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-dark dark:text-white group-hover:text-white mb-4 transition-all duration-300">
                        Maintenance & Support
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 group-hover:text-blue-100 transition-all duration-300">
                        Layanan maintenance berkala dan support teknis untuk menjaga website tetap optimal.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
