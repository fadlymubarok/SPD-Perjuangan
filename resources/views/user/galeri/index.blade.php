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
            <img src="{{ asset('../storage/gambar_prestasi/' . $col->picture) }}" alt="{{ $col->picture }}" class="mt-3" width="250px" height="250px">
        </div>
        @endforeach
    </div>
    @else
    <div class="alert alert-info" role="alert">
        <h4>Belum ada yang bertanya</h4>
    </div>
    @endif
    <div class="mt-5 w-100 d-flex justify-content-end">
        {{ $galeri->links() }}
    </div>
</div>
@endsection