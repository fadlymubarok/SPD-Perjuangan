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
    <form action="/admin/profile-aparatur" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex">
            <div class="form-group w-50 mr-2">
                <label for="name" class="control-label mb-1">Nama Aparatur</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autofocus>
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
        </div>
        <div class="d-flex">
            <div class="form-group w-50 mr-2">
                <label for="kedudukan" class="control-label mb-1">Kedudukan</label>
                <input name="kedudukan" type="text" class="form-control @error('kedudukan') is-invalid @enderror" value="{{ old('kedudukan') }}">
                @error('kedudukan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group w-50">
                <label for="tugas" class="control-label mb-1">Tugas</label>
                <input name="tugas" type="text" class="form-control @error('tugas') is-invalid @enderror" value="{{ old('tugas') }}">
                @error('tugas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="d-flex">
            <div class="form-group w-50 mr-2">
                <label for="fungsi" class="control-label mb-1">Fungsi</label>
                <input name="fungsi" type="text" class="form-control @error('fungsi') is-invalid @enderror" value="{{ old('fungsi') }}">
                @error('fungsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group w-50 mr-2">
                <label for="keterangan" class="control-label mb-1">Keterangan</label>
                <input name="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}">
                @error('keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group w-50">
                <label for="picture" class="control-label mb-1">Gambar</label>
                <input name="picture" type="file" class="form-control border-0 pl-0 @error('picture') is-invalid @enderror">
                @error('picture')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <a href="/admin/profile-aparatur" class="btn btn-danger rounded">Back</a>
            <button type="submit" class="btn btn-primary rounded">Submit</button>
        </div>
    </form>
</div>
@endsection