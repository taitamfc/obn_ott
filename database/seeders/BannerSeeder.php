<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5 ; $i++) { 
            DB::table('banners')->insert([
                "name" => "Item".$i,
                "description" => "Description".$i,
                "site_id" => 1,
                "img" => "assets/images/default.png",
                "link" => "https://example.com/item".$i,
                "video_url" => "https://example.com/video".$i,
                "status" => rand(0,1),
            ]);
        }
    }
}