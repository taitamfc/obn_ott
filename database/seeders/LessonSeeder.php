<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5; $i++) { 
            DB::table('lessons')->insert([
                "name" => "Lesson ".$i,
                "description" => "Description ".$i,
                "site_id" => 1,
                "subject_id" => rand(1,4),
                "video_url" => "",
                "image_url" => "",
                "position" => $i,
                "status" => 1,
            ]);
        }
    }
}