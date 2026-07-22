@extends('layouts.app')
@section('title', 'Pendidikan & Organisasi')

@section('content')
<div class="min-h-screen pt-8 pb-24">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <!-- Header -->
        <div class="text-center mb-20" data-aos="fade-up">
            <div class="section-badge justify-center"><i class="fas fa-graduation-cap"></i> Education</div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mt-4 mb-4">Pendidikan & <span class="gradient-text">Organisasi</span></h1>
            <p class="text-slate-400 max-w-2xl mx-auto text-lg">
                Perjalanan akademik dan keterlibatan aktif dalam organisasi yang membentuk karakter profesional saya.
            </p>
        </div>

        <!-- Education Timeline -->
        <div class="mb-24">
            <h2 class="text-2xl font-bold text-white mb-10 flex items-center gap-3" data-aos="fade-up">
                <div class="w-8 h-8 rounded-lg bg-blue-500/20 border border-blue-500/30 flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-blue-400 text-sm"></i>
                </div>
                Riwayat Pendidikan
            </h2>

            @if($educations->count() > 0)
            <div class="max-w-4xl mx-auto space-y-8">
                @foreach($educations as $i => $edu)
                <div class="card p-8" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="w-16 h-16 rounded-2xl glass border border-blue-500/20 flex items-center justify-center text-blue-400 flex-shrink-0">
                            @if($edu->institution_logo)
                                <img src="{{ Storage::url($edu->institution_logo) }}" alt="{{ $edu->institution_name }}" class="w-full h-full rounded-2xl object-cover">
                            @else
                                <i class="fas fa-university text-2xl"></i>
                            @endif
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center gap-3 mb-2">
                                <h3 class="text-white font-bold text-xl">{{ $edu->institution_name }}</h3>
                                @if($edu->is_current)
                                <span class="text-xs px-2.5 py-1 rounded-full bg-green-500/10 text-green-400 border border-green-500/25 font-semibold">Aktif</span>
                                @endif
                            </div>
                            <p class="text-blue-400 font-semibold mb-1">{{ $edu->degree }} - {{ $edu->field_of_study }}</p>
                            <div class="flex flex-wrap gap-4 text-slate-500 text-sm mb-4">
                                <span><i class="fas fa-calendar mr-1.5"></i>{{ $edu->start_date->format('Y') }} - {{ $edu->is_current ? 'Sekarang' : ($edu->end_date ? $edu->end_date->format('Y') : '-') }}</span>
                                @if($edu->location)<span><i class="fas fa-map-marker-alt mr-1.5"></i>{{ $edu->location }}</span>@endif
                            </div>

                            @if($edu->gpa)
                            <div class="flex items-center gap-4 mb-4">
                                <div class="flex items-center gap-2">
                                    <span class="text-slate-400 text-sm">IPK:</span>
                                    <span class="text-white font-bold text-2xl">{{ number_format($edu->gpa, 2) }}</span>
                                    <span class="text-slate-500 text-sm">/ {{ $edu->gpa_scale }}</span>
                                </div>
                                <div class="flex-1 h-2 bg-white/5 rounded-full overflow-hidden max-w-40">
                                    <div class="h-full bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full" style="width: {{ ($edu->gpa / 4) * 100 }}%"></div>
                                </div>
                            </div>
                            @endif

                            @if($edu->description)
                            <p class="text-slate-400 text-sm leading-relaxed mb-4">{{ $edu->description }}</p>
                            @endif

                            @if($edu->achievements && count($edu->achievements) > 0)
                            <div class="mb-4">
                                <h4 class="text-white text-sm font-semibold mb-2 flex items-center gap-2">
                                    <i class="fas fa-trophy text-yellow-500 text-xs"></i> Pencapaian
                                </h4>
                                <ul class="space-y-1">
                                    @foreach($edu->achievements as $ach)
                                    <li class="text-slate-400 text-sm flex items-start gap-2">
                                        <i class="fas fa-check-circle text-green-500 text-xs mt-0.5 flex-shrink-0"></i>
                                        {{ $ach }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @if($edu->activities && count($edu->activities) > 0)
                            <div>
                                <h4 class="text-white text-sm font-semibold mb-2 flex items-center gap-2">
                                    <i class="fas fa-calendar-check text-blue-500 text-xs"></i> Kegiatan
                                </h4>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($edu->activities as $act)
                                    <span class="tech-badge text-xs">{{ $act }}</span>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        <!-- Organization Timeline -->
        @if($organizations->count() > 0)
        <div>
            <h2 class="text-2xl font-bold text-white mb-10 flex items-center gap-3" data-aos="fade-up">
                <div class="w-8 h-8 rounded-lg bg-indigo-500/20 border border-indigo-500/30 flex items-center justify-center">
                    <i class="fas fa-users text-indigo-400 text-sm"></i>
                </div>
                Pengalaman Organisasi
            </h2>

            <div class="max-w-4xl mx-auto space-y-6">
                @foreach($organizations as $i => $org)
                <div class="card p-8" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="w-16 h-16 rounded-2xl glass border border-indigo-500/20 flex items-center justify-center text-indigo-400 flex-shrink-0">
                            @if($org->organization_logo)
                                <img src="{{ Storage::url($org->organization_logo) }}" alt="{{ $org->organization_name }}" class="w-full h-full rounded-2xl object-cover">
                            @else
                                <i class="fas fa-users text-2xl"></i>
                            @endif
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center gap-3 mb-2">
                                <h3 class="text-white font-bold text-xl">{{ $org->role }}</h3>
                                @if($org->is_current)
                                <span class="text-xs px-2.5 py-1 rounded-full bg-green-500/10 text-green-400 border border-green-500/25 font-semibold">Aktif</span>
                                @endif
                            </div>
                            <p class="text-indigo-400 font-semibold mb-1">{{ $org->organization_name }}</p>
                            @if($org->division)
                            <p class="text-slate-400 text-sm mb-2">{{ $org->division }}</p>
                            @endif
                            <div class="flex flex-wrap gap-4 text-slate-500 text-sm mb-4">
                                <span><i class="fas fa-calendar mr-1.5"></i>{{ $org->start_date->format('Y') }} - {{ $org->is_current ? 'Sekarang' : ($org->end_date ? $org->end_date->format('Y') : '-') }}</span>
                                @if($org->institution)<span><i class="fas fa-building mr-1.5"></i>{{ $org->institution }}</span>@endif
                            </div>

                            @if($org->description)
                            <p class="text-slate-400 text-sm leading-relaxed mb-4">{{ $org->description }}</p>
                            @endif

                            @if($org->achievements && count($org->achievements) > 0)
                            <ul class="space-y-1">
                                @foreach($org->achievements as $ach)
                                <li class="text-slate-400 text-sm flex items-start gap-2">
                                    <i class="fas fa-check-circle text-green-500 text-xs mt-0.5 flex-shrink-0"></i>
                                    {{ $ach }}
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
