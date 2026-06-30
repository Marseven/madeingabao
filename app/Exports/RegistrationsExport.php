<?php

namespace App\Exports;

use App\Models\Registration;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RegistrationsExport implements FromQuery, WithHeadings, WithMapping
{
    public function query()
    {
        return Registration::query()->latest();
    }

    public function headings(): array
    {
        return [
            'Référence',
            'Nom complet',
            'Email',
            'Téléphone',
            'Organisation',
            'Fonction',
            'Ville',
            'Participation',
            'Statut',
            'Consentement',
            'Date d\'inscription',
        ];
    }

    /**
     * @param  Registration  $r
     */
    public function map($r): array
    {
        return [
            $r->reference,
            $r->full_name,
            $r->email,
            $r->phone,
            $r->organization,
            $r->position,
            $r->city,
            $r->participation_type,
            $r->statusLabel(),
            $r->consent ? 'Oui' : 'Non',
            $r->created_at?->format('Y-m-d H:i'),
        ];
    }
}
