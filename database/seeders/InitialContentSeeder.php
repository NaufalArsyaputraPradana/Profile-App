<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\ContactSection;
use App\Models\Skill;
use App\Models\Project;

class InitialContentSeeder extends Seeder
{
    public function run(): void
    {
        // Create Hero Section
        HeroSection::create([
            'title' => 'Halo! Saya John Doe',
            'subtitle' => 'Full Stack Developer | UI/UX Designer | Tech Enthusiast',
            'button_text' => 'Lihat Portfolio',
            'button_link' => '#projects',
            'is_active' => true
        ]);

        // Create About Section
        AboutSection::create([
            'name' => 'John Doe',
            'description' => 'Saya adalah seorang Full Stack Developer dengan pengalaman lebih dari 5 tahun dalam pengembangan web. Saya memiliki passion dalam menciptakan solusi digital yang inovatif dan user-friendly. Dengan latar belakang yang kuat dalam pengembangan frontend dan backend, saya telah berhasil menyelesaikan berbagai proyek yang menantang untuk klien dari berbagai industri.

Keahlian saya mencakup pengembangan aplikasi web modern menggunakan teknologi terkini seperti Laravel, React, Vue.js, dan Node.js. Saya juga memiliki pemahaman mendalam tentang prinsip-prinsip desain UI/UX dan selalu mengutamakan pengalaman pengguna dalam setiap proyek yang saya kerjakan.

Saya percaya bahwa pembelajaran berkelanjutan adalah kunci untuk tetap relevan dalam industri teknologi yang terus berkembang. Oleh karena itu, saya selalu berusaha untuk mengikuti tren terbaru dan mengembangkan keterampilan baru.',
            'age' => 28,
            'email' => 'john.doe@example.com',
            'phone' => '+62 812 3456 7890',
            'address' => 'Jakarta, Indonesia',
            'is_active' => true
        ]);

        // Create Contact Section
        ContactSection::create([
            'title' => 'Mari Berkolaborasi!',
            'description' => 'Saya selalu terbuka untuk diskusi tentang proyek baru, peluang kerja sama, atau sekadar berbagi ide tentang teknologi. Jangan ragu untuk menghubungi saya melalui salah satu channel di bawah ini.',
            'email' => 'contact@johndoe.com',
            'phone' => '+62 812 3456 7890',
            'address' => 'Jakarta, Indonesia',
            'github_url' => 'https://github.com/johndoe',
            'linkedin_url' => 'https://linkedin.com/in/johndoe',
            'twitter_url' => 'https://twitter.com/johndoe',
            'instagram_url' => 'https://instagram.com/johndoe',
            'is_active' => true
        ]);

        // Create Skills
        $skills = [
            // Frontend Skills
            [
                'name' => 'HTML5/CSS3',
                'percentage' => 95,
                'category' => 'frontend',
                'icon' => 'fab fa-html5'
            ],
            [
                'name' => 'JavaScript',
                'percentage' => 90,
                'category' => 'frontend',
                'icon' => 'fab fa-js'
            ],
            [
                'name' => 'React.js',
                'percentage' => 85,
                'category' => 'frontend',
                'icon' => 'fab fa-react'
            ],
            [
                'name' => 'Vue.js',
                'percentage' => 80,
                'category' => 'frontend',
                'icon' => 'fab fa-vuejs'
            ],
            [
                'name' => 'Tailwind CSS',
                'percentage' => 90,
                'category' => 'frontend',
                'icon' => 'fab fa-css3'
            ],

            // Backend Skills
            [
                'name' => 'PHP/Laravel',
                'percentage' => 92,
                'category' => 'backend',
                'icon' => 'fab fa-php'
            ],
            [
                'name' => 'Node.js',
                'percentage' => 85,
                'category' => 'backend',
                'icon' => 'fab fa-node-js'
            ],
            [
                'name' => 'MySQL',
                'percentage' => 88,
                'category' => 'backend',
                'icon' => 'fas fa-database'
            ],
            [
                'name' => 'RESTful APIs',
                'percentage' => 90,
                'category' => 'backend',
                'icon' => 'fas fa-code'
            ],
            [
                'name' => 'Docker',
                'percentage' => 75,
                'category' => 'backend',
                'icon' => 'fab fa-docker'
            ],

            // Design Skills
            [
                'name' => 'UI Design',
                'percentage' => 88,
                'category' => 'design',
                'icon' => 'fas fa-pencil-ruler'
            ],
            [
                'name' => 'UX Design',
                'percentage' => 85,
                'category' => 'design',
                'icon' => 'fas fa-user-check'
            ],
            [
                'name' => 'Figma',
                'percentage' => 90,
                'category' => 'design',
                'icon' => 'fab fa-figma'
            ],
            [
                'name' => 'Adobe XD',
                'percentage' => 82,
                'category' => 'design',
                'icon' => 'fas fa-pen-nib'
            ],
            [
                'name' => 'Responsive Design',
                'percentage' => 95,
                'category' => 'design',
                'icon' => 'fas fa-mobile-alt'
            ],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // Create Sample Projects
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'description' => 'Platform e-commerce modern dengan fitur lengkap termasuk manajemen produk, keranjang belanja, sistem pembayaran terintegrasi, dan dashboard admin. Dibangun menggunakan Laravel, Vue.js, dan MySQL dengan fokus pada performa dan pengalaman pengguna.

Fitur Utama:
- Sistem autentikasi dan autorisasi multi-level
- Manajemen produk dengan kategori dan varian
- Keranjang belanja real-time
- Integrasi payment gateway
- Dashboard admin yang komprehensif
- Sistem notifikasi email dan real-time
- Analytics dan reporting',
                'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Redis', 'Tailwind CSS'],
                'url' => 'https://ecommerce-example.com'
            ],
            [
                'title' => 'Task Management System',
                'description' => 'Aplikasi manajemen tugas yang memungkinkan tim untuk berkolaborasi secara efektif. Dilengkapi dengan fitur drag-and-drop, pelacakan waktu, dan integrasi dengan berbagai layanan pihak ketiga.

Fitur Utama:
- Kanban board dengan drag-and-drop
- Time tracking dan reporting
- Kolaborasi tim real-time
- File sharing dan komentar
- Integrasi dengan Slack dan GitHub
- Mobile responsive design',
                'technologies' => ['React.js', 'Node.js', 'MongoDB', 'Socket.io', 'AWS'],
                'url' => 'https://taskmanager-example.com'
            ],
            [
                'title' => 'Learning Management System',
                'description' => 'Platform pembelajaran online yang memungkinkan instruktur untuk membuat dan mengelola kursus, serta siswa untuk mengakses materi pembelajaran dengan mudah. Sistem ini mendukung berbagai format konten dan dilengkapi dengan fitur penilaian otomatis.

Fitur Utama:
- Manajemen kursus dan materi
- Video streaming terintegrasi
- Quiz dan assessment otomatis
- Forum diskusi
- Progress tracking
- Sertifikat digital
- Analytics pembelajaran',
                'technologies' => ['Laravel', 'React.js', 'PostgreSQL', 'AWS S3', 'Docker'],
                'url' => 'https://lms-example.com'
            ],
            [
                'title' => 'Real Estate Portal',
                'description' => 'Portal properti yang menghubungkan penjual, pembeli, dan agen real estate. Dilengkapi dengan fitur pencarian properti yang canggih, virtual tour, dan sistem CRM untuk agen.

Fitur Utama:
- Pencarian properti dengan filter advanced
- Virtual tour 360°
- Sistem booking dan appointment
- CRM untuk agen
- Integrasi Google Maps
- Analytics dan reporting properti',
                'technologies' => ['Next.js', 'Node.js', 'MongoDB', 'Google Maps API', 'Stripe'],
                'url' => 'https://realestate-example.com'
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}