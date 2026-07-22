@extends('layouts.app')
@section('title', 'Tentang Saya')

@section('content')
<div class="min-h-screen pt-8 pb-24">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <!-- Header -->
        <div class="text-center mb-20" data-aos="fade-up">
            <div class="section-badge justify-center"><i class="fas fa-user"></i> About Me</div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mt-4 mb-4">Kenali Saya <span class="gradient-text">Lebih Dekat</span></h1>
            <p class="text-slate-400 max-w-2xl mx-auto text-lg">
                Profil singkat, visi, dan nilai-nilai yang saya pegang dalam perjalanan profesional.
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-16 items-center mb-24">
            <!-- Profile Image -->
            <div class="relative group" data-aos="fade-right">
                <!-- Background decorations -->
                <div class="absolute -inset-4 bg-gradient-to-r from-blue-500/20 to-indigo-500/20 rounded-3xl blur-2xl opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="absolute inset-0 bg-gradient-to-tr from-blue-500/10 to-indigo-500/10 rounded-3xl border border-white/5 transform group-hover:scale-[1.02] transition-transform duration-500"></div>
                
                @if($about && $about->profile_image)
                <img src="{{ Storage::url($about->profile_image) }}" alt="Profile Image" class="relative rounded-3xl w-full h-[600px] object-cover border border-white/10 shadow-2xl z-10 transform group-hover:-translate-y-2 transition-transform duration-500">
                @else
                <div class="relative rounded-3xl w-full h-[600px] bg-gradient-to-br from-blue-900/40 to-indigo-900/40 border border-white/10 shadow-2xl flex items-center justify-center z-10">
                    <i class="fas fa-user text-6xl text-blue-500/40"></i>
                </div>
                @endif
                
                <!-- Floating Card -->
                <div class="absolute -bottom-6 -right-6 bg-white/5 backdrop-blur-xl border border-white/10 p-6 rounded-2xl shadow-xl z-20" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-blue-500/20 flex items-center justify-center text-blue-400">
                            <i class="fas fa-code text-xl"></i>
                        </div>
                        <div>
                            <div class="text-white font-bold text-xl">15+ Tahun</div>
                            <div class="text-slate-400 text-sm">Pengalaman Coding</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="space-y-8" data-aos="fade-left">
                <div>
                    <h2 class="text-3xl font-bold text-white mb-6 leading-tight">
                        {{ $about->title ?? 'Membangun solusi digital dengan kode dan kreativitas.' }}
                    </h2>
                    <div class="prose prose-invert prose-p:text-slate-400 prose-p:leading-relaxed prose-a:text-blue-400 max-w-none">
                        @if($about && $about->description)
                            {!! nl2br(e($about->description)) !!}
                        @else
                            <p>
                                Saya adalah seorang Full Stack Web Developer dan Software Architect yang bersemangat dalam menciptakan aplikasi web yang tidak hanya fungsional, tetapi juga memberikan pengalaman pengguna yang luar biasa.
                            </p>
                        @endif
                    </div>
                </div>

                @if($about && $about->vision)
                <div class="card p-6 border-blue-500/20 bg-blue-500/5">
                    <h3 class="text-white font-semibold mb-2 flex items-center gap-2">
                        <i class="fas fa-eye text-blue-400"></i> Visi
                    </h3>
                    <p class="text-slate-400 text-sm">{{ $about->vision }}</p>
                </div>
                @endif
                
                @if($about && $about->mission)
                <div class="card p-6 border-indigo-500/20 bg-indigo-500/5">
                    <h3 class="text-white font-semibold mb-2 flex items-center gap-2">
                        <i class="fas fa-rocket text-indigo-400"></i> Misi
                    </h3>
                    <p class="text-slate-400 text-sm">{{ $about->mission }}</p>
                </div>
                @endif

                <div class="flex flex-wrap gap-4 pt-4">
                    @if($about && $about->cv_kreatif)
                    <a href="{{ Storage::url($about->cv_kreatif) }}" target="_blank" class="btn-primary">
                        <i class="fas fa-file-alt text-sm"></i> Download CV (Kreatif)
                    </a>
                    @endif
                    @if($about && $about->cv_ats)
                    <a href="{{ Storage::url($about->cv_ats) }}" target="_blank" class="btn-primary" style="background: linear-gradient(135deg, #10b981, #059669);">
                        <i class="fas fa-file-invoice text-sm"></i> Download CV (ATS)
                    </a>
                    @endif
                    <a href="{{ route('contact') }}" class="btn-outline">
                        Hubungi Saya <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Career Highlights Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-24">
            <div class="card p-6 text-center" data-aos="fade-up" data-aos-delay="0">
                <div class="text-3xl font-bold text-white mb-2"><span class="counter" data-target="{{ $experiences->count() }}">0</span>+</div>
                <div class="text-slate-500 text-sm">Pengalaman Kerja</div>
            </div>
            <div class="card p-6 text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="text-3xl font-bold text-white mb-2"><span class="counter" data-target="{{ $educations->count() }}">0</span></div>
                <div class="text-slate-500 text-sm">Riwayat Pendidikan</div>
            </div>
            <div class="card p-6 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="text-3xl font-bold text-white mb-2"><span class="counter" data-target="{{ $organizations->count() }}">0</span>+</div>
                <div class="text-slate-500 text-sm">Pengalaman Organisasi</div>
            </div>
            <div class="card p-6 text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="text-3xl font-bold text-white mb-2"><span class="counter" data-target="{{ $skills->count() }}">0</span>+</div>
                <div class="text-slate-500 text-sm">Keahlian Dikuasai</div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    const speed = 200;

    const animateCounters = () => {
        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const inc = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + inc);
                    setTimeout(updateCount, 20);
                } else {
                    counter.innerText = target;
                }
            };
            
            const observer = new IntersectionObserver((entries) => {
                if(entries[0].isIntersecting) {
                    updateCount();
                    observer.disconnect();
                }
            });
            observer.observe(counter);
        });
    }
    
    document.addEventListener('DOMContentLoaded', animateCounters);
</script>
@endpush
