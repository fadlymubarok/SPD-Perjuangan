@extends('admin.layouts.master')


@section('content')
<div class="breadcrumbs mt-3 p-0">
    <div class="col-sm-4 ml-0 pl-0">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Form Edit Pertanyaan sementara</h1>
            </div>
        </div>
    </div>
</div>
<div class="card shadow p-3">
    <form action="/admin/question/{{ $question->id }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name" class="control-label mb-1">Nama lengkap</label>
            <input name="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror" value="{{ $question->name }}" readonly>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="address" class="control-label mb-1">Alamat</label>
            <input name="address" type="text" class="form-control mb-2 @error('address') is-invalid @enderror" value="{{ $question->address }}" readonly>
            @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="body" class="control-label mb-1">Pertanyaan</label>
            <input name="body" type="text" class="form-control mb-2 @error('body') is-invalid @enderror" value="{{ $question->body }}" readonly>
            @error('body')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="opinion" class="control-label mb-1">Tanggapan</label>
            <input name="opinion" type="text" class="form-control mb-2 @error('opinion') is-invalid @enderror" value="{{ old('opinion') }}">
            @error('opinion')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <a href="/admin/question" class="btn btn-danger rounded">Back</a>
            <button type="submit" class="btn btn-primary rounded">Submit</button>
        </div>
    </form>
</div>
@endsection