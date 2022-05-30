@extends('user.layouts.master')

@section('content')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="/" class="text-danger">Home</a> >> Pemerintahan </li>
        </ol>
    </nav>
</div>
<div>

<div class="container">
    <h2>Pemerintahan Desa</h2>
</div>

@if($data->count())
@foreach($data as $col)
    <div class="container">
        <div class="text-center">
            <h3>{{$col->kedudukan}} :</h3>
            <img src="{{ asset('../storage/gambar_aparatur/' . $col->picture )}}" class="img-thumbnail my-2" width="200" height="200" alt="{{ $col->picture }}">
            <h4>{{ $col->name }}</h4>
        </div>
    </div>
        <div class="container">
            <table class="table table-light">
                <thead>
                <tr>
                    <th scope="col">kedudukan</th>
                    <th scope="col">Tugas</th>
                    <th scope="col">Fungsi</th>
                    <th scope="col">Ket</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $col->kedudukan }}</td>
                    <td>{{ $col->tugas }}</td>
                    <td>{{ $col->fungsi }}</td>
                    <td>{{ $col->keterangan }}</td>
                </tr>
                </tbody>
            </table>
        </div>

@endforeach
@else
    <div class="alert alert-info" role="alert">
        <p>tidak ada data</p>
    </div>
@endif

@endsection