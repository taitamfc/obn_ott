<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sites')->insert([
            "name" => "Ott's School",
            "slug" => "ott-s-school",
            "user_id" => 1,
            "status" => 1
        ]);   
    }
}