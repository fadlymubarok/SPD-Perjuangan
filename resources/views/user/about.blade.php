@extends('user.layouts.master')

@section('content')

<div class="container-fluid">
  <div class="container about mt-4">
      <h1 class="text-center mb-4">About Us</h1>
      <div class="text-about">
        {!! $about !!}
      </div>
  </div>
</div>

@endsection