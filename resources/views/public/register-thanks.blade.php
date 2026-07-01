@extends('layouts.public')

@section('title', 'Inscription confirmée — ' . config('event.name'))

@section('content')
  <section class="section section--dark" style="padding-top: clamp(56px,8vw,100px); min-height:70vh;">
    <div class="container container--narrow">
      <div class="ticket">
        <div class="ticket__badge">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12.5l5 5 11-11"/></svg>
        </div>
        <p class="overline" style="text-align:center;color:var(--gold);">// inscription confirmée</p>
        <h1 class="section__title section__title--light" style="text-align:center;">Merci, {{ \Illuminate\Support\Str::of($registration->full_name)->before(' ') }} !</h1>
        <p class="section__lead" style="text-align:center;max-width:520px;margin:14px auto 0;">
          Ton inscription à <strong style="color:#fff;">{{ config('event.short_name') }}</strong> est enregistrée.
          Un email de confirmation t'a été envoyé@if(config('event.contact_email')) (pense à vérifier tes spams)@endif.
        </p>

        <div class="ticket__grid">
          <div class="ticket__info">
            <p class="ticket__ref-label">Ta référence</p>
            <p class="ticket__ref">{{ $registration->reference }}</p>
            <ul class="ticket__meta">
              <li><span>Participation</span><strong>{{ $registration->participation_type ?: '—' }}</strong></li>
              @if ($registration->attendsVeillees())
                <li><span>Veillées (en ligne)</span><strong>{{ $registration->veilleesDatesLabel() }}</strong></li>
              @endif
              @if ($registration->attendsEvent())
                <li><span>Événement</span><strong>{{ config('event.date_label') }} · {{ config('event.place') }}</strong></li>
              @endif
              <li><span>Statut</span><strong>{{ $registration->statusLabel() }}</strong></li>
            </ul>
            @if ($registration->attendsVeillees())
              <p class="muted" style="font-size:13px;margin:0 0 14px;">Les veillées sont en ligne — le lien de connexion arrive par email la veille de chaque session.</p>
            @endif
            <a class="btn btn--gold" href="{{ route('invitation', $registration->qr_code_token) }}" target="_blank" rel="noopener">Télécharger mon invitation (PDF)</a>
          </div>
          <div class="ticket__qr">
            <div class="ticket__qr-img">{!! $qrSvg !!}</div>
            <p class="ticket__qr-hint">Ce QR code sera demandé à l'entrée.</p>
          </div>
        </div>
      </div>

      <p style="text-align:center;margin-top:32px;">
        <a class="btn btn--ghost" href="{{ route('home') }}">← Retour à l'accueil</a>
      </p>
    </div>
  </section>
@endsection
