@component('mail::message')
# Inscription confirmée 🎉

Bonjour {{ \Illuminate\Support\Str::of($registration->full_name)->before(' ') }},

Merci pour ton inscription à **{{ config('event.short_name') }}** !

@component('mail::panel')
**Référence :** {{ $registration->reference }}
**Participation :** {{ $registration->participation_type }}
@if ($registration->attendsVeillees())
**Veillées (en ligne) :** {{ $registration->veilleesDatesLabel() }} · {{ config('event.veillees_time') }}
@endif
@if ($registration->attendsEvent())
**Événement :** {{ config('event.date_label') }} · {{ config('event.time_label') }} — {{ config('event.place') }}
@endif
**Statut :** {{ $registration->statusLabel() }}
@endcomponent

@if ($registration->attendsVeillees())
Les **Veillées Cod'On** ont lieu **en ligne** : le lien de connexion te sera envoyé par email **la veille** de chaque session.
@endif

@if ($registration->attendsEvent())
Conserve cette référence — ton QR code et ton invitation te seront utiles à l'entrée le {{ config('event.date_label') }}.
@endif

@component('mail::button', ['url' => route('invitation', $registration->qr_code_token), 'color' => 'success'])
Télécharger mon invitation (PDF)
@endcomponent

À très vite,
L'équipe {{ config('event.organizer') }}

<small>{{ config('event.tagline') }}</small>
@endcomponent
