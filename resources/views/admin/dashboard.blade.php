@extends('layouts.admin')
@section('title', 'Tableau de bord')
@section('heading', 'Tableau de bord')
@section('actions')
  <a class="btn btn--gold btn--sm" href="{{ route('admin.registrations.export') }}">Exporter en Excel</a>
@endsection

@section('content')
  <div class="cards">
    <div class="card"><div class="card__num">{{ $stats['total'] }}</div><div class="card__lbl">Inscrits</div></div>
    <div class="card"><div class="card__num">{{ $stats['confirmed'] }}</div><div class="card__lbl">Confirmés</div></div>
    <div class="card"><div class="card__num">{{ $stats['pending'] }}</div><div class="card__lbl">En attente</div></div>
    <div class="card"><div class="card__num">{{ $stats['cancelled'] }}</div><div class="card__lbl">Annulés</div></div>
    <div class="card"><div class="card__num">{{ $stats['checked_in'] }}</div><div class="card__lbl">Présents (check-in)</div></div>
  </div>

  <div class="panel">
    <div class="panel__head">
      <h2>Dernières inscriptions</h2>
      <a class="btn btn--ghost btn--sm" href="{{ route('admin.registrations.index') }}">Tout voir</a>
    </div>
    <table class="table">
      <thead>
        <tr><th>Référence</th><th>Nom</th><th>Email</th><th>Statut</th><th>Date</th></tr>
      </thead>
      <tbody>
        @forelse ($latest as $r)
          <tr>
            <td><a class="ref" href="{{ route('admin.registrations.show', $r) }}">{{ $r->reference }}</a></td>
            <td>{{ $r->full_name }}</td>
            <td class="muted">{{ $r->email }}</td>
            <td><span class="pill pill--{{ $r->statusColor() }}">{{ $r->statusLabel() }}</span></td>
            <td class="muted">{{ $r->created_at->format('d/m/Y H:i') }}</td>
          </tr>
        @empty
          <tr><td colspan="5" class="muted" style="text-align:center;padding:30px;">Aucune inscription pour le moment.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
