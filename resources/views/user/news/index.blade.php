@extends('user.layouts.master')

@section('content')

@if ($news->count())
<div class="hero">
    <div class="card bg-dark text-white" style="border: none; border-radius: 0">
        <img src="{{ asset('storage/gambar_berita/'.$news[0]->picture) }}" class="card-img" alt="...">
        <div class="card-img-overlay d-flex justify-content-center align-items-center flex-column">
            <h1 class="card-title title-main fw-bold"><a href="news/{{ $news[0]->slug }}" class=" text-light text-decoration-none">{{ $news[0]->title }}</a></h1>
            <h5 class="card-title">{{ $news[0]->excerpt }}.</h5>
            <span class="badge rounded-pill bg-secondary">{{ $news[0]->category }}</span>
            <p class="card-text text-end "><small>Oleh Admin Desa, Telah Terbit {{ $news[0]->created_at->diffForHumans() }}</small></p>
        </div>
    </div>
</div>

<div class="news">
    <nav class="nav justify-content-center py-2" id="nav">
        <span class="nav-item">
            <h1 class="text-light">Berita Desa</h1>
        </span>
    </nav>
    <div class="container news-list">

        @foreach ($news->skip(1) as $n)
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
    @endif

    </div>
</div>

@if ($news->hasPages())
<div class="container my-5 border-end border-bottom border-2">
    <div class="d-flex justify-content-center">
        {{ $news->links() }}
    </div>
</div>
@endif

@endsection