@component('mail::message')
# Petit rappel 👋

Bonjour {{ \Illuminate\Support\Str::of($registration->full_name)->before(' ') }},

@if($customMessage)
{{ $customMessage }}
@else
On te rappelle que **{{ config('event.short_name') }}** approche : {{ config('event.date_label') }} · {{ config('event.time_label') }}, à {{ config('event.place') }}. On compte sur toi !
@endif

@component('mail::panel')
**Référence :** {{ $registration->reference }}
**Date :** {{ config('event.date_label') }} · {{ config('event.time_label') }}
**Lieu :** {{ config('event.place') }}
**Statut :** {{ $registration->statusLabel() }}
@endcomponent

@component('mail::button', ['url' => route('invitation', $registration->qr_code_token), 'color' => 'success'])
Mon invitation (PDF)
@endcomponent

À très vite,
L'équipe {{ config('event.organizer') }}

<small>{{ config('event.tagline') }}</small>
@endcomponent
