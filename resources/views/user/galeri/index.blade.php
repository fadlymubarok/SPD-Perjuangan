@extends('user.layouts.master')

@section('content')
<div class="d-flex mt-2">
    <a href="/" class="text-danger">Home</a>
    <span>&nbsp; >> Galeri</span>
</div>
<div class="text-center mt-3">
    <h1>Galeri</h1>
</div>

<div class="container">
    @if($galeri->count())
    <div class="row">
        @foreach($galeri as $col)
        <div class="col-md-3">
            <img src="{{ asset('../storage/gambar_berita/' . $col->picture) }}" alt="{{ $col->picture }}" class="mt-3" width="250px" height="250px">
        </div>
        @endforeach
    </div>
    @else
    <div class="alert alert-info" role="alert">
        <h4>Belum ada Dokumentasi</h4>
    </div>
    @endif
    <div class="container my-5 border-end border-bottom border-2">
        <div class="d-flex justify-content-center">
            {{ $galeri->links() }}
        </div>
    </div>
</div>
@endsection