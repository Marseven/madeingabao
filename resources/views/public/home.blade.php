@extends('layouts.public')

@section('content')

  {{-- ===================== HERO ===================== --}}
  <section class="hero" id="hero">
    <div class="hero__bg" aria-hidden="true"></div>
    <div class="hero__glow" aria-hidden="true"></div>

    <div class="container hero__inner">
      <div class="terminal reveal">
        <div class="terminal__bar">
          <span class="dot dot--r"></span><span class="dot dot--y"></span><span class="dot dot--g"></span>
          <span class="terminal__title">made-in-gabao.gab</span>
          <span class="terminal__tag">&gt;_ #MadeInGabao</span>
        </div>
        <div class="terminal__body">
          <p class="terminal__line"><span class="prompt">codon@gabao:~$</span> run made-in-gabao --session {{ config('event.session') }}</p>
          <p class="terminal__line terminal__out">→ compiling le futur du Gabon…</p>
          <p class="terminal__line terminal__out terminal__ok">✓ build ready — 12.09.2026 · {{ config('event.city') }}</p>
        </div>
      </div>

      <p class="hero__overline reveal">Cod'On présente · Session {{ config('event.session') }}</p>
      <h1 class="hero__title reveal">
        <span class="hero__title-1">MADE IN</span>
        <span class="hero__title-2">GABAO<span class="dot-accent">.</span></span>
      </h1>
      <p class="hero__slogan reveal">«&nbsp;Le futur du Gabon se code ici,<br /><span class="accent">par nous, pour nous.</span>&nbsp;»</p>

      <div class="hero__meta reveal">
        <div class="meta-chip">
          <span class="meta-chip__label">Quand</span>
          <span class="meta-chip__value">{{ config('event.date_label') }}</span>
          <span class="meta-chip__sub">{{ config('event.time_label') }}</span>
        </div>
        <div class="meta-chip">
          <span class="meta-chip__label">Où</span>
          <span class="meta-chip__value">{{ config('event.city') }}</span>
          <span class="meta-chip__sub">{{ config('event.address') }}</span>
        </div>
      </div>

      <div class="hero__cta reveal">
        @if (config('event.registration_open'))
          <a class="btn btn--gold" href="{{ route('register.create') }}">Inscription gratuite</a>
        @else
          <a class="btn btn--gold" href="#inscription">Inscription gratuite</a>
        @endif
        <a class="btn btn--ghost" href="#programme">Voir le programme</a>
      </div>

      <div class="countdown reveal" id="countdown" data-target="{{ config('event.datetime') }}" aria-label="Compte à rebours avant l'événement">
        <div class="countdown__item"><span class="countdown__num" data-cd="days">--</span><span class="countdown__lbl">jours</span></div>
        <div class="countdown__item"><span class="countdown__num" data-cd="hours">--</span><span class="countdown__lbl">heures</span></div>
        <div class="countdown__item"><span class="countdown__num" data-cd="mins">--</span><span class="countdown__lbl">min</span></div>
        <div class="countdown__item"><span class="countdown__num" data-cd="secs">--</span><span class="countdown__lbl">sec</span></div>
      </div>
      <p class="hero__url reveal"><span class="prompt-mini">&gt;_</span> www.codon.ga · #MadeInGabao · #VeilleesCodOn</p>
    </div>
  </section>

  {{-- ===================== À PROPOS ===================== --}}
  <section class="section section--light" id="evenement">
    <div class="container">
      <div class="grid-2">
        <div>
          <p class="overline">// 01 — l'événement</p>
          <h2 class="section__title">Made in Gabao, c'est <span class="hl">la communauté Cod'On</span> qui célèbre le talent tech gabonais.</h2>
        </div>
        <div class="prose">
          <p>Le 12 septembre, on montre des solutions concrètes développées au Gabon, on partage les défis réels du dev local et on inspire la prochaine génération de créateurs.</p>
          <p>En route vers l'événement, suivez les <strong>Veillées Cod'On</strong> : trois échanges en ligne, gratuits et ouverts, les jeudis 16 juillet, 20 août et 3 septembre, de 19h à 21h.</p>
          <p class="prose__note">Le week-end de la Journée mondiale du programmeur. Développeurs, étudiants, entrepreneurs tech, curieux du numérique : c'est pour vous.</p>
        </div>
      </div>

      <ul class="stats">
        <li class="stats__item"><span class="stats__num">{{ config('event.session') }}</span><span class="stats__lbl">Session Cod'On</span></li>
        <li class="stats__item"><span class="stats__num">3</span><span class="stats__lbl">Veillées en ligne</span></li>
        <li class="stats__item"><span class="stats__num">1</span><span class="stats__lbl">Rendez-vous à {{ config('event.city') }}</span></li>
        <li class="stats__item"><span class="stats__num">0 <small>FCFA</small></span><span class="stats__lbl">Inscription gratuite</span></li>
      </ul>
    </div>
  </section>

  {{-- ===================== VEILLÉES ===================== --}}
  <section class="section section--dark" id="veillees">
    <div class="container">
      <div class="section__head">
        <p class="overline overline--light">// 02 — avant le jour J</p>
        <h2 class="section__title section__title--light">3 Veillées Cod'On</h2>
        <p class="section__lead">Pas de conférence descendante — des échanges libres animés par un modérateur, micro ouvert, sur les sujets qui agitent vraiment l'écosystème tech. En ligne, les jeudis de 19h à 21h.</p>
      </div>

      <div class="veillees">
        @php
          $veillees = [
            ['mod' => 'green', 'no' => '01', 'date' => 'JEU. 16.07 · 19H-21H', 'title' => 'Coder avec l\'IA : super-pouvoir ou piège ?', 'desc' => 'Agents IA, vibe coding, code généré qui part en prod… On en parle franchement, sans filtre. L\'IA accélère-t-elle les devs gabonais ou menace-t-elle les juniors ?'],
            ['mod' => 'gold', 'no' => '02', 'date' => 'JEU. 20.08 · 19H-21H', 'title' => 'Sécurité : le maillon faible du dev gabonais ?', 'desc' => 'Dépendances piégées, données personnelles mal protégées, failles dans le code généré par IA… On parle DevSecOps pour de vrai, à notre échelle.'],
            ['mod' => 'blue', 'no' => '03', 'date' => 'JEU. 03.09 · 19H-21H', 'title' => 'Construire et vivre du Made in Gabao', 'desc' => 'Label startup, nouveaux décrets, vendre à l\'administration, monétiser une solution locale… Et surprise : on dévoile le programme et les speakers de l\'événement.'],
          ];
        @endphp
        @foreach ($veillees as $v)
          <article class="veillee veillee--{{ $v['mod'] }} reveal">
            <div class="veillee__top">
              <span class="veillee__no">&gt; veillée #{{ $v['no'] }}</span>
              <span class="veillee__date">{{ $v['date'] }}</span>
            </div>
            <h3 class="veillee__title">{{ $v['title'] }}</h3>
            <p class="veillee__desc">{{ $v['desc'] }}</p>
            <div class="veillee__foot">
              <span class="badge">En ligne</span>
              <a class="veillee__link" href="{{ config('event.registration_open') ? route('register.create') : '#inscription' }}">S'inscrire →</a>
            </div>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  {{-- ===================== PROGRAMME ===================== --}}
  <section class="section section--light" id="programme">
    <div class="container">
      <div class="section__head">
        <p class="overline">// 03 — le 12 septembre</p>
        <h2 class="section__title">Le rendez-vous Made in Gabao</h2>
        <p class="section__lead">Une matinée pour montrer ce que le Gabon code : démos de solutions locales, retours d'expérience du dev terrain, et une communauté qui inspire la prochaine génération.</p>
      </div>

      <div class="program">
        <ol class="timeline">
          @foreach ([['09:00','Accueil & ouverture','Café, networking et lancement de la Session 28.'],['09:30','Démos « Made in Gabao »','Des solutions concrètes développées au Gabon, présentées par celles et ceux qui les construisent.'],['10:45','Échanges & talks','Les défis réels du dev local, micro ouvert avec la communauté.'],['12:00','Clôture & networking','Le futur du Gabon se code ici, par nous, pour nous.']] as $slot)
            <li class="timeline__item">
              <span class="timeline__time">{{ $slot[0] }}</span>
              <div class="timeline__body">
                <h3>{{ $slot[1] }}</h3>
                <p>{{ $slot[2] }}</p>
              </div>
            </li>
          @endforeach
        </ol>

        <aside class="program__card">
          <p class="program__tag">&gt;_ status</p>
          <h3 class="program__title">Programme détaillé</h3>
          <p class="program__text">Le programme complet et les speakers sont dévoilés après la <strong>Veillée #03</strong>, le 3 septembre. Inscris-toi pour être prévenu·e en premier.</p>
          <a class="btn btn--gold btn--full" href="{{ config('event.registration_open') ? route('register.create') : '#inscription' }}">Je réserve ma place</a>
          <p class="program__fine">Places limitées · Inscription gratuite</p>
        </aside>
      </div>
    </div>
  </section>

  {{-- ===================== INFOS PRATIQUES ===================== --}}
  <section class="section section--sand" id="infos">
    <div class="container">
      <div class="section__head">
        <p class="overline">// 04 — infos pratiques</p>
        <h2 class="section__title">L'essentiel à savoir</h2>
      </div>
      <div class="infos">
        <div class="info-card">
          <span class="info-card__ico" aria-hidden="true"><svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4.5" width="18" height="16" rx="2.5"/><path d="M3 9.5h18M8 2.5v4M16 2.5v4"/></svg></span>
          <h3>Quand</h3>
          <p>{{ config('event.date_label') }}<br /><strong>{{ config('event.time_label') }}</strong></p>
        </div>
        <div class="info-card">
          <span class="info-card__ico" aria-hidden="true"><svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s7-5.6 7-11a7 7 0 1 0-14 0c0 5.4 7 11 7 11z"/><circle cx="12" cy="10" r="2.6"/></svg></span>
          <h3>Où</h3>
          <p>{{ config('event.place') }}<br /><strong>{{ config('event.address') }}</strong></p>
        </div>
        <div class="info-card">
          <span class="info-card__ico" aria-hidden="true"><svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9.5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2 2 2 0 0 0 0 5 2 2 0 0 1-2 2H5a2 2 0 0 1-2-2 2 2 0 0 0 0-5z"/><path d="M14.5 7.5v9"/></svg></span>
          <h3>Tarif</h3>
          <p>Inscription gratuite<br /><strong>Places limitées</strong></p>
        </div>
        <div class="info-card">
          <span class="info-card__ico" aria-hidden="true"><svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="3.2"/><path d="M3.6 19a5.4 5.4 0 0 1 10.8 0"/><path d="M16 5.2a3 3 0 0 1 0 5.6M20.4 19a5 5 0 0 0-3-4.6"/></svg></span>
          <h3>Pour qui</h3>
          <p>Devs, étudiants, entrepreneurs<br /><strong>&amp; curieux du numérique</strong></p>
        </div>
      </div>
    </div>
  </section>

  {{-- ===================== INSCRIPTION (CTA) ===================== --}}
  <section class="section section--dark section--register" id="inscription">
    <div class="container">
      <div class="register">
        <div class="register__intro">
          <p class="overline overline--light">// 05 — inscription</p>
          <h2 class="section__title section__title--light">Réserve ta place</h2>
          <p class="section__lead">Un seul formulaire pour tout le cycle : choisis ta participation à l'événement du 12 septembre et aux veillées. C'est gratuit, et tu seras prévenu·e à chaque étape.</p>
          <ul class="register__perks">
            <li><svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12.5l5 5 11-11"/></svg> Accès aux 3 veillées en ligne</li>
            <li><svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12.5l5 5 11-11"/></svg> Place pour Made in Gabao le 12/09</li>
            <li><svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12.5l5 5 11-11"/></svg> Replays &amp; récaps « 5 punchlines »</li>
          </ul>
        </div>

        <div class="register__panel">
          <div class="soon">
            @if (config('event.registration_open'))
              <span class="soon__badge">
                <svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12.5l5 5 11-11"/></svg>
                Ouvert
              </span>
              <h3 class="soon__title">Inscription gratuite</h3>
              <p class="soon__text">Moins d'une minute pour réserver ta place. Tu recevras une confirmation par email avec ta référence et ton QR code.</p>
              <a class="btn btn--gold btn--full btn--lg" href="{{ route('register.create') }}">Je m'inscris (gratuit)</a>
              <p class="soon__fine">
                <svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>
                Données stockées en sécurité · zéro spam.
              </p>
            @else
              <span class="soon__badge">
                <svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="8.5"/><path d="M12 7.5V12l3 2"/></svg>
                Bientôt
              </span>
              <h3 class="soon__title">Inscription bientôt ouverte</h3>
              <p class="soon__text">Le formulaire d'inscription (gratuit) ouvre très bientôt. Reviens dans quelques jours, ou suis-nous sur les réseaux pour ne pas rater l'ouverture.</p>
              <a class="btn btn--gold btn--full btn--lg is-disabled" href="#inscription" aria-disabled="true">Inscription bientôt ouverte</a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- ===================== FAQ ===================== --}}
  <section class="section section--light" id="faq">
    <div class="container container--narrow">
      <div class="section__head">
        <p class="overline">// 06 — questions fréquentes</p>
        <h2 class="section__title">FAQ</h2>
      </div>
      <div class="faq" id="faq-list">
        @foreach ([['C\'est vraiment gratuit ?','Oui, totalement. Les veillées en ligne comme l\'événement du 12 septembre sont gratuits. Les places à Libreville sont en revanche limitées, d\'où l\'inscription.'],['Les veillées, ça se passe où ?','100% en ligne, les jeudis de 19h à 21h. Tu reçois le lien d\'accès par email et WhatsApp avant chaque session. Les replays sont publiés ensuite.'],['Je ne suis pas développeur, je peux venir ?','Bien sûr. Étudiants, entrepreneurs, designers et curieux du numérique sont les bienvenus. On parle écosystème, opportunités et impact, pas seulement code.'],['Où aura lieu l\'événement exactement ?','À Libreville. Le lieu précis est confirmé à J-7 (vers le 5 septembre) — inscris-toi pour recevoir le plan d\'accès dès qu\'il est annoncé.']] as $item)
          <details class="faq__item">
            <summary>{{ $item[0] }}</summary>
            <p>{{ $item[1] }}</p>
          </details>
        @endforeach
      </div>
    </div>
  </section>

@endsection
