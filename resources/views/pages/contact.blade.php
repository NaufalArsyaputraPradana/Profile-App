@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
    <div class="pt-24">
        <!-- Contact Header -->
        <section class="py-20 bg-gray-50 dark:bg-gray-900">
            <div class="container mx-auto px-6">
                <div class="text-center" data-aos="fade-up">
                    <h1 class="text-4xl font-bold text-dark dark:text-white mb-4">{{ $contact->title }}</h1>
                    <div class="w-24 h-1 bg-primary mx-auto"></div>
                    <p class="mt-6 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                        {{ $contact->description }}
                    </p>
                </div>
            </div>
        </section>

        <!-- Contact Content -->
        <section class="py-20 bg-white dark:bg-dark">
            <div class="container mx-auto px-6">
                <div class="grid md:grid-cols-2 gap-12">
                    <!-- Contact Information -->
                    <div data-aos="fade-right">
                        <h2 class="text-2xl font-semibold text-dark dark:text-white mb-6">Mari Berkolaborasi!</h2>
                        <p class="text-gray-600 dark:text-gray-300 mb-8">
                            Tertarik untuk bekerja sama? Jangan ragu untuk menghubungi saya melalui form di samping 
                            atau media sosial di bawah ini.
                        </p>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-primary w-8"></i>
                                <span class="text-gray-600 dark:text-gray-300">{{ $contact->email }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-phone text-primary w-8"></i>
                                <span class="text-gray-600 dark:text-gray-300">{{ $contact->phone }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-primary w-8"></i>
                                <span class="text-gray-600 dark:text-gray-300">{{ $contact->address }}</span>
                            </div>
                        </div>
                        <div class="flex space-x-4 mt-8">
                            @if($contact->github_url)
                                <a href="{{ $contact->github_url }}" target="_blank" class="text-gray-600 hover:text-primary dark:text-gray-300 text-2xl">
                                    <i class="fab fa-github"></i>
                                </a>
                            @endif
                            @if($contact->linkedin_url)
                                <a href="{{ $contact->linkedin_url }}" target="_blank" class="text-gray-600 hover:text-primary dark:text-gray-300 text-2xl">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            @endif
                            @if($contact->twitter_url)
                                <a href="{{ $contact->twitter_url }}" target="_blank" class="text-gray-600 hover:text-primary dark:text-gray-300 text-2xl">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            @endif
                            @if($contact->instagram_url)
                                <a href="{{ $contact->instagram_url }}" target="_blank" class="text-gray-600 hover:text-primary dark:text-gray-300 text-2xl">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div data-aos="fade-left">
                        <form action="#" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label class="block text-gray-600 dark:text-gray-300 mb-2">Nama Lengkap</label>
                                <input type="text" 
                                       name="name" 
                                       class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:outline-none focus:border-primary"
                                       required>
                            </div>
                            <div>
                                <label class="block text-gray-600 dark:text-gray-300 mb-2">Email</label>
                                <input type="email" 
                                       name="email" 
                                       class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:outline-none focus:border-primary"
                                       required>
                            </div>
                            <div>
                                <label class="block text-gray-600 dark:text-gray-300 mb-2">Subjek</label>
                                <input type="text" 
                                       name="subject" 
                                       class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:outline-none focus:border-primary"
                                       required>
                            </div>
                            <div>
                                <label class="block text-gray-600 dark:text-gray-300 mb-2">Pesan</label>
                                <textarea name="message" 
                                          rows="5" 
                                          class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:outline-none focus:border-primary"
                                          required></textarea>
                            </div>
                            <button type="submit" 
                                    class="w-full bg-primary hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                                Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Map Section -->
        <section class="py-20 bg-gray-50 dark:bg-gray-900">
            <div class="container mx-auto px-6">
                <div class="rounded-lg overflow-hidden shadow-lg" data-aos="fade-up">
                    <div class="w-full h-96 bg-gray-300">
                        <!-- Add your map integration here -->
                        <div class="w-full h-full flex items-center justify-center text-gray-500">
                            <span>Map will be integrated here</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
