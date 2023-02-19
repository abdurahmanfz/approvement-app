<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('users')->insert(
            [
                'id' => Uuid::uuid4()->toString(),
                'username' => 'employee',
                'role' => 'employee',
                'fullname' => 'Employee',
                'password' => Hash::make('employee123')
            ]
        );
        DB::table('users')->insert(
            [
                'id' => Uuid::uuid4()->toString(),
                'username' => 'manager',
                'role' => 'manager',
                'fullname' => 'Manager',
                'password' => Hash::make('manager123')
            ]
        );
        DB::table('users')->insert(
            [
                'id' => Uuid::uuid4()->toString(),
                'username' => 'director',
                'role' => 'director',
                'fullname' => 'director',
                'password' => Hash::make('director123')
            ]
        );
        DB::table('users')->insert(
            [
                'id' => Uuid::uuid4()->toString(),
                'username' => 'admin',
                'role' => 'admin',
                'fullname' => 'Admin',
                'password' => Hash::make('admin123')
            ],
        );
    }
}
