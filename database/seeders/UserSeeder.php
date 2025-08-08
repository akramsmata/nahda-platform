<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'المشرف الوطني',
            'email' => 'admin@nahda.dz',
            'password' => Hash::make('password123'),
            'role' => 'national_admin',
        ]);
    }
}
