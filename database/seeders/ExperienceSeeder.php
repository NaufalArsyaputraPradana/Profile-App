<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            [
                'company_name' => 'Firstudio',
                'company_website' => null,
                'company_description' => 'Firstudio adalah perusahaan yang bergerak di bidang teknologi dan pengembangan digital, menyediakan solusi web development untuk berbagai klien bisnis.',
                'position' => 'Full Stack Web Developer Intern',
                'type' => 'internship',
                'location' => 'Indonesia',
                'start_date' => '2025-02-01',
                'end_date' => '2025-09-01',
                'is_current' => false,
                'description' => 'Melaksanakan magang sebagai Full Stack Web Developer selama 8 bulan, terlibat langsung dalam pengembangan aplikasi web skala produksi menggunakan teknologi modern.',
                'responsibilities' => [
                    'Mengembangkan fitur frontend dan backend aplikasi web',
                    'Membangun dan memelihara REST API',
                    'Berkolaborasi dengan tim dalam siklus pengembangan software',
                    'Melakukan code review dan debugging',
                    'Mengimplementasikan autentikasi dan sistem keamanan',
                    'Mengelola database MySQL dan query optimization',
                    'Mengembangkan CMS dan Dashboard Admin',
                ],
                'achievements' => [
                    'Berhasil menyelesaikan proyek pengembangan sistem manajemen konten (CMS)',
                    'Berkontribusi dalam pengembangan dashboard admin yang kompleks',
                    'Menyelesaikan proyek authentication system yang aman dan scalable',
                    'Mendapatkan pengalaman 8 bulan dalam lingkungan kerja profesional',
                ],
                'technologies' => ['Laravel', 'PHP', 'JavaScript', 'React', 'Next.js', 'Express.js', 'MySQL', 'REST API', 'Git', 'Bootstrap', 'Tailwind CSS'],
                'projects_done' => [
                    'Content Management System (CMS)',
                    'Dashboard Admin',
                    'Authentication System',
                    'REST API Development',
                ],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'company_name' => 'Mitra Printing',
                'company_website' => null,
                'company_description' => 'Mitra Printing adalah perusahaan yang bergerak di bidang percetakan dan desain grafis, melayani berbagai kebutuhan desain dan cetak untuk klien lokal.',
                'position' => 'Graphic Design Intern',
                'type' => 'internship',
                'location' => 'Jepara, Jawa Tengah',
                'start_date' => '2021-07-01',
                'end_date' => '2021-09-01',
                'is_current' => false,
                'description' => 'Melaksanakan magang sebagai Graphic Designer, belajar dan mempraktikkan keterampilan desain grafis dalam lingkungan profesional.',
                'responsibilities' => [
                    'Membuat desain grafis untuk berbagai keperluan percetakan',
                    'Mendesain banner, flyer, dan materi promosi',
                    'Menggunakan software desain Adobe Photoshop dan CorelDRAW',
                    'Berkolaborasi dengan tim dalam proyek desain',
                    'Mempersiapkan file desain untuk proses cetak',
                ],
                'achievements' => [
                    'Menyelesaikan berbagai proyek desain grafis secara mandiri',
                    'Mengembangkan kemampuan desain menggunakan Adobe Photoshop',
                    'Mendapatkan pengalaman praktis di bidang desain dan percetakan',
                ],
                'technologies' => ['Adobe Photoshop', 'CorelDRAW', 'Adobe Illustrator', 'Canva'],
                'projects_done' => [
                    'Desain Banner dan Flyer',
                    'Materi Promosi Percetakan',
                    'Layout Desain untuk Cetak',
                ],
                'sort_order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($experiences as $exp) {
            Experience::create($exp);
        }
    }
}
