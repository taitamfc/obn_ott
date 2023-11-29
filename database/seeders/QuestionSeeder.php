<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5 ; $i++) { 
            DB::table('qas')->insert([
                "student_id" => rand(1,4),
                "site_id" => 1,
                "question" => "Question ".$i,
                "answer" => "Answer ".$i,
            ]);
        }
    }
}