@extends('user.layouts.master')

@section('content')

<div class="news mt-1">
  <nav class="nav justify-content-center py-2" id="nav">
      <span class="nav-item">
          <h1 class="text-light">Berita Desa</h1>
      </span>
  </nav>
  <div class="container news-list">

      @if ($news->count())
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

<div class="container my-5 border-end border-bottom border-2">
  <div class="d-flex justify-content-center">
      {{ $news->links() }}
  </div>
</div>

@endsection