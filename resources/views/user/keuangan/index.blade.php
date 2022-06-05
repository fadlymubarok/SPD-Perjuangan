@extends('user.layouts.master')

@section('form')
<form class="d-flex" action="/keuangan" method="get">
    <input class="form-control me-1" type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-light" type="submit">Cari</button>
</form>
@endsection

@section('content')

@if ($keuangan->count())
<div class="hero">
    <div class="card bg-dark text-white" style="border: none; border-radius: 0">
        <img src="{{ asset('storage/gambar_berita/'.$keuangan[0]->picture) }}" class="card-img" alt="...">
        <div class="card-img-overlay d-flex justify-content-center align-items-center flex-column">
            <h1 class="card-title title-main fw-bold"><a href="keuangan/{{ $keuangan[0]->slug }}" class=" text-light text-decoration-none">{{ $keuangan[0]->title }}</a></h1>
            <h5 class="card-title">{{ $keuangan[0]->excerpt }}.</h5>
            <p class="card-text text-end "><small>Oleh Admin Desa, Telah Terbit {{ $keuangan[0]->created_at->diffForHumans() }}</small></p>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark" id="nav">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <h2 class="text-center mx-auto text-light">Berita Keuangan</h2>
        </div>
    </div>
</nav>

<div class="container news-list my-4">
    <div class="row mt-3 justify-content-around">

        @foreach($keuangan->skip(1) as $col)
        <div class="card mb-3 mt-2 shadow-sm shadow-left shadow-bottom news-item" style="max-width: 540px; height: 200px;">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="{{ asset('../storage/gambar_berita/'. $col->picture) }}" class="rounded mt-2" style="max-width: 180px; height:180px;" alt="{{ $col->picture }}">
                </div>
                <div class="col-md-8">
                    <a href="/keuangan/{{ $col->slug }}" class="text-decoration-none text-dark">
                    <div class="card-body">
                    <h5 class="card-title">{{ $col->title}}</h5>
                    <p class="card-text">{!! $col->excerpt !!}</p>
                    <p class="card-text position-absolute end-0 bottom-0 w-25 mb-2"><small class="text-muted">{{ $col->created_at->diffForHumans(); }}</small></p>
                    </div>
                </a>
                </div>
            </div>
        </div>
        @endforeach

            @if ($keuangan->hasPages())
            <div class="container my-5 border-end border-bottom border-2">
                <div class="d-flex justify-content-center">
                    {{ $keuangan->links() }}
                </div>
            </div>
            @endif

        @else
        <div class="container">
            <div class="alert alert-info mt-5 pb-0" role="alert">
                <p class="text-center fs-4 fw-bold ">Berita keuangan tidak tersedia</p>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection