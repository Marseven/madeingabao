/* ============================================================
   MADE IN GABAO — Cod'On Session 28 · interactions publiques
   ============================================================ */
(function () {
  'use strict';

  var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var mqMobile = window.matchMedia('(max-width: 900px)');

  /* ---------- forcer le chargement des graisses lourdes des titres ----------
     Sur mobile, Montserrat 900 (titre du hero) se charge tard → fallback système.
     On déclenche explicitement le téléchargement pour un rendu fidèle. */
  if (document.fonts && document.fonts.load) {
    try {
      document.fonts.load('900 1em Montserrat');
      document.fonts.load('800 1em Montserrat');
      document.fonts.load('700 1em Montserrat');
    } catch (e) { /* noop */ }
  }

  /* ---------- mobile nav ---------- */
  var toggle = document.getElementById('navToggle');
  var menu = document.getElementById('navmenu');
  if (toggle && menu) {
    toggle.addEventListener('click', function () {
      var open = menu.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      toggle.setAttribute('aria-label', open ? 'Fermer le menu' : 'Ouvrir le menu');
    });
    menu.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () {
        menu.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
      });
    });
  }

  /* ---------- scroll progress bar ---------- */
  var bar = document.createElement('div');
  bar.className = 'scroll-progress';
  document.body.appendChild(bar);

  /* ---------- countdown (avec petit "tick") ---------- */
  var cd = document.getElementById('countdown');
  if (cd) {
    var target = new Date(cd.dataset.target || '2026-09-12T09:00:00+01:00').getTime();
    var els = {
      days: cd.querySelector('[data-cd="days"]'),
      hours: cd.querySelector('[data-cd="hours"]'),
      mins: cd.querySelector('[data-cd="mins"]'),
      secs: cd.querySelector('[data-cd="secs"]')
    };
    var pad = function (n) { return n < 10 ? '0' + n : '' + n; };
    var setVal = function (el, val) {
      if (!el || el.textContent === String(val)) return;
      el.textContent = val;
      if (!reduceMotion) { el.classList.remove('tick'); void el.offsetWidth; el.classList.add('tick'); }
    };
    var tick = function () {
      var diff = Math.max(0, target - Date.now());
      setVal(els.days, Math.floor(diff / 86400000));
      setVal(els.hours, pad(Math.floor((diff % 86400000) / 3600000)));
      setVal(els.mins, pad(Math.floor((diff % 3600000) / 60000)));
      setVal(els.secs, pad(Math.floor((diff % 60000) / 1000)));
    };
    tick();
    setInterval(tick, 1000);
  }

  /* ---------- reveal on scroll (avec stagger par groupe) ---------- */
  var reveals = document.querySelectorAll('.reveal, .stats__item, .info-card, .timeline__item, .faq__item, .veillee');
  if ('IntersectionObserver' in window && reveals.length && !reduceMotion) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) {
          var sibs = Array.prototype.slice.call(e.target.parentNode.children).filter(function (c) {
            return c.classList && (c.classList.contains('reveal') || c === e.target);
          });
          var idx = sibs.indexOf(e.target);
          e.target.style.transitionDelay = (Math.max(0, idx) % 8 * 70) + 'ms';
          e.target.classList.add('is-in');
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -50px 0px' });
    reveals.forEach(function (el) { el.classList.add('reveal'); io.observe(el); });
  } else {
    reveals.forEach(function (el) { el.classList.add('reveal', 'is-in'); });
  }

  /* ---------- count-up des chiffres clés ---------- */
  function countUp(el) {
    var raw = el.textContent.trim();
    var m = raw.match(/^(\d+)(.*)$/s);          // capte l'entier + suffixe (ex. "0 FCFA")
    if (!m) return;
    var endVal = parseInt(m[1], 10);
    var suffix = m[2] || '';
    if (endVal === 0 || reduceMotion) return;   // rien à animer (ex. "0 FCFA")
    var dur = 1100, start = null;
    var step = function (ts) {
      if (!start) start = ts;
      var p = Math.min(1, (ts - start) / dur);
      var eased = 1 - Math.pow(1 - p, 3);        // easeOutCubic
      el.textContent = Math.round(eased * endVal) + suffix;
      if (p < 1) requestAnimationFrame(step);
      else el.textContent = endVal + suffix;
    };
    el.textContent = '0' + suffix;
    requestAnimationFrame(step);
  }
  var nums = document.querySelectorAll('.stats__num');
  if ('IntersectionObserver' in window && nums.length) {
    var io2 = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { countUp(e.target); io2.unobserve(e.target); }
      });
    }, { threshold: 0.5 });
    nums.forEach(function (el) { io2.observe(el); });
  }

  /* ---------- parallaxe douce du contenu hero + barre de progression ---------- */
  /* (on n'altère PAS .hero__bg/.hero__glow : ils ont déjà leurs animations CSS) */
  var heroInner = document.querySelector('.hero__inner');
  var docEl = document.documentElement;
  var ticking = false;
  function onScroll() {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(function () {
      var y = window.scrollY || docEl.scrollTop;
      var max = docEl.scrollHeight - docEl.clientHeight;
      bar.style.width = (max > 0 ? (y / max) * 100 : 0) + '%';
      // léger fondu/translation du contenu hero au scroll (desktop uniquement).
      // Sur mobile, la barre d'adresse qui se replie change innerHeight et fait
      // sauter/disparaître le contenu → on désactive et on réinitialise.
      if (heroInner && !reduceMotion) {
        if (mqMobile.matches) {
          heroInner.style.transform = '';
          heroInner.style.opacity = '';
        } else if (y < window.innerHeight) {
          heroInner.style.transform = 'translateY(' + (y * 0.12) + 'px)';
          heroInner.style.opacity = Math.max(0, 1 - y / (window.innerHeight * 0.85));
        }
      }
      var nav = document.querySelector('.nav');
      if (nav) nav.style.boxShadow = y > 8 ? '0 8px 30px rgba(0,0,0,.28)' : 'none';
      ticking = false;
    });
  }
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });
})();
