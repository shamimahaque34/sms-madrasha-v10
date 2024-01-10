<?php

namespace Database\Seeders;

use App\Models\Backend\Exam\ExamMarkDistributionType;
use Illuminate\Database\Seeder;

class ExamMarkDistributionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExamMarkDistributionType::factory()
            ->count(5)
            ->create();
    }
}
