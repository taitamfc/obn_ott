<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class LessonStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5 ; $i++) { 
            DB::table('lesson_student')->insert([
                "lesson_id" => rand(1,4),
                "course_id" => rand(1,4),
                "student_id" => rand(1,4),
                "site_id" => 1,
                "is_complete" => rand(0,1),
                "last_view" => date('Y-m-d', strtotime('-'.rand(1,30).' days'))	
            ]);
        }
    }
}