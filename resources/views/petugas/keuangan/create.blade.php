@extends('layouts.master')


@section('content')
<div class="breadcrumbs mt-3 p-0">
    <div class="col-sm-4 ml-0 pl-0">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Form Tambah Keuangan</h1>
            </div>
        </div>
    </div>
</div>
<div class="card shadow p-3">
    <form action="/petugas/keuangan" method="POST">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label mb-1">Name</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="nama keuangan.." autofocus>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <a href="/petugas/keuangan" class="btn btn-danger rounded">Back</a>
            <button type="submit" class="btn btn-primary rounded">Submit</button>
        </div>
    </form>
</div>
@endsection