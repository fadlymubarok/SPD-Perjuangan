@extends('layouts.master')
@section('header')
@include('layouts.partials.topbar')
@endsection

@section('breadcrumbs')
@include('layouts.partials.breadcumbs')
@endsection

@section('content')
@if($data->count() == 0)
<a href="/admin/category/create" class="btn btn-primary mb-2 rounded">+ Create Category</a>
@endif
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
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="200px">No</th>
                    <th>Name</th>
                    <th width="200px">Option</th>
                </tr>
            </thead>
            <tbody>
                @if($data->count())
                @foreach($data as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->name }}</td>
                    <td>
                        <form action="/admin/category/{{ $row->id }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="/admin/category/{{ $row->id }}/edit" class="btn btn-warning rounded">
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
                    <td colspan="4" class="text-center">category nothing</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection