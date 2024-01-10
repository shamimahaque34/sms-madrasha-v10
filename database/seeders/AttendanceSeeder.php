<?php

namespace Database\Seeders;

use App\Models\Backend\Academic\Attendance;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attendance::factory()
            ->count(5)
            ->create();
    }
}
