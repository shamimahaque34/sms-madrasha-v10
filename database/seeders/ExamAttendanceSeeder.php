<?php

namespace Database\Seeders;

use App\Models\Backend\Exam\ExamAttendance;
use Illuminate\Database\Seeder;

class ExamAttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExamAttendance::factory()
            ->count(5)
            ->create();
    }
}
