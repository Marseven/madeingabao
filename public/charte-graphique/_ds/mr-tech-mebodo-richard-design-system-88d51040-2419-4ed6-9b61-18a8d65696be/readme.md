# MR TECH / MEBODO RICHARD — Design System

A premium, tech-forward design system for one shared identity worn by two
names:

- **MEBODO RICHARD** — the developer's *personal brand*: expertise, vision,
  professional signature.
- **MR TECH** — the *company*: the entrepreneurial structure built around that
  expertise.

Both share the **same logo, palette, and typography**. Only the wordmark name
changes with context. The system is built to power a website, a web/mobile app,
social media, professional documents, print, and digital branding.

> Positioning keywords: technological expertise · modernity · stability ·
> trust · progression · innovation · structure · professionalism · clarity ·
> visual impact.

---

## Sources

This system was derived from materials supplied by the client:

- **`uploads/Charte Graphique MEBODO RICHARD.pdf`** — the official 35-page
  brand charter (logo construction, declinaisons, protection zone, min size,
  prohibitions, typography, full color palette + ramps, document & social
  templates). Authored by KIVYSOFT.
- **`Entreprise/`** (local mounted folder) — production brand assets: logo
  files (`.ai`, `.pdf`, `.png`), business card, email signatures, cachet
  (stamp), roll-up, devis/proforma, statutes. The key raster logos and the
  email-signature SVG were copied into `assets/`.

The "Entreprise" folder is an **asset library, not a codebase** — there is no
existing front-end to recreate. UI kits in this system are therefore *new*
brand-faithful interfaces built from the charter, not recreations of a shipped
product.

**Contact baked into templates:** +241 74 22 83 06 · contact@mebodorichard.com ·
www.mebodorichard.com · Libreville, Gabon.

---

## ⚠️ Font substitution (action needed)

The charter specifies two **commercial, non-embeddable** fonts:

| Role | Charter font | Substitute used (Google Fonts) |
|------|-------------|-------------------------------|
| Titles | **Expose** (Regular/Bold) | **Space Grotesk** |
| Body | **Bespoke Sans** (Light/Regular/Bold/ExtraBold) | **Manrope** |
| Code/labels | — | **JetBrains Mono** (echoes the code-balise glyph) |

Both substitutes are from the charter's own approved alternatives list and are
visually close (structured geometric titles + clean humanist body). **If you
own licensed `Expose` / `Bespoke Sans` web fonts, drop the `.woff2` files in
`assets/fonts/` and replace the `@import` in `tokens/fonts.css` with `@font-face`
rules** — the `--font-heading` / `--font-body` tokens will pick them up
everywhere automatically.

---

## CONTENT FUNDAMENTALS

How copy is written across this brand:

- **Language: French (FR).** Primary voice. Occasional English tech terms are
  fine where they're industry-standard (*Cloud, DevOps, API, full-stack*).
- **Tone:** confident, precise, technical-but-clear. Premium without being
  corporate-stiff. Never playful, never salesy-loud.
- **Voice / person:** addresses the client as **vous** (formal/respectful). The
  personal brand (MEBODO RICHARD) can speak in first person — *"Je conçois des
  produits…"*; the company (MR TECH) speaks as **nous** — *"Nous construisons…"*.
- **Casing:** Sentence case for body and most headings. **OVERLINE / eyebrow
  labels are UPPERCASE** with wide tracking (mono font). Wordmark is always
  `MR TECH` / `MEBODO RICHARD` as specified.
- **Rhythm:** short, declarative. Verb-led CTAs. Triads are on-brand
  (*"Concevoir. Développer. Déployer."*).
