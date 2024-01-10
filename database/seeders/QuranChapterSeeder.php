<?php

namespace Database\Seeders;

use App\Models\Backend\Quran\QuranChapter;
use Illuminate\Database\Seeder;

class QuranChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuranChapter::factory()
            ->count(5)
            ->create();
    }
}
