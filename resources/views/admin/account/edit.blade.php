@extends('layouts.master')


@section('content')
<div class="breadcrumbs mt-3 p-0">
    <div class="col-sm-4 ml-0 pl-0">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Form Edit Account</h1>
            </div>
        </div>
    </div>
</div>
<div class="card shadow p-3">
    <form action="/account/{{ $data->id }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name" class="control-label mb-1">Name</label>
            <input name="name" type="text" class="form-control" value="{{ $data->name }}" readonly>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email" class="control-label mb-1">Email</label>
            <input name="email" type="text" class="form-control" value="{{ $data->email }}" readonly>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="position_id" class="control-label mb-1">Posisi</label>
            <select name="position_id" class="form-control @error('position_id') is-invalid @enderror">
                <option value="" {{ $data->position_id == null ? 'selected' : ''}}>Please select</option>
                @foreach($position as $p)
                <option value="{{ $p->id }}" {{ $data->position_id == $p->id ? 'selected' : ''}}>{{ $p->name }}</option>
                @endforeach
            </select>
            @error('position_id')
            <div class="invalid-feedback">
                Posisi must be select
            </div>
            @enderror
        </div>
        <div class="form-group">
            <a href="/position" class="btn btn-danger rounded">Back</a>
            <button type="submit" class="btn btn-warning rounded">Update</button>
        </div>
    </form>
</div>
@endsection