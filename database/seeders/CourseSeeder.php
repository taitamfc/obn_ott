<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5 ; $i++) { 
            DB::table('courses')->insert([
                "name" => "Course ".$i,
                "price" => rand(100,1000),
                "site_id" => 1,
                "position" => $i,
                "image_url" => "assets/images/default.png",
                "status" => rand(0,1),	
            ]);
        }
    }
}