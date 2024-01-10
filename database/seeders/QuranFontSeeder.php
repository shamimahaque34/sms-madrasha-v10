<?php

namespace Database\Seeders;

use App\Models\Backend\Quran\QuranFont;
use Illuminate\Database\Seeder;

class QuranFontSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuranFont::factory()
            ->count(5)
            ->create();
    }
}
