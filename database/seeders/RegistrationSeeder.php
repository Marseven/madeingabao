<?php

namespace Database\Seeders;

use App\Models\Registration;
use Illuminate\Database\Seeder;

/**
 * Quelques inscriptions de démonstration (utile pour tester l'admin,
 * l'export et les PDF). À ne pas exécuter en production.
 */
class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        $samples = [
            ['Nadège Obame', 'nadege@cloud241.ga', '+24106000001', 'Cloud241', 'Lead Developer', 'Libreville', 'Les deux', 'confirmed'],
            ['Yann Mboumba', 'yann@example.ga', '+24106000002', 'Freelance', 'Développeur', 'Port-Gentil', 'En ligne (veillées)', 'pending'],
            ['Aïcha Ndong', 'aicha@startup.ga', '+24106000003', 'GabTech', 'Product Manager', 'Libreville', 'Présentiel — Libreville', 'pending'],
            ['Steeve Ella', 'steeve@example.ga', '+24106000004', 'Université', 'Étudiant', 'Franceville', 'En ligne (veillées)', 'cancelled'],
        ];

        foreach ($samples as [$name, $email, $phone, $org, $role, $city, $part, $status]) {
            Registration::create([
                'full_name'          => $name,
                'email'              => $email,
                'phone'              => $phone,
                'organization'       => $org,
                'position'           => $role,
                'city'               => $city,
                'participation_type' => $part,
                'consent'            => true,
                'status'             => $status,
            ]);
        }
    }
}
