<?php

namespace Database\Seeders;

use App\Models\Tenant\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::findOrFail(1);
        $data = [
            'id' => 1,
            'theme' => 'dark',
            'user_id' => $user->std_id
        ];

        Theme::insert($data);
    }
}
