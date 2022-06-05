@extends('user.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="breadcrumb my-2">
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/keuangan">Keuangan</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $keuangan->title }}</li>
            </ol>
        </nav>
    </div>

    <div class="container the-news">
        <h1 class="text-center my-4">{{ $keuangan->title }}</h1>
        <p class="card-text text-start"><small class="text-muted">Oleh {{ $author->name }}, Telah Terbit {{ $keuangan->created_at->diffForHumans() }}</small></p>
        <img src="{{ asset('storage/gambar_berita/'. $keuangan->picture) }}" class="img-fluid" alt="...">
        
        <article class="my-3 fs-5">
            {!! $keuangan->body !!}
        </article>
    </div>
</div>

{{-- <div class="container">
    <div>
        <h1 class="text-center my-4">{{ $keuangan->title }}</h1>
    </div>
    <h6>Oleh {{ $author->name }} | Telah terbit {{ $event->created_at->diffForHumans() }}</h6>
    <p class="card-text text-start"><small class="text-muted">Oleh Admin Desa, Telah Terbit {{ $keuangan->created_at->diffForHumans() }}</small></p>
    <img src="{{ asset('../storage/gambar_berita/' . $keuangan->picture )}}" class="img-thumbnail my-2" width="400" height="800" alt="{{ $keuangan->picture }}">

    <p>{!! $keuangan->body !!}</p>

    <a href="/keuangan" class="btn btn-danger">Kembali</a>
</div> --}}

@endsection