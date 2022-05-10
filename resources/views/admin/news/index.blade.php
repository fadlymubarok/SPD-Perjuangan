@extends('layouts.master')

@section('header')
@include('layouts.partials.topbar')
@endsection

@section('breadcrumbs')
@include('layouts.partials.breadcumbs')
@endsection

@section('content')
<a href="/admin/news/create" class="btn btn-primary mb-2 rounded">+ Tambah Berita</a>
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
        <form class="search-form d-flex w-25 ml-auto mb-1" action="/admin/news">
            <label for="search" class="mt-sm-2">Cari: </label>
            <input class="form-control ml-2" type="text" name="search" placeholder="Cari ...">
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th width="150px">Judul</th>
                    <th>Penjelasan singkat</th>
                    <th>Kategori</th>
                    <th width="150px">Option</th>
                </tr>
            </thead>
            <tbody>
                @if($data->count())
                @foreach($data as $row)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->excerpt }}</td>
                    <td>{{ $row->category }}</td>
                    <td>
                        <form action="/admin/news/{{ $row->id }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="/admin/news/{{ $row->id }}/edit" class="btn btn-warning rounded">
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
                    <td colspan="5" class="text-center">Tidak Ada Berita</td>
                </tr>
                @endif
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
</div>
@endsection