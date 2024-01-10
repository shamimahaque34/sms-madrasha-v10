<?php

namespace Database\Seeders;

use App\Models\Backend\Academic\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::factory()
            ->count(5)
            ->create();
    }
}
