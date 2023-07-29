<?php

namespace Database\Seeders;

use App\Models\UserHasUUID;
use Faker\Core\Uuid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uuid = Str::random(20);
        // $uuids = crypt($uuid, config('app.name'));
        // $uuid = Hash::make($uuid, ['rounds' => 5, 'memory' => 100, 'time' => 1, 'threads' => 1, ]);
        // dd(decrypt($uuids), $uuid, $uuids);
        // dd($uuid);
        $data = [
            'id' => 1,
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'std_id' => Hash::make($uuid),
            'name' => 'Admin',
        ];

        \App\Models\User::insert($data);
        UserHasUUID::create(['user_id' => $data['id'], 'orginal_std_id' => $uuid]);
    }
}
