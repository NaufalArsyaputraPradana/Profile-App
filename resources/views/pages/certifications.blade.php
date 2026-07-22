@extends('layouts.app')
@section('title', 'Sertifikasi Profesi')

@section('content')
<div class="min-h-screen pt-8 pb-24">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="text-center mb-20" data-aos="fade-up">
            <div class="section-badge justify-center"><i class="fas fa-medal"></i> Certification</div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mt-4 mb-4">Sertifikasi <span class="gradient-text">Profesi</span></h1>
            <p class="text-slate-400 max-w-2xl mx-auto text-lg">
                Sertifikasi resmi yang membuktikan kompetensi dan keahlian profesional saya.
            </p>
        </div>

        @if($certifications->count() > 0)
        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            @foreach($certifications as $i => $cert)
            <div class="card p-8" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="flex gap-5">
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-blue-500/20 to-indigo-500/20 border border-blue-500/20 flex items-center justify-center text-blue-400 flex-shrink-0">
                        @if($cert->badge_image)
                            <img src="{{ Storage::url($cert->badge_image) }}" alt="{{ $cert->name }}" class="w-full h-full rounded-2xl object-cover">
                        @else
                            <i class="fas fa-certificate text-3xl"></i>
                        @endif
                    </div>
                    <div class="flex-1">
                        <div class="flex items-start justify-between gap-2 mb-2">
                            <h3 class="text-white font-bold text-lg leading-tight">{{ $cert->name }}</h3>
                            @if($cert->featured)
                            <i class="fas fa-star text-yellow-500 text-sm flex-shrink-0 mt-1"></i>
                            @endif
                        </div>
                        <p class="text-blue-400 font-medium mb-3">{{ $cert->issuer }}</p>

                        <div class="space-y-1.5 mb-4">
                            @if($cert->issue_date)
                            <div class="flex items-center gap-2 text-slate-500 text-xs">
                                <i class="fas fa-calendar w-3.5"></i>
                                <span>Diterbitkan: {{ $cert->issue_date->format('M Y') }}</span>
                            </div>
                            @endif
                            @if($cert->level)
                            <div class="flex items-center gap-2 text-slate-500 text-xs">
                                <i class="fas fa-layer-group w-3.5"></i>
                                <span>Level: {{ $cert->level }}</span>
                            </div>
                            @endif
                            @if($cert->credential_id)
                            <div class="flex items-center gap-2 text-slate-500 text-xs">
                                <i class="fas fa-fingerprint w-3.5"></i>
                                <span class="font-mono">{{ $cert->credential_id }}</span>
                            </div>
                            @endif
                            <div class="flex items-center gap-2 text-xs">
                                <i class="fas fa-infinity w-3.5 {{ $cert->no_expiry ? 'text-green-500' : 'text-yellow-500' }}"></i>
                                <span class="{{ $cert->no_expiry ? 'text-green-400' : 'text-yellow-400' }}">
                                    {{ $cert->no_expiry ? 'Tidak Kedaluwarsa' : ($cert->expiry_date ? 'Berlaku s/d ' . $cert->expiry_date->format('M Y') : 'Aktif') }}
                                </span>
                            </div>
                        </div>

                        @if($cert->description)
                        <p class="text-slate-400 text-sm leading-relaxed mb-4">{{ $cert->description }}</p>
                        @endif

                        @if($cert->credential_url)
                        <a href="{{ $cert->credential_url }}" target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 text-blue-400 hover:text-blue-300 text-sm transition-colors">
                            <i class="fas fa-external-link-alt text-xs"></i> Verifikasi Sertifikat
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-20 text-slate-500">
            <i class="fas fa-medal text-6xl opacity-20 mb-4"></i>
            <p>Belum ada data sertifikasi.</p>
        </div>
        @endif
    </div>
</div>
@endsection
