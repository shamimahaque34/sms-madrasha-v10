<?php

namespace Database\Seeders;

use App\Models\Backend\Academic\Routine;
use Illuminate\Database\Seeder;

class RoutineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Routine::factory()
            ->count(5)
            ->create();
    }
}
