<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\Quran\QuranTranslationProvider;

class QuranTranslationProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuranTranslationProvider::factory()
            ->count(5)
            ->create();
    }
}
