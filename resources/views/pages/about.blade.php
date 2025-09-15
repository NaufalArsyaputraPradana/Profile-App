@extends('layouts.app')

@section('title', 'Tentang Saya')

@section('content')
    <div class="pt-24">
        <!-- About Hero -->
        <section class="py-20 bg-gradient-to-br from-primary to-blue-600">
            <div class="container mx-auto px-6">
                <div class="text-center text-white" data-aos="fade-up">
                    <span class="inline-block px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-medium mb-4 backdrop-blur-md">
                        Tentang Saya
                    </span>
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">
                        @if($about)
                            {{ $about->name }}
                        @else
                            Tentang Saya
                        @endif
                    </h1>
                    <div class="w-24 h-1 bg-white mx-auto mb-6"></div>
                    <p class="text-xl text-blue-100 max-w-3xl mx-auto leading-relaxed">
                        Mari berkenalan lebih dekat dengan latar belakang, pengalaman, dan passion saya dalam dunia teknologi.
                    </p>
                </div>
            </div>
        </section>

        @if($about)
        <!-- About Content -->
        <section class="py-20 bg-white dark:bg-dark">
            <div class="container mx-auto px-6">
                <div class="grid md:grid-cols-2 gap-16 items-center">
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
                        
                        <!-- Floating stats -->
                        <div class="absolute top-4 left-4 bg-white dark:bg-gray-800 rounded-xl p-4 shadow-lg">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-primary">{{ $about->age }}</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">Tahun</div>
                            </div>
                        </div>
                        
                        <div class="absolute bottom-4 right-4 bg-white dark:bg-gray-800 rounded-xl p-4 shadow-lg">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-primary">{{ $skills->count() }}+</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">Skills</div>
                            </div>
                        </div>
                    </div>
                    
                    <div data-aos="fade-left">
                        <h2 class="text-3xl md:text-4xl font-bold text-dark dark:text-white mb-8">
                            Halo! Saya {{ $about->name }}
                        </h2>
                        
                        <div class="prose prose-lg dark:prose-invert max-w-none">
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                                {!! nl2br(e($about->description)) !!}
                            </p>
                        </div>
                        
                        <!-- Contact Info -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-primary bg-opacity-10 rounded-full flex items-center justify-center">
                                    <i class="fas fa-envelope text-primary"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Email</div>
                                    <div class="font-medium text-dark dark:text-white">{{ $about->email ?? 'example@email.com' }}</div>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-primary bg-opacity-10 rounded-full flex items-center justify-center">
                                    <i class="fas fa-phone text-primary"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Telepon</div>
                                    <div class="font-medium text-dark dark:text-white">{{ $about->phone ?? '+62 000 0000 0000' }}</div>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-primary bg-opacity-10 rounded-full flex items-center justify-center">
                                    <i class="fas fa-map-marker-alt text-primary"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Lokasi</div>
                                    <div class="font-medium text-dark dark:text-white">{{ $about->location ?? 'Indonesia' }}</div>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-primary bg-opacity-10 rounded-full flex items-center justify-center">
                                    <i class="fas fa-birthday-cake text-primary"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Usia</div>
                                    <div class="font-medium text-dark dark:text-white">{{ $about->age ?? '25' }} Tahun</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('contact') }}" class="bg-primary text-white px-8 py-4 rounded-full hover:bg-blue-700 transition-all duration-300 transform hover:scale-105 font-medium inline-flex items-center justify-center shadow-lg">
                                <i class="fas fa-envelope mr-2"></i>
                                Hubungi Saya
                            </a>
                            <a href="{{ route('projects') }}" class="border-2 border-primary text-primary px-8 py-4 rounded-full hover:bg-primary hover:text-white transition-all duration-300 transform hover:scale-105 font-medium inline-flex items-center justify-center">
                                <i class="fas fa-eye mr-2"></i>
                                Lihat Portfolio
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
                            </a>
                            @if($about->cv_file)
                                <a href="{{ Storage::url($about->cv_file) }}" target="_blank" class="border-2 border-primary text-primary px-6 py-3 rounded-lg hover:bg-primary hover:text-white transition duration-300 font-medium inline-flex items-center">
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

        <!-- Skills Section -->
        @if($skills->count() > 0)
        <section class="py-20 bg-gray-50 dark:bg-gray-900">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16" data-aos="fade-up">
                    <span class="inline-block px-4 py-2 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-medium mb-4">
                        Keahlian Saya
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold text-dark dark:text-white mb-6">Teknologi & Kemampuan</h2>
                    <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                        Berikut adalah teknologi, bahasa pemrograman, dan tools yang saya kuasai untuk menciptakan solusi digital yang berkualitas tinggi.
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
                        $categoryDescriptions = [
                            'frontend' => 'Menciptakan antarmuka pengguna yang interaktif dan responsif',
                            'backend' => 'Membangun server, database, dan logika aplikasi yang kuat',
                            'design' => 'Merancang pengalaman pengguna yang intuitif dan menarik'
                        ];
                    @endphp
                    
                    @foreach($categories as $category => $categorySkills)
                        <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="text-center mb-6">
                                <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="{{ $categoryIcons[$category] ?? 'fas fa-tools' }} text-primary text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-dark dark:text-white mb-2">
                                    {{ $categoryTitles[$category] ?? ucfirst($category) }}
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $categoryDescriptions[$category] ?? '' }}
                                </p>
                            </div>
                            
                            <div class="space-y-4">
                                @foreach($categorySkills as $skill)
                                    <div>
                                        <div class="flex justify-between items-center mb-2">
                                            <span class="text-gray-700 dark:text-gray-300 font-medium">{{ $skill->name }}</span>
                                            <span class="text-primary font-semibold">{{ $skill->percentage }}%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                                            <div class="bg-gradient-to-r from-primary to-blue-500 h-3 rounded-full transition-all duration-1000 ease-out relative overflow-hidden" style="width: {{ $skill->percentage }}%">
                                                <div class="absolute inset-0 bg-white opacity-20 animate-pulse"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- Call to Action -->
        <section class="py-20 bg-primary">
            <div class="container mx-auto px-6">
                <div class="text-center text-white" data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">Mari Berkolaborasi!</h2>
                    <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                        Saya selalu terbuka untuk diskusi proyek baru, peluang kolaborasi, atau sekadar berbagi ide tentang teknologi.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('contact') }}" class="bg-white text-primary px-8 py-4 rounded-full hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 font-medium inline-flex items-center justify-center">
                            <i class="fas fa-envelope mr-2"></i>
                            Hubungi Saya
                        </a>
                        <a href="{{ route('projects') }}" class="border-2 border-white text-white px-8 py-4 rounded-full hover:bg-white hover:text-primary transition-all duration-300 transform hover:scale-105 font-medium inline-flex items-center justify-center">
                            <i class="fas fa-eye mr-2"></i>
                            Lihat Portfolio
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
