<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['Home', 'Grade', 'Subject', 'Course', 'Lesson', 'Store', 'Class', 'Themes', 'Report', 'User', 'Setting'];
        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role,
                'site_id' => 1,
            ]);
        }
    }
}