- **Numbers / proof:** used sparingly and only when real (projets livrés, années
  d'expérience, taux de satisfaction). No invented vanity stats / data slop.
- **Emoji:** **none.** Not part of the brand. Use icons or the chevron glyph
  instead.
- **Vibe examples:**
  - Eyebrow → `NOS SERVICES`
  - Hero → *"Solutions tech sur mesure pour entreprises ambitieuses."*
  - CTA → *"Démarrer un projet"*, *"Demander un devis"*, *"Voir le portfolio"*
  - Microcopy → *"Réponse sous 24h ouvrées."*

---

## VISUAL FOUNDATIONS

**Color.** Five fixed brand colors (never invent new hues):
Teal Forest `#005C53` (primary — links, nav, brand, institutional sections),
Deep Navy `#042940` (secondary — titles, body text, dark/hero surfaces),
Lime `#9FC131` (CTA / buttons / interactive accents),
Electric Lime `#DBF227` (highlights, hover, badges, progress),
Sand `#D6D58E` (warm neutral — soft backgrounds, dividers, calm zones).
Teal Forest and Lime carry full 10→100% ramps. A cool, navy-tinted grey scale
handles neutrals. Functional success/warning/error/info round out the set.
**Text rule:** Deep Navy for primary text on light; white or very-light sand on
dark. **Never** set long text in Lime/Electric Lime on light backgrounds.

**Type.** Space Grotesk (titles) + Manrope (body) + JetBrains Mono (code/labels).
Titles are tight (negative tracking on display sizes), structured, technological.
Body is calm and highly legible at 1.6 line-height. Mono is reserved for
eyebrows, tech tags, code snippets — it nods to the code-balise in the glyph.

**Backgrounds.** Mostly clean: white / very light grey (`--grey-50`) for default
surfaces; Deep Navy and Teal Forest for premium/hero/institutional sections.
The signature texture is the **chevron / code-balise pattern** (`>`), used
*subtly* — low-opacity diagonal chevrons on hero panels, card corners, and
section dividers. Never loud, never harms legibility. No photographic gradients,
no purple/blue AI gradients.

**Imagery.** Cool/neutral tones, modern tech/office environments, clean premium
crops, professional portraits. Apply a Deep Navy or Teal Forest overlay and let
Lime act as the single energizing accent. (Use placeholders until real photos
are supplied.)

**Corner radii.** Soft, not pill-everything: `8px` buttons/inputs, `16px` cards,
up to `24–32px` for large feature panels. `full` only for pills, avatars, dots.

**Cards.** White surface, `1px` hairline border (`--border-default`), **soft**
navy-tinted shadow, `16px` radius. Premium variants go Deep Navy or Teal Forest.
An optional **3px Lime top-accent border** marks featured/primary cards.

**Shadows.** Cool, navy-tinted, four steps: soft → medium → elevated → premium.
A dedicated **lime glow** (`--shadow-lime`) is reserved for premium CTAs.

**Borders.** Hairline `1px` grey on light; `1.5px` on inputs and outline
controls; `rgba(255,255,255,.12)` on dark surfaces. Focus = `1.5px` lime border
+ a soft lime focus ring.

**Motion.** Sober. Transitions 150–250ms with a professional ease
(`cubic-bezier(0.4,0,0.2,1)` standard, `(0.16,1,0.3,1)` for entrances). Buttons
darken/lighten on hover (no big movement); cards lift ~4px with a deepened
shadow; sections fade/rise in on scroll. Micro-interactions use Lime / Electric
Lime. **No bounce, no excessive or infinite decorative animation.**

**Hover / press.** Hover: primary lime → darker lime (`--lime-70`) or → electric
lime for premium; ghost/tertiary → light grey wash; links → darker lime. Press:
subtle, no large shrink. Disabled: 50% opacity, no-drop cursor.

**Transparency / blur.** Sparingly — overlay scrims for modals
(`rgba(4,41,64,.55)`), occasional frosted header on scroll. Not a core motif.

**Layout.** 12-col desktop / 8-col tablet / 4-col mobile, `24px` gutter, max
container `1320px` (content `1200px`). Generous vertical spacing on the 4-based
scale. Fixed/sticky header; the rest scrolls.

---

## ICONOGRAPHY

The brand has **no bundled icon font or custom SVG icon set** in the supplied
materials — the only proprietary glyph is the **MR mark** itself (`M + R +
code-balise`), which doubles as favicon / app icon / pattern seed.

**Approach for this system:** use **[Lucide](https://lucide.dev)** (line icons,
~1.75–2px stroke, lightly rounded corners) loaded from CDN as the working icon
set. It matches the charter's stated direction — *line icons, slightly rounded
corners, consistent stroke, themes of code / cloud / web / mobile / server / AI /
security / API / dashboard*. **This is a substitution; flag to the client and
swap for a bespoke set if/when one exists.**

Rules:
- Stroke icons only; never filled, never multicolor.
- Color: inherit text color (navy/teal); use **Lime / Electric Lime as the
  accent** for active/important icons only.
- Pair an icon with the chevron `>` motif for "progression / next" affordances.
- **No emoji.** No unicode dingbats as icons.

Brand assets copied into **`assets/`**: full logos (navy / teal / white),
extracted **glyphs** (`glyph-navy/teal/white.png`), generated **favicon** and
**app-icon**, **cachet** (stamp), and the **email-signature** PNGs + SVG.

---

## INDEX — what's in this project

**Foundations**
- `styles.css` — root entry (import manifest only; consumers link this).
- `tokens/` — `colors.css`, `typography.css`, `spacing.css`, `fonts.css`,
  `base.css` (resets + chevron-pattern utilities). 180 tokens.
- `guidelines/*.card.html` — foundation specimen cards (Colors, Type, Spacing,
  Brand) shown in the Design System tab.

**Components** (`components/<group>/` — React, namespace
`window.MRTECHMEBODORICHARDDesignSystem_88d510`):
- `core/` — Button, IconButton, Badge, Tag, Avatar, Logo
- `forms/` — Input, Textarea, Select, Checkbox, Radio, Switch
- `layout/` — Card
- `feedback/` — Alert
- `navigation/` — Tabs
- `data/` — StatCard, ProgressBar

**UI kits** (`ui_kits/<product>/`)
- `mrtech-site/` — MR TECH marketing site (homepage, services, contact).
- `mebodo-portfolio/` — MEBODO RICHARD developer portfolio.

**Applications**
- `applications/*.card.html` — social templates (1080² post, story, LinkedIn
  banner) and print/brand supports (business card, email signature).

**Other**
- `assets/` — logos, glyphs, favicon, app icon, signatures, cachet.
- `SKILL.md` — Agent-Skill manifest for downstream use.

---

## Developer handoff (quick start)

```html
<!-- 1. Link the one global stylesheet -->
<link rel="stylesheet" href="styles.css" />
<!-- 2. (For React components) load React + the compiled bundle -->
<script src="_ds_bundle.js"></script>
<script>const { Button, Card } = window.MRTECHMEBODORICHARDDesignSystem_88d510;</script>
```

- **CSS variables:** everything is a token — `var(--color-teal-forest)`,
  `var(--space-6)`, `var(--radius-card)`, `var(--shadow-elevated)`,
  `var(--font-heading)`. See `tokens/`.
- **Naming:** `--color-*` brand, `--text-* / --surface-* / --border-*` semantic
  aliases, `--space-N`, `--radius-*`, `--shadow-*`, `--t-*` type scale.
- **Responsive:** 12/8/4 columns, `--container-*` widths, mobile hit targets
  ≥44px, body text ≥16px (≥24px on slides, ≥12pt in print).
- **Accessibility:** Deep Navy text on light; white/sand on dark; never long
  Lime text on light; visible lime focus rings; 50%-opacity disabled states.
- A **Tailwind theme** mapping lives in `developer-handoff/tailwind.theme.js`.
