@extends('dashboard.master')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data / Data Event / </span> Tambah</h4>

<div class="card">
    <div class="card-body">

        <form action="/admin/events" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Isi judul event" name="title"/>
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea rows="5" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Isi deskripsi event" name="description"></textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Waktu</label>
                <input type="datetime-local" class="form-control @error('date') is-invalid @enderror" id="date" placeholder="Isi Waktu event" name="date"/>
                @error('date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Lokasi</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" placeholder="Isi Lokasi event" name="location"/>
                @error('location')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="organizer_id" class="form-label">Organizer</label>
                <select name="organizer_id" id="organizer_id" class="form-select @error('organizer_id') is-invalid @enderror">
                    <option value="">--Pilih Organizer--</option>
                    @foreach($organizers as $organizer)
                        <option value="{{ $organizer->id }}">{{ $organizer->name }}</option>
                    @endforeach
                </select>
                @error('organizer_id')
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
