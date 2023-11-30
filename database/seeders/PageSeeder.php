<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5 ; $i++) { 
            DB::table('pages')->insert([
                "title" => "Page ".$i ,
                "slug" => "",
                "description" => "Description".$i,
                "site_id" => 1,
                "status" => rand(0,1),
            ]);
        }
    }
}