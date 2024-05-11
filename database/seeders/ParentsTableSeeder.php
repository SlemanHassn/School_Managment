<?php

namespace Database\Seeders;

use App\Models\MyParent;
use App\Models\Nationalities;
use App\Models\Religions;
use App\Models\TypeBloods;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table('myparents')->delete();
            $my_parents = new MyParent();
            $my_parents->email = 'sleman.nour@gmail.com';
            $my_parents->password = Hash::make('sleman3102');
            $my_parents->Name_Father = ['en' => 'Sleman hassn', 'ar' => 'سليمان حسن'];
            $my_parents->National_ID_Father = '1234567810';
            $my_parents->Passport_ID_Father = '1234567810';
            $my_parents->Phone_Father = '1234567810';
            $my_parents->Job_Father = ['en' => 'programmer', 'ar' => 'مبرمج'];
            $my_parents->Nationality_Father_id = Nationalities::all()->unique()->random()->id;
            $my_parents->Blood_Type_Father_id =TypeBloods::all()->unique()->random()->id;
            $my_parents->Religion_Father_id = Religions::all()->unique()->random()->id;
            $my_parents->Address_Father ='Syria';
            $my_parents->Name_Mother = ['en' => 'Nour', 'ar' => 'نور'];
            $my_parents->National_ID_Mother = '1234567810';
            $my_parents->Passport_ID_Mother = '1234567810';
            $my_parents->Phone_Mother = '1234567810';
            $my_parents->Job_Mother = ['en' => 'Teacher', 'ar' => 'معلمة'];
            $my_parents->Nationality_Mother_id = Nationalities::all()->unique()->random()->id;
            $my_parents->Blood_Type_Mother_id =TypeBloods::all()->unique()->random()->id;
            $my_parents->Religion_Mother_id = Religions::all()->unique()->random()->id;
            $my_parents->Address_Mother ='Syria';
            $my_parents->save();
    }
}
