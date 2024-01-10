<?php

namespace Database\Seeders;

use App\Models\Backend\Designation;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Designation::factory()
            ->count(5)
            ->create();
    }
}
