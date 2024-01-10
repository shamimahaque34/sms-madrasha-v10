<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Super Admin',
                'email'          => 'super@admin.com',
                'password'       => Hash::make('12345678'),
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Teacher',
                'email'          => 'teacher@teacher.com',
                'password'       => Hash::make('12345678'),
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'Student',
                'email'          => 'student@student.com',
                'password'       => Hash::make('12345678'),
                'remember_token' => null,
            ],
            [
                'id'             => 4,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => Hash::make('12345678'),
                'remember_token' => null,
            ]
        ];
        User::insert($users);
    }
}
