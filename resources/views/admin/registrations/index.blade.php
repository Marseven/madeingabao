@extends('layouts.admin')
@section('title', 'Inscrits')
@section('heading', 'Inscrits')
@section('actions')
  <a class="btn btn--gold btn--sm" href="{{ route('admin.registrations.export') }}">Exporter en Excel</a>
@endsection

@push('head')
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
  <style>
    /* Harmonise DataTables avec le thème admin */
    .dt-container { font-family: inherit; }
    .dt-search input, .dt-length select {
      border: 1px solid var(--line, #e3e6ef); border-radius: 8px; padding: 8px 12px; font: inherit; background: #fff;
    }
    .dt-search input { min-width: 260px; margin-left: 8px; }
    table.dataTable td, table.dataTable th { font-size: 14px; }
    .dt-paging .dt-paging-button.current { background: var(--blue, #264185) !important; color: #fff !important; border-radius: 6px; border: 0; }
    .dt-paging .dt-paging-button { padding: 6px 12px; }
    .dt-info { color: #6b7785; font-size: 13px; }
  </style>
@endpush

@section('content')
  <div class="panel">
    <table class="table" id="regsTable" style="width:100%;">
      <thead>
        <tr><th>Référence</th><th>Nom</th><th>Contact</th><th>Organisation</th><th>Participation</th><th>Statut</th><th>Date</th><th></th></tr>
      </thead>
      <tbody>
        @foreach ($registrations as $r)
          <tr>
            <td><a class="ref" href="{{ route('admin.registrations.show', $r) }}">{{ $r->reference }}</a></td>
            <td>{{ $r->full_name }}<br><span class="muted">{{ $r->city }}</span></td>
            <td class="muted">{{ $r->email }}<br>{{ $r->phone }}</td>
            <td>{{ $r->organization ?: '—' }}<br><span class="muted">{{ $r->position }}</span></td>
            <td>{{ $r->participation_type ?: '—' }}</td>
            <td data-order="{{ $r->status }}"><span class="pill pill--{{ $r->statusColor() }}">{{ $r->statusLabel() }}</span></td>
            <td data-order="{{ $r->created_at->timestamp }}" class="muted">{{ $r->created_at->format('d/m/y H:i') }}</td>
            <td><a class="btn btn--ghost btn--sm" href="{{ route('admin.registrations.show', $r) }}">Détail</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection

@push('scripts')
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
  <script>
    new DataTable('#regsTable', {
      order: [[6, 'desc']],               // par date décroissante
      pageLength: 25,
      lengthMenu: [10, 25, 50, 100],
      columnDefs: [{ targets: [7], orderable: false, searchable: false }],
      language: {
        search: "Rechercher :",
        lengthMenu: "Afficher _MENU_ inscrits",
        info: "_START_–_END_ sur _TOTAL_ inscrits",
        infoEmpty: "0 inscrit",
        infoFiltered: "(filtré sur _MAX_ au total)",
        zeroRecords: "Aucun inscrit trouvé",
        emptyTable: "Aucune inscription pour le moment",
        paginate: { first: "«", last: "»", next: "Suivant", previous: "Précédent" }
      }
    });
  </script>
@endpush
