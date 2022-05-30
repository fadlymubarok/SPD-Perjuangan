@extends('user.layouts.master')

@section('content')
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item" aria-current="page"><a href="/" class="text-danger">Home</a> >> event >> {{ $event->title }} </li>
    </ol>
  </nav>
</div>
<div>
    <h1 class="text-center">{{ $event->title }}</h1>
</div>
<div class="container">

    <h6>Oleh {{ $author->name }} | Telah terbit {{ $event->created_at->diffForHumans() }}</h6>
    <img src="{{ asset('../storage/gambar_berita/' . $event->picture )}}" class="img-thumbnail my-2" width="400" height="800" alt="{{ $event->picture }}">

    <p>{!! $event->body !!}</p>

    <a href="/event" class="btn btn-danger">Kembali</a>
</div>
@endsection