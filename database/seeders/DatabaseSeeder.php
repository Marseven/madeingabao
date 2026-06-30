<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
        ]);

        // Données de démonstration en local uniquement.
        if (app()->environment('local')) {
            $this->call([
                RegistrationSeeder::class,
            ]);
        }
    }
}
