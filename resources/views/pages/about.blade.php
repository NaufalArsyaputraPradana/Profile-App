@extends('layouts.app')

@section('title', 'Tentang Saya')

@section('content')
    <div class="pt-24">
        <!-- About Hero -->
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
                        <h1 class="text-4xl font-bold text-dark dark:text-white mb-6">
                            {{ $about->name }}
                        </h1>
                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <div>
                                <p class="text-gray-600 dark:text-gray-300">
                                    <strong>Usia:</strong> {{ $about->age }} Tahun
                                </p>
                                <p class="text-gray-600 dark:text-gray-300">
                                    <strong>Email:</strong> {{ $about->email }}
                                </p>
                            </div>
                            <div>
                                <p class="text-gray-600 dark:text-gray-300">
                                    <strong>Phone:</strong> {{ $about->phone }}
                                </p>
                                <p class="text-gray-600 dark:text-gray-300">
                                    <strong>Lokasi:</strong> {{ $about->address }}
                                </p>
                            </div>
                        </div>
                        @if($about->cv_file)
                            <a href="{{ Storage::url($about->cv_file) }}" target="_blank" class="bg-primary hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full transition duration-300">
                                Download CV
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Detailed Description -->
        <section class="py-20 bg-white dark:bg-dark">
            <div class="container mx-auto px-6">
                <div class="max-w-3xl mx-auto" data-aos="fade-up">
                    <h2 class="text-3xl font-bold text-dark dark:text-white mb-8">Tentang Saya</h2>
                    <div class="prose prose-lg dark:prose-invert">
                        {{ $about->description }}
                    </div>
                </div>
            </div>
        </section>

        <!-- Skills Section -->
        <section class="py-20 bg-gray-50 dark:bg-gray-900">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl font-bold text-dark dark:text-white mb-4">Keahlian Saya</h2>
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
                                    @foreach($categories[$category] as $skill)
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
            </div>
        </section>
    </div>
@endsection
