@extends('admin.layouts.master')

@section('header')
@include('admin.layouts.partials.topbar')
@endsection

@section('breadcrumbs')
@include('admin.layouts.partials.breadcumbs')
@endsection

@section('content')
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
        <form class="search-form d-flex w-25 ml-auto mb-1" action="/admin/question">
            <label for="search" class="mt-sm-2">Cari: </label>
            <input class="form-control ml-2" type="text" name="search" placeholder="Cari ...">
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="100px">No</th>
                    <th width="150px">Nama lengkap</th>
                    <th>Alamat</th>
                    <th width="150px">Option</th>
                </tr>
            </thead>
            <tbody>
                @if($data->count())
                @foreach($data as $row)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->address }}</td>
                    <td>
                        <form action="/admin/question/{{ $row->id }}" method="post">
                            @csrf
                            @method('delete')

                            @if($row->status == 0)
                            <a href="/admin/question/{{ $row->id }}/edit" class="btn btn-warning rounded">
                                <i class="fa fa-eye"></i>
                            </a>
                            @else
                            <span class="badge badge-info p-2 mt-2">Telah ditanggapi</span>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5" class="text-center">Tidak Ada Pertanyaan</td>
                </tr>
                @endif
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
</div>
@endsection