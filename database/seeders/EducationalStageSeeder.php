<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\Academic\EducationalStage;

class EducationalStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EducationalStage::factory()
            ->count(5)
            ->create();
    }
}
