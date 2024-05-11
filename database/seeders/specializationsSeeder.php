<?php

namespace Database\Seeders;

use App\Models\Specializations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class specializationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('specializations')->delete();
        $specializations = [
            ['en'=> 'Arabic', 'ar'=> 'عربي'],
            ['en'=> 'math', 'ar'=> 'رياضيات'],
            ['en'=> 'geography', 'ar'=> 'جغرافيا'],
            ['en'=> 'history', 'ar'=> 'تاريخ'],
            ['en'=> 'Sciences', 'ar'=> 'علوم'],
            ['en'=> 'Computer', 'ar'=> 'حاسب الي'],
            ['en'=> 'English', 'ar'=> 'انجليزي'],
            ['en'=> 'French', 'ar'=> 'فرنسي'],
            ['en'=> 'Russian', 'ar'=> 'روسي'],
        ];
        foreach ($specializations as $S) {
            Specializations::create(['Name' => $S]);
        }
    }
}
