<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\MyParent;
use App\Models\Nationalities;
use App\Models\Section;
use App\Models\students;
use App\Models\TypeBloods;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('students')->delete();
        $students = new students();
        $students->name = ['ar' => 'احمد نزيهة', 'en' => 'Ahmed Nazeha'];
        $students->email = 'Ahmed_Nazeha@gmail.com';
        $students->password = Hash::make('sleman3102');
        $students->gender_id = 1;
        $students->nationalitie_id = Nationalities::all()->unique()->random()->id;
        $students->blood_id =TypeBloods::all()->unique()->random()->id;
        $students->Date_Birth = date('1995-01-01');
        $students->Grade_id = Grade::all()->unique()->random()->id;
        $students->Classroom_id =Classroom::all()->unique()->random()->id;
        $students->section_id = Section::all()->unique()->random()->id;
        $students->parent_id = MyParent::all()->unique()->random()->id;
        $students->academic_year ='2024';
        $students->save();
    }
}
