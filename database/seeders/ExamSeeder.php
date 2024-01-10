<?php

namespace Database\Seeders;

use App\Models\Backend\Exam\Exam;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exam::factory()
            ->count(5)
            ->create();
    }
}
