<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class StudentWhitlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) { 
            DB::table('student_whitlist')->insert([
                "student_id" => rand(1, 4),
                "lesson_id" => rand(1, 4),
            ]);
        }
    }
}
