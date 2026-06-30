<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email    = env('ADMIN_EMAIL', 'contact@codon.ga');
        $password = env('ADMIN_PASSWORD', 'MadeInGabao#2026');

        User::updateOrCreate(
            ['email' => $email],
            [
                'name'     => env('ADMIN_NAME', 'Admin Cod\'On'),
                'password' => Hash::make($password),
            ]
        );

        $this->command?->info("Admin prêt : {$email} / {$password}");
    }
}
