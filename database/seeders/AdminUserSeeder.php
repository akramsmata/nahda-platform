<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@nahda.test'],
            [
                'name' => 'مشرف وطني',
                'password' => bcrypt('ChangeMe123!'),
            ]
        );

        $user->assignRole('national_admin');
    }
}
