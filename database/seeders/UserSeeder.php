<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                "name" =>  "Admin", 
                "email" => "admin@gmail.com",
                'password' => bcrypt('123456'),
                'group_id' => 1,
            ]
        );
    }
}