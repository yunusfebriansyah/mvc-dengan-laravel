@extends('dashboard.master')

@section('content')

<h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Master Data /</span> Data Organizer</h4>

<a href="/admin/organizers/create" class="btn btn-primary mb-4">Tambah Data</a>

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
            <th>Nama</th>
            <th>Kontak</th>
            <th>Email</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ( $organizers as $organizer)
            <tr>
            <td>
                <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>{{ $organizer->name }}</strong>
            </td>
            <td>{{ $organizer->contact }}</td>
            <td>{{ $organizer->email }}</td>
            <td>
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/admin/organizers/{{ $organizer->id }}/edit"
                    ><i class="bx bx-edit-alt me-2"></i> Edit</a>
                    <form class="dropdown-item text-danger" action="/admin/organizers/{{ $organizer->id }}" method="POST" onsubmit="return confirm('Yakin ingin dihapus?')">
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
