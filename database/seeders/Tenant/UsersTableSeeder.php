<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'fullName' => 'Admin',
            'username' => 'admin',
            'role' => 1,
        ];
        \App\Models\Tenant\User::insert($data);
    }
}
