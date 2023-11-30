<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SubscriptionCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5 ; $i++) { 
            DB::table('subscription_course')->insert([
                "course_id" => rand(1,5),
                "subscription_id" => rand(1,5),
                "site_id" => 1,
            ]);
        }
    }
}