<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id'             => 1,
                'title'          => 'Super Admin Dashboard',
                'slug'           => str_replace(' ', '-', Str::lower('Super Admin Dashboard')),
            ],
            [
                'id'             => 2,
                'title'          => 'Teacher Dashboard',
                'slug'           => str_replace(' ', '-', Str::lower('Teacher Dashboard')),
            ],
            [
                'id'             => 3,
                'title'          => 'Student Dashboard',
                'slug'           => str_replace(' ', '-', Str::lower('Student Dashboard')),
            ],
            [
                'id'             => 4,
                'title'          => 'Admin Dashboard',
                'slug'           => str_replace(' ', '-', Str::lower('Admin Dashboard')),
            ],
        ];
        Permission::insert($permissions);
    }
}
