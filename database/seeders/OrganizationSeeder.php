<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organization;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        $organizations = [
            [
                'organization_name' => 'BEM KM UDINUS',
                'division' => 'Kementerian Riset dan Teknologi',
                'role' => 'Eksekutif Muda',
                'start_date' => '2023-01-01',
                'end_date' => '2024-12-31',
                'is_current' => false,
                'institution' => 'Universitas Dian Nuswantoro',
                'description' => 'Aktif sebagai Eksekutif Muda di Kementerian Riset dan Teknologi BEM KM UDINUS. Bertanggung jawab dalam mengorganisir kegiatan riset, teknologi, dan inovasi untuk mahasiswa Universitas Dian Nuswantoro.',
                'achievements' => [
                    'Berhasil menyelenggarakan kegiatan riset dan teknologi untuk mahasiswa',
                    'Berkontribusi dalam pengembangan ekosistem teknologi kampus',
                    'Berkolaborasi dengan berbagai organisasi dan komunitas teknologi',
                ],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'organization_name' => 'OSIS SMK Negeri 3 Jepara',
                'division' => 'Seksi Bidang Keagamaan',
                'role' => 'Anggota Seksi Bidang Keagamaan',
                'start_date' => '2020-07-01',
                'end_date' => '2021-06-30',
                'is_current' => false,
                'institution' => 'SMK Negeri 3 Jepara',
                'description' => 'Aktif sebagai anggota OSIS di SMK Negeri 3 Jepara pada Seksi Bidang Keagamaan. Bertanggung jawab dalam mengorganisir kegiatan keagamaan dan kerohanian di lingkungan sekolah.',
                'achievements' => [
                    'Berhasil menyelenggarakan berbagai kegiatan keagamaan di sekolah',
                    'Membangun kemampuan leadership dan organisasi',
                    'Meningkatkan semangat kebersamaan di lingkungan sekolah',
                ],
                'sort_order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($organizations as $org) {
            Organization::create($org);
        }
    }
}
