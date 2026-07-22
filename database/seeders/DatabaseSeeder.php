<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutSection;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        $this->call([
            AdminSeeder::class,
            InitialContentSeeder::class,
            ExperienceSeeder::class,
            EducationSeeder::class,
            OrganizationSeeder::class,
            CertificationSeeder::class,
            TrainingSeeder::class,
            CertificateSeeder::class,
        ]);
    }
}