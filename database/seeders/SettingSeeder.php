<?php

namespace Database\Seeders;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => '2mShop'],
            ['key' => 'site_logo', 'value' => 'logo.png'],
            ['key' => 'contact_email', 'value' => 'contact@example.com'],
            ['key' => 'theme', 'value' => 'electronics'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrInsert(
                ['key' => $setting['key']],
                [
                    'value' => $setting['value'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
