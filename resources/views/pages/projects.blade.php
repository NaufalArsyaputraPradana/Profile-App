@extends('layouts.app')

@section('title', 'Proyek')

@section('content')
    <div class="pt-24">
        <!-- Projects Header -->
        <section class="py-20 bg-gray-50 dark:bg-gray-900">
            <div class="container mx-auto px-6">
                <div class="text-center" data-aos="fade-up">
                    <h1 class="text-4xl font-bold text-dark dark:text-white mb-4">Proyek Saya</h1>
                    <div class="w-24 h-1 bg-primary mx-auto"></div>
                    <p class="mt-6 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                        Berikut adalah kumpulan proyek-proyek yang telah saya kerjakan. Setiap proyek memiliki tantangan unik
                        dan solusi kreatif yang saya terapkan.
                    </p>
                </div>
            </div>
        </section>

        <!-- Projects Grid -->
        <section class="py-20 bg-white dark:bg-dark">
            <div class="container mx-auto px-6">
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

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $projects->links() }}
                </div>
            </div>
        </section>
    </div>
@endsection
