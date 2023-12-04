<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5; $i++) { 
            DB::table('students')->insert([
                "name" => "Student ".$i,
                "code" => "C00".$i,
                "email" => "admin".$i."@gmail.com",
                "phone" => "123456789",
                "status" => rand(0,1),
                "password" => bcrypt('123456'),
                "address" => "Address " . $i,  
                "city" => "City " . $i, 
            ]);
        }
    }
}