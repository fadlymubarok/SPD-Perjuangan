@extends('layouts.master')

@section('header')
@include('layouts.partials.topbar')
@endsection

@section('breadcrumbs')
@include('layouts.partials.breadcumbs')
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
        <div class="d-flex w-100 justify-content-end">
            <form class="search-form d-flex" method="get" action="/admin/account">
                <label for="search" class="mt-1">Search:</label>
                <input class="form-control ml-sm-2 mb-2" type="text" name="search" placeholder="Search ..." aria-label="Search">
            </form>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @if($data->count())
                @foreach($data as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    @if($row->position_id == null)
                    <td>Masyarakat</td>
                    @else
                    <td>{{ $row->position->name }}</td>
                    @endif
                    <td>
                        <a href="/admin/account/{{ $row->id }}/edit" class="btn btn-warning rounded">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5" class="text-center">Account not found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection