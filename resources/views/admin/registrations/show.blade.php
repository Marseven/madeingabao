@extends('layouts.admin')
@section('title', $registration->reference)
@section('heading', $registration->full_name)
@section('actions')
  <a class="btn btn--ghost btn--sm" href="{{ route('admin.registrations.index') }}">← Liste</a>
  <a class="btn btn--gold btn--sm" href="{{ route('admin.registrations.invitation', $registration) }}" target="_blank">Invitation PDF</a>
@endsection

@section('content')
  <div class="detail">
    {{-- Colonne principale --}}
    <div>
      <div class="panel" style="margin-bottom:22px;">
        <div class="panel__head">
          <h2>Inscription {{ $registration->reference }}</h2>
          <span class="pill pill--{{ $registration->statusColor() }}">{{ $registration->statusLabel() }}</span>
        </div>
        <div class="panel__body">
          <table class="dl">
            <tr><td class="k">Nom complet</td><td class="v">{{ $registration->full_name }}</td></tr>
            <tr><td class="k">Email</td><td class="v"><a href="mailto:{{ $registration->email }}">{{ $registration->email }}</a></td></tr>
            <tr><td class="k">Téléphone</td><td class="v">{{ $registration->phone }}</td></tr>
            <tr><td class="k">Organisation</td><td class="v">{{ $registration->organization ?: '—' }}</td></tr>
            <tr><td class="k">Fonction</td><td class="v">{{ $registration->position ?: '—' }}</td></tr>
            <tr><td class="k">Ville</td><td class="v">{{ $registration->city ?: '—' }}</td></tr>
            <tr><td class="k">Participation</td><td class="v">{{ $registration->participation_type ?: '—' }}</td></tr>
            <tr><td class="k">Consentement</td><td class="v">{{ $registration->consent ? 'Oui' : 'Non' }}</td></tr>
            <tr><td class="k">Message</td><td class="v">{{ $registration->message ?: '—' }}</td></tr>
            <tr><td class="k">Inscrit le</td><td class="v">{{ $registration->created_at->format('d/m/Y à H:i') }}</td></tr>
            <tr><td class="k">Check-in</td><td class="v">{{ $registration->isCheckedIn() ? $registration->checked_in_at->format('d/m/Y H:i') : 'Pas encore' }}</td></tr>
          </table>
        </div>
      </div>

      {{-- Statut --}}
      <div class="panel" style="margin-bottom:22px;">
        <div class="panel__head"><h2>Statut</h2></div>
        <div class="panel__body">
          <form method="POST" action="{{ route('admin.registrations.status', $registration) }}" class="filters">
            @csrf @method('PATCH')
            <select class="select" name="status">
              @foreach (\App\Models\Registration::STATUSES as $s)
                <option value="{{ $s }}" @selected($registration->status === $s)>{{ ucfirst($s) }}</option>
              @endforeach
            </select>
            <button class="btn btn--sm" type="submit">Mettre à jour</button>
          </form>
        </div>
      </div>

      {{-- Relances --}}
      <div class="panel">
        <div class="panel__head"><h2>Relances</h2></div>
        <div class="panel__body">
          <form method="POST" action="{{ route('admin.registrations.remind', $registration) }}" style="margin-bottom:16px;">
            @csrf
            <div class="filters">
              <select class="select" name="channel">
                <option value="email">Email</option>
                <option value="whatsapp">WhatsApp</option>
              </select>
              <input class="input" type="text" name="message" placeholder="Note / message (optionnel)" style="min-width:240px;" />
              <button class="btn btn--ghost btn--sm" type="submit">Enregistrer une relance</button>
            </div>
            <p class="muted" style="font-size:12px;margin:10px 0 0;">L'envoi réel (email / WhatsApp) sera branché ultérieurement — ceci journalise la relance.</p>
          </form>

          @if ($messages->count())
            <table class="table" style="margin-top:6px;">
              <thead><tr><th>Canal</th><th>Destinataire</th><th>Statut</th><th>Date</th></tr></thead>
              <tbody>
                @foreach ($messages as $m)
                  <tr>
                    <td>{{ ucfirst($m->channel) }}</td>
                    <td class="muted">{{ $m->recipient }}</td>
                    <td><span class="pill pill--gold">{{ $m->status }}</span></td>
                    <td class="muted">{{ $m->created_at->format('d/m/y H:i') }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @else
            <p class="muted" style="font-size:13px;">Aucune relance enregistrée.</p>
          @endif
        </div>
      </div>
    </div>

    {{-- Colonne latérale : QR + actions --}}
    <div>
      <div class="qrbox" style="margin-bottom:18px;">
        <div>{!! $qrSvg !!}</div>
        <p class="cap">Scan → {{ route('checkin', $registration->qr_code_token) }}</p>
      </div>

      <div class="panel">
        <div class="panel__head"><h2>Actions</h2></div>
        <div class="panel__body" style="display:flex;flex-direction:column;gap:10px;">
          <a class="btn btn--gold btn--sm" href="{{ route('admin.registrations.invitation', $registration) }}" target="_blank">Invitation PDF</a>
          <a class="btn btn--ghost btn--sm" href="{{ route('checkin', $registration->qr_code_token) }}" target="_blank">Page de vérification</a>
          <form method="POST" action="{{ route('admin.registrations.destroy', $registration) }}" onsubmit="return confirm('Supprimer cette inscription ?');">
            @csrf @method('DELETE')
            <button class="btn btn--danger btn--sm" type="submit" style="width:100%;justify-content:center;">Supprimer</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
