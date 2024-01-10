<?php

namespace Database\Seeders;

use App\Models\Backend\Academic\AcademicYear;
use Illuminate\Database\Seeder;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcademicYear::factory()
            ->count(5)
            ->create();
    }
}
