<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Portfolio') }}</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('icon/logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icon/logo.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon/logo.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icon/logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('icon/logo.png') }}">
    
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

        /* Google Translate Language Selector Styling */
        .language-toggle {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0.75rem;
            border-radius: 0.75rem;
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(16px);
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }

        .language-toggle:hover {
            border-color: #2563eb;
            box-shadow: 0 4px 12px 0 rgba(37, 99, 235, 0.15), 0 2px 4px 0 rgba(37, 99, 235, 0.1);
            transform: translateY(-1px);
        }

        .dark .language-toggle {
            background-color: rgba(31, 41, 55, 0.95);
            border-color: #4b5563;
        }

        .dark .language-toggle:hover {
            border-color: #3b82f6;
            box-shadow: 0 4px 12px 0 rgba(59, 130, 246, 0.25), 0 2px 4px 0 rgba(59, 130, 246, 0.15);
        }

        .flag-toggle {
            vertical-align: middle;
            font-size: 0;
            padding: 2px;
            background-repeat: no-repeat;
            border-radius: 4px;
            transition: all 0.3s ease-in-out;
            display: inline-block;
            position: relative;
            width: 24px;
            height: 18px;
        }

        .flag-toggle canvas {
            border: 0;
            width: 20px;
            height: 15px;
            border-radius: 2px;
        }

        .flag-toggle:hover {
            transform: scale(1.05);
        }

        .language-text {
            font-size: 0.875rem;
            color: #374151;
            font-weight: 500;
            min-width: 60px;
            text-align: left;
        }

        .dark .language-text {
            color: #e5e7eb;
        }

        /* Language Selector Container */
        .language-selector {
            position: relative;
            display: flex;
            align-items: center;
        }

        /* Enhanced Mobile Styles */
        @media (max-width: 768px) {
            .language-toggle {
                gap: 0.25rem;
                padding: 0.375rem 0.5rem;
            }
            
            .flag-toggle canvas {
                width: 18px;
                height: 13px;
            }
            
            .language-text {
                font-size: 0.8rem;
                min-width: 50px;
            }
        }

        /* Hide Google Translate UI Elements */
        .goog-te-banner-frame,
        .goog-te-gadget img,
        .goog-te-gadget span,
        .goog-te-gadget a,
        .goog-tooltip,
        #goog-gt-tt,
        #google_translate_element2 {
            display: none !important;
        }

        body {
            top: 0 !important;
            position: static !important;
        }

        /* Navbar Translation Adjustment */
        .navbar-translated {
            top: 40px !important;
            transition: top 0.3s ease-in-out;
        }

        .navbar-normal {
            top: 0px !important;
            transition: top 0.3s ease-in-out;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-white dark:bg-dark antialiased">
    <!-- Navbar -->
    <nav class="fixed w-full bg-white bg-opacity-70 backdrop-blur-md dark:bg-dark dark:bg-opacity-70 z-50 transition-all duration-300" id="main-navbar">
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
                    <div class="relative language-selector">
                        <div class="language-toggle" id="language-toggle">
                            <span class="flag-toggle" id="flag-display">
                                <canvas id="flagCanvas" width="20" height="15"></canvas>
                            </span>
                            <span class="language-text" id="language-text">Indonesia</span>
                        </div>
                        <div id="google_translate_element2"></div>
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
                    <div class="language-selector py-2">
                        <div class="language-toggle" id="language-toggle-mobile">
                            <span class="flag-toggle" id="flag-display-mobile">
                                <canvas id="flagCanvasMobile" width="18" height="13"></canvas>
                            </span>
                            <span class="language-text" id="language-text-mobile">Indonesia</span>
                        </div>
                        <div id="google_translate_element_mobile2"></div>
                    </div>
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
        // Language state
        let currentLanguage = 'id'; // Default to Indonesian display
        let isTranslated = false; // Track if translation is active
        
        function googleTranslateElementInit2() {
            new google.translate.TranslateElement({
                pageLanguage: 'id',
                autoDisplay: false
            }, 'google_translate_element2');
            
            new google.translate.TranslateElement({
                pageLanguage: 'id',
                autoDisplay: false
            }, 'google_translate_element_mobile2');
        }

        function toggleLanguage() {
            if (currentLanguage === 'id') {
                // Switch to English (activate translation)
                doGTranslate('id|en');
                updateLanguageDisplay('en');
                currentLanguage = 'en';
                isTranslated = true;
                adjustNavbarPosition(true);
            } else {
                // Switch back to Indonesian (deactivate translation)
                doGTranslate('en|id');
                updateLanguageDisplay('id');
                currentLanguage = 'id';
                isTranslated = false;
                adjustNavbarPosition(false);
            }
        }

        function adjustNavbarPosition(isTranslated) {
            const navbar = document.getElementById('main-navbar');
            if (navbar) {
                if (isTranslated) {
                    navbar.classList.add('navbar-translated');
                    navbar.classList.remove('navbar-normal');
                    document.querySelector('main').style.paddingTop = '6rem';
                } else {
                    navbar.classList.add('navbar-normal');
                    navbar.classList.remove('navbar-translated');
                    document.querySelector('main').style.paddingTop = '5rem';
                }
            }
        }

        function updateLanguageDisplay(lang) {
            if (lang === 'id') {
                drawIndonesianFlag('flagCanvas');
                drawIndonesianFlag('flagCanvasMobile');
                document.getElementById('language-text').textContent = 'Indonesia';
                document.getElementById('language-text-mobile').textContent = 'Indonesia';
            } else {
                drawEnglishFlag('flagCanvas');
                drawEnglishFlag('flagCanvasMobile');
                document.getElementById('language-text').textContent = 'English';
                document.getElementById('language-text-mobile').textContent = 'English';
            }
        }

        function drawIndonesianFlag(canvasId) {
            const canvas = document.getElementById(canvasId);
            if (!canvas) return;
            
            const ctx = canvas.getContext('2d');
            const width = canvas.width;
            const height = canvas.height;

            ctx.clearRect(0, 0, width, height);

            // Merah di atas
            ctx.fillStyle = '#FF0000';
            ctx.fillRect(0, 0, width, height / 2);

            // Putih di bawah
            ctx.fillStyle = '#FFFFFF';
            ctx.fillRect(0, height / 2, width, height / 2);

            // Border
            ctx.strokeStyle = '#cccccc';
            ctx.lineWidth = 0.5;
            ctx.strokeRect(0, 0, width, height);
        }

        function drawEnglishFlag(canvasId) {
            const canvas = document.getElementById(canvasId);
            if (!canvas) return;
            
            const ctx = canvas.getContext('2d');
            const width = canvas.width;
            const height = canvas.height;

            ctx.clearRect(0, 0, width, height);

            // Background biru
            ctx.fillStyle = '#012169';
            ctx.fillRect(0, 0, width, height);

            // Garis putih diagonal
            ctx.strokeStyle = '#FFFFFF';
            ctx.lineWidth = width * 0.1;
            ctx.beginPath();
            ctx.moveTo(0, 0);
            ctx.lineTo(width, height);
            ctx.moveTo(width, 0);
            ctx.lineTo(0, height);
            ctx.stroke();

            // Garis merah diagonal
            ctx.strokeStyle = '#C8102E';
            ctx.lineWidth = width * 0.06;
            ctx.beginPath();
            ctx.moveTo(0, 0);
            ctx.lineTo(width, height);
            ctx.moveTo(width, 0);
            ctx.lineTo(0, height);
            ctx.stroke();

            // Garis putih horizontal dan vertikal
            ctx.strokeStyle = '#FFFFFF';
            ctx.lineWidth = height * 0.2;
            ctx.beginPath();
            ctx.moveTo(0, height / 2);
            ctx.lineTo(width, height / 2);
            ctx.stroke();

            ctx.lineWidth = width * 0.12;
            ctx.beginPath();
            ctx.moveTo(width / 2, 0);
            ctx.lineTo(width / 2, height);
            ctx.stroke();

            // Garis merah horizontal dan vertikal
            ctx.strokeStyle = '#C8102E';
            ctx.lineWidth = height * 0.12;
            ctx.beginPath();
            ctx.moveTo(0, height / 2);
            ctx.lineTo(width, height / 2);
            ctx.stroke();

            ctx.lineWidth = width * 0.07;
            ctx.beginPath();
            ctx.moveTo(width / 2, 0);
            ctx.lineTo(width / 2, height);
            ctx.stroke();

            // Border
            ctx.strokeStyle = '#cccccc';
            ctx.lineWidth = 0.5;
            ctx.strokeRect(0, 0, width, height);
        }

        function doGTranslate(lang_pair) {
            if (lang_pair.value) lang_pair = lang_pair.value;
            if (lang_pair == '') return;
            
            var lang = lang_pair.split('|')[1];
            var teCombo;
            var sel = document.getElementsByTagName('select');
            
            for (var i = 0; i < sel.length; i++) {
                if (/goog-te-combo/.test(sel[i].className)) {
                    teCombo = sel[i];
                    break;
                }
            }
            
            if (document.getElementById('google_translate_element2') == null || 
                document.getElementById('google_translate_element2').innerHTML.length == 0 || 
                !teCombo || teCombo.length == 0 || teCombo.innerHTML.length == 0) {
                setTimeout(function () {
                    doGTranslate(lang_pair)
                }, 500);
            } else {
                teCombo.value = lang;
                GTranslateFireEvent(teCombo, 'change');
                GTranslateFireEvent(teCombo, 'change');
                
                setTimeout(function() {
                    checkGoogleTranslateBanner();
                }, 1000);
            }
        }

        function checkGoogleTranslateBanner() {
            if (currentLanguage === 'en' && isTranslated) {
                adjustNavbarPosition(true);
            } else {
                adjustNavbarPosition(false);
            }
            
            setTimeout(checkGoogleTranslateBanner, 1000);
        }

        function GTranslateFireEvent(element, event) {
            try {
                if (document.createEvent) {
                    var evt = document.createEvent('HTMLEvents');
                    evt.initEvent(event, true, true);
                    element.dispatchEvent(evt);
                } else {
                    var evt = document.createEventObject();
                    element.fireEvent('on' + event, evt);
                }
            } catch (e) {}
        }

        // Dark mode and initialization
        document.addEventListener('DOMContentLoaded', function() {
            // Dark mode functionality
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

            // Initialize Indonesian flags
            setTimeout(function() {
                drawIndonesianFlag('flagCanvas');
                drawIndonesianFlag('flagCanvasMobile');
            }, 100);

            // Language toggle event listeners
            const languageToggle = document.getElementById('language-toggle');
            const languageToggleMobile = document.getElementById('language-toggle-mobile');
            if (languageToggle) languageToggle.addEventListener('click', toggleLanguage);
            if (languageToggleMobile) languageToggleMobile.addEventListener('click', toggleLanguage);

            // Start monitoring Google Translate
            setTimeout(checkGoogleTranslateBanner, 2000);

            // Mobile menu functionality
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
                document.addEventListener('click', (e) => {
                    if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
                        mobileMenu.classList.add('hidden');
                    }
                });
            }
        });
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
</body>
</html>