@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
    <div class="pt-24">
        <!-- Contact Header -->
        <section class="py-20 bg-gradient-to-br from-primary to-blue-600">
            <div class="container mx-auto px-6">
                <div class="text-center text-white" data-aos="fade-up">
                    <span class="inline-block px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-medium mb-4 backdrop-blur-md">
                        Mari Berkolaborasi
                    </span>
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">
                        @if($contact)
                            {{ $contact->title }}
                        @else
                            Hubungi Saya
                        @endif
                    </h1>
                    <div class="w-24 h-1 bg-white mx-auto mb-6"></div>
                    <p class="text-xl text-blue-100 max-w-3xl mx-auto leading-relaxed">
                        @if($contact)
                            {{ $contact->description }}
                        @else
                            Saya siap membantu mewujudkan ide digital Anda. Mari diskusikan proyek atau kolaborasi yang menarik!
                        @endif
                    </p>
                </div>
            </div>
        </section>

        <!-- Contact Content -->
        <section class="py-20 bg-white dark:bg-dark">
            <div class="container mx-auto px-6">
                <div class="grid lg:grid-cols-2 gap-16">
                    <!-- Contact Information -->
                    <div data-aos="fade-right">
                        <h2 class="text-3xl md:text-4xl font-bold text-dark dark:text-white mb-8">Mari Berkolaborasi!</h2>
                        <p class="text-gray-600 dark:text-gray-300 mb-12 text-lg leading-relaxed">
                            Saya selalu terbuka untuk diskusi tentang proyek baru, peluang kolaborasi, atau sekadar berbagi ide tentang teknologi. Jangan ragu untuk menghubungi saya melalui berbagai cara berikut:
                        </p>
                        
                        @if($contact)
                        <!-- Contact Methods -->
                        <div class="space-y-8 mb-12">
                            <div class="flex items-start space-x-4">
                                <div class="w-14 h-14 bg-primary bg-opacity-10 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-envelope text-primary text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-dark dark:text-white mb-2 text-lg">Email</h3>
                                    <p class="text-gray-600 dark:text-gray-300 mb-2">Kirim email untuk diskusi detail tentang proyek Anda</p>
                                    <a href="mailto:{{ $contact->email }}" class="text-primary hover:text-blue-700 font-medium">{{ $contact->email }}</a>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <div class="w-14 h-14 bg-primary bg-opacity-10 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-phone text-primary text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-dark dark:text-white mb-2 text-lg">Telepon</h3>
                                    <p class="text-gray-600 dark:text-gray-300 mb-2">Hubungi langsung untuk konsultasi real-time</p>
                                    <a href="tel:{{ $contact->phone }}" class="text-primary hover:text-blue-700 font-medium">{{ $contact->phone }}</a>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <div class="w-14 h-14 bg-primary bg-opacity-10 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-map-marker-alt text-primary text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-dark dark:text-white mb-2 text-lg">Lokasi</h3>
                                    <p class="text-gray-600 dark:text-gray-300 mb-2">Tersedia untuk meeting offline atau online</p>
                                    <p class="text-primary font-medium">{{ $contact->address }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <!-- Social Media -->
                        <div class="mb-12">
                            <h3 class="text-xl font-semibold text-dark dark:text-white mb-6">Ikuti Saya</h3>
                            <div class="flex space-x-4">
                                @if($contact && $contact->github_url)
                                    <a href="{{ $contact->github_url }}" target="_blank" class="w-12 h-12 bg-gray-100 dark:bg-gray-800 hover:bg-primary dark:hover:bg-primary text-gray-600 dark:text-gray-300 hover:text-white rounded-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:rotate-3">
                                        <i class="fab fa-github text-xl"></i>
                                    </a>
                                @endif
                                @if($contact && $contact->linkedin_url)
                                    <a href="{{ $contact->linkedin_url }}" target="_blank" class="w-12 h-12 bg-gray-100 dark:bg-gray-800 hover:bg-primary dark:hover:bg-primary text-gray-600 dark:text-gray-300 hover:text-white rounded-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:rotate-3">
                                        <i class="fab fa-linkedin text-xl"></i>
                                    </a>
                                @endif
                                @if($contact && $contact->twitter_url)
                                    <a href="{{ $contact->twitter_url }}" target="_blank" class="w-12 h-12 bg-gray-100 dark:bg-gray-800 hover:bg-primary dark:hover:bg-primary text-gray-600 dark:text-gray-300 hover:text-white rounded-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:rotate-3">
                                        <i class="fab fa-twitter text-xl"></i>
                                    </a>
                                @endif
                                @if($contact && $contact->instagram_url)
                                    <a href="{{ $contact->instagram_url }}" target="_blank" class="w-12 h-12 bg-gray-100 dark:bg-gray-800 hover:bg-primary dark:hover:bg-primary text-gray-600 dark:text-gray-300 hover:text-white rounded-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:rotate-3">
                                        <i class="fab fa-instagram text-xl"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Quick Response -->
                        <div class="bg-gradient-to-r from-primary to-blue-600 p-6 rounded-2xl text-white">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-clock text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-lg">Respon Cepat</h4>
                                    <p class="text-blue-100">Biasanya saya membalas dalam 24 jam</p>
                                </div>
                            </div>
                            <p class="text-blue-100">
                                Saya berkomitmen memberikan respon yang cepat dan profesional untuk setiap pertanyaan atau proposal kolaborasi.
                            </p>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div data-aos="fade-left">
                        <div class="bg-gray-50 dark:bg-gray-900 p-8 rounded-2xl">
                            <h3 class="text-2xl font-bold text-dark dark:text-white mb-6">Kirim Pesan</h3>
                            <form id="contactForm" class="space-y-6">
                                @csrf
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Lengkap *</label>
                                        <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-gray-800 dark:text-white transition-all duration-300">
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email *</label>
                                        <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-gray-800 dark:text-white transition-all duration-300">
                                    </div>
                                </div>
                                
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nomor Telepon</label>
                                    <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-gray-800 dark:text-white transition-all duration-300">
                                </div>
                                
                                <div>
                                    <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subjek *</label>
                                    <select id="subject" name="subject" required class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-gray-800 dark:text-white transition-all duration-300">
                                        <option value="">Pilih subjek pesan</option>
                                        <option value="project">Diskusi Proyek Baru</option>
                                        <option value="collaboration">Peluang Kolaborasi</option>
                                        <option value="consultation">Konsultasi Teknis</option>
                                        <option value="job">Peluang Kerja</option>
                                        <option value="other">Lainnya</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="budget" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Budget Estimasi (Opsional)</label>
                                    <select id="budget" name="budget" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-gray-800 dark:text-white transition-all duration-300">
                                        <option value="">Pilih range budget</option>
                                        <option value="< $1000">< $1000</option>
                                        <option value="$1000 - $5000">$1000 - $5000</option>
                                        <option value="$5000 - $10000">$5000 - $10000</option>
                                        <option value="> $10000">> $10000</option>
                                        <option value="discuss">Mari Diskusi</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pesan *</label>
                                    <textarea id="message" name="message" rows="6" required placeholder="Ceritakan tentang proyek atau ide Anda..." class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-gray-800 dark:text-white transition-all duration-300 resize-none"></textarea>
                                </div>
                                
                                <div class="flex items-center">
                                    <input type="checkbox" id="privacy" name="privacy" required class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary">
                                    <label for="privacy" class="ml-2 text-sm text-gray-600 dark:text-gray-300">
                                        Saya setuju dengan <a href="#" class="text-primary hover:text-blue-700">kebijakan privasi</a> *
                                    </label>
                                </div>
                                
                                <button type="submit" class="w-full bg-primary text-white py-4 px-6 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-[1.02] font-medium text-lg shadow-lg hover:shadow-xl">
                                    <span class="flex items-center justify-center">
                                        <i class="fas fa-paper-plane mr-2"></i>
                                        Kirim Pesan
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-20 bg-gray-50 dark:bg-gray-900">
            <div class="container mx-auto px-6">
                <div class="max-w-4xl mx-auto">
                    <div class="text-center mb-16" data-aos="fade-up">
                        <h2 class="text-3xl md:text-4xl font-bold text-dark dark:text-white mb-6">Pertanyaan Umum</h2>
                        <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                        <p class="text-gray-600 dark:text-gray-300">Beberapa pertanyaan yang sering diajukan</p>
                    </div>
                    
                    <div class="space-y-6" data-aos="fade-up">
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg">
                            <button class="w-full p-6 text-left focus:outline-none faq-trigger" onclick="toggleFaq(this)">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold text-dark dark:text-white">Berapa lama waktu pengerjaan proyek?</h3>
                                    <i class="fas fa-chevron-down text-primary transform transition-transform duration-300"></i>
                                </div>
                            </button>
                            <div class="faq-content hidden px-6 pb-6">
                                <p class="text-gray-600 dark:text-gray-300">Waktu pengerjaan tergantung pada kompleksitas proyek. Website sederhana biasanya 2-4 minggu, aplikasi web kompleks bisa 2-6 bulan. Saya akan memberikan timeline yang detail setelah mendiskusikan kebutuhan Anda.</p>
                            </div>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg">
                            <button class="w-full p-6 text-left focus:outline-none faq-trigger" onclick="toggleFaq(this)">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold text-dark dark:text-white">Apakah menyediakan maintenance setelah proyek selesai?</h3>
                                    <i class="fas fa-chevron-down text-primary transform transition-transform duration-300"></i>
                                </div>
                            </button>
                            <div class="faq-content hidden px-6 pb-6">
                                <p class="text-gray-600 dark:text-gray-300">Ya, saya menyediakan layanan maintenance dan support setelah proyek selesai. Paket maintenance meliputi update security, bug fixes, dan minor improvements dengan berbagai pilihan paket sesuai kebutuhan.</p>
                            </div>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg">
                            <button class="w-full p-6 text-left focus:outline-none faq-trigger" onclick="toggleFaq(this)">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold text-dark dark:text-white">Teknologi apa yang paling sering digunakan?</h3>
                                    <i class="fas fa-chevron-down text-primary transform transition-transform duration-300"></i>
                                </div>
                            </button>
                            <div class="faq-content hidden px-6 pb-6">
                                <p class="text-gray-600 dark:text-gray-300">Saya menggunakan Laravel untuk backend, Vue.js/React untuk frontend, dan berbagai teknologi modern lainnya. Pemilihan teknologi disesuaikan dengan kebutuhan dan goals proyek Anda.</p>
                            </div>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg">
                            <button class="w-full p-6 text-left focus:outline-none faq-trigger" onclick="toggleFaq(this)">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold text-dark dark:text-white">Bagaimana sistem pembayaran?</h3>
                                    <i class="fas fa-chevron-down text-primary transform transition-transform duration-300"></i>
                                </div>
                            </button>
                            <div class="faq-content hidden px-6 pb-6">
                                <p class="text-gray-600 dark:text-gray-300">Pembayaran dilakukan secara bertahap: 30% di awal sebagai down payment, 40% saat progress 50%, dan 30% sisanya saat proyek selesai. Saya menerima transfer bank dan berbagai metode pembayaran digital.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
    <script>
        // Contact form handling
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simulate form submission
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengirim...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                alert('Terima kasih! Pesan Anda telah dikirim. Saya akan membalas secepatnya.');
                this.reset();
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });
        
        // FAQ toggle
        function toggleFaq(trigger) {
            const content = trigger.nextElementSibling;
            const icon = trigger.querySelector('i');
            
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.style.transform = 'rotate(180deg)';
            } else {
                content.classList.add('hidden');
                content.style.maxHeight = '0';
                icon.style.transform = 'rotate(0deg)';
            }
        }
    </script>
    @endpush
@endsection
