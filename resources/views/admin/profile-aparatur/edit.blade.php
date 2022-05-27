@extends('admin.layouts.master')


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
        <div class="d-flex">
            <div class="form-group w-50 mr-2">
                <label for="name" class="control-label mb-1">Nama Aparatur</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}" autofocus>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group w-50 mr-2">
                <label for="position" class="control-label mb-1">Posisi</label>
                <select name="position" class="form-control @error('position') is-invalid @enderror">
                    <option value="">Pilih kategori</option>
                    @foreach($positions as $p)
                    <option value="{{ $p->name }}" {{ $data->position == $p->name ? 'selected' : ''}}>{{ $p->name }}</option>
                    @endforeach
                </select>
                @error('position')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group w-50">
                <label for="kedudukan" class="control-label mb-1">Kedudukan</label>
                <input name="kedudukan" type="text" class="form-control @error('kedudukan') is-invalid @enderror" value="{{ $data->kedudukan }}">
                @error('kedudukan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="d-flex">
            <div class="form-group w-50 mr-2">
                <label for="tugas" class="control-label mb-1">Tugas</label>
                <textarea name="tugas" class="form-control @error('tugas') is-invalid @enderror" value="{{ old('tugas') }}" cols="30" rows="5">{{ $data->tugas }}</textarea>
                @error('tugas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group w-50">
                <label for="fungsi" class="control-label mb-1">Fungsi</label>
                <textarea name="fungsi" class="form-control @error('fungsi') is-invalid @enderror" value="{{ old('fungsi') }}" cols="30" rows="5">{{ $data->fungsi }}</textarea>
                @error('fungsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="d-flex">
            <div class="form-group w-50 mr-2">
                <label for="keterangan" class="control-label mb-1">Keterangan</label>
                <input name="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" value="{{ $data->keterangan }}">
                @error('keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group w-50">
                <label for="picture" class="control-label mb-1">Gambar</label>
                <input name="picture" type="file" class="form-control border-0 pl-0 @error('picture') is-invalid @enderror">
                <p class="text-secondary" style="font-size: 12px; margin-bottom: -10px;">* isi jika ingin ganti gambar</p>
                @error('picture')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <a href="/admin/profile-aparatur" class="btn btn-danger rounded">Back</a>
            <button type="submit" class="btn btn-warning rounded">Update</button>
        </div>
    </form>
</div>
@endsection