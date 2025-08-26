<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
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
                }
            }
        }
    </script>
    
    <style type="text/css">
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero-bg {
            background: linear-gradient(rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.9)), url('https://images.unsplash.com/photo-1519681393784-d120267933ba') center/cover no-repeat;
        }
    </style>
</head>
<body class="bg-white dark:bg-dark">
    <!-- Navbar -->
    <nav class="fixed w-full bg-white bg-opacity-70 backdrop-blur-md dark:bg-dark dark:bg-opacity-70 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="text-2xl font-bold text-primary">Portfolio.</div>
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="text-gray-600 hover:text-primary dark:text-gray-300">Beranda</a>
                    <a href="#about" class="text-gray-600 hover:text-primary dark:text-gray-300">Tentang</a>
                    <a href="#skills" class="text-gray-600 hover:text-primary dark:text-gray-300">Keahlian</a>
                    <a href="#projects" class="text-gray-600 hover:text-primary dark:text-gray-300">Proyek</a>
                    <a href="#contact" class="text-gray-600 hover:text-primary dark:text-gray-300">Kontak</a>
                </div>
                <button id="theme-toggle" class="p-2 rounded-lg bg-gray-100 dark:bg-gray-800">
                    <i class="fas fa-moon dark:hidden"></i>
                    <i class="fas fa-sun hidden dark:block text-yellow-500"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-bg min-h-screen flex items-center">
        <div class="container mx-auto px-6 py-24" data-aos="fade-up">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                    Selamat Datang di Portfolio Saya
                </h1>
                <p class="text-xl text-gray-300 mb-12">
                    Web Developer | UI/UX Designer | Creative Thinker
                </p>
                <a href="#contact" class="bg-primary hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full transition duration-300">
                    Hubungi Saya
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-dark dark:text-white mb-4">Tentang Saya</h2>
                <div class="w-24 h-1 bg-primary mx-auto"></div>
            </div>
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="relative" data-aos="fade-right">
                    <img src="https://images.unsplash.com/photo-1507238691740-187a5b1d37b8" 
                         alt="Profile" 
                         class="rounded-lg shadow-xl w-full">
                    <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-primary rounded-lg -z-10"></div>
                </div>
                <div data-aos="fade-left">
                    <h3 class="text-2xl font-semibold text-dark dark:text-white mb-4">
                        Halo! Saya [Nama Anda]
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Seorang web developer passionate dengan pengalaman lebih dari 3 tahun dalam mengembangkan 
                        aplikasi web modern. Saya fokus pada pembuatan solusi digital yang inovatif dan user-friendly.
                    </p>
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div>
                            <p class="text-gray-600 dark:text-gray-300"><strong>Nama:</strong> [Nama Lengkap]</p>
                            <p class="text-gray-600 dark:text-gray-300"><strong>Usia:</strong> [Usia] Tahun</p>
                        </div>
                        <div>
                            <p class="text-gray-600 dark:text-gray-300"><strong>Email:</strong> [Email]</p>
                            <p class="text-gray-600 dark:text-gray-300"><strong>Lokasi:</strong> [Kota, Negara]</p>
                        </div>
                    </div>
                    <a href="#" class="bg-primary hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full transition duration-300">
                        Download CV
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 bg-white dark:bg-dark">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-dark dark:text-white mb-4">Keahlian</h2>
                <div class="w-24 h-1 bg-primary mx-auto"></div>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Frontend -->
                <div class="bg-gray-50 dark:bg-gray-800 p-8 rounded-lg shadow-lg" data-aos="fade-up">
                    <div class="text-primary text-4xl mb-4">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-dark dark:text-white mb-4">Frontend Development</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-600 dark:text-gray-300">HTML/CSS</span>
                                <span class="text-gray-600 dark:text-gray-300">90%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-primary h-2 rounded-full" style="width: 90%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-600 dark:text-gray-300">JavaScript</span>
                                <span class="text-gray-600 dark:text-gray-300">85%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-primary h-2 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-600 dark:text-gray-300">React</span>
                                <span class="text-gray-600 dark:text-gray-300">80%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-primary h-2 rounded-full" style="width: 80%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Backend -->
                <div class="bg-gray-50 dark:bg-gray-800 p-8 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-primary text-4xl mb-4">
                        <i class="fas fa-server"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-dark dark:text-white mb-4">Backend Development</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-600 dark:text-gray-300">PHP/Laravel</span>
                                <span class="text-gray-600 dark:text-gray-300">85%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-primary h-2 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-600 dark:text-gray-300">MySQL</span>
                                <span class="text-gray-600 dark:text-gray-300">80%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-primary h-2 rounded-full" style="width: 80%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-600 dark:text-gray-300">API Development</span>
                                <span class="text-gray-600 dark:text-gray-300">75%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-primary h-2 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Design -->
                <div class="bg-gray-50 dark:bg-gray-800 p-8 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-primary text-4xl mb-4">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-dark dark:text-white mb-4">Design</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-600 dark:text-gray-300">UI/UX Design</span>
                                <span class="text-gray-600 dark:text-gray-300">85%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-primary h-2 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-600 dark:text-gray-300">Figma</span>
                                <span class="text-gray-600 dark:text-gray-300">80%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-primary h-2 rounded-full" style="width: 80%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-600 dark:text-gray-300">Adobe XD</span>
                                <span class="text-gray-600 dark:text-gray-300">75%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-primary h-2 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-20 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-dark dark:text-white mb-4">Proyek Terbaru</h2>
                <div class="w-24 h-1 bg-primary mx-auto"></div>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Project 1 -->
                <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg" data-aos="fade-up">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f" 
                         alt="Project 1" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-dark dark:text-white mb-2">E-Commerce Website</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                            Website e-commerce modern dengan fitur keranjang belanja, pembayaran, dan admin dashboard.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">Laravel</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">Vue.js</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">MySQL</span>
                        </div>
                        <a href="#" class="text-primary hover:text-blue-700 font-semibold">Lihat Detail →</a>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="100">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40" 
                         alt="Project 2" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-dark dark:text-white mb-2">Task Management App</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                            Aplikasi manajemen tugas dengan fitur kolaborasi tim dan tracking waktu.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">React</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">Node.js</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">MongoDB</span>
                        </div>
                        <a href="#" class="text-primary hover:text-blue-700 font-semibold">Lihat Detail →</a>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085" 
                         alt="Project 3" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-dark dark:text-white mb-2">Portfolio Website</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                            Website portfolio responsif dengan animasi smooth dan dark mode.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">HTML5</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">TailwindCSS</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">JavaScript</span>
                        </div>
                        <a href="#" class="text-primary hover:text-blue-700 font-semibold">Lihat Detail →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white dark:bg-dark">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-dark dark:text-white mb-4">Hubungi Saya</h2>
                <div class="w-24 h-1 bg-primary mx-auto"></div>
            </div>
            <div class="grid md:grid-cols-2 gap-12">
                <div data-aos="fade-right">
                    <h3 class="text-2xl font-semibold text-dark dark:text-white mb-6">Mari Berkolaborasi!</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-8">
                        Tertarik untuk bekerja sama? Jangan ragu untuk menghubungi saya melalui form di samping 
                        atau media sosial di bawah ini.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-primary w-8"></i>
                            <span class="text-gray-600 dark:text-gray-300">email@example.com</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-primary w-8"></i>
                            <span class="text-gray-600 dark:text-gray-300">+62 123 4567 890</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt text-primary w-8"></i>
                            <span class="text-gray-600 dark:text-gray-300">Jakarta, Indonesia</span>
                        </div>
                    </div>
                    <div class="flex space-x-4 mt-8">
                        <a href="#" class="text-gray-600 hover:text-primary dark:text-gray-300 text-2xl">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-primary dark:text-gray-300 text-2xl">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-primary dark:text-gray-300 text-2xl">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-primary dark:text-gray-300 text-2xl">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div data-aos="fade-left">
                    <form class="space-y-6">
                        <div>
                            <label class="block text-gray-600 dark:text-gray-300 mb-2">Nama Lengkap</label>
                            <input type="text" 
                                   class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:outline-none focus:border-primary"
                                   placeholder="Masukkan nama lengkap">
                        </div>
                        <div>
                            <label class="block text-gray-600 dark:text-gray-300 mb-2">Email</label>
                            <input type="email" 
                                   class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:outline-none focus:border-primary"
                                   placeholder="Masukkan email">
                        </div>
                        <div>
                            <label class="block text-gray-600 dark:text-gray-300 mb-2">Pesan</label>
                            <textarea class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:outline-none focus:border-primary h-32"
                                      placeholder="Tulis pesan Anda"></textarea>
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

    <!-- Footer -->
    <footer class="bg-gray-50 dark:bg-gray-900 py-8">
        <div class="container mx-auto px-6">
            <div class="text-center">
                <p class="text-gray-600 dark:text-gray-300">
                    © 2024 Portfolio. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
        });

        // Dark mode toggle
        const themeToggle = document.getElementById('theme-toggle');
        
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        themeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            localStorage.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
