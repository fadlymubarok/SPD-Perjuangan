@extends('layouts.master')


@section('content')
<div class="breadcrumbs mt-3 p-0">
    <div class="col-sm-4 ml-0 pl-0">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Form Tambah Prestasi</h1>
            </div>
        </div>
    </div>
</div>
<div class="card shadow p-3">
    <form action="/admin/question" method="POST">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label mb-1">Nama lengkap</label>
            <input name="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror" value="{{ old('name') }}" autofocus>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="d-flex justify-content-between">
            <div class="form-group w-50">
                <label for="kp" class="control-label mb-1">Kampung</label>
                <input name="kp" type="text" class="form-control mb-2 @error('kp') is-invalid @enderror" value="{{ old('kp') }}" autofocus>
                @error('kp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group w-50 ml-2">
                <label for="rt" class="control-label mb-1">RT</label>
                <input name="rt" type="text" class="form-control mb-2 @error('rt') is-invalid @enderror" value="{{ old('rt') }}" autofocus>
                @error('rt')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group w-50 ml-2x">
                <label for="rw" class="control-label mb-1">RW</label>
                <input name="rw" type="text" class="form-control mb-2 @error('rw') is-invalid @enderror" value="{{ old('rw') }}" autofocus>
                @error('rw')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="body" class="control-label mb-1">Pertanyaan</label>
            @error('body')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
            <trix-editor input="body"></trix-editor>
        </div>
        <div class="form-group">
            <a href="/admin/question" class="btn btn-danger rounded">Back</a>
            <button type="submit" class="btn btn-primary rounded">Submit</button>
        </div>
    </form>
</div>
@endsection