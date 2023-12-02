<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5 ; $i++) { 
            DB::table('subscriptions')->insert([
                "name" => "Subscription ".$i,
                "price" => rand(100,1000),
                "duration" => rand(1,12),
                "site_id" => 1,            
                "status" => rand(0,1),
                "position" => $i,
            ]);
        }
    }
}