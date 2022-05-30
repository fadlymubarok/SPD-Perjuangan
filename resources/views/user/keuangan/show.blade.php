@extends('user.layouts.master')

@section('content')
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item" aria-current="page"><a href="/" class="text-danger">Home</a> >> berita</li>
    </ol>
  </nav>
</div>

<div class="container">
  <div>
    <h1 class="text-center">{{ $keuangan->title }}</h1>
  </div>
    <h6>Oleh {{ $author->name }} | Telah terbit {{ $keuangan->created_at->diffForHumans() }}</h6>
    <img src="{{ asset('../storage/gambar_berita/' . $keuangan->picture )}}" class="img-thumbnail my-2" width="400" height="800" alt="{{ $keuangan->picture }}">

    <p>{!! $keuangan->body !!}</p>

    <a href="/keuangan" class="btn btn-danger">Kembali</a>
</div>
@endsection