<?php

namespace Database\Seeders;

use App\Models\Backend\Exam\ExamGrade;
use Illuminate\Database\Seeder;

class ExamGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExamGrade::factory()
            ->count(5)
            ->create();
    }
}
