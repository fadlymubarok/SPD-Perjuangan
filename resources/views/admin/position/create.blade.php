@extends('admin.layouts.master')


@section('content')
<div class="breadcrumbs mt-3 p-0">
    <div class="col-sm-4 ml-0 pl-0">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Form Tambah Posisi</h1>
            </div>
        </div>
    </div>
</div>
<div class="card shadow p-3">
    <form action="/admin/position" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="name" class="control-label">Nama</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" autofocus>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-2">
            <label for="for" class="control-label">Untuk</label>
            <select name="for" class="form-control @error('for') is-invalid @enderror">
                <option value="">Pilih</option>
                <option value="Aparatur" @if(old('for')=='Aparatur' ) selected @endif>Aparatur</option>
                <option value="BPD" @if(old('for')=='BPD' ) selected @endif>BPD</option>
            </select>
            @error('for')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <a href="/admin/position" class="btn btn-danger rounded">Back</a>
            <button type="submit" class="btn btn-primary rounded">Submit</button>
        </div>
    </form>
</div>
@endsection