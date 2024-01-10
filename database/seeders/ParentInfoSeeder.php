<?php

namespace Database\Seeders;

use App\Models\ParentInfo;
use Illuminate\Database\Seeder;

class ParentInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ParentInfo::factory()
            ->count(5)
            ->create();
    }
}
