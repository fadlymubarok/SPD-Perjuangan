@extends('layouts.master')


@section('content')
<div class="breadcrumbs mt-3 p-0">
    <div class="col-sm-4 ml-0 pl-0">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Form Edit Profile Aparatur</h1>
            </div>
        </div>
    </div>
</div>
<div class="card shadow p-3">
    <form action="/admin/profile-aparatur/{{ $data->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group w-50">
            <label for="name" class="control-label mb-1">Name</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="nama aparatur" value="{{ $data->name }}" autofocus>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group w-50">
            <label for="position" class="control-label mb-1">Posisi</label>
            <input name="position" type="text" class="form-control @error('position') is-invalid @enderror" placeholder="posisi" value="{{ $data->position }}" autofocus>
            @error('position')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group w-50">
            <label for="kedudukan" class="control-label mb-1">Kedudukan</label>
            <input name="kedudukan" type="text" class="form-control @error('kedudukan') is-invalid @enderror" placeholder="kedudukan" value="{{ $data->kedudukan }}" autofocus>
            @error('kedudukan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group w-50">
            <label for="tugas" class="control-label mb-1">Tugas</label>
            <input name="tugas" type="text" class="form-control @error('tugas') is-invalid @enderror" placeholder="tugas" value="{{ $data->tugas }}" autofocus>
            @error('tugas')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group w-50">
            <label for="fungsi" class="control-label mb-1">Fungsi</label>
            <input name="fungsi" type="text" class="form-control @error('fungsi') is-invalid @enderror" placeholder="fungsi" value="{{ $data->fungsi }}" autofocus>
            @error('fungsi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group w-50">
            <label for="keterangan" class="control-label mb-1">Keterangan</label>
            <input name="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" placeholder="keterangan" value="{{ $data->keterangan }}" autofocus>
            @error('keterangan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group w-50">
            <label for="picture" class="control-label mb-1">Gambar</label>
            <input name="picture" type="file" class="form-control border-0 pl-0 @error('picture') is-invalid @enderror" placeholder="picture position.." value="{{ $data->picture }}" autofocus>
            @error('picture')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <a href="/admin/profile-aparatur" class="btn btn-danger rounded">Back</a>
            <button type="submit" class="btn btn-warning rounded">Update</button>
        </div>
    </form>
</div>
@endsection