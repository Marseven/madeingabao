<header class="nav" id="top">
  <div class="container nav__inner">
    <a class="nav__brand" href="{{ route('home') }}" aria-label="Cod'On — Made in Gabao">
      <img src="{{ asset('assets/codon-logo-jaune.png') }}" alt="Cod'On" class="nav__logo" />
      <span class="nav__brand-text">
        <span class="nav__brand-title">MADE IN GABAO</span>
        <span class="nav__brand-sub">Session {{ config('event.session') }} — Événement</span>
      </span>
    </a>

    <nav class="nav__links" id="navmenu" aria-label="Navigation principale">
      <a href="{{ route('home') }}#evenement">Événement</a>
      <a href="{{ route('home') }}#veillees">Veillées</a>
      <a href="{{ route('home') }}#programme">Programme</a>
      <a href="{{ route('contact') }}">Contact</a>
      @if (config('event.registration_open'))
        <a class="btn btn--gold btn--sm" href="{{ route('register.create') }}">Je m'inscris</a>
      @else
        <a class="btn btn--gold btn--sm is-disabled" href="{{ route('home') }}#inscription">Bientôt</a>
      @endif
    </nav>

    <button class="nav__toggle" id="navToggle" aria-expanded="false" aria-controls="navmenu" aria-label="Ouvrir le menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>
