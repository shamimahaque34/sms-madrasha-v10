<?php

namespace Database\Seeders;

use App\Models\Backend\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::insert([
            'site_title' => 'Hilful Fujal',
            'site_name' => 'Hilful Fujal',
            'currency_code' => 'BDT',
            'currency_symbol' => '৳',
            'change_language' => '1',
            'default_language' => 'English',
        ]);
    }
}
