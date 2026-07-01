@extends('emails.layout')

@section('preheader', 'Ton inscription à ' . config('event.short_name') . ' est bien enregistrée.')

@section('content')
  <h1 style="font-family:'Montserrat','Segoe UI',Arial,sans-serif; font-weight:800; font-size:24px; letter-spacing:-.5px; color:#264185; margin:0 0 18px;">Inscription confirmée</h1>

  <p style="margin:0 0 14px;">Bonjour <strong>{{ \Illuminate\Support\Str::of($registration->full_name)->before(' ') }}</strong>,</p>

  <p style="margin:0 0 6px;">Merci pour ton inscription à <strong>{{ config('event.short_name') }}</strong> — la Session 28 de Cod'On. Voici ton récapitulatif&nbsp;:</p>

  <x-mail.panel>
    <x-mail.row label="Référence">{{ $registration->reference }}</x-mail.row>
    <x-mail.row label="Participation">{{ $registration->participation_type }}</x-mail.row>
    @if ($registration->attendsVeillees())
      <x-mail.row label="Veillées (en ligne)">{{ $registration->veilleesDatesLabel() }} &middot; {{ config('event.veillees_time') }}</x-mail.row>
    @endif
    @if ($registration->attendsEvent())
      <x-mail.row label="Événement">{{ config('event.date_label') }} &middot; {{ config('event.time_label') }} — {{ config('event.place') }}</x-mail.row>
    @endif
    <x-mail.row label="Statut">{{ $registration->statusLabel() }}</x-mail.row>
  </x-mail.panel>

  @if ($registration->attendsVeillees())
    <p style="margin:0 0 14px;">Les <strong>Veillées Cod'On</strong> ont lieu <strong>en ligne</strong> — le lien de connexion te sera envoyé par email <strong>la veille</strong> de chaque session.</p>
  @endif

  @if ($registration->attendsEvent())
    <p style="margin:0 0 6px;">Conserve ta référence : ton QR code et ton invitation te seront utiles à l'entrée le {{ config('event.date_label') }}, à {{ config('event.city') }}.</p>

    <x-mail.button :url="route('invitation', $registration->qr_code_token)">Télécharger mon invitation (PDF)</x-mail.button>
  @endif

  <p style="margin:18px 0 0; color:#6b7785; font-size:14px;">À très vite,<br><strong style="color:#264185;">L'équipe {{ config('event.organizer') }}</strong></p>
@endsection
