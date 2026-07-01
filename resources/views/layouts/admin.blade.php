<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Admin') — {{ config('event.short_name') }}</title>
  <link rel="icon" type="image/svg+xml" href="{{ asset('assets/favicon.svg') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
  @stack('head')
</head>
<body>
  <div class="adm">
    <aside class="adm__side">
      <div class="adm__brand">
        <img src="{{ asset('assets/codon-logo-jaune.png') }}" alt="Cod'On" />
        <div><b>Made in Gabao</b><br><span>Admin · S{{ config('event.session') }}</span></div>
      </div>
      <nav class="adm__nav">
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">Tableau de bord</a>
        <a href="{{ route('admin.registrations.index') }}" class="{{ request()->routeIs('admin.registrations.*') ? 'is-active' : '' }}">Inscrits</a>
        <a href="{{ route('admin.registrations.export') }}">Export Excel</a>
        <a href="{{ route('home') }}" target="_blank">Voir le site ↗</a>
      </nav>
      <div class="adm__side-foot">
        {{ auth()->user()->name ?? '' }}<br>
        <form method="POST" action="{{ route('admin.logout') }}" style="margin-top:8px;">
          @csrf
          <button class="btn btn--ghost btn--sm" type="submit">Déconnexion</button>
        </form>
      </div>
    </aside>

    <div class="adm__main">
      <header class="adm__top">
        <h1>@yield('heading', 'Admin')</h1>
        <div>@yield('actions')</div>
      </header>
      <div class="adm__content">
        @if (session('success'))
          <div class="alert alert--success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
          <div class="alert alert--error">{{ session('error') }}</div>
        @endif
        @yield('content')
      </div>
    </div>
  </div>
  @stack('scripts')
</body>
</html>
