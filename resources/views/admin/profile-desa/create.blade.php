@extends('admin.layouts.master')


@section('content')
<div class="breadcrumbs mt-3 p-0">
    <div class="col-sm-4 ml-0 pl-0">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Form Tambah Profil Desa</h1>
            </div>
        </div>
    </div>
</div>
<div class="card shadow p-3">
    <form action="/admin/profile-desa" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-2">
            <label for="name" class="control-label">Nama desa</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Desa ..." autofocus>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-2">
            <label for="address" class="control-label">Alamat desa</label>
            <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="jl.xxx kec.xxx kab/kota.xxx">
            @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="picture" class="control-label mb-0">Logo</label>
            <input name="picture" type="file" class="form-control border-0 pl-0 @error('picture') is-invalid @enderror">
            @error('picture')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="background" class="control-label mb-0">Background Home</label>
            <input name="background" type="file" class="form-control border-0 pl-0 @error('background') is-invalid @enderror">
            @error('background')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="about_web" class="control-label mb-1">About web</label>
            @error('about_web')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="about_web" type="hidden" name="about_web" value="{{ old('about_web') }}">
            <trix-editor input="about_web"></trix-editor>
        </div>

        <div class="form-group">
            <label for="visi" class="control-label mb-1">Visi desa</label>
            @error('visi')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="visi" type="hidden" name="visi" value="{{ old('visi') }}">
            <trix-editor input="visi"></trix-editor>
        </div>

        <div class="form-group">
            <label for="misi" class="control-label mb-1">Misi desa</label>
            @error('misi')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="misi" type="hidden" name="misi" value="{{ old('misi') }}">
            <trix-editor input="misi"></trix-editor>
        </div>

        <div class="form-group">
            <label for="prestasi" class="control-label mb-1">Motivasi Prestasi</label>
            @error('prestasi')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="prestasi" type="hidden" name="prestasi" value="{{ old('prestasi') }}">
            <trix-editor input="prestasi"></trix-editor>
        </div>

        <div class="form-group">
            <a href="/admin/profile" class="btn btn-danger rounded">Back</a>
            <button type="submit" class="btn btn-primary rounded">Submit</button>
        </div>
    </form>
</div>
@endsection