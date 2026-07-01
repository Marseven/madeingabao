<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <style>
    @page { margin: 0; }
    * { box-sizing: border-box; }
    body { margin: 0; font-family: DejaVu Sans, sans-serif; color: #0E1726; }
    .sheet { padding: 38px 44px; }
    .head { background: #264185; color: #fff; padding: 26px 30px; border-radius: 10px; }
    .head table { width: 100%; }
    .logo { height: 34px; }
    .kicker { font-size: 10px; letter-spacing: 2px; color: #FDB912; text-transform: uppercase; }
    .h1 { font-size: 30px; font-weight: bold; margin: 6px 0 0; letter-spacing: -0.5px; }
    .h1 .gold { color: #FDB912; }
    .tagline { font-size: 12px; color: #cdd8f0; margin: 6px 0 0; }
    .body { margin-top: 26px; }
    .card { border: 1px solid #e3e6ef; border-radius: 10px; padding: 22px 24px; }
    .label { font-size: 9px; letter-spacing: 1.5px; text-transform: uppercase; color: #6b7785; }
    .ref { font-size: 22px; font-weight: bold; color: #264185; margin: 2px 0 14px; font-family: DejaVu Sans Mono, monospace; }
    .name { font-size: 18px; font-weight: bold; margin: 0 0 16px; }
    .meta td { font-size: 12px; padding: 4px 0; vertical-align: top; }
    .meta .k { color: #6b7785; width: 120px; }
    .meta .v { font-weight: bold; }
    .qr { text-align: center; }
    .qr img { width: 150px; height: 150px; }
    .qr p { font-size: 9px; color: #6b7785; margin: 6px 0 0; }
    .note { margin-top: 22px; padding: 14px 18px; background: #F4F1E8; border-left: 4px solid #FDB912; border-radius: 6px; font-size: 11px; color: #2b3a4a; }
    .foot { margin-top: 26px; font-size: 10px; color: #6b7785; text-align: center; }
  </style>
</head>
<body>
  <div class="sheet">
    <div class="head">
      <table>
        <tr>
          <td>
            @php $logo = public_path('assets/codon-logo-blue.png'); @endphp
            <div class="kicker">Cod'On · Session {{ config('event.session') }}</div>
            <div class="h1">MADE IN <span class="gold">GABAO.</span></div>
            <div class="tagline">{{ config('event.tagline') }}</div>
          </td>
          <td style="text-align:right; vertical-align:top;">
            <div class="kicker">Invitation</div>
          </td>
        </tr>
      </table>
    </div>

    <div class="body">
      <table style="width:100%;">
        <tr>
          <td style="width:62%; padding-right:18px; vertical-align:top;">
            <div class="card">
              <div class="label">Participant</div>
              <div class="name">{{ $registration->full_name }}</div>
              <div class="label">Référence d'inscription</div>
              <div class="ref">{{ $registration->reference }}</div>

              <table class="meta">
                <tr><td class="k">Participation</td><td class="v">{{ $registration->participation_type ?: '—' }}</td></tr>

                @if ($registration->attendsVeillees())
                  <tr>
                    <td class="k">Veillées</td>
                    <td class="v">En ligne · {{ config('event.veillees_time') }}<br>
                      <span style="font-weight:normal;color:#6b7785;">{{ $registration->veilleesDatesLabel() }}</span>
                    </td>
                  </tr>
                @endif

                @if ($registration->attendsEvent())
                  <tr>
                    <td class="k">Événement</td>
                    <td class="v">{{ config('event.date_label') }} · {{ config('event.time_label') }}<br>
                      <span style="font-weight:normal;color:#6b7785;">{{ config('event.place') }}</span>
                    </td>
                  </tr>
                @endif

                @if ($registration->organization)
                  <tr><td class="k">Organisation</td><td class="v">{{ $registration->organization }}</td></tr>
                @endif
                <tr><td class="k">Statut</td><td class="v">{{ $registration->statusLabel() }}</td></tr>
              </table>
            </div>
          </td>
          <td style="width:38%; vertical-align:top;">
            <div class="card qr">
              <div class="label" style="margin-bottom:10px;">Billet · QR</div>
              <img src="{{ $qrUri }}" alt="QR" />
              <p>Réf. {{ $registration->reference }}</p>
            </div>
          </td>
        </tr>
      </table>

      <div class="note">
        @if ($registration->attendsVeillees() && $registration->attendsEvent())
          Tu participes aux <strong>Veillées Cod'On en ligne</strong> et à <strong>Made in Gabao</strong> le {{ config('event.date_label') }} à {{ config('event.city') }}.
          Le lien de connexion des veillées est envoyé par email la veille de chaque session. Ce billet (QR) pourra être demandé à l'entrée le jour de l'événement.
        @elseif ($registration->attendsVeillees())
          Tu es inscrit·e à toutes les <strong>Veillées Cod'On en ligne</strong>. Le lien de connexion te sera envoyé par email la veille de chaque session.
        @else
          Cette invitation est personnelle et pourra être demandée à l'entrée de l'événement.
        @endif
      </div>

      <div class="foot">
        {{ config('event.organizer') }} · {{ config('event.website') }} · {{ config('event.contact_email') }}
      </div>
    </div>
  </div>
</body>
</html>
