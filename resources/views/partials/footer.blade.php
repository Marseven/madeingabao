<footer class="footer">
  <div class="footer__bg" aria-hidden="true"></div>
  <div class="container footer__inner">
    <div class="footer__brand">
      <img src="{{ asset('assets/codon-logo-jaune.png') }}" alt="Cod'On" class="footer__logo" />
      <p class="footer__slogan">{{ config('event.tagline') }}</p>
      <p class="footer__compiled">&gt;_ Compilé au Gabon · #MadeInGabao · #VeilleesCodOn · #CodeIsPoetry</p>
    </div>

    <div class="footer__col">
      <h4>Navigation</h4>
      <a href="{{ route('home') }}#evenement">L'événement</a>
      <a href="{{ route('home') }}#veillees">Les veillées</a>
      <a href="{{ route('home') }}#programme">Programme</a>
      <a href="{{ route('contact') }}">Contact</a>
    </div>

    <div class="footer__col">
      <h4>Contact</h4>
      <a href="mailto:{{ config('event.contact_email') }}">{{ config('event.contact_email') }}</a>
      <a href="{{ config('event.website') }}" target="_blank" rel="noopener">{{ str_replace(['https://', 'http://'], '', config('event.website')) }}</a>
      <span class="footer__handle">{{ config('event.social_handle') }}</span>
    </div>

    <div class="footer__col">
      <h4>Suivez-nous</h4>
      <div class="socials">
        <a href="#" aria-label="Facebook" class="social"><svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M13.5 21v-8h2.7l.4-3.1h-3.1V7.9c0-.9.25-1.5 1.55-1.5H17V3.6c-.3 0-1.3-.1-2.45-.1-2.42 0-4.05 1.48-4.05 4.2v2.2H7.8V13h2.7v8h3z"/></svg></a>
        <a href="#" aria-label="Instagram" class="social"><svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12 8.5a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7zm0 5.8a2.3 2.3 0 1 1 0-4.6 2.3 2.3 0 0 1 0 4.6zM16 4H8a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V8a4 4 0 0 0-4-4zm2.8 12A2.8 2.8 0 0 1 16 18.8H8A2.8 2.8 0 0 1 5.2 16V8A2.8 2.8 0 0 1 8 5.2h8A2.8 2.8 0 0 1 18.8 8v8zm-2.6-8.9a.85.85 0 1 0 0 1.7.85.85 0 0 0 0-1.7z"/></svg></a>
        <a href="#" aria-label="X (Twitter)" class="social"><svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M17.5 3h3l-6.6 7.5L21.7 21h-5.9l-4.6-6-5.3 6H3l7-8L2.5 3h6l4.1 5.5L17.5 3zm-1 16h1.6L8.1 4.7H6.4L16.5 19z"/></svg></a>
        <a href="#" aria-label="LinkedIn" class="social"><svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M6.94 5a1.94 1.94 0 1 1-3.88 0 1.94 1.94 0 0 1 3.88 0zM3.3 8.4h3.3V21H3.3V8.4zM9.1 8.4h3.16v1.72h.05c.44-.83 1.5-1.72 3.1-1.72 3.32 0 3.93 2.18 3.93 5v7.6h-3.3v-6.74c0-1.6-.03-3.67-2.24-3.67-2.24 0-2.58 1.75-2.58 3.55V21H9.1V8.4z"/></svg></a>
      </div>
    </div>
  </div>

  <div class="container footer__bottom">
    <p>© {{ date('Y') }} {{ config('event.organizer') }} · {{ config('event.short_name') }} — Session {{ config('event.session') }}</p>
    <p><a href="{{ config('event.website') }}" target="_blank" rel="noopener">{{ str_replace(['https://', 'http://'], '', config('event.website')) }}</a></p>
  </div>
</footer>
