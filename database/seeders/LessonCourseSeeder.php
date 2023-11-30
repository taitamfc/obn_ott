<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class LessonCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5 ; $i++) { 
            DB::table('lesson_course')->insert([
                "course_id" => rand(1,4),
                "lesson_id" => rand(1,4),
                "site_id" => 1,
            ]);
        }
    }
}