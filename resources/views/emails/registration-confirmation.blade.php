@component('mail::message')
# Inscription confirmée 🎉

Bonjour {{ \Illuminate\Support\Str::of($registration->full_name)->before(' ') }},

Merci pour ton inscription à **{{ config('event.short_name') }}** !

@component('mail::panel')
**Référence :** {{ $registration->reference }}
**Date :** {{ config('event.date_label') }} · {{ config('event.time_label') }}
**Lieu :** {{ config('event.place') }}
**Statut :** {{ $registration->statusLabel() }}
@endcomponent

Conserve cette référence — ton QR code et ton invitation te seront utiles à l'entrée.

@component('mail::button', ['url' => route('invitation', $registration->qr_code_token), 'color' => 'success'])
Télécharger mon invitation (PDF)
@endcomponent

À très vite,
L'équipe {{ config('event.organizer') }}

<small>{{ config('event.tagline') }}</small>
@endcomponent
