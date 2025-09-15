<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Portfolio') }}</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        primary: '#2563eb',
                        secondary: '#475569',
                        dark: '#0f172a',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'gradient': 'gradient 15s ease infinite',
                        'typewriter': 'typewriter 3s steps(30) 1s 1 normal both, blinkCursor 500ms steps(30) infinite normal',
                    }
                }
            }
        }
    </script>
    
    <style type="text/css">
        /* Base Styles */
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Hero Background */
        .hero-bg {
            background: linear-gradient(rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.9)), 
                        url('{{ isset($hero) && $hero->background_image ? Storage::url($hero->background_image) : "https://images.unsplash.com/photo-1519681393784-d120267933ba" }}') 
                        center/cover no-repeat;
        }

        /* Google Translate Styling */
        .goog-te-combo {
            width: 100%;
            padding: 0.625rem;
            border-radius: 0.5rem;
            border: 2px solid #e5e7eb;
            background-color: white;
            color: #374151;
            font-size: 0.875rem;
            line-height: 1.25rem;
            outline: none;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            font-family: 'Poppins', sans-serif;
            appearance: none;
            -webkit-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236B7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 1rem;
            padding-right: 2.5rem;
        }

        .goog-te-combo:hover {
            border-color: #2563eb;
        }

        .goog-te-combo:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        /* Dark Mode Styles */
        .dark .goog-te-combo {
            background-color: #1f2937;
            border-color: #374151;
            color: #e5e7eb;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%239CA3AF'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        }

        .dark .goog-te-combo:hover {
            border-color: #2563eb;
        }

        .dark .goog-te-combo option {
            background-color: #1f2937;
            color: #e5e7eb;
        }

        /* Hide Google Translate Elements */
        .goog-te-banner-frame,
        .goog-te-gadget img,
        .VIpgJd-ZVi9od-l4eHX-hSRGPd,
        .VIpgJd-ZVi9od-l4eHX-hSRGPd:link,
        .VIpgJd-ZVi9od-l4eHX-hSRGPd:visited,
        .VIpgJd-ZVi9od-l4eHX-hSRGPd:hover,
        .VIpgJd-ZVi9od-l4eHX-hSRGPd:active {
            display: none !important;
        }

        body {
            top: 0 !important;
        }

        .goog-te-gadget {
            color: transparent !important;
            font-family: 'Poppins', sans-serif !important;
        }

        .goog-te-gadget .goog-te-combo {
            margin: 0 !important;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-white dark:bg-dark antialiased">
    <!-- Navbar -->
    <nav class="fixed w-full bg-white bg-opacity-70 backdrop-blur-md dark:bg-dark dark:bg-opacity-70 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-primary">
                    {{ config('app.name', 'Portfolio') }}.
                </a>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-primary dark:text-gray-300 {{ request()->routeIs('home') ? 'text-primary' : '' }}">
                        Beranda
                    </a>
                    <a href="{{ route('about') }}" class="text-gray-600 hover:text-primary dark:text-gray-300 {{ request()->routeIs('about') ? 'text-primary' : '' }}">
                        Tentang
                    </a>
                    <a href="{{ route('projects') }}" class="text-gray-600 hover:text-primary dark:text-gray-300 {{ request()->routeIs('projects') ? 'text-primary' : '' }}">
                        Proyek
                    </a>
                    <a href="{{ route('skills') }}" class="text-gray-600 hover:text-primary dark:text-gray-300 {{ request()->routeIs('skills') ? 'text-primary' : '' }}">
                        Keahlian
                    </a>
                    <a href="{{ route('contact') }}" class="text-gray-600 hover:text-primary dark:text-gray-300 {{ request()->routeIs('contact') ? 'text-primary' : '' }}">
                        Kontak
                    </a>

                    <!-- Language Selector -->
                    <div class="relative">
                        <div id="google_translate_element" class="w-32"></div>
                    </div>

                    <!-- Dark Mode Toggle -->
                    <button id="theme-toggle" class="p-2 rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200">
                        <i class="fas fa-moon dark:hidden"></i>
                        <i class="fas fa-sun hidden dark:inline text-yellow-500"></i>
                    </button>

                    <!-- Auth Links -->
                    @guest
                        <a href="{{ route('login') }}" class="bg-primary hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-200">
                            {{ __('Login') }}
                        </a>
                    @else
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="text-primary hover:text-blue-700 font-semibold">
                                Admin Panel
                            </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-primary dark:text-gray-300">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    @endguest
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden p-2 rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200" id="mobile-menu-button">
                    <i class="fas fa-bars text-gray-600 dark:text-gray-300"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div class="md:hidden hidden" id="mobile-menu">
                <div class="flex flex-col space-y-4 mt-4 pb-4">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-primary dark:text-gray-300">
                        Beranda
                    </a>
                    <a href="{{ route('about') }}" class="text-gray-600 hover:text-primary dark:text-gray-300">
                        Tentang
                    </a>
                    <a href="{{ route('projects') }}" class="text-gray-600 hover:text-primary dark:text-gray-300">
                        Proyek
                    </a>
                    <a href="{{ route('skills') }}" class="text-gray-600 hover:text-primary dark:text-gray-300">
                        Keahlian
                    </a>
                    <a href="{{ route('contact') }}" class="text-gray-600 hover:text-primary dark:text-gray-300">
                        Kontak
                    </a>
                    <div id="google_translate_element_mobile" class="py-2"></div>
                    @guest
                        <a href="{{ route('login') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-700 inline-block text-center">
                            Login
                        </a>
                    @else
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="text-primary hover:text-blue-700">
                                Admin Panel
                            </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-primary dark:text-gray-300 w-full text-left">
                                Logout
                            </button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-900">
        <div class="container mx-auto px-6 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-2xl font-bold text-primary mb-4 md:mb-0">
                    {{ config('app.name', 'Portfolio') }}.
                </div>
                <div class="flex space-x-6">
                    @if(isset($contact))
                        @if($contact->github_url)
                            <a href="{{ $contact->github_url }}" target="_blank" rel="noopener" class="text-gray-600 hover:text-primary dark:text-gray-400">
                                <i class="fab fa-github text-xl"></i>
                            </a>
                        @endif
                        @if($contact->linkedin_url)
                            <a href="{{ $contact->linkedin_url }}" target="_blank" rel="noopener" class="text-gray-600 hover:text-primary dark:text-gray-400">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                        @endif
                        @if($contact->twitter_url)
                            <a href="{{ $contact->twitter_url }}" target="_blank" rel="noopener" class="text-gray-600 hover:text-primary dark:text-gray-400">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                        @endif
                        @if($contact->instagram_url)
                            <a href="{{ $contact->instagram_url }}" target="_blank" rel="noopener" class="text-gray-600 hover:text-primary dark:text-gray-400">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                        @endif
                    @endif
                </div>
            </div>
            <div class="mt-8 text-center text-gray-600 dark:text-gray-400">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'Portfolio') }}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Initialize AOS -->
    <script>
        window.addEventListener('load', function() {
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    easing: 'ease-in-out',
                    once: true,
                    offset: 100
                });
            }
        });
    </script>
    
    <!-- Google Translate -->
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'id',
                includedLanguages: 'en,id',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');

            new google.translate.TranslateElement({
                pageLanguage: 'id',
                includedLanguages: 'en,id',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element_mobile');
        }

        // Dark mode functionality
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggle = document.getElementById('theme-toggle');
            
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }

            if (themeToggle) {
                themeToggle.addEventListener('click', function() {
                    const isDark = document.documentElement.classList.toggle('dark');
                    localStorage.theme = isDark ? 'dark' : 'light';
                });
            }

            // Mobile Menu Toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });

                // Close mobile menu when clicking outside
                document.addEventListener('click', (e) => {
                    if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
                        mobileMenu.classList.add('hidden');
                    }
                });
            }
        });
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
</body>
</html>