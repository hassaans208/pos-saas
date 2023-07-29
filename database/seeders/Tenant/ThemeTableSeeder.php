<?php

namespace Database\Seeders\Tenant;

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
        $data = [
            'id' => 1,
            'theme' => 'dark',
            'user_id' => 1
        ];

        Theme::insert($data);
    }
}
