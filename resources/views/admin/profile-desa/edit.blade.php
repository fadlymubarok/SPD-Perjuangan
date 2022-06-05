@extends('admin.layouts.master')


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
    <form action="/admin/profile-desa/{{ $data->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group mb-2">
            <label for="name" class="control-label mb-1">Nama desa</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name position.." value="{{ old('name', $data->name) }}" autofocus>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-2">
            <label for="address" class="control-label mb-1">Alamat desa</label>
            <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="address position.." value="{{ old('address', $data->address) }}" autofocus>
            @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="picture" class="control-label mb-1">Logo</label>
            <input name="picture" type="file" class="form-control border-0 pl-0 @error('picture') is-invalid @enderror" autofocus>
            @error('picture')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <p class="text-secondary" style="font-size: 12px; margin-top: -5px;">* isi jika ingin ganti gambar</p>
        </div>

        <div class="form-group">
            <label for="background" class="control-label mb-1">Background</label>
            <input name="background" type="file" class="form-control border-0 pl-0 @error('background') is-invalid @enderror" autofocus>
            @error('background')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <p class="text-secondary" style="font-size: 12px; margin-top: -5px;">* isi jika ingin ganti gambar</p>
        </div>
        <div class="form-group">
            <label for="about_web" class="control-label mb-1">About Us</label>
            @error('about_web')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="about_web" type="hidden" name="about_web" value="{{ old('about_web', $data->about_web) }}">
            <trix-editor input="about_web"></trix-editor>
        </div>

        <div class="form-group">
            <label for="visi" class="control-label mb-1">Visi</label>
            @error('visi')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="visi" type="hidden" name="visi" value="{{ old('visi', $data->visi) }}">
            <trix-editor input="visi"></trix-editor>
        </div>

        <div class="form-group">
            <label for="misi" class="control-label mb-1">Misi</label>
            @error('misi')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="misi" type="hidden" name="misi" value="{{ old('misi', $data->misi) }}">
            <trix-editor input="misi"></trix-editor>
        </div>

        <div class="form-group">
            <label for="prestasi" class="control-label mb-1">Prestasi</label>
            @error('prestasi')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="prestasi" type="hidden" name="prestasi" value="{{ old('name', $data->prestasi) }}">
            <trix-editor input="prestasi"></trix-editor>
        </div>

        <div class="form-group">
            <a href="/admin/profile-desa" class="btn btn-danger rounded">Back</a>
            <button type="submit" class="btn btn-warning rounded">Update</button>
        </div>
    </form>
</div>
@endsection