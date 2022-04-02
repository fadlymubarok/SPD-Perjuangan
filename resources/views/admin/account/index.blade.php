@extends('layouts.master')

@section('header')
@include('layouts.partials.topbar')
@endsection

@section('breadcrumbs')
@include('layouts.partials.breadcumbs')
@endsection

@section('content')
<div class="card shadow p-3">
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="table-responsive">
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
                        <a href="/account/{{ $row->id }}/edit" class="btn btn-warning rounded">
                            Edit
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