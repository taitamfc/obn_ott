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
        $datas = [
            [
                "name" =>  "Admin", 
                "email" => "admin@gmail.com",
                'password' => bcrypt('123456'),
                'group_id' => 1,
            ],
            [
                "name" =>  "Admin 2", 
                "email" => "admin2@gmail.com",
                'password' => bcrypt('123456'),
                'group_id' => 1,
            ]
        ];
        foreach ($datas as $data) {
            DB::table('users')->insert($data);
        }
    }
}