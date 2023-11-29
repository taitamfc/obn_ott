<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class GroupRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    for ($i=1; $i <= 12; $i++) { 
        DB::table('group_role')->insert([
                "group_id" => 1, 
                "role_id" => $i, 
                "site_id" => 1 
            ]);
        }
    }
}