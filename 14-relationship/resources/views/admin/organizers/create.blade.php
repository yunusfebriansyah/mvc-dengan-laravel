@extends('dashboard.master')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data / Data organizer / </span> Tambah</h4>

<div class="card">
    <div class="card-body">

        <form action="/admin/organizers" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Organizer</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Isi nama organizer" name="name"/>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Kontak Organizer</label>
                <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" placeholder="Isi kontak organizer" name="contact"/>
                @error('contact')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Organizer</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Isi email organizer" name="email"/>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>

    </div>
</div>

@endsection
