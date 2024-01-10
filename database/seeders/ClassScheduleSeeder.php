<?php

namespace Database\Seeders;

use App\Models\Backend\Academic\ClassSchedule;
use Illuminate\Database\Seeder;

class ClassScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClassSchedule::factory()
            ->count(5)
            ->create();
    }
}
