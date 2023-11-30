<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5; $i++) { 
            DB::table('plans')->insert([
                "name" => "Plan ".$i,
                "price" => rand(100,1000),
                "duration" => rand(1,12),
            ]);
        }
    }
}