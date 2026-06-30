# Made in Gabao — Cod'On Session 28

Mini-plateforme **Laravel 11** pour l'événement *Made in Gabao* : site vitrine + inscriptions
des participants, mini-administration, export Excel, invitation PDF et QR codes.

Pensée pour rester **légère, claire et déployable sur Hostinger** (PHP/MySQL), et pour évoluer
progressivement (paiement, check-in live, campagnes WhatsApp/email…).

---

## ✨ Fonctionnalités (V1)

- **Site public** (one-page) : hero, événement, veillées, programme, infos, FAQ — design charte
  graphique Made in Gabao (Montserrat / Poppins / JetBrains Mono, bleu `#264185` + or `#FDB912`).
- **Inscription** `/inscription` : formulaire validé → enregistrement en base, **référence unique**
  (`MIG-2026-XXXXXX`), **token QR**, email de confirmation, page de remerciement avec QR + lien PDF.
- **Administration** `/admin` (auth) : tableau de bord, liste avec **recherche & filtre statut**,
  détail, changement de statut (`pending`/`confirmed`/`cancelled`), **suppression douce**,
  **export Excel**, **invitation PDF**, QR par inscrit, journal de **relances** (email/WhatsApp).
- **PDF invitation** + **QR code** (URL de check-in) — route publique sécurisée par token.
- **Check-in** `/checkin/{token}` : page de vérification (base prête pour un futur scan à l'entrée).
- **Configuration centralisée** de l'événement dans `config/event.php` (surcharge via `.env`).

---

## 🧱 Stack & dépendances

| Composant | Choix |
|---|---|
| Framework | Laravel 11 (PHP 8.2+) |
| Vues | Blade + CSS custom (pas de build Node requis) |
| Base | MySQL/MariaDB (prod) · SQLite (local) |
| Excel | `maatwebsite/excel` |
| PDF | `barryvdh/laravel-dompdf` |
| QR code | `simplesoftwareio/simple-qrcode` (SVG, sans imagick) |
| Auth / Mail / Validation | Cœur Laravel (aucune dépendance lourde) |

> Aucune stack complexe (Docker, Inertia, Vue/React) — uniquement Blade + routes/controllers/models.

---

## 🚀 Installation locale

Prérequis : PHP ≥ 8.2, Composer, (MySQL **ou** SQLite).

```bash
git clone https://github.com/Marseven/made-in-gabao.git
cd made-in-gabao

composer install
cp .env.example .env
php artisan key:generate
```

**Base de données** — le plus simple en local : SQLite.

```bash
# .env -> DB_CONNECTION=sqlite
touch database/database.sqlite
php artisan migrate --seed
```

(Ou configure MySQL dans `.env` puis `php artisan migrate --seed`.)

Lancer :

```bash
php artisan serve
# http://127.0.0.1:8000
```

**Connexion admin** (créée par le seeder, valeurs par défaut, à changer en prod) :

- URL : `/admin/login`
- Email : `contact@codon.ga`
- Mot de passe : `MadeInGabao#2026`

> ⚠️ Si le mot de passe contient un `#`, **entoure-le de guillemets** dans `.env`
> (`ADMIN_PASSWORD="MadeInGabao#2026"`), sinon dotenv le coupe.

---

## ⚙️ Configuration

Toutes les infos de l'événement vivent dans [`config/event.php`](config/event.php) et sont
surchargeables via `.env` (`EVENT_*`). Le formulaire d'inscription s'ouvre/se ferme avec
`EVENT_REGISTRATION_OPEN=true|false`.

Email : par défaut `MAIL_MAILER=log` (les mails partent dans `storage/logs`). Pour l'envoi réel,
renseigne le SMTP (Hostinger) dans `.env`.

---

## 🗂️ Architecture

```
app/
├── Http/Controllers/Public/   # Home, Registration, Contact, Checkin, Invitation
├── Http/Controllers/Admin/    # Auth, Dashboard, Registration (CRUD léger)
├── Http/Requests/             # StoreRegistrationRequest (validation)
├── Models/                    # Registration, RegistrationMessage, User
├── Mail/                      # RegistrationConfirmation
├── Exports/                   # RegistrationsExport (Excel)
└── Services/                  # QrCodeService
config/event.php               # Source unique des infos événement
database/migrations/           # registrations, registration_messages
database/seeders/              # AdminUserSeeder, RegistrationSeeder (local)
resources/views/
├── layouts/                   # public.blade.php, admin.blade.php
├── partials/                  # nav, footer
├── public/                    # home, register, register-thanks, contact, checkin
├── admin/                     # login, dashboard, registrations/{index,show}
├── pdf/invitation.blade.php
└── emails/registration-confirmation.blade.php
public/css|js|assets/          # design (styles.css, admin.css, logos, motif)
routes/web.php
```

### Routes principales

| Méthode | URI | Nom | Rôle |
|---|---|---|---|
| GET | `/` | `home` | Site one-page |
| GET/POST | `/inscription` | `register.create` / `register.store` | Formulaire + enregistrement |
| GET | `/inscription/merci/{reference}` | `register.thanks` | Confirmation + QR |
| GET/POST | `/contact` | `contact` / `contact.send` | Contact |
| GET | `/checkin/{token}` | `checkin` | Vérification (scan QR) |
| GET | `/invitation/{token}` | `invitation` | Invitation PDF (token) |
| GET | `/admin/login` | `admin.login` | Connexion admin |
| GET | `/admin` | `admin.dashboard` | Tableau de bord |
| GET | `/admin/registrations` | `admin.registrations.index` | Liste + recherche/filtre |
| GET | `/admin/registrations/export` | `admin.registrations.export` | Export Excel |
| GET | `/admin/registrations/{id}` | `admin.registrations.show` | Détail + QR |
| PATCH | `/admin/registrations/{id}/status` | `admin.registrations.status` | Statut |
| DELETE | `/admin/registrations/{id}` | `admin.registrations.destroy` | Suppression douce |
| GET | `/admin/registrations/{id}/invitation` | `admin.registrations.invitation` | PDF |
| POST | `/admin/registrations/{id}/remind` | `admin.registrations.remind` | Journalise une relance |

---

## 🐙 Publication sur GitHub (Marseven)

Le dépôt à pousser est **ce dossier** (`made-in-gabao/`). Le `.env` n'est jamais committé.

```bash
git init
git add .
git commit -m "Initial Laravel event platform"
git branch -M main
git remote add origin https://github.com/Marseven/made-in-gabao.git
git push -u origin main
```

> Crée d'abord le dépôt **public** `made-in-gabao` sous le compte/organisation **Marseven**
> (sans README auto pour éviter un conflit au 1er push), puis exécute les commandes ci-dessus.

---

## 🌐 Déploiement Hostinger

Prérequis : hébergement **PHP ≥ 8.2 + MySQL**, accès SSH (ou gestionnaire de fichiers + base via hPanel).

1. **Base MySQL** : créer la base + l'utilisateur dans hPanel, noter `DB_DATABASE / DB_USERNAME / DB_PASSWORD`.
2. **Récupérer le code** : `git clone` du dépôt (ou upload), puis :

```bash
composer install --no-dev --optimize-autoloader
cp .env.example .env
php artisan key:generate
# éditer .env : APP_URL, APP_DEBUG=false, DB_*, MAIL_*, ADMIN_*, EVENT_*
php artisan migrate --force
php artisan db:seed --class=Database\\Seeders\\AdminUserSeeder --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

3. **Document root** : faire pointer le (sous-)domaine vers le dossier **`public/`** de l'application.
   - Sous-domaine `made-in-gabao.codon.ga` → racine = `.../made-in-gabao/public`.
   - Si l'hébergement ne permet pas de changer le document root (racine figée sur `public_html`),
     déposer le contenu de `public/` dans `public_html/` et le reste de l'app **au-dessus** de
     `public_html`, puis ajuster les chemins `require` dans `public_html/index.php`.
4. **Permissions** : `storage/` et `bootstrap/cache/` doivent être inscriptibles :

```bash
chmod -R 775 storage bootstrap/cache
```

5. **Après une mise à jour** :

```bash
git pull
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan config:cache && php artisan route:cache && php artisan view:cache
```

> Le `public/.htaccess` fourni par Laravel gère la réécriture d'URL (mod_rewrite, actif sur Hostinger).

---

## 🔭 Évolutions prévues (architecture déjà en place)

- Envoi **réel** des relances email / WhatsApp (table `registration_messages` + modèle prêts —
  brancher Meta/WhatsApp Business API, Twilio, Wati…).
- **Check-in live** : champs `checked_in_at`, `checked_in_by`, `checkin_status` déjà présents ;
  ajouter l'action de scan sur `/checkin/{token}`.
- Paiement d'inscription, badges participants, statistiques, segmentation email, import Excel,
  gestion intervenants / partenaires, multi-événements, templates PDF/email personnalisés.

---

## 🔒 Notes sécurité

- Protection **CSRF** sur tous les formulaires, validation serveur, honeypot anti-spam.
- Invitations/PDF protégés par **token unique** non devinable (UUID).
- `composer audit` peut signaler des avis sur `dompdf` (génération PDF côté admin, données internes) —
  garder la dépendance à jour.
- Ne jamais committer `.env` ; changer le mot de passe admin par défaut en production.
