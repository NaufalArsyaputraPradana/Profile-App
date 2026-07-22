<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Certification;

class CertificationSeeder extends Seeder
{
    public function run(): void
    {
        $certifications = [
            [
                'name' => 'Skema Sertifikasi Pengembang Web',
                'issuer' => 'LSP UDINUS (Lembaga Sertifikasi Profesi Universitas Dian Nuswantoro)',
                'credential_id' => null,
                'credential_url' => null,
                'issue_date' => '2026-01-01',
                'expiry_date' => null,
                'no_expiry' => false,
                'level' => 'Pengembang Web',
                'description' => 'Sertifikasi profesi resmi dari Lembaga Sertifikasi Profesi (LSP) Universitas Dian Nuswantoro dalam bidang Pengembangan Web. Sertifikasi ini mengakui kompetensi dalam membangun aplikasi web menggunakan teknologi modern.',
                'sort_order' => 1,
                'featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Desainer Multimedia Muda',
                'issuer' => 'LSP Teknologi Digital',
                'credential_id' => null,
                'credential_url' => null,
                'issue_date' => '2022-06-01',
                'expiry_date' => null,
                'no_expiry' => false,
                'level' => 'Muda',
                'description' => 'Sertifikasi profesi resmi dari Lembaga Sertifikasi Profesi (LSP) Teknologi Digital dalam bidang Desain Multimedia. Sertifikasi ini mengakui kompetensi dalam desain grafis, multimedia, dan produksi konten digital.',
                'sort_order' => 2,
                'featured' => true,
                'is_active' => true,
            ],
        ];

        foreach ($certifications as $cert) {
            Certification::create($cert);
        }
    }
}
