<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classrooms')->delete();
        $classrooms = [
            ['en'=> 'First Grade', 'ar'=> 'الصف الاول'],
            ['en'=> 'Second Grade', 'ar'=> 'الصف الثاني'],
            ['en'=> 'Third Grade', 'ar'=> 'الصف الثالث'],
        ];

        foreach ($classrooms as $classroom) {
            Classroom::create([
            'Name' => $classroom,
            'Grade_id' => Grade::all()->unique()->random()->id
            ]);
        }
    }
}
