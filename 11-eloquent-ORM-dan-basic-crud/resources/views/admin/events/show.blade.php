@extends('dashboard.master')

@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data / Data Event / </span> Detail</h4>

<div class="card">
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">Judul Event</dt>
            <dd class="col-sm-9">{{ $event->title }}</dd>
            <dt class="col-sm-3">Deskripsi Event</dt>
            <dd class="col-sm-9">{{ $event->description }}</dd>
            <dt class="col-sm-3">Tanggal Event</dt>
            <dd class="col-sm-9">{{ \Carbon\Carbon::parse($event->date)->format('j F, Y') }}</dd>
            <dt class="col-sm-3">Lokasi Event</dt>
            <dd class="col-sm-9">{{ $event->location }}</dd>
            <dt class="col-sm-3">Organizer Event</dt>
            <dd class="col-sm-9">{{ $event->organizer_id }}</dd>
        </dl>
    </div>
</div>



@endsection
