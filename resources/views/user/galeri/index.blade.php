@extends('user.layouts.master')

@section('content')

<div class="text-center mt-3">
    <h1>Galeri</h1>
</div>

<div class="container galery">

    @if($galeri->count())
    <div class="row pict-list d-flex justify-content-center">

        @foreach($galeri as $col)
        <div class="col-md-3 pict-item px-3">
            <img src="{{ asset('../storage/gambar_berita/' . $col->picture) }}" alt="{{ $col->picture }}" class="my-3">
        </div>
        @endforeach

    </div>

    @else
    <div class="container">
            <div class="alert alert-info mt-4 pb-0" role="alert">
                <p class="text-center fs-4 fw-bold ">Dokumentasi tidak ada</p>
            </div>
        </div>
    @endif

    @if($galeri->hasPages())
    <div class="container my-5 border-end border-bottom border-2">
        <div class="d-flex justify-content-center">
            {{ $galeri->links() }}
        </div>
    </div>
    @endif

</div>

@endsection