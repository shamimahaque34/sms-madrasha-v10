<?php

namespace Database\Seeders;

use App\Models\Backend\Academic\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::factory()
            ->count(5)
            ->create();
    }
}
