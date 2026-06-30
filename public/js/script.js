/* ============================================================
   MADE IN GABAO — Cod'On Session 28 · interactions publiques
   ============================================================ */
(function () {
  'use strict';

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

  /* ---------- countdown (cible lue depuis data-target) ---------- */
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
    var tick = function () {
      var diff = target - Date.now();
      if (diff <= 0) { diff = 0; }
      var d = Math.floor(diff / 86400000);
      var h = Math.floor((diff % 86400000) / 3600000);
      var m = Math.floor((diff % 3600000) / 60000);
      var s = Math.floor((diff % 60000) / 1000);
      if (els.days) els.days.textContent = d;
      if (els.hours) els.hours.textContent = pad(h);
      if (els.mins) els.mins.textContent = pad(m);
      if (els.secs) els.secs.textContent = pad(s);
    };
    tick();
    setInterval(tick, 1000);
  }

  /* ---------- reveal on scroll ---------- */
  var reveals = document.querySelectorAll('.reveal, .stats__item, .info-card, .timeline__item, .faq__item');
  if ('IntersectionObserver' in window && reveals.length) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    reveals.forEach(function (el) { el.classList.add('reveal'); io.observe(el); });
  } else {
    reveals.forEach(function (el) { el.classList.add('is-in'); });
  }

  /* ---------- nav shadow on scroll ---------- */
  var nav = document.querySelector('.nav');
  if (nav) {
    var onScroll = function () {
      nav.style.boxShadow = window.scrollY > 8 ? '0 8px 30px rgba(0,0,0,.28)' : 'none';
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }
})();
