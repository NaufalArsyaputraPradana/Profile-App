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
            'title' => 'Halo! Saya Naufal Arsyaputra Pradana',
            'subtitle' => 'Full Stack Web Developer | Laravel · React · Next.js | Fresh Graduate UDINUS',
            'button_text' => 'Lihat Portfolio',
            'button_link' => '/projects',
            'is_active' => true
        ]);

        // Create About Section
        AboutSection::create([
            'name' => 'Naufal Arsyaputra Pradana',
            'description' => 'Fresh Graduate Full Stack Web Developer dengan pengalaman magang 8 bulan sebagai Web Developer di Firstudio. Memiliki passion dalam membangun aplikasi web modern yang fungsional, scalable, dan user-friendly.

Berpengalaman membangun aplikasi web menggunakan Laravel, PHP, JavaScript, React, Next.js, Express.js, dan MySQL. Telah mengerjakan berbagai proyek mulai dari CMS, Dashboard Admin, Authentication System, hingga aplikasi skala produksi.

Saat ini sedang menempuh S1 Teknik Informatika di Universitas Dian Nuswantoro (UDINUS) dengan IPK 3.75, dan aktif mengembangkan portfolio serta kemampuan teknis di bidang full stack web development.',
            'age' => 21,
            'email' => 'arsyapradana546@gmail.com',
            'phone' => '082223199601',
            'address' => 'Jepara, Jawa Tengah, Indonesia',
            'is_active' => true,
            'cv_kreatif' => 'cv/kreatif.pdf',
            'cv_ats' => 'cv/ats.pdf',
        ]);

        // Create Contact Section
        ContactSection::create([
            'title' => 'Mari Berkolaborasi!',
            'description' => 'Saya selalu terbuka untuk diskusi tentang proyek baru, peluang kerja sama, atau sekadar berbagi ide tentang teknologi. Jangan ragu untuk menghubungi saya.',
            'email' => 'arsyapradana546@gmail.com',
            'phone' => '082223199601',
            'address' => 'Jepara, Jawa Tengah, Indonesia',
            'github_url' => 'https://github.com/NaufalArsyaputraPradana',
            'linkedin_url' => 'https://www.linkedin.com/in/naufalarsyaputrapradana',
            'twitter_url' => null,
            'instagram_url' => null,
            'is_active' => true
        ]);

        // Create Skills
        $skills = [
            // Frontend Skills
            ['name' => 'HTML5/CSS3', 'percentage' => 92, 'category' => 'frontend', 'icon' => 'fab fa-html5'],
            ['name' => 'JavaScript', 'percentage' => 85, 'category' => 'frontend', 'icon' => 'fab fa-js'],
            ['name' => 'React.js', 'percentage' => 80, 'category' => 'frontend', 'icon' => 'fab fa-react'],
            ['name' => 'Next.js', 'percentage' => 75, 'category' => 'frontend', 'icon' => 'fab fa-react'],
            ['name' => 'Bootstrap', 'percentage' => 88, 'category' => 'frontend', 'icon' => 'fab fa-bootstrap'],
            ['name' => 'Tailwind CSS', 'percentage' => 85, 'category' => 'frontend', 'icon' => 'fab fa-css3'],

            // Backend Skills
            ['name' => 'PHP', 'percentage' => 88, 'category' => 'backend', 'icon' => 'fab fa-php'],
            ['name' => 'Laravel', 'percentage' => 90, 'category' => 'backend', 'icon' => 'fab fa-laravel'],
            ['name' => 'Node.js / Express.js', 'percentage' => 75, 'category' => 'backend', 'icon' => 'fab fa-node-js'],
            ['name' => 'REST API', 'percentage' => 85, 'category' => 'backend', 'icon' => 'fas fa-code'],
            ['name' => 'MySQL', 'percentage' => 82, 'category' => 'backend', 'icon' => 'fas fa-database'],

            // Tools
            ['name' => 'Git & GitHub', 'percentage' => 85, 'category' => 'tools', 'icon' => 'fab fa-github'],
            ['name' => 'VS Code', 'percentage' => 90, 'category' => 'tools', 'icon' => 'fas fa-code'],
            ['name' => 'Postman', 'percentage' => 80, 'category' => 'tools', 'icon' => 'fas fa-tools'],

            // Design Skills
            ['name' => 'Figma', 'percentage' => 75, 'category' => 'design', 'icon' => 'fab fa-figma'],
            ['name' => 'UI Design', 'percentage' => 70, 'category' => 'design', 'icon' => 'fas fa-pencil-ruler'],
            ['name' => 'Canva', 'percentage' => 80, 'category' => 'design', 'icon' => 'fas fa-paint-brush'],
            ['name' => 'Adobe Photoshop', 'percentage' => 65, 'category' => 'design', 'icon' => 'fas fa-image'],

            // Soft Skills
            ['name' => 'Problem Solving', 'percentage' => 88, 'category' => 'soft', 'icon' => 'fas fa-lightbulb'],
            ['name' => 'Teamwork', 'percentage' => 90, 'category' => 'soft', 'icon' => 'fas fa-users'],
            ['name' => 'Communication', 'percentage' => 82, 'category' => 'soft', 'icon' => 'fas fa-comments'],
            ['name' => 'Fast Learner', 'percentage' => 92, 'category' => 'soft', 'icon' => 'fas fa-bolt'],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // Create Portfolio Projects (real data)
        $projects = [
            [
                'title' => 'Bisa Furniture',
                'slug' => 'bisa-furniture',
                'description' => 'Website e-commerce furniture modern dengan tampilan yang elegan dan profesional. Platform ini memungkinkan pelanggan untuk menjelajahi koleksi furniture, melihat detail produk, dan melakukan pembelian secara online.

Dibangun sebagai proyek freelance/portfolio dengan menggunakan teknologi modern dan fokus pada user experience yang optimal.',
                'role' => 'Full Stack Web Developer',
                'category' => 'E-Commerce',
                'technologies' => ['PHP', 'Laravel', 'MySQL', 'Bootstrap', 'JavaScript'],
                'features' => [
                    'Katalog produk furniture lengkap',
                    'Sistem keranjang belanja',
                    'Tampilan responsif dan modern',
                    'Admin panel untuk manajemen produk',
                    'Pencarian dan filter produk',
                ],
                'demo_url' => 'https://bisafurniture.com',
                'github_url' => null,
                'status' => 'active',
                'year' => 2024,
                'featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'SaaS Project Management',
                'slug' => 'saas-project-management',
                'description' => 'Aplikasi SaaS (Software as a Service) untuk manajemen proyek tim. Platform modern yang memungkinkan tim untuk berkolaborasi, melacak progress, dan mengelola tugas secara efisien.

Dibangun dengan Next.js dan teknologi modern dengan fokus pada performa dan skalabilitas.',
                'role' => 'Full Stack Developer',
                'category' => 'SaaS / Web App',
                'technologies' => ['Next.js', 'React', 'TypeScript', 'Tailwind CSS', 'Node.js'],
                'features' => [
                    'Dashboard manajemen proyek',
                    'Sistem task tracking',
                    'Kolaborasi tim real-time',
                    'Statistik dan reporting',
                    'Autentikasi pengguna',
                ],
                'demo_url' => 'https://saas-project-management.vercel.app',
                'github_url' => null,
                'status' => 'active',
                'year' => 2024,
                'featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Blog CMS',
                'slug' => 'blog-cms',
                'description' => 'Content Management System (CMS) untuk blog modern dengan fitur lengkap. Platform ini memungkinkan pengguna untuk membuat, mengedit, dan mempublikasikan konten blog dengan mudah melalui antarmuka yang intuitif.

Dikembangkan dengan fokus pada kemudahan penggunaan dan performa tinggi.',
                'role' => 'Full Stack Developer',
                'category' => 'CMS / Web App',
                'technologies' => ['React', 'Node.js', 'Express.js', 'MySQL', 'Tailwind CSS'],
                'features' => [
                    'Editor konten WYSIWYG',
                    'Manajemen artikel dan kategori',
                    'Sistem autentikasi dan autorisasi',
                    'Dashboard admin lengkap',
                    'SEO-friendly URL',
                    'Komentar dan interaksi pembaca',
                ],
                'demo_url' => 'https://blog-cms-red.vercel.app',
                'github_url' => null,
                'status' => 'active',
                'year' => 2024,
                'featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Finance Tracker',
                'slug' => 'finance-tracker',
                'description' => 'Aplikasi pelacak keuangan pribadi yang membantu pengguna memantau pengeluaran, pemasukan, dan anggaran mereka. Dengan visualisasi data yang menarik, pengguna dapat memahami pola keuangan mereka dengan mudah.

Dibangun sebagai full stack web application dengan fitur analitik keuangan yang komprehensif.',
                'role' => 'Full Stack Developer',
                'category' => 'Financial / Web App',
                'technologies' => ['React', 'Node.js', 'Express.js', 'MySQL', 'Chart.js'],
                'features' => [
                    'Pelacakan pemasukan dan pengeluaran',
                    'Visualisasi data dengan grafik interaktif',
                    'Manajemen anggaran bulanan',
                    'Laporan keuangan',
                    'Kategori transaksi kustom',
                    'Export data ke CSV',
                ],
                'demo_url' => 'https://finance-tracker-lake-omega.vercel.app',
                'github_url' => null,
                'status' => 'active',
                'year' => 2024,
                'featured' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}