<?php

namespace Database\Seeders;

use App\Models\Backend\Academic\Assignment;
use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Assignment::factory()
            ->count(5)
            ->create();
    }
}
