<?php

namespace Database\Seeders\Tenant;

use App\Helper\Helper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
// use Stancl\Tenancy\Tenant;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $uuid = Str::random(20);
       
        $data = [
            'id' => 1,
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'std_id' => Hash::make($uuid),
            'username' => 'admin',
            'full_name' => 'Admin',
            'role' => Helper::TENANT_ADMIN,

        ];


        \App\Models\Tenant\User::insert($data);
        \App\Models\Tenant\UserHasUUID::create(['user_id' => $data['id'], 'orginal_std_id' => encrypt($uuid)]);
      
        
    }
}
