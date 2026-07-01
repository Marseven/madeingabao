@extends('emails.layout')

@section('preheader', 'Petit rappel pour ' . config('event.short_name') . '.')

@section('content')
  <h1 style="font-family:'Montserrat','Segoe UI',Arial,sans-serif; font-weight:800; font-size:24px; letter-spacing:-.5px; color:#264185; margin:0 0 18px;">Petit rappel</h1>

  <p style="margin:0 0 14px;">Bonjour <strong>{{ \Illuminate\Support\Str::of($registration->full_name)->before(' ') }}</strong>,</p>

  @if ($customMessage)
    <p style="margin:0 0 14px;">{!! nl2br(e($customMessage)) !!}</p>
  @else
    <p style="margin:0 0 14px;">On te rappelle que <strong>{{ config('event.short_name') }}</strong> approche. On compte sur toi&nbsp;!</p>
  @endif

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

  @if ($registration->attendsEvent())
    <x-mail.button :url="route('invitation', $registration->qr_code_token)">Mon invitation (PDF)</x-mail.button>
  @endif

  <p style="margin:18px 0 0; color:#6b7785; font-size:14px;">À très vite,<br><strong style="color:#264185;">L'équipe {{ config('event.organizer') }}</strong></p>
@endsection
