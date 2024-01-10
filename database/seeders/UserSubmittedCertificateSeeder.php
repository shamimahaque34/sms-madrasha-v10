<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\UserManagement\UserSubmittedCertificate;

class UserSubmittedCertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserSubmittedCertificate::factory()
            ->count(5)
            ->create();
    }
}
