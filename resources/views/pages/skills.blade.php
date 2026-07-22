@extends('layouts.app')
@section('title', 'Keahlian')

@section('content')
<div class="min-h-screen pt-8 pb-24">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <!-- Header -->
        <div class="text-center mb-20" data-aos="fade-up">
            <div class="section-badge justify-center"><i class="fas fa-tools"></i> Skills & Expertise</div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mt-4 mb-4">Tech Stack & <span class="gradient-text">Keahlian</span></h1>
            <p class="text-slate-400 max-w-2xl mx-auto text-lg">
                Kumpulan teknologi, bahasa pemrograman, dan tools yang saya gunakan untuk membangun solusi digital terbaik.
            </p>
        </div>

        @php
        $skillCategories = [
            'frontend' => ['title' => 'Frontend Development', 'icon' => 'fas fa-laptop-code', 'color' => 'blue', 'skills' => $frontendSkills],
            'backend' => ['title' => 'Backend Development', 'icon' => 'fas fa-server', 'color' => 'green', 'skills' => $backendSkills],
            'design' => ['title' => 'UI/UX & Design', 'icon' => 'fas fa-paint-brush', 'color' => 'pink', 'skills' => $designSkills],
            'tools' => ['title' => 'Tools & DevOps', 'icon' => 'fas fa-cogs', 'color' => 'orange', 'skills' => $toolsSkills],
            'soft' => ['title' => 'Soft Skills', 'icon' => 'fas fa-users', 'color' => 'indigo', 'skills' => $softSkills]
        ];
        
        $colors = [
            'blue' => 'text-blue-400 bg-blue-500/10 border-blue-500/20',
            'green' => 'text-green-400 bg-green-500/10 border-green-500/20',
            'pink' => 'text-pink-400 bg-pink-500/10 border-pink-500/20',
            'orange' => 'text-orange-400 bg-orange-500/10 border-orange-500/20',
            'indigo' => 'text-indigo-400 bg-indigo-500/10 border-indigo-500/20'
        ];
        @endphp

        <div class="grid md:grid-cols-2 gap-8">
            @foreach($skillCategories as $catKey => $category)
            @if($category['skills']->count() > 0)
            <div class="card p-8 group hover:border-{{ $category['color'] }}-500/40 transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center border {{ $colors[$category['color']] }}">
                        <i class="{{ $category['icon'] }} text-2xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-white">{{ $category['title'] }}</h2>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    @foreach($category['skills'] as $skill)
                    <div class="bg-white/5 border border-white/10 rounded-xl p-4 flex flex-col items-center justify-center text-center hover:bg-white/10 hover:scale-105 hover:-translate-y-1 transition-all duration-300 group/skill">
                        @if($skill->icon)
                            @if(Str::startsWith($skill->icon, 'fa'))
                                <i class="{{ $skill->icon }} text-4xl mb-3 text-slate-300 group-hover/skill:text-{{ $category['color'] }}-400 transition-colors"></i>
                            @else
                                <img src="{{ asset('assets/icons/' . $skill->icon) }}" alt="{{ $skill->name }}" class="w-10 h-10 mb-3 opacity-80 group-hover/skill:opacity-100 transition-opacity">
                            @endif
                        @else
                            <div class="w-10 h-10 mb-3 rounded-full bg-{{ $category['color'] }}-500/20 text-{{ $category['color'] }}-400 flex items-center justify-center font-bold text-lg">
                                {{ substr($skill->name, 0, 1) }}
                            </div>
                        @endif
                        <span class="text-slate-300 font-medium text-sm group-hover/skill:text-white transition-colors">{{ $skill->name }}</span>
                        <div class="w-full bg-white/5 rounded-full h-1.5 mt-3 overflow-hidden">
                            <div class="bg-{{ $category['color'] }}-500 h-1.5 rounded-full" style="width: {{ $skill->proficiency }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
