@extends('layouts.app')
@section('title', 'Pelatihan & Training')

@section('content')
<div class="min-h-screen pt-8 pb-24">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="text-center mb-20" data-aos="fade-up">
            <div class="section-badge justify-center"><i class="fas fa-chalkboard-teacher"></i> Training</div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mt-4 mb-4">Pelatihan & <span class="gradient-text">Training</span></h1>
            <p class="text-slate-400 max-w-2xl mx-auto text-lg">
                Program pelatihan, bootcamp, dan workshop yang telah saya ikuti untuk terus mengembangkan kompetensi.
            </p>
        </div>

        @if($trainings->count() > 0)
        <div class="grid md:grid-cols-2 gap-8">
            @foreach($trainings as $i => $training)
            <div class="card p-8" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="flex flex-col gap-5">
                    <!-- Header -->
                    <div class="flex gap-4 items-start">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-cyan-500/20 to-blue-500/20 border border-cyan-500/20 flex items-center justify-center text-cyan-400 flex-shrink-0">
                            @if($training->cover_image)
                                <img src="{{ Storage::url($training->cover_image) }}" alt="{{ $training->name }}" class="w-full h-full rounded-xl object-cover">
                            @else
                                @php
                                $icons = ['workshop'=>'fas fa-tools', 'bootcamp'=>'fas fa-rocket', 'online-course'=>'fas fa-laptop-code', 'webinar'=>'fas fa-video', 'seminar'=>'fas fa-chalkboard'];
                                @endphp
                                <i class="{{ $icons[$training->category] ?? 'fas fa-book' }} text-xl"></i>
                            @endif
                        </div>
                        <div class="flex-1">
                            <div class="flex items-start justify-between gap-2 mb-1">
                                <h3 class="text-white font-bold text-lg leading-tight">{{ $training->name }}</h3>
                                @if($training->featured)
                                <i class="fas fa-star text-yellow-500 text-sm flex-shrink-0 mt-1"></i>
                                @endif
                            </div>
                            <p class="text-cyan-400 font-medium text-sm">{{ $training->organizer }}</p>
                        </div>
                    </div>

                    <!-- Meta -->
                    <div class="flex flex-wrap gap-x-4 gap-y-1.5 text-slate-500 text-xs">
                        @if($training->category)
                        <span class="flex items-center gap-1.5">
                            <i class="fas fa-tag text-cyan-500"></i>
                            {{ ['workshop'=>'Workshop', 'bootcamp'=>'Bootcamp', 'online-course'=>'Online Course', 'webinar'=>'Webinar', 'seminar'=>'Seminar'][$training->category] ?? ucfirst($training->category) }}
                        </span>
                        @endif
                        @if($training->duration)
                        <span class="flex items-center gap-1.5">
                            <i class="fas fa-clock text-cyan-500"></i>{{ $training->duration }}
                        </span>
                        @endif
                        @if($training->location)
                        <span class="flex items-center gap-1.5">
                            <i class="fas fa-map-marker-alt text-cyan-500"></i>{{ $training->location }}
                        </span>
                        @endif
                        @if($training->start_date)
                        <span class="flex items-center gap-1.5">
                            <i class="fas fa-calendar text-cyan-500"></i>
                            {{ $training->start_date->format('Y') }}
                        </span>
                        @endif
                    </div>

                    @if($training->description)
                    <p class="text-slate-400 text-sm leading-relaxed">{{ $training->description }}</p>
                    @endif

                    @if($training->topics && count($training->topics) > 0)
                    <div>
                        <h4 class="text-white text-sm font-semibold mb-2 flex items-center gap-2">
                            <i class="fas fa-list-ul text-cyan-500 text-xs"></i> Materi Pelatihan
                        </h4>
                        <ul class="space-y-1">
                            @foreach($training->topics as $topic)
                            <li class="text-slate-400 text-xs flex items-start gap-2">
                                <i class="fas fa-check text-cyan-500 text-xs mt-0.5 flex-shrink-0"></i>
                                {{ $topic }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($training->credential_url)
                    <a href="{{ $training->credential_url }}" target="_blank" rel="noopener"
                       class="inline-flex items-center gap-2 text-cyan-400 hover:text-cyan-300 text-sm transition-colors">
                        <i class="fas fa-external-link-alt text-xs"></i> Lihat Sertifikat
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-20 text-slate-500">
            <i class="fas fa-chalkboard-teacher text-6xl opacity-20 mb-4"></i>
            <p>Belum ada data pelatihan.</p>
        </div>
        @endif
    </div>
</div>
@endsection
