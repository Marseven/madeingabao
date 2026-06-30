@extends('layouts.public')

@section('title', 'Contact — ' . config('event.name'))

@section('content')
  <section class="section section--dark section--register" style="padding-top: clamp(48px,7vw,90px);">
    <div class="container">
      <div class="register">
        <div class="register__intro">
          <p class="overline overline--light">// contact</p>
          <h2 class="section__title section__title--light">Une question ?</h2>
          <p class="section__lead">Écris-nous, on te répond vite. Pour toute info sur {{ config('event.short_name') }}, les veillées ou un partenariat.</p>
          <ul class="register__perks">
            <li><svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M4 12.5l5 5 11-11"/></svg> {{ config('event.contact_email') }}</li>
            @if (config('event.contact_phone'))
              <li><svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M4 12.5l5 5 11-11"/></svg> {{ config('event.contact_phone') }}</li>
            @endif
            <li><svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M4 12.5l5 5 11-11"/></svg> {{ config('event.social_handle') }}</li>
          </ul>
        </div>

        <div class="register__panel">
          <form class="form" method="POST" action="{{ route('contact.send') }}" novalidate>
            @csrf
            @if (session('success'))
              <div class="form-alert form-alert--success">{{ session('success') }}</div>
            @endif

            <input type="text" name="website" value="" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;" aria-hidden="true" />

            <div class="form__row">
              <label class="form__field">
                <span>Nom *</span>
                <input type="text" name="name" value="{{ old('name') }}" required />
                @error('name') <em class="form__err">{{ $message }}</em> @enderror
              </label>
              <label class="form__field">
                <span>Email *</span>
                <input type="email" name="email" value="{{ old('email') }}" required />
                @error('email') <em class="form__err">{{ $message }}</em> @enderror
              </label>
            </div>

            <label class="form__field" style="margin-bottom:16px;">
              <span>Sujet</span>
              <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Partenariat, presse, question…" />
            </label>

            <label class="form__field" style="margin-bottom:16px;">
              <span>Message *</span>
              <textarea name="message" rows="5" required>{{ old('message') }}</textarea>
              @error('message') <em class="form__err">{{ $message }}</em> @enderror
            </label>

            <button type="submit" class="btn btn--gold btn--full btn--lg">Envoyer</button>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
