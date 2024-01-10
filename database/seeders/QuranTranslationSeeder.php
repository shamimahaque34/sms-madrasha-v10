<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\Quran\QuranTranslation;

class QuranTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuranTranslation::factory()
            ->count(5)
            ->create();
    }
}
