<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class StudentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5 ; $i++) { 
            DB::table('student_course')->insert([
                "student_id" => rand(1,5),
                "course_id" => rand(1,5),
                "site_id" => 1,
                "is_complete" => rand(0,1),
            ]);
        }
    }
}