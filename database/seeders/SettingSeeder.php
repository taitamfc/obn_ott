<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Setting;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
            'setting_name' => 'auth_page_background_image',
            'site_id' => 1
            ],
            [
            'setting_name' => 'auth_page_body_background_color',
            'site_id' => 1,
            ],
            [
            'setting_name' => 'auth_page_footer_background_color',
            'site_id' => 1,
            ],
            [
            'setting_name' => 'plan_page_background_image',
            'site_id' => 1,
            ],
            [
            'setting_name' => 'plan_page_header_background_color',
            'site_id' => 1,
            ],
            [
            'setting_name' => 'plan_page_event_section_background_color',
            'site_id' => 1,
            ]
        ];
        foreach ($datas as $data) {
            Setting::create($data);
        }
    }
}