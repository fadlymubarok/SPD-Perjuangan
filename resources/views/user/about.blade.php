@extends('user.layouts.master')

@section('content')

<div class="container-fluid">
  <div class="breadcrumb my-2">
      <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">About</li>
          </ol>
      </nav>
  </div>

  <div class="container about">
      <h1 class="text-center mb-4">About Us</h1>
      
      <div class="text-about">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti tenetur blanditiis, aperiam rerum officia veniam pariatur architecto tempora sapiente magnam excepturi ab reprehenderit illo eos sunt laudantium aspernatur. Ipsam laborum a animi consequatur, placeat voluptate.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem explicabo tenetur animi minus dolor, delectus praesentium excepturi illo neque quaerat quos deserunt modi officiis sint.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia voluptates blanditiis vitae veniam, modi animi, cum numquam voluptatum architecto libero quaerat culpa quam repellendus quasi repellat at ipsum voluptas laborum.</p>
      </div>
  </div>
</div>

@endsection