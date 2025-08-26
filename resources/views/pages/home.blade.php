@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    @if($hero)
    <section class="hero-bg min-h-screen flex items-center">
        <div class="container mx-auto px-6 py-24" data-aos="fade-up">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                    {{ $hero->title }}
                </h1>
                <p class="text-xl text-gray-300 mb-12">
                    {{ $hero->subtitle }}
                </p>
                <a href="{{ $hero->button_link }}" class="bg-primary hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full transition duration-300">
                    {{ $hero->button_text }}
                </a>
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
                        <img src="{{ Storage::url($about->photo) }}" alt="{{ $about->name }}" class="rounded-lg shadow-xl w-full">
                    @else
                        <div class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user text-gray-400 text-6xl"></i>
                        </div>
                    @endif
                    <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-primary rounded-lg -z-10"></div>
                </div>
                <div data-aos="fade-left">
                    <h2 class="text-3xl font-bold text-dark dark:text-white mb-6">Tentang Saya</h2>
                    <h3 class="text-2xl font-semibold text-dark dark:text-white mb-4">
                        {{ $about->name }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        {{ Str::limit($about->description, 300) }}
                    </p>
                    <a href="{{ route('about') }}" class="bg-primary hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full transition duration-300">
                        Baca Selengkapnya
                    </a>
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
                <h2 class="text-3xl font-bold text-dark dark:text-white mb-4">Proyek Terbaru</h2>
                <div class="w-24 h-1 bg-primary mx-auto"></div>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                    <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg" data-aos="fade-up">
                        @if($project->image)
                            <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-image text-gray-400 text-4xl"></i>
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-dark dark:text-white mb-2">{{ $project->title }}</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                {{ Str::limit($project->description, 100) }}
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach($project->technologies as $tech)
                                    <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">{{ $tech }}</span>
                                @endforeach
                            </div>
                            <a href="{{ route('projects.show', $project) }}" class="text-primary hover:text-blue-700 font-semibold">
                                Lihat Detail →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('projects') }}" class="bg-primary hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full transition duration-300">
                    Lihat Semua Proyek
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
                <h2 class="text-3xl font-bold text-dark dark:text-white mb-4">Keahlian</h2>
                <div class="w-24 h-1 bg-primary mx-auto"></div>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $categories = $skills->groupBy('category');
                @endphp

                @foreach(['frontend', 'backend', 'design'] as $category)
                    @if($categories->has($category))
                        <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg" data-aos="fade-up">
                            <div class="text-primary text-4xl mb-4">
                                <i class="fas {{ $category === 'frontend' ? 'fa-code' : ($category === 'backend' ? 'fa-server' : 'fa-paint-brush') }}"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-dark dark:text-white mb-4">{{ ucfirst($category) }} Development</h3>
                            <div class="space-y-4">
                                @foreach($categories[$category]->take(3) as $skill)
                                    <div>
                                        <div class="flex justify-between mb-1">
                                            <span class="text-gray-600 dark:text-gray-300">{{ $skill->name }}</span>
                                            <span class="text-gray-600 dark:text-gray-300">{{ $skill->percentage }}%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-primary h-2 rounded-full" style="width: {{ $skill->percentage }}%"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('skills') }}" class="bg-primary hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full transition duration-300">
                    Lihat Semua Keahlian
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Contact Preview -->
    @if($contact)
    <section class="py-20 bg-white dark:bg-dark">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-dark dark:text-white mb-4">{{ $contact->title }}</h2>
                <div class="w-24 h-1 bg-primary mx-auto"></div>
                <p class="mt-6 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    {{ $contact->description }}
                </p>
            </div>
            <div class="flex justify-center mt-8">
                <a href="{{ route('contact') }}" class="bg-primary hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full transition duration-300">
                    Hubungi Saya
                </a>
            </div>
        </div>
    </section>
    @endif
@endsection