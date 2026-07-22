@extends('layouts.app')
@section('title', 'Explore Other Projects')

@section('content')
<div class="relative min-h-screen pt-24 pb-20 overflow-hidden">
    <!-- Decorative Background -->
    <div class="absolute top-1/4 left-1/4 w-[500px] h-[500px] bg-primary/20 rounded-full mix-blend-screen filter blur-[100px] opacity-50 animate-blob"></div>
    <div class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-purple-500/20 rounded-full mix-blend-screen filter blur-[100px] opacity-50 animate-blob animation-delay-2000"></div>
    <div class="absolute inset-0 bg-black/40 backdrop-blur-[2px] z-0"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Hero Section -->
        <div class="max-w-4xl mx-auto text-center mb-20" data-aos="fade-up">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10 backdrop-blur-md mb-6">
                <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                <span class="text-sm font-medium text-slate-300">Available for new opportunities</span>
            </div>
            
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
                Tertarik dengan <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500">
                    Karya Saya Lainnya?
                </span>
            </h1>
            
            <p class="text-xl text-slate-400 mb-10 leading-relaxed max-w-2xl mx-auto">
                Anda baru saja melihat salah satu dari proyek yang pernah saya kerjakan. 
                Temukan lebih banyak studi kasus, eksplorasi desain, dan solusi *software* 
                inovatif di portofolio utama saya.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="https://arsyapradana.my.id" class="btn-primary px-8 py-4 text-lg w-full sm:w-auto shadow-lg shadow-primary/30 group">
                    <span>Eksplorasi Profil Utama</span>
                    <i class="fas fa-rocket group-hover:-translate-y-1 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>

        <!-- Featured Projects Preview -->
        <div class="mb-16">
            <div class="flex items-center justify-between mb-8" data-aos="fade-up">
                <h2 class="text-2xl font-bold text-white">Cuplikan Proyek Pilihan</h2>
                <div class="h-px bg-white/10 flex-1 ml-6"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($projects as $project)
                <div class="group bg-white/5 border border-white/10 rounded-2xl overflow-hidden hover:bg-white/10 transition-all duration-500 hover:-translate-y-2 backdrop-blur-md" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#111118] to-transparent z-10 opacity-60"></div>
                        @if($project->image)
                            <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" 
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full bg-slate-800 flex items-center justify-center">
                                <i class="fas fa-image text-4xl text-slate-600"></i>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4 z-20 flex gap-2">
                            @foreach(array_slice($project->technologies ?? [], 0, 2) as $tech)
                            <span class="px-2.5 py-1 text-xs font-medium text-white bg-black/50 backdrop-blur-md rounded-full border border-white/10">
                                {{ $tech }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="p-6 relative z-20 -mt-8">
                        <div class="bg-[#111118] border border-white/10 p-5 rounded-xl shadow-xl">
                            <h3 class="text-xl font-bold text-white mb-2 group-hover:text-primary transition-colors line-clamp-1">
                                {{ $project->title }}
                            </h3>
                            <p class="text-sm text-slate-400 mb-4 line-clamp-2">
                                {{ Str::limit(strip_tags($project->description), 80) }}
                            </p>
                            <a href="{{ $project->demo_url ?? $project->url ?? route('projects.show', $project) }}" target="_blank" class="inline-flex items-center gap-2 text-sm font-medium text-blue-400 hover:text-blue-300 transition-colors">
                                Lihat Detail <i class="fas fa-arrow-right text-xs transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-slate-400">Belum ada proyek yang dapat ditampilkan saat ini.</p>
                </div>
                @endforelse
            </div>
        </div>
        
        <!-- Bottom CTA -->
        <div class="bg-gradient-to-r from-blue-900/40 to-purple-900/40 border border-white/10 rounded-3xl p-10 md:p-16 text-center relative overflow-hidden backdrop-blur-xl" data-aos="zoom-in">
            <div class="absolute top-0 right-0 p-8 opacity-10">
                <i class="fas fa-code text-9xl"></i>
            </div>
            <div class="relative z-10">
                <h3 class="text-3xl md:text-4xl font-bold text-white mb-4">Butuh Developer untuk Proyek Anda?</h3>
                <p class="text-slate-300 text-lg mb-8 max-w-2xl mx-auto">
                    Mari berkolaborasi membangun produk digital yang luar biasa. 
                    Saya siap membantu merealisasikan ide brilian Anda menjadi kenyataan.
                </p>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-white text-gray-900 rounded-xl font-bold hover:bg-gray-200 transition-colors shadow-lg">
                    <i class="fas fa-paper-plane"></i> Hubungi Saya Sekarang
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
