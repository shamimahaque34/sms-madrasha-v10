<?php

namespace Database\Seeders;

use App\Models\Backend\Exam\ExamSchedule;
use Illuminate\Database\Seeder;

class ExamScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExamSchedule::factory()
            ->count(5)
            ->create();
    }
}
