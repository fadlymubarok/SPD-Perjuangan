@extends('layouts.master')


@section('content')
<div class="breadcrumbs mt-3 p-0">
    <div class="col-sm-4 ml-0 pl-0">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Form Create Profil Aparatur</h1>
            </div>
        </div>
    </div>
</div>
<div class="card shadow p-3">
    <form action="/admin/profile-bpd" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group w-50">
            <label for="name" class="control-label mb-1">Nama BPD</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="nama bpd" autofocus>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group w-50">
            <label for="position" class="control-label mb-1">Posisi</label>
            <select name="position" class="form-control @error('position') is-invalid @enderror">
                <option value="">Pilih kategori</option>
                @foreach($positions as $p)
                <option value="{{ $p->id }}" {{ old('position') == $p->id ? 'selected' : ''}}>{{ $p->name }}</option>
                @endforeach
            </select>
            @error('position')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group w-50">
            <label for="picture" class="control-label mb-1">Gambar</label>
            <input name="picture" type="file" class="form-control border-0 pl-0 @error('picture') is-invalid @enderror" placeholder="picture position.." autofocus>
            @error('picture')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <a href="/admin/profile-bpd" class="btn btn-danger rounded">Back</a>
            <button type="submit" class="btn btn-primary rounded">Submit</button>
        </div>
    </form>
</div>
@endsection