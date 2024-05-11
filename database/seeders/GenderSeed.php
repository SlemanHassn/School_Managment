<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Specializations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genders')->delete();
        $Gender = [
            ['en'=> 'Male', 'ar'=> 'ذكر'],
            ['en'=> 'Female', 'ar'=> 'انثى'],
        ];
        foreach ($Gender as $S) {
            Gender::create(['Name' => $S]);
        }
    }
}

