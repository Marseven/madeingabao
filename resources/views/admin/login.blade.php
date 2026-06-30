<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Connexion admin — {{ config('event.short_name') }}</title>
  <link rel="icon" type="image/svg+xml" href="{{ asset('assets/favicon.svg') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>
<body>
  <div class="login">
    <div class="login__card">
      <div class="login__brand">
        <img src="{{ asset('assets/codon-logo-blue.png') }}" alt="Cod'On" />
        <p>Made in Gabao · Admin</p>
      </div>

      @if ($errors->any())
        <div class="alert alert--error">{{ $errors->first() }}</div>
      @endif

      <form method="POST" action="{{ route('admin.login.attempt') }}">
        @csrf
        <div class="field">
          <label for="email">Email</label>
          <input class="input" type="email" id="email" name="email" value="{{ old('email') }}" required autofocus />
        </div>
        <div class="field">
          <label for="password">Mot de passe</label>
          <input class="input" type="password" id="password" name="password" required />
        </div>
        <label style="display:flex;align-items:center;gap:8px;font-size:13px;margin-bottom:18px;">
          <input type="checkbox" name="remember" value="1" /> Se souvenir de moi
        </label>
        <button class="btn btn--gold" type="submit" style="width:100%;justify-content:center;">Se connecter</button>
      </form>
    </div>
  </div>
</body>
</html>
