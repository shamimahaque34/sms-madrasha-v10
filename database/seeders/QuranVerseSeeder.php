<?php

namespace Database\Seeders;

use App\Models\Backend\Quran\QuranVerse;
use Illuminate\Database\Seeder;

class QuranVerseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuranVerse::factory()->count(5)->create();
    }
}
