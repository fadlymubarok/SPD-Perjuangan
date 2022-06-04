@extends('user.layouts.master')

@section('content')
<section class="visi-misi content-center">
    <div class="container my-4">
        <div class="section-title" data-aos="zoom-out">
            <h2>VISI</h2>
            <p>Visi {{ $profile->name }}:</p>
        </div>
        <div class="visi">
            {!! $profile->visi !!}
        </div>
    </div>

    <div class="container">
        <div class="section-title" data-aos="zoom-out">
            <h2>MISI</h2>
            <p>Misi {{ $profile->name }}:</p>
        </div>
        <div class="misi">
            {!! $profile->misi !!}
        </div>
    </div>

    <div class="container">
        <div class="section-title" data-aos="zoom-out">
            <h2>Prestasi</h2>
            {!! $profile->prestasi !!}
        </div>
    </div>
</section>

<section class="prestasi-list">
    <div class="section-title text-center mt-5" data-aos="zoom-out">
        <h2>Prestasi Terkini</h2>
    </div>

    <div class="container">
        <div class="row">  
        @if ($prestasi->count())

            @foreach($prestasi as $pre)
            <div class="card-group col-md-4 col-sm-6 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('../storage/gambar_prestasi/' . $pre->picture) }}" alt="{{ $pre->picture }}">
                    <div class="card-body">
                        <h5 class="card-title">{{$pre->title}}</h5>
                        {{-- <p class="card-text">{!! $pre->body !!}</p> --}}
                        {{-- <p class="card-text">{{  $pre->excerpt  }}</p> --}}
                        <p class="card-text"><small class="text-muted">{{ $pre->created_at->diffForHumans() }}</small></p>
                    </div>
                </div>
            </div>
            @endforeach

        @else
            <div class="container">
                <div class="alert alert-info text-center pb-0 mt-4" role="alert">
                    <p class="fs-4 fw-bold">Tidak ada data</p>
                </div>
            </div>
        @endif
        </div>
    </div>
</section>

@endsection