<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) { 
            DB::table('grades')->insert([
                "name" => "Name ".$i,
                "description" => "Description ".$i,
                "site_id" => 1,
                "position" => $i,
                "status" => rand(0,1),
                "img" => "assets/images/default.png"
            ]);
        }
    }
}