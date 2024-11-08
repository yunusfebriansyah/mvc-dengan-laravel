@extends('dashboard.master')

@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data /</span> Data Event</h4>

<div class="card">
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-primary alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table">
        <thead>
            <tr>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Lokasi</th>
            <th>Organizer</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ( $events as $event)
            <tr>
            <td>
                <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>{{ $event->title }}</strong>
            </td>
            <td>{{ \Carbon\Carbon::parse($event->date)->format('j F, Y') }}</td>
            <td>{{ $event->location }}</td>
            <td>{{ $event->organizer_id }}</td>
            <td>
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/admin/events/{{ $event->id }}"
                    ><i class="bx bx-show me-2"></i> Detail</a>
                    <a class="dropdown-item" href="/admin/events/{{ $event->id }}/edit"
                    ><i class="bx bx-edit-alt me-2"></i> Edit</a>
                    <form class="dropdown-item text-danger" action="/admin/events/{{ $event->id }}" method="POST" onsubmit="return confirm('Yakin ingin dihapus?')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="border-0 bg-transparent text-danger"><i class="bx bx-trash me-2"></i> Hapus</button>
                    </form>
                </div>
                </div>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
  </div>



@endsection
