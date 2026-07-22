<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Training;

class TrainingSeeder extends Seeder
{
    public function run(): void
    {
        $trainings = [
            [
                'name' => 'Coding Camp powered by DBS Foundation',
                'organizer' => 'DBS Foundation & Dicoding Indonesia',
                'category' => 'bootcamp',
                'start_date' => '2024-01-01',
                'end_date' => '2024-06-01',
                'duration' => '6 bulan',
                'location' => 'Online',
                'description' => 'Program intensif Coding Camp yang diselenggarakan oleh DBS Foundation bekerjasama dengan Dicoding Indonesia. Program ini mencakup pelatihan Full Stack Web Development dengan materi terstruktur dan mentor berpengalaman.',
                'topics' => [
                    'Front-End Web Development',
                    'Back-End Development dengan Node.js',
                    'Database Management',
                    'RESTful API Development',
                    'Cloud Computing',
                    'Software Engineering Practices',
                ],
                'featured' => true,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Workshop Bimbingan Karir TI-S1',
                'organizer' => 'Universitas Dian Nuswantoro',
                'category' => 'workshop',
                'start_date' => '2024-03-01',
                'end_date' => '2024-03-02',
                'duration' => '2 hari',
                'location' => 'Semarang, Jawa Tengah',
                'description' => 'Workshop bimbingan karir yang diselenggarakan oleh Universitas Dian Nuswantoro untuk mahasiswa Teknik Informatika S1. Workshop ini memberikan wawasan tentang dunia kerja, persiapan karir, dan pengembangan soft skill.',
                'topics' => [
                    'Persiapan Memasuki Dunia Kerja IT',
                    'Membangun Personal Branding',
                    'CV dan Portfolio yang Efektif',
                    'Tips Interview Kerja di Bidang IT',
                    'Tren Teknologi dan Peluang Karir',
                ],
                'featured' => false,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Belajar Dasar Pemrograman Web',
                'organizer' => 'Dicoding Indonesia',
                'category' => 'online-course',
                'start_date' => '2023-06-01',
                'end_date' => '2023-07-01',
                'duration' => '1 bulan',
                'location' => 'Online',
                'description' => 'Kelas online dari Dicoding Indonesia yang mencakup fundamental pemrograman web mulai dari HTML, CSS, hingga JavaScript. Kelas ini memberikan fondasi yang kuat untuk pengembangan web.',
                'topics' => [
                    'HTML5 Fundamentals',
                    'CSS3 dan Responsive Design',
                    'JavaScript Dasar',
                    'Web Accessibility',
                ],
                'featured' => false,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Belajar Membuat Aplikasi Back-End untuk Pemula',
                'organizer' => 'Dicoding Indonesia',
                'category' => 'online-course',
                'start_date' => '2023-08-01',
                'end_date' => '2023-09-01',
                'duration' => '1 bulan',
                'location' => 'Online',
                'description' => 'Kelas online dari Dicoding Indonesia yang mengajarkan pembuatan aplikasi back-end menggunakan Node.js. Mencakup REST API development, database management, dan best practices back-end development.',
                'topics' => [
                    'Node.js Fundamentals',
                    'Hapi.js Framework',
                    'RESTful API Design',
                    'Database Integration',
                    'Authentication & Authorization',
                ],
                'featured' => false,
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($trainings as $training) {
            Training::create($training);
        }
    }
}
