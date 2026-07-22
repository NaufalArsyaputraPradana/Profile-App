@extends('layouts.app')
@section('title', 'Hubungi Saya')

@section('content')
<div class="min-h-screen pt-8 pb-24 relative overflow-hidden">
    <!-- Background Decor -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-500/10 rounded-full blur-[100px] -z-10 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-500/10 rounded-full blur-[100px] -z-10 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="section-badge justify-center"><i class="fas fa-paper-plane"></i> Contact Me</div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mt-4 mb-4">Mari Berdiskusi & <span class="gradient-text">Berkolaborasi</span></h1>
            <p class="text-slate-400 max-w-2xl mx-auto text-lg">
                Punya ide proyek, tawaran pekerjaan, atau sekadar ingin menyapa? Jangan ragu untuk menghubungi saya.
            </p>
        </div>

        <div class="grid lg:grid-cols-5 gap-12 lg:gap-8 items-start max-w-6xl mx-auto">
            
            <!-- Contact Info -->
            <div class="lg:col-span-2 space-y-6" data-aos="fade-right">
                <div class="card p-8 bg-white/5 border border-white/10 backdrop-blur-xl">
                    <h2 class="text-2xl font-bold text-white mb-8">Informasi Kontak</h2>
                    
                    <div class="space-y-6">
                        @if($contact && $contact->email)
                        <a href="mailto:{{ $contact->email }}" class="flex items-start gap-4 group">
                            <div class="w-12 h-12 rounded-xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400 group-hover:bg-blue-500 group-hover:text-white transition-all duration-300">
                                <i class="fas fa-envelope text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-slate-400 text-sm font-medium mb-1">Email</h4>
                                <p class="text-white font-medium group-hover:text-blue-400 transition-colors">{{ $contact->email }}</p>
                            </div>
                        </a>
                        @endif

                        @if($contact && $contact->phone)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}" target="_blank" class="flex items-start gap-4 group">
                            <div class="w-12 h-12 rounded-xl bg-green-500/10 border border-green-500/20 flex items-center justify-center text-green-400 group-hover:bg-green-500 group-hover:text-white transition-all duration-300">
                                <i class="fab fa-whatsapp text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-slate-400 text-sm font-medium mb-1">WhatsApp / Telepon</h4>
                                <p class="text-white font-medium group-hover:text-green-400 transition-colors">{{ $contact->phone }}</p>
                            </div>
                        </a>
                        @endif

                        @if($contact && $contact->location)
                        <div class="flex items-start gap-4 group">
                            <div class="w-12 h-12 rounded-xl bg-red-500/10 border border-red-500/20 flex items-center justify-center text-red-400 group-hover:bg-red-500 group-hover:text-white transition-all duration-300">
                                <i class="fas fa-map-marker-alt text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-slate-400 text-sm font-medium mb-1">Lokasi</h4>
                                <p class="text-white font-medium group-hover:text-red-400 transition-colors">{{ $contact->location }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Social Media -->
                @if($contact && ($contact->github || $contact->linkedin || $contact->instagram))
                <div class="card p-8 bg-white/5 border border-white/10 backdrop-blur-xl">
                    <h2 class="text-xl font-bold text-white mb-6">Sosial Media</h2>
                    <div class="flex gap-4">
                        @if($contact->linkedin)
                        <a href="{{ $contact->linkedin }}" target="_blank" class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:bg-[#0077b5] hover:text-white hover:border-[#0077b5] transition-all duration-300 shadow-lg">
                            <i class="fab fa-linkedin-in text-xl"></i>
                        </a>
                        @endif
                        @if($contact->github)
                        <a href="{{ $contact->github }}" target="_blank" class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:bg-[#333] hover:text-white hover:border-[#333] transition-all duration-300 shadow-lg">
                            <i class="fab fa-github text-xl"></i>
                        </a>
                        @endif
                        @if($contact->instagram)
                        <a href="{{ $contact->instagram }}" target="_blank" class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:bg-gradient-to-tr hover:from-[#f09433] hover:via-[#e6683c] hover:to-[#bc1888] hover:text-white transition-all duration-300 shadow-lg border-transparent">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        @endif
                    </div>
                </div>
                @endif
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-3" data-aos="fade-left">
                <div class="card p-8 sm:p-10 bg-white/5 border border-white/10 backdrop-blur-xl shadow-2xl relative overflow-hidden">
                    <!-- Form decor -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/10 rounded-full blur-2xl -translate-y-1/2 translate-x-1/2"></div>
                    
                    <h2 class="text-3xl font-bold text-white mb-2">Kirim Pesan</h2>
                    <p class="text-slate-400 mb-8">Saya akan membalas pesan Anda sesegera mungkin.</p>
                    
                    @if(session('success'))
                    <div class="bg-green-500/10 border border-green-500/30 text-green-400 px-6 py-4 rounded-xl mb-8 flex items-center gap-3">
                        <i class="fas fa-check-circle text-xl"></i>
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6 relative z-10">
                        @csrf
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="name" class="text-sm font-medium text-slate-300">Nama Lengkap <span class="text-red-400">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                       class="w-full bg-white/5 border border-white/10 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-blue-500/50 focus:ring-1 focus:ring-blue-500/50 transition-all placeholder:text-slate-600"
                                       placeholder="John Doe">
                                @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="space-y-2">
                                <label for="email" class="text-sm font-medium text-slate-300">Email <span class="text-red-400">*</span></label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                       class="w-full bg-white/5 border border-white/10 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-blue-500/50 focus:ring-1 focus:ring-blue-500/50 transition-all placeholder:text-slate-600"
                                       placeholder="john@example.com">
                                @error('email')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="subject" class="text-sm font-medium text-slate-300">Subjek</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                                   class="w-full bg-white/5 border border-white/10 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-blue-500/50 focus:ring-1 focus:ring-blue-500/50 transition-all placeholder:text-slate-600"
                                   placeholder="Tawaran Pekerjaan / Project / Tanya-tanya">
                            @error('subject')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="space-y-2">
                            <label for="message" class="text-sm font-medium text-slate-300">Pesan <span class="text-red-400">*</span></label>
                            <textarea id="message" name="message" required rows="5"
                                      class="w-full bg-white/5 border border-white/10 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-blue-500/50 focus:ring-1 focus:ring-blue-500/50 transition-all placeholder:text-slate-600 resize-none"
                                      placeholder="Tulis pesan Anda di sini..."></textarea>
                            @error('message')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-semibold py-4 rounded-xl shadow-lg shadow-blue-500/25 transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                            <i class="fas fa-paper-plane"></i> Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
