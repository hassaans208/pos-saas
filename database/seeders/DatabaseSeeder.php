<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            // Tanent\CountriesTableSeeder::class,
            // Tanent\StatesTableSeeder::class,
            // Tanent\CitiesTableChunkOneSeeder::class,
            // Tanent\CitiesTableChunkTwoSeeder::class,
            // Tanent\CitiesTableChunkThreeSeeder::class,
            // Tanent\CitiesTableChunkFourSeeder::class,
            // Tanent\CitiesTableChunkFiveSeeder::class,
            // \Database\Seeders\Tenant\UsersTableSeeder::class,
            // \Database\Seeders\Tenant\ThemeTableSeeder::class,
            UsersTableSeeder::class,
            ThemeTableSeeder::class,
        ]);
        // \App\Models\Tenant\Tenant::all()->runForEach(function () {
        //     \App\Models\User::factory(1)->create();
        // });
    }
}
