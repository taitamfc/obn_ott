<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class GroupSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('group_site')->insert([
            "group_id" => "1",
            "user_id" => "1",
            "site_id" => "1",
            "status" => "1",
        ]);
    }
}