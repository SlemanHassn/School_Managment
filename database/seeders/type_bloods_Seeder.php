<?php

namespace Database\Seeders;

use App\Models\TypeBloods;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class type_bloods_Seeder extends Seeder
{

    public function run(): void
    {
        DB::table('type_bloods')->delete();
        $bgs = ['O-', 'O+', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'];

        foreach($bgs as $bg){
           TypeBloods::create(['Name' => $bg]);
        }
    }
}
