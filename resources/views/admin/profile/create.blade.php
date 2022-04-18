@extends('layouts.master')


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
    <form action="/admin/profile" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex w-100 justify-content-between">
            <div class="form-group w-50">
                <label for="name" class="control-label mb-1">Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="nama desa" autofocus>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group w-50 ml-2">
                <label for="picture" class="control-label mb-1">Logo</label>
                <input name="picture" type="file" class="form-control border-0 pl-0 @error('picture') is-invalid @enderror" placeholder="picture position.." autofocus>
                @error('picture')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <a href="/admin/profile" class="btn btn-danger rounded">Back</a>
            <button type="submit" class="btn btn-primary rounded">Submit</button>
        </div>
    </form>
</div>
@endsection