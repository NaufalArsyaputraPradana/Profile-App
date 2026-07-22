<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Certificate;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        $certificates = [
            [
                'name' => 'Sertifikat Coding Camp - DBS Foundation',
                'category' => 'training',
                'issuer' => 'DBS Foundation & Dicoding Indonesia',
                'date' => '2024-06-01',
                'certificate_number' => null,
                'expired_date' => null,
                'no_expiry' => true,
                'description' => 'Sertifikat penyelesaian program Coding Camp yang diselenggarakan oleh DBS Foundation bekerjasama dengan Dicoding Indonesia.',
                'featured' => true,
                'status' => 'active',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Sertifikasi Pengembang Web - LSP UDINUS',
                'category' => 'certification',
                'issuer' => 'LSP Universitas Dian Nuswantoro',
                'date' => '2026-01-01',
                'certificate_number' => null,
                'expired_date' => null,
                'no_expiry' => false,
                'description' => 'Sertifikasi kompetensi profesi sebagai Pengembang Web dari Lembaga Sertifikasi Profesi UDINUS.',
                'featured' => true,
                'status' => 'active',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Sertifikasi Desainer Multimedia Muda - LSP Teknologi Digital',
                'category' => 'certification',
                'issuer' => 'LSP Teknologi Digital',
                'date' => '2022-06-01',
                'certificate_number' => null,
                'expired_date' => null,
                'no_expiry' => false,
                'description' => 'Sertifikasi kompetensi profesi sebagai Desainer Multimedia Muda dari Lembaga Sertifikasi Profesi Teknologi Digital.',
                'featured' => true,
                'status' => 'active',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Workshop Bimbingan Karir TI-S1',
                'category' => 'workshop',
                'issuer' => 'Universitas Dian Nuswantoro',
                'date' => '2024-03-02',
                'certificate_number' => null,
                'expired_date' => null,
                'no_expiry' => true,
                'description' => 'Sertifikat keikutsertaan dalam Workshop Bimbingan Karir untuk mahasiswa Teknik Informatika S1.',
                'featured' => false,
                'status' => 'active',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Belajar Dasar Pemrograman Web',
                'category' => 'training',
                'issuer' => 'Dicoding Indonesia',
                'date' => '2023-07-01',
                'certificate_number' => null,
                'expired_date' => null,
                'no_expiry' => true,
                'description' => 'Sertifikat penyelesaian kelas Belajar Dasar Pemrograman Web dari platform Dicoding Indonesia.',
                'featured' => false,
                'status' => 'active',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Belajar Membuat Aplikasi Back-End untuk Pemula',
                'category' => 'training',
                'issuer' => 'Dicoding Indonesia',
                'date' => '2023-09-01',
                'certificate_number' => null,
                'expired_date' => null,
                'no_expiry' => true,
                'description' => 'Sertifikat penyelesaian kelas Belajar Membuat Aplikasi Back-End untuk Pemula dari platform Dicoding Indonesia.',
                'featured' => false,
                'status' => 'active',
                'sort_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($certificates as $cert) {
            Certificate::create($cert);
        }
    }
}
