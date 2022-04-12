@extends('layouts.master')


@section('content')
<div class="breadcrumbs mt-3 p-0">
    <div class="col-sm-4 ml-0 pl-0">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Form Edit Position</h1>
            </div>
        </div>
    </div>
</div>
<div class="card shadow p-3">
    <form action="/admin/position/{{ $data->id }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name" class="control-label mb-1">Name</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name position.." value="{{ $data->name }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <a href="/admin/position" class="btn btn-danger rounded">Back</a>
            <button type="submit" class="btn btn-warning rounded">Update</button>
        </div>
    </form>
</div>
@endsection