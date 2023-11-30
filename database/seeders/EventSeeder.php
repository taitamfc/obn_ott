<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5 ; $i++) { 
            DB::table('events')->insert([
                "title" => "Title".$i,
                "start" => date('Y-m-d', strtotime('-'.rand(1,30).' days')),
                "end" => date('Y-m-d', strtotime('-'.rand(1,30).' days')),
                "site_id" => 1,
            ]);
        }
    }
}