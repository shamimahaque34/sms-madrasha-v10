<?php

namespace Database\Seeders;

use App\Models\Backend\Academic\StudentGroup;
use Illuminate\Database\Seeder;

class StudentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudentGroup::factory()
            ->count(5)
            ->create();
    }
}
