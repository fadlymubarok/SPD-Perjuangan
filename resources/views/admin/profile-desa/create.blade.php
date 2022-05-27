@extends('admin.layouts.master')


@section('content')
<div class="breadcrumbs mt-3 p-0">
    <div class="col-sm-4 ml-0 pl-0">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Form Create Profile</h1>
            </div>
        </div>
    </div>
</div>
<div class="card shadow p-3">
    <form action="/admin/profile-desa" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-2">
            <label for="name" class="control-label">Nama desa</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" autofocus>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-2">
            <label for="address" class="control-label">Alamat desa</label>
            <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" autofocus>
            @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="picture" class="control-label mb-0">Logo</label>
            <input name="picture" type="file" class="form-control border-0 pl-0 @error('picture') is-invalid @enderror" placeholder="picture position.." autofocus>
            @error('picture')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <a href="/admin/profile" class="btn btn-danger rounded">Back</a>
            <button type="submit" class="btn btn-primary rounded">Submit</button>
        </div>
    </form>
</div>
@endsection