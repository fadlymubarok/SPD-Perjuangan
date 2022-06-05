@extends('user.layouts.master')

@section('form')
<form class="d-flex" action="/" method="get">
    <input class="form-control me-1" type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-light" type="submit">Cari</button>
</form>
@endsection

@section('content')

<div class="hero">
    <div class="card bg-dark text-white" style="border: none; border-radius: 0">
        <img src="{{ url('storage/bg/' . $profile->background) }}" class="card-img" alt="...">
        <div class="card-img-overlay d-flex justify-content-center align-items-center flex-column">
            <h1 class="card-title fw-bold">{{ $profile->name }}</h1>
            <h5 class="card-title">{{ $profile->address }}.</h5>
        </div>
    </div>
</div>

<nav class="nav justify-content-center py-2" id="nav">
    <span class="nav-item">
        <h2 class="text-light">Berita Desa Terkini</h2>
    </span>
</nav>
@if ($news->count())
<div class="news">
    <div class="container news-list">

        @foreach ($news as $n)
        <div class="container-fluid news-item my-4 p-2 border-start border-bottom border-4">
            <a href="news/{{ $n->slug }}" class="card text-dark text-decoration-none" style="border: none;">
                <div class="row g-0">
                    <div class="col-md-2">
                        <img src="{{ asset('storage/gambar_berita/'.$n->picture) }}" class="img-fluid rounded" alt="...">
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                            <h3 class="card-title">{{ $n->title }}</h3>
                            <p class="card-text">{{ $n->excerpt }}</p>
                            <span class="badge rounded-pill bg-secondary">{{ $n->category }}</span>
                            <p class="card-text text-end"><small class="text-muted">Oleh Admin Desa, Telah Terbit {{ $n->created_at->diffForHumans() }}</small></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach

        <div class="container mt-2 mb-5">
            <div class="d-grid">
                <a href="/news" class="btn btn-secondary" type="button">Lihat Semua Berita</a>
            </div>
        </div>
    </div>
</div>
@else
<div class="alert alert-info text-center pb-0 mt-5 mx-5" role="alert">
    <p class="fs-4 fw-bold">Berita tidak tersedia</p>
</div>
@endif


@endsection