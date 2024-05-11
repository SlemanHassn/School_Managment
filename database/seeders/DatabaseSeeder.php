<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            GradeSeeder::class,
            ClassroomTableSeeder::class,
            SectionsTableSeeder::class,
            type_bloods_Seeder::class,
            Nationalities_Seeder::class,
            Religions_Seeder::class,
            specializationsSeeder::class,
            GenderSeed::class,
            ParentsTableSeeder::class,
            StudentsTableSeeder::class,
            SettingsTableSeeder::class,
        ]);
    }
}
