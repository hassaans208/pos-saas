<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tenant\Tenant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            \Database\Seeders\Tenant\UsersTableSeeder::class,
            \Database\Seeders\Tenant\ThemeTableSeeder::class,
            \Database\Seeders\Tenant\CountriesTableSeeder::class,
            \Database\Seeders\Tenant\StatesTableSeeder::class,
            \Database\Seeders\Tenant\CitiesTableChunkOneSeeder::class,
            \Database\Seeders\Tenant\CitiesTableChunkTwoSeeder::class,
            \Database\Seeders\Tenant\CitiesTableChunkThreeSeeder::class,
            \Database\Seeders\Tenant\CitiesTableChunkFourSeeder::class,
            \Database\Seeders\Tenant\CitiesTableChunkFiveSeeder::class,
            // UsersTableSeeder::class,
            // ThemeTableSeeder::class,
        ]);
        // \App\Models\Tenant\Tenant::all()->runForEach(function () {
        //     \App\Models\User::factory(1)->create();
        // });
    }
}
