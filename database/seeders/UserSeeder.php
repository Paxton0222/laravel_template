<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = new User;
        $adminUser->role_id = 1;
        $adminUser->name = 'admin';
        $adminUser->password = Hash::make('qazxsw1234');
        $adminUser->email = 'admin@laravel.com';
        $adminUser->save();
    }
}
