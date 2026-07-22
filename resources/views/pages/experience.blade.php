@extends('layouts.app')
@section('title', 'Pengalaman Kerja')

@section('content')
<div class="min-h-screen pt-8 pb-24">
    <!-- Page Header -->
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="text-center mb-20" data-aos="fade-up">
            <div class="section-badge justify-center"><i class="fas fa-briefcase"></i> Work Experience</div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mt-4 mb-4">Pengalaman <span class="gradient-text">Profesional</span></h1>
            <p class="text-slate-400 max-w-2xl mx-auto text-lg">
                Perjalanan saya dalam dunia kerja nyata — dari magang hingga kontribusi dalam proyek skala produksi.
            </p>
        </div>

        <!-- Timeline -->
        @if($experiences->count() > 0)
        <div class="max-w-4xl mx-auto">
            @foreach($experiences as $i => $exp)
            <div class="relative flex gap-8 mb-12" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <!-- Timeline Line -->
                <div class="flex flex-col items-center">
                    <div class="w-14 h-14 rounded-2xl glass border border-blue-500/30 flex items-center justify-center text-blue-400 flex-shrink-0 z-10">
                        @if($exp->company_logo)
                            <img src="{{ Storage::url($exp->company_logo) }}" alt="{{ $exp->company_name }}" class="w-full h-full rounded-2xl object-cover">
                        @else
                            <i class="fas fa-building text-xl"></i>
                        @endif
                    </div>
                    @if(!$loop->last)
                    <div class="w-0.5 flex-1 mt-4 bg-gradient-to-b from-blue-500/50 to-transparent min-h-8"></div>
                    @endif
                </div>

                <!-- Content -->
                <div class="flex-1 pb-8">
                    <div class="card p-8">
                        <!-- Header -->
                        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4 mb-6">
                            <div>
                                <div class="flex flex-wrap items-center gap-2 mb-2">
                                    <h2 class="text-white font-bold text-xl">{{ $exp->position }}</h2>
                                    <span class="text-xs px-3 py-1 rounded-full font-semibold
                                        {{ $exp->type === 'internship' ? 'bg-blue-500/15 text-blue-400 border border-blue-500/25' :
                                           ($exp->type === 'full-time' ? 'bg-green-500/15 text-green-400 border border-green-500/25' :
                                           'bg-orange-500/15 text-orange-400 border border-orange-500/25') }}">
                                        {{ $exp->type === 'internship' ? 'Magang' : ($exp->type === 'full-time' ? 'Full Time' : ucfirst($exp->type)) }}
                                    </span>
                                </div>
                                <p class="text-blue-400 font-semibold text-lg">{{ $exp->company_name }}</p>
                            </div>
                            <div class="text-right flex-shrink-0">
                                <div class="text-slate-300 text-sm font-medium">
                                    {{ $exp->start_date->format('M Y') }} - {{ $exp->is_current ? 'Sekarang' : ($exp->end_date ? $exp->end_date->format('M Y') : '-') }}
                                </div>
                                <div class="text-slate-500 text-xs mt-1">
                                    <i class="fas fa-clock mr-1"></i>{{ $exp->duration }}
                                </div>
                                @if($exp->location)
                                <div class="text-slate-500 text-xs mt-1">
                                    <i class="fas fa-map-marker-alt mr-1"></i>{{ $exp->location }}
                                </div>
                                @endif
                            </div>
                        </div>

                        @if($exp->company_description)
                        <p class="text-slate-400 text-sm mb-6 pb-6 border-b border-white/5 italic">
                            {{ $exp->company_description }}
                        </p>
                        @endif

                        @if($exp->description)
                        <p class="text-slate-300 text-sm mb-6">{{ $exp->description }}</p>
                        @endif

                        <div class="grid md:grid-cols-2 gap-6 mb-6">
                            <!-- Responsibilities -->
                            @if($exp->responsibilities && count($exp->responsibilities) > 0)
                            <div>
                                <h4 class="text-white text-sm font-semibold mb-3 flex items-center gap-2">
                                    <i class="fas fa-tasks text-blue-500 text-xs"></i> Tanggung Jawab
                                </h4>
                                <ul class="space-y-2">
                                    @foreach($exp->responsibilities as $resp)
                                    <li class="text-slate-400 text-sm flex items-start gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500 mt-1.5 flex-shrink-0"></span>
                                        {{ $resp }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <!-- Achievements -->
                            @if($exp->achievements && count($exp->achievements) > 0)
                            <div>
                                <h4 class="text-white text-sm font-semibold mb-3 flex items-center gap-2">
                                    <i class="fas fa-trophy text-yellow-500 text-xs"></i> Pencapaian
                                </h4>
                                <ul class="space-y-2">
                                    @foreach($exp->achievements as $achievement)
                                    <li class="text-slate-400 text-sm flex items-start gap-2">
                                        <i class="fas fa-check-circle text-green-500 text-xs mt-0.5 flex-shrink-0"></i>
                                        {{ $achievement }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <!-- Projects Done -->
                        @if($exp->projects_done && count($exp->projects_done) > 0)
                        <div class="mb-6">
                            <h4 class="text-white text-sm font-semibold mb-3 flex items-center gap-2">
                                <i class="fas fa-code-branch text-indigo-500 text-xs"></i> Proyek yang Dikerjakan
                            </h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($exp->projects_done as $proj)
                                <span class="px-3 py-1.5 rounded-lg bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-medium">
                                    <i class="fas fa-code text-xs mr-1"></i>{{ $proj }}
                                </span>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Tech Stack -->
                        @if($exp->technologies && count($exp->technologies) > 0)
                        <div>
                            <h4 class="text-white text-sm font-semibold mb-3 flex items-center gap-2">
                                <i class="fas fa-layer-group text-cyan-500 text-xs"></i> Tech Stack
                            </h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($exp->technologies as $tech)
                                <span class="tech-badge">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 text-slate-500">
            <i class="fas fa-briefcase text-5xl mb-4 opacity-30"></i>
            <p>Belum ada data pengalaman kerja.</p>
        </div>
        @endif
    </div>
</div>
@endsection
