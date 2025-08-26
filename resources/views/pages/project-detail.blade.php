@extends('layouts.app')

@section('title', $project->title)

@section('content')
    <div class="pt-24">
        <!-- Project Hero -->
        <section class="py-20 bg-gray-50 dark:bg-gray-900">
            <div class="container mx-auto px-6">
                <div class="max-w-4xl mx-auto">
                    <div class="mb-8" data-aos="fade-up">
                        @if($project->image)
                            <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full rounded-lg shadow-xl">
                        @else
                            <div class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center">
                                <i class="fas fa-image text-gray-400 text-6xl"></i>
                            </div>
                        @endif
                    </div>
                    <div data-aos="fade-up" data-aos-delay="100">
                        <h1 class="text-4xl font-bold text-dark dark:text-white mb-6">{{ $project->title }}</h1>
                        <div class="flex flex-wrap gap-2 mb-8">
                            @foreach($project->technologies as $tech)
                                <span class="px-4 py-2 bg-blue-100 text-blue-600 rounded-full">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Project Description -->
        <section class="py-20 bg-white dark:bg-dark">
            <div class="container mx-auto px-6">
                <div class="max-w-4xl mx-auto">
                    <div class="prose prose-lg dark:prose-invert" data-aos="fade-up">
                        {{ $project->description }}
                    </div>

                    @if($project->url)
                        <div class="mt-12 text-center" data-aos="fade-up">
                            <a href="{{ $project->url }}" target="_blank" class="bg-primary hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full transition duration-300">
                                Lihat Project Live
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Navigation -->
        <section class="py-12 bg-gray-50 dark:bg-gray-900">
            <div class="container mx-auto px-6">
                <div class="flex justify-between items-center">
                    <a href="{{ route('projects') }}" class="text-primary hover:text-blue-700">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Proyek
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
