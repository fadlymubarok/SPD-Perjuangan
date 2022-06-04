@extends('user.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="breadcrumb my-2">
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/event">Events</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $event->title }}</li>
            </ol>
        </nav>
    </div>

    <div class="container the-news">
        <h1 class="text-center my-4">{{ $event->title }}</h1>
        <p class="card-text text-start"><small class="text-muted">Oleh {{ $author->name }}, Telah Terbit {{ $event->created_at->diffForHumans() }}</small></p>
        <img src="{{ asset('storage/gambar_berita/'. $event->picture) }}" class="img-fluid" alt="...">
        
        <article class="my-3 fs-5">
            {!! $event->body !!}
        </article>
    </div>
</div>

{{-- <div class="container">
    <div class="container">
        <h1 class="text-center my-4">{{ $event->title }}</h1>
    </div>
    <h6>Oleh {{ $author->name }} | Telah terbit {{ $event->created_at->diffForHumans() }}</h6>
    <p class="card-text text-start"><small class="text-muted">Oleh Admin Desa, Telah Terbit {{ $event->created_at->diffForHumans() }}</small></p>
    <img src="{{ asset('../storage/gambar_berita/' . $event->picture )}}" class="img-thumbnail my-2" width="400" height="800" alt="{{ $event->picture }}">

    <p>{!! $event->body !!}</p>

    <a href="/event" class="btn btn-danger">Kembali</a>
</div> --}}

@endsection