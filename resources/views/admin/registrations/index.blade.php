@extends('layouts.admin')
@section('title', 'Inscrits')
@section('heading', 'Inscrits')
@section('actions')
  <a class="btn btn--gold btn--sm" href="{{ route('admin.registrations.export', request()->only('q','status')) }}">Exporter en Excel</a>
@endsection

@section('content')
  <div class="panel">
    <div class="panel__head">
      <form class="filters" method="GET" action="{{ route('admin.registrations.index') }}">
        <input class="input" type="search" name="q" value="{{ $q }}" placeholder="Nom, email, téléphone, organisation, réf…" style="min-width:280px;" />
        <select class="select" name="status">
          <option value="">Tous les statuts</option>
          @foreach ($statuses as $s)
            <option value="{{ $s }}" @selected($status === $s)>{{ ucfirst($s) }}</option>
          @endforeach
        </select>
        <button class="btn btn--sm" type="submit">Filtrer</button>
        @if ($q || $status)
          <a class="btn btn--ghost btn--sm" href="{{ route('admin.registrations.index') }}">Réinitialiser</a>
        @endif
      </form>
      <span class="muted">{{ $registrations->total() }} inscrit·e·s</span>
    </div>

    <table class="table">
      <thead>
        <tr><th>Référence</th><th>Nom</th><th>Contact</th><th>Organisation</th><th>Statut</th><th>Date</th><th></th></tr>
      </thead>
      <tbody>
        @forelse ($registrations as $r)
          <tr>
            <td><a class="ref" href="{{ route('admin.registrations.show', $r) }}">{{ $r->reference }}</a></td>
            <td>{{ $r->full_name }}<br><span class="muted">{{ $r->city }}</span></td>
            <td class="muted">{{ $r->email }}<br>{{ $r->phone }}</td>
            <td>{{ $r->organization ?: '—' }}<br><span class="muted">{{ $r->position }}</span></td>
            <td><span class="pill pill--{{ $r->statusColor() }}">{{ $r->statusLabel() }}</span></td>
            <td class="muted">{{ $r->created_at->format('d/m/y H:i') }}</td>
            <td><a class="btn btn--ghost btn--sm" href="{{ route('admin.registrations.show', $r) }}">Détail</a></td>
          </tr>
        @empty
          <tr><td colspan="7" class="muted" style="text-align:center;padding:34px;">Aucun résultat.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="pagination">{{ $registrations->links() }}</div>
@endsection
