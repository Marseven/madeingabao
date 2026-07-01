@extends('layouts.public')

@section('title', 'Mon billet — ' . config('event.name'))

@section('content')
  <section class="section section--dark" style="padding-top: clamp(48px,7vw,90px);">
    <div class="container container--narrow">
      <div style="text-align:center; max-width:560px; margin:0 auto 30px;">
        <p class="overline overline--light">// mon billet</p>
        <h2 class="section__title section__title--light">Télécharger mon billet</h2>
        <p class="section__lead">Retrouve ton billet (PDF + QR code) avec l'<strong>email</strong> ou le <strong>téléphone</strong> utilisé lors de ton inscription.</p>
      </div>

      <div class="register__panel" style="max-width:560px; margin:0 auto;">
        @if (session('ticket_error'))
          <div class="form-alert form-alert--error" style="margin-bottom:16px;">{{ session('ticket_error') }}</div>
        @endif

        <form class="form" method="POST" action="{{ route('ticket.find') }}" novalidate>
          @csrf
          <input type="text" name="website" value="" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;" aria-hidden="true" />

          <label class="form__field" style="margin-bottom:18px;">
            <span>Email ou téléphone *</span>
            <input type="text" name="identifier" value="{{ old('identifier') }}" required autocomplete="off" placeholder="toi@exemple.ga  ·  +241 …" />
            @error('identifier') <em class="form__err">{{ $message }}</em> @enderror
          </label>

          <button type="submit" class="btn btn--gold btn--full btn--lg">Trouver mon billet</button>
        </form>

        @isset($results)
          @if ($results && $results->count())
            <div style="margin-top:26px;">
              <p style="color:#cdd8f0; font-size:14px; margin:0 0 14px;">
                {{ $results->count() }} inscription{{ $results->count() > 1 ? 's' : '' }} trouvée{{ $results->count() > 1 ? 's' : '' }} pour «&nbsp;{{ $identifier }}&nbsp;» :
              </p>

              @foreach ($results as $r)
                <div style="display:flex; align-items:center; justify-content:space-between; gap:16px; flex-wrap:wrap; background:rgba(255,255,255,.05); border:1px solid rgba(255,255,255,.12); border-radius:12px; padding:16px 18px; margin-bottom:12px;">
                  <div style="min-width:0;">
                    <div style="font-family:var(--f-mono,monospace); font-weight:700; color:#FDB912; font-size:15px;">{{ $r->reference }}</div>
                    <div style="color:#cdd8f0; font-size:13px; line-height:1.7; margin-top:5px;">
                      {{ $r->full_name }} · {{ $r->participation_type ?: '—' }}<br>
                      @if ($r->attendsVeillees())
                        <span style="color:#9fb0cf;">Veillées :</span> {{ $r->veilleesDatesLabel() }}<br>
                      @endif
                      @if ($r->attendsEvent())
                        <span style="color:#9fb0cf;">Événement :</span> {{ config('event.date_label') }} · {{ config('event.place') }}<br>
                      @endif
                      <span style="color:#9fb0cf;">Statut :</span> {{ $r->statusLabel() }}
                    </div>
                  </div>
                  <a class="btn btn--gold btn--sm" href="{{ route('invitation', $r->qr_code_token) }}" target="_blank" rel="noopener">Télécharger (PDF)</a>
                </div>
              @endforeach
            </div>
          @endif
        @endisset

        <p style="text-align:center; margin-top:22px; font-size:13px; color:#9fb0cf;">
          Pas encore inscrit·e ? <a href="{{ route('register.create') }}" style="color:#FDB912; text-decoration:none; font-weight:600;">Je m'inscris</a>
        </p>
      </div>
    </div>
  </section>
@endsection
