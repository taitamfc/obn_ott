<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) { 
            DB::table('notices')->insert([
                "title" => "title ".$i,
                "content" => "content ".$i,
                "site_id" => 1,
                "student_id" => rand(1,4),
            ]);
        }
    }
}
