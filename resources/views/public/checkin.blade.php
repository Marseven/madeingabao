@extends('layouts.public')

@section('title', 'Vérification — ' . config('event.name'))

@section('content')
  <section class="section section--dark" style="padding-top: clamp(56px,8vw,100px); min-height:70vh;">
    <div class="container container--narrow">
      <div class="ticket">
        <p class="overline" style="text-align:center;color:var(--gold);">// vérification d'inscription</p>
        <h1 class="section__title section__title--light" style="text-align:center;">{{ $registration->full_name }}</h1>

        @php $color = $registration->statusColor(); @endphp
        <p style="text-align:center;margin:14px 0 0;">
          <span class="status-pill status-pill--{{ $color }}">{{ $registration->statusLabel() }}</span>
          @if ($registration->isCheckedIn())
            <span class="status-pill status-pill--green">Présent · {{ $registration->checked_in_at->format('d/m H:i') }}</span>
          @endif
        </p>

        <div class="ticket__grid">
          <div class="ticket__info">
            <ul class="ticket__meta">
              <li><span>Référence</span><strong>{{ $registration->reference }}</strong></li>
              <li><span>Organisation</span><strong>{{ $registration->organization ?: '—' }}</strong></li>
              <li><span>Participation</span><strong>{{ $registration->participation_type ?: '—' }}</strong></li>
              <li><span>Événement</span><strong>{{ config('event.short_name') }}</strong></li>
              <li><span>Date</span><strong>{{ config('event.date_label') }}</strong></li>
            </ul>
          </div>
          <div class="ticket__qr">
            <div class="ticket__qr-img">{!! $qrSvg !!}</div>
            <p class="ticket__qr-hint">Page de vérification · {{ config('event.short_name') }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
