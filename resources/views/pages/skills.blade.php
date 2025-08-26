@extends('layouts.app')

@section('title', 'Keahlian')

@section('content')
    <div class="pt-24">
        <!-- Skills Header -->
        <section class="py-20 bg-gray-50 dark:bg-gray-900">
            <div class="container mx-auto px-6">
                <div class="text-center" data-aos="fade-up">
                    <h1 class="text-4xl font-bold text-dark dark:text-white mb-4">Keahlian Saya</h1>
                    <div class="w-24 h-1 bg-primary mx-auto"></div>
                    <p class="mt-6 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                        Berikut adalah daftar lengkap keahlian teknis yang saya miliki dalam pengembangan web dan desain.
                    </p>
                </div>
            </div>
        </section>

        <!-- Frontend Skills -->
        <section class="py-20 bg-white dark:bg-dark">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-dark dark:text-white mb-12">Frontend Development</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    @foreach($frontendSkills as $skill)
                        <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-lg" data-aos="fade-up">
                            <div class="flex items-center mb-4">
                                @if($skill->icon)
                                    <i class="{{ $skill->icon }} text-primary text-2xl mr-3"></i>
                                @endif
                                <h3 class="text-xl font-semibold text-dark dark:text-white">{{ $skill->name }}</h3>
                            </div>
                            <div class="mb-2">
                                <div class="flex justify-between mb-1">
                                    <span class="text-gray-600 dark:text-gray-300">Kemahiran</span>
                                    <span class="text-gray-600 dark:text-gray-300">{{ $skill->percentage }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-primary h-2.5 rounded-full" style="width: {{ $skill->percentage }}%"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Backend Skills -->
        <section class="py-20 bg-gray-50 dark:bg-gray-900">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-dark dark:text-white mb-12">Backend Development</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    @foreach($backendSkills as $skill)
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg" data-aos="fade-up">
                            <div class="flex items-center mb-4">
                                @if($skill->icon)
                                    <i class="{{ $skill->icon }} text-primary text-2xl mr-3"></i>
                                @endif
                                <h3 class="text-xl font-semibold text-dark dark:text-white">{{ $skill->name }}</h3>
                            </div>
                            <div class="mb-2">
                                <div class="flex justify-between mb-1">
                                    <span class="text-gray-600 dark:text-gray-300">Kemahiran</span>
                                    <span class="text-gray-600 dark:text-gray-300">{{ $skill->percentage }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-primary h-2.5 rounded-full" style="width: {{ $skill->percentage }}%"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Design Skills -->
        <section class="py-20 bg-white dark:bg-dark">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-dark dark:text-white mb-12">Design</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    @foreach($designSkills as $skill)
                        <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-lg" data-aos="fade-up">
                            <div class="flex items-center mb-4">
                                @if($skill->icon)
                                    <i class="{{ $skill->icon }} text-primary text-2xl mr-3"></i>
                                @endif
                                <h3 class="text-xl font-semibold text-dark dark:text-white">{{ $skill->name }}</h3>
                            </div>
                            <div class="mb-2">
                                <div class="flex justify-between mb-1">
                                    <span class="text-gray-600 dark:text-gray-300">Kemahiran</span>
                                    <span class="text-gray-600 dark:text-gray-300">{{ $skill->percentage }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-primary h-2.5 rounded-full" style="width: {{ $skill->percentage }}%"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
