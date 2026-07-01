@extends('layouts.public')

@section('title', 'Inscription — ' . config('event.name'))

@section('content')
  <section class="section section--dark section--register" style="padding-top: clamp(48px,7vw,90px);">
    <div class="container">
      <div class="register">
        <div class="register__intro">
          <p class="overline overline--light">// inscription</p>
          <h2 class="section__title section__title--light">Réserve ta place</h2>
          <p class="section__lead">Inscription gratuite à {{ config('event.short_name') }}, le {{ config('event.date_label') }} à {{ config('event.city') }}. Tu recevras une confirmation par email avec ta référence et ton QR code.</p>
          <ul class="register__perks">
            <li><svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12.5l5 5 11-11"/></svg> Accès aux 3 veillées en ligne</li>
            <li><svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12.5l5 5 11-11"/></svg> Place pour l'événement du 12/09</li>
            <li><svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12.5l5 5 11-11"/></svg> Référence + QR code personnels</li>
          </ul>
        </div>

        <div class="register__panel">
          <form class="form" method="POST" action="{{ route('register.store') }}" novalidate>
            @csrf

            @if ($errors->has('duplicate'))
              <div class="form-alert form-alert--error">
                {{ $errors->first('duplicate') }}
                <span style="display:block;margin-top:8px;">
                  <a href="{{ route('ticket.show') }}" style="color:inherit;text-decoration:underline;font-weight:600;">Télécharger mon billet</a>
                </span>
              </div>
            @elseif ($errors->any())
              <div class="form-alert form-alert--error">
                <strong>Oups,</strong> merci de corriger les champs ci-dessous.
              </div>
            @endif

            {{-- Honeypot anti-spam --}}
            <input type="text" name="website" value="" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;" aria-hidden="true" />

            <div class="form__row">
              <label class="form__field">
                <span>Nom complet *</span>
                <input type="text" name="full_name" value="{{ old('full_name') }}" required autocomplete="name" placeholder="Ada Lovelace" />
                @error('full_name') <em class="form__err">{{ $message }}</em> @enderror
              </label>
              <label class="form__field">
                <span>Email *</span>
                <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="toi@exemple.ga" />
                @error('email') <em class="form__err">{{ $message }}</em> @enderror
              </label>
            </div>

            <div class="form__row">
              <label class="form__field">
                <span>Téléphone / WhatsApp *</span>
                <input type="tel" name="phone" value="{{ old('phone') }}" required autocomplete="tel" placeholder="+241 …" />
                @error('phone') <em class="form__err">{{ $message }}</em> @enderror
              </label>
              <label class="form__field">
                <span>Ville</span>
                <input type="text" name="city" value="{{ old('city') }}" autocomplete="address-level2" placeholder="Libreville" />
                @error('city') <em class="form__err">{{ $message }}</em> @enderror
              </label>
            </div>

            <div class="form__row">
              <label class="form__field">
                <span>Organisation / structure</span>
                <input type="text" name="organization" value="{{ old('organization') }}" placeholder="Cloud241, Freelance…" />
                @error('organization') <em class="form__err">{{ $message }}</em> @enderror
              </label>
              <label class="form__field">
                <span>Fonction / poste</span>
                <input type="text" name="position" value="{{ old('position') }}" placeholder="Développeur·euse, Étudiant·e…" />
                @error('position') <em class="form__err">{{ $message }}</em> @enderror
              </label>
            </div>

            <label class="form__field" style="margin-bottom:16px;">
              <span>Type de participation</span>
              <select name="participation_type">
                <option value="">Choisir…</option>
                @foreach (config('event.participation_types') as $type)
                  <option value="{{ $type }}" @selected(old('participation_type') === $type)>{{ $type }}</option>
                @endforeach
              </select>
            </label>

            <label class="form__field" style="margin-bottom:16px;">
              <span>Message ou commentaire <em>(optionnel)</em></span>
              <textarea name="message" rows="3" placeholder="Une question, un besoin particulier…">{{ old('message') }}</textarea>
            </label>

            <label class="check" style="margin-bottom:16px;">
              <input type="checkbox" name="consent" value="1" @checked(old('consent')) required />
              <span>J'accepte de recevoir les communications liées à {{ config('event.short_name') }}. *</span>
            </label>
            @error('consent') <em class="form__err" style="display:block;margin:-8px 0 14px;">{{ $message }}</em> @enderror

            <button type="submit" class="btn btn--gold btn--full btn--lg">Je m'inscris (gratuit)</button>
            <p class="form__legal">Champs marqués * obligatoires. Zéro spam, désinscription à tout moment.</p>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
