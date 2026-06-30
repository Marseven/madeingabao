<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>@yield('title', config('event.name') . ' | ' . config('event.city') . ', 12 septembre')</title>
  <meta name="description" content="@yield('description', 'Made in Gabao, l\'événement tech de la communauté Cod\'On à Libreville le 12 septembre 2026. 3 veillées en ligne gratuites. Inscription ouverte.')" />
  <meta name="theme-color" content="{{ config('event.colors.navy') }}" />
  <link rel="canonical" href="{{ url()->current() }}" />

  <!-- Open Graph / Social -->
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="{{ config('event.organizer') }}" />
  <meta property="og:title" content="{{ config('event.name') }}" />
  <meta property="og:description" content="{{ config('event.tagline') }} {{ config('event.date_label') }} · {{ config('event.city') }}." />
  <meta property="og:url" content="{{ url('/') }}" />
  <meta property="og:image" content="{{ asset('assets/og-cover.png') }}" />
  <meta property="og:locale" content="fr_FR" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="{{ config('event.social_handle') }}" />

  <link rel="icon" type="image/svg+xml" href="{{ asset('assets/favicon.svg') }}" />
  <link rel="apple-touch-icon" href="{{ asset('assets/codon-logo-jaune.png') }}" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
  @stack('head')
</head>
<body>
  <a class="skip-link" href="#main">Aller au contenu</a>

  @include('partials.nav')

  <main id="main">
    @yield('content')
  </main>

  @include('partials.footer')

  <script src="{{ asset('js/script.js') }}"></script>
  @stack('scripts')
</body>
</html>
