<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5; $i++) { 
            DB::table('transactions')->insert([
                "site_id" => 1,
                "student_id" => rand(1,4),
                "course_id" => rand(1,4),
                "subscription_id" => rand(1,4),
                "price" => rand(10000,4000000),
            ]);
        }
    }
}
