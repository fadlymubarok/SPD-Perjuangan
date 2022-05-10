@extends('layouts.master')
@section('header')
@include('layouts.partials.topbar')
@endsection

@section('breadcrumbs')
@include('layouts.partials.breadcumbs')
@endsection

@section('content')
<a href="/admin/profile-bpd/create" class="btn btn-primary mb-2 rounded">+ Tambah Profil BPD</a>
<div class="card shadow p-3">
    <div class="table-responsive">
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        @if(session('update'))
        <div class="alert alert-warning" role="alert">
            {{ session('update') }}
        </div>
        @endif

        @if(session('delete'))
        <div class="alert alert-danger" role="alert">
            {{ session('delete') }}
        </div>
        @endif
        <form class="search-form d-flex w-25 ml-auto mb-1">
            <label for="search" class="mt-sm-2">Cari: </label>
            <input class="form-control ml-2" type="text" placeholder="Cari ...">
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="200px">No</th>
                    <th>Name</th>
                    <th>Posisi</th>
                    <th width="200px">Option</th>
                </tr>
            </thead>
            <tbody>
                @if($data->count())
                @foreach($data as $row)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->position }}</td>
                    <td>
                        <form action="/admin/profile-bpd/{{ $row->id }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="/admin/profile-bpd/{{ $row->id }}/edit" class="btn btn-warning rounded">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <button type="submit" class="btn btn-danger bg-outline-transparent rounded" onclick="return confirm('Are you sure?'); "> <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5" class="text-center">Profile BPD nothing</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection