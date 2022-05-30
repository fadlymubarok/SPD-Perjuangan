@extends('user.layouts.master')

@section('content')

<div>
    <h1 class="text-center">Events</h1>
</div>

<div class="container">
    <div class="row mt-3 justify-content-around">
        @if($event->count())
        @foreach($event as $col)
            <div class="card mb-3 mt-2 shadow-sm shadow-left shadow-bottom" style="max-width: 540px; height: 300px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{ asset('../storage/gambar_berita/'. $col->picture) }}" class="img-fluid rounded-start" alt="{{ $col->picture }}">
                  </div>
                  <div class="col-md-8">
                      <a href="/event/{{ $col->slug }}" class="text-decoration-none text-dar ">
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
            @else
            <div class="alert alert-info" role="alert">
                <p class="text-center fw-bold">tidak ada events</p>
            </div>
            @endif
    </div>
    <div class="d-flex mx-auto">
        {{ $event->links() }}
    </div>
</div>
@endsection