@extends('layouts.admin')
@section('title', 'Inscrits')
@section('heading', 'Inscrits')
@section('actions')
  <a class="btn btn--gold btn--sm" href="{{ route('admin.registrations.export') }}">Exporter en Excel</a>
@endsection

@php
  $statusLabels = ['pending' => 'En attente', 'confirmed' => 'Confirmée', 'cancelled' => 'Annulée'];
@endphp

@push('head')
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
  <style>
    /* ---- Filtres ---- */
    .reg-filters { display:flex; gap:10px; flex-wrap:wrap; align-items:center; }
    .reg-filters label { font-size:12px; color:var(--muted); font-weight:600; margin-right:-4px; }

    /* ---- Tags participation ---- */
    .tag { display:inline-block; padding:4px 11px; border-radius:7px; font-size:11.5px; font-weight:600; border:1px solid; white-space:nowrap; }
    .tag--blue  { color:#264185; background:#eef2fb; border-color:#cdd8f0; }
    .tag--green { color:#1d5b31; background:#ecfbf0; border-color:#bce8c8; }
    .tag--gold  { color:#8a5a00; background:#fff6e0; border-color:#ffe3a3; }
    .tag--muted { color:var(--muted); background:#f4f6f8; border-color:var(--line); }

    /* ---- Habillage DataTables au thème admin ---- */
    #regsTable_wrapper { padding:16px 20px 6px; }
    .dt-layout-row { margin-bottom:14px; align-items:center; }
    .dt-search, .dt-length { color:var(--muted); font-size:13px; }
    .dt-search input, .dt-length select {
      font-family:inherit; font-size:13.5px; padding:8px 12px; border:1px solid var(--line);
      border-radius:8px; background:#fff; color:var(--ink); margin-left:8px;
    }
    .dt-search input { min-width:240px; }
    .dt-search input:focus, .dt-length select:focus {
      outline:none; border-color:var(--gold); box-shadow:0 0 0 3px rgba(253,185,18,.2);
    }
    table.dataTable { border-collapse:collapse !important; }
    table.dataTable thead th {
      text-align:left; padding:11px 16px; font-size:11px; letter-spacing:.05em; text-transform:uppercase;
      color:var(--muted); background:#fafbfc; border-bottom:1px solid var(--line); border-top:0;
    }
    table.dataTable tbody td { padding:13px 16px; border-bottom:1px solid var(--line); vertical-align:middle; font-size:13.5px; }
    table.dataTable tbody tr:hover td { background:#f6f9ff; }
    table.dataTable tbody tr:last-child td { border-bottom:0; }
    table.dataTable .ref { font-family:var(--fm); font-size:12.5px; color:var(--blue); font-weight:600; }
    table.dataTable .sub { color:var(--muted); font-size:12px; }
    /* pagination */
    .dt-paging .dt-paging-button { padding:6px 12px; margin:0 2px; border-radius:7px; border:1px solid transparent; }
    .dt-paging .dt-paging-button.current { background:var(--blue) !important; color:#fff !important; border:0; }
    .dt-paging .dt-paging-button:hover:not(.current) { background:#eef2fb !important; color:var(--blue) !important; border-color:var(--line); }
    .dt-info { color:var(--muted); font-size:12.5px; }
    /* icônes de tri plus discrètes */
    table.dataTable thead th.dt-orderable-asc, table.dataTable thead th.dt-orderable-desc { cursor:pointer; }
  </style>
@endpush

@section('content')
  <div class="panel">
    <div class="panel__head">
      <div class="reg-filters">
        <label for="fParticipation">Participation</label>
        <select id="fParticipation" class="select">
          <option value="">Toutes</option>
          @foreach (config('event.participation_types') as $pt)
            <option value="{{ $pt }}">{{ $pt }}</option>
          @endforeach
        </select>

        <label for="fStatus">Statut</label>
        <select id="fStatus" class="select">
          <option value="">Tous</option>
          @foreach ($statusLabels as $key => $label)
            <option value="{{ $label }}">{{ $label }}</option>
          @endforeach
        </select>
      </div>
      <span class="muted">{{ $registrations->count() }} inscrit·e·s</span>
    </div>

    <table class="table" id="regsTable" style="width:100%;">
      <thead>
        <tr><th>Référence</th><th>Nom</th><th>Contact</th><th>Organisation</th><th>Participation</th><th>Statut</th><th>Date</th><th></th></tr>
      </thead>
      <tbody>
        @foreach ($registrations as $r)
          @php
            $pt = $r->participation_type ?: '—';
            $ptl = mb_strtolower($pt);
            $ptClass = str_contains($ptl, 'deux') ? 'tag--gold'
              : ((str_contains($ptl, 'ligne') || str_contains($ptl, 'veill')) ? 'tag--green'
              : ((str_contains($ptl, 'présentiel') || str_contains($ptl, 'presentiel')) ? 'tag--blue' : 'tag--muted'));
          @endphp
          <tr>
            <td><a class="ref" href="{{ route('admin.registrations.show', $r) }}">{{ $r->reference }}</a></td>
            <td>{{ $r->full_name }}<br><span class="sub">{{ $r->city }}</span></td>
            <td class="sub">{{ $r->email }}<br>{{ $r->phone }}</td>
            <td>{{ $r->organization ?: '—' }}<br><span class="sub">{{ $r->position }}</span></td>
            <td><span class="tag {{ $ptClass }}">{{ $pt }}</span></td>
            <td data-order="{{ $r->status }}" data-search="{{ $r->statusLabel() }}"><span class="pill pill--{{ $r->statusColor() }}">{{ $r->statusLabel() }}</span></td>
            <td data-order="{{ $r->created_at->timestamp }}" class="sub">{{ $r->created_at->format('d/m/y H:i') }}</td>
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
    var dt = new DataTable('#regsTable', {
      order: [[6, 'desc']],
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

    function esc(v) { return v.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); }

    // Filtre exact par Participation (colonne 4)
    document.getElementById('fParticipation').addEventListener('change', function () {
      dt.column(4).search(this.value ? '^' + esc(this.value) + '$' : '', true, false).draw();
    });
    // Filtre exact par Statut (colonne 5)
    document.getElementById('fStatus').addEventListener('change', function () {
      dt.column(5).search(this.value ? '^' + esc(this.value) + '$' : '', true, false).draw();
    });
  </script>
@endpush
