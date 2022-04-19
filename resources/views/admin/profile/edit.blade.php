@extends('layouts.master')


@section('content')
<div class="breadcrumbs mt-3 p-0">
    <div class="col-sm-4 ml-0 pl-0">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Form Edit Profile</h1>
            </div>
        </div>
    </div>
</div>
<div class="card shadow p-3">
    <form action="/admin/profile/{{ $data->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group mb-2">
            <label for="name" class="control-label mb-1">Nama desa</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name position.." value="{{ $data->name }}" autofocus>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-2">
            <label for="address" class="control-label mb-1">Alamat desa</label>
            <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="address position.." value="{{ $data->address }}" autofocus>
            @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="picture" class="control-label mb-1">Logo</label>
            <input name="picture" type="file" class="form-control border-0 pl-0 @error('picture') is-invalid @enderror" value="{{ $data->picture }}" autofocus>
            @error('picture')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <p class="text-secondary" style="font-size: 12px; margin-top: -5px;">* isi jika ingin ganti gambar</p>
        </div>
        <div class="form-group">
            <a href="/admin/profile" class="btn btn-danger rounded">Back</a>
            <button type="submit" class="btn btn-warning rounded">Update</button>
        </div>
    </form>
</div>
@endsection