<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'id'             => 1,
                'title'          => 'Super Admin',
                'slug'           => str_replace(' ','-', Str::lower('Super Admin')),
            ],
            [
                'id'             => 2,
                'title'          => 'Teacher',
                'slug'           => str_replace(' ','-', Str::lower('Teacher')),
            ],
            [
                'id'             => 3,
                'title'          => 'Student',
                'slug'           => str_replace(' ','-', Str::lower('Student')),
            ],
            [
                'id'             => 4,
                'title'          => 'Admin',
                'slug'           => str_replace(' ','-', Str::lower('Admin')),
            ],
        ]);
    }
}
