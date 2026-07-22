<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Education;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        $educations = [
            [
                'institution_name' => 'Universitas Dian Nuswantoro (UDINUS)',
                'degree' => 'S1 (Sarjana)',
                'field_of_study' => 'Teknik Informatika',
                'start_date' => '2022-09-01',
                'end_date' => '2026-09-01',
                'is_current' => true,
                'gpa' => 3.75,
                'gpa_scale' => '4.00',
                'location' => 'Semarang, Jawa Tengah',
                'description' => 'Menempuh pendidikan Sarjana Teknik Informatika di Universitas Dian Nuswantoro Semarang. Fokus pada pengembangan software, web development, dan teknologi informasi. Aktif mengikuti berbagai organisasi dan kegiatan kemahasiswaan.',
                'achievements' => [
                    'IPK 3.75 / 4.00',
                    'Sertifikasi Pengembang Web dari LSP UDINUS (2026)',
                    'Aktif di BEM KM UDINUS - Kementerian Riset dan Teknologi',
                ],
                'activities' => [
                    'BEM KM UDINUS - Eksekutif Muda Kementerian Riset dan Teknologi',
                    'Coding Camp powered by DBS Foundation',
                    'Workshop Bimbingan Karir TI-S1',
                ],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'institution_name' => 'SMK Negeri 3 Jepara',
                'degree' => 'SMK (Sekolah Menengah Kejuruan)',
                'field_of_study' => 'Multimedia',
                'start_date' => '2019-07-01',
                'end_date' => '2022-06-01',
                'is_current' => false,
                'gpa' => null,
                'gpa_scale' => null,
                'location' => 'Jepara, Jawa Tengah',
                'description' => 'Menempuh pendidikan kejuruan di SMK Negeri 3 Jepara dengan jurusan Multimedia. Mempelajari dasar-dasar desain grafis, multimedia, dan teknologi digital. Aktif dalam kegiatan OSIS dan pengembangan diri.',
                'achievements' => [
                    'Desainer Multimedia Muda - LSP Teknologi Digital (2022)',
                    'Aktif di OSIS sebagai Seksi Bidang Keagamaan',
                    'Magang di Mitra Printing (2021)',
                ],
                'activities' => [
                    'OSIS SMK Negeri 3 Jepara - Seksi Bidang Keagamaan',
                    'Magang di Mitra Printing - Graphic Design',
                ],
                'sort_order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($educations as $education) {
            Education::create($education);
        }
    }
}
