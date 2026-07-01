<?php

/*
|--------------------------------------------------------------------------
| Configuration de l'événement
|--------------------------------------------------------------------------
| Source unique de vérité pour les infos de l'événement, réutilisée dans
| les pages publiques, les emails, les PDF et les invitations.
| Surchargeable via le fichier .env (voir .env.example).
*/

return [
    'name'        => env('EVENT_NAME', 'Made in Gabao — Cod\'On Session 28'),
    'short_name'  => env('EVENT_SHORT_NAME', 'Made in Gabao'),
    'session'     => env('EVENT_SESSION', '28'),
    'tagline'     => 'Le futur du Gabon se code ici, par nous, pour nous.',

    'date'        => env('EVENT_DATE', '2026-09-12'),        // format ISO Y-m-d
    'date_label'  => env('EVENT_DATE_LABEL', 'Samedi 12 septembre 2026'),
    'time_label'  => env('EVENT_TIME_LABEL', '09h — 12h'),
    'datetime'    => env('EVENT_DATETIME', '2026-09-12T09:00:00+01:00'),

    'city'        => env('EVENT_CITY', 'Libreville'),
    'place'       => env('EVENT_PLACE', 'Libreville, Gabon'),
    'address'     => env('EVENT_ADDRESS', 'Lieu confirmé à J-7'),

    'organizer'   => env('EVENT_ORGANIZER', 'Cod\'On'),
    'website'     => env('EVENT_WEBSITE', 'https://www.codon.ga'),
    'contact_email' => env('EVENT_CONTACT_EMAIL', 'contact@codon.ga'),
    'contact_phone' => env('EVENT_CONTACT_PHONE', ''),
    'social_handle' => env('EVENT_SOCIAL_HANDLE', '@CodonEvent'),

    'logo'        => 'assets/codon-logo-jaune.png',

    // Couleurs principales (charte graphique Made in Gabao)
    'colors' => [
        'blue'  => '#264185',
        'navy'  => '#0E1726',
        'gold'  => '#FDB912',
        'green' => '#4E9D62',
        'cream' => '#F4F1E8',
    ],

    // Ouvre/ferme le formulaire d'inscription public.
    'registration_open' => (bool) env('EVENT_REGISTRATION_OPEN', true),

    // Auto-confirmer les inscriptions publiques :
    //  true  -> statut "confirmed" dès l'inscription (event gratuit, tout le monde accepté)
    //  false -> statut "pending" ; validation manuelle dans l'admin
    'auto_confirm' => (bool) env('EVENT_AUTO_CONFIRM', true),

    // Types de participation proposés dans le formulaire.
    // ⚠️ Les helpers Registration::attendsEvent()/attendsVeillees() détectent
    // par mots-clés ("présentiel", "veillée/ligne", "deux") — garde ces mots.
    'participation_types' => [
        'Présentiel — Libreville',
        'En ligne (veillées)',
        'Les deux',
    ],

    // Le cycle des Veillées Cod'On (en ligne). Choisir "veillées" = toutes les veillées.
    'veillees_time' => '19h — 21h',
    'veillees' => [
        ['no' => '01', 'theme' => "Coder avec l'IA",        'date_label' => 'Jeu. 16 juillet 2026'],
        ['no' => '02', 'theme' => 'Sécurité dans le dev',   'date_label' => 'Jeu. 20 août 2026'],
        ['no' => '03', 'theme' => 'Vivre du Made in Gabao', 'date_label' => 'Jeu. 3 septembre 2026'],
    ],
];
