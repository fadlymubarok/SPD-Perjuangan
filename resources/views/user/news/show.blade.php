@extends('user.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="breadcrumb my-2">
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/news">News</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $news->title }}</li>
            </ol>
        </nav>
    </div>

    <div class="container the-news">
        <h1 class="text-center my-4">{{ $news->title }}</h1>
        <p class="card-text text-start"><small class="text-muted">Oleh {{ $author->name }}, Telah Terbit {{ $news->created_at->diffForHumans() }}</small></p>
        <img src="{{ asset('storage/gambar_berita/'. $news->picture) }}" class="img-fluid" alt="...">
        
        <article class="my-3 fs-5">
            {!! $news->body !!}
        </article>
    </div>
</div>

@endsection