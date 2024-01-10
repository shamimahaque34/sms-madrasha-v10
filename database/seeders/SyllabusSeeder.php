<?php

namespace Database\Seeders;

use App\Models\Backend\Academic\Syllabus;
use Illuminate\Database\Seeder;

class SyllabusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Syllabus::factory()
            ->count(5)
            ->create();
    }
}
