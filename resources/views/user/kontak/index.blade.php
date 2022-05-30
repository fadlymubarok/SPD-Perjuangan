@extends('user.layouts.master')

@section('content')
<section id="faq" class="faq content-center">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>KONTAK KAMI</h2>
          <p>AJUKAN PERTANYAAN?</p>
        </div>
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <form action="kontak" method="post">
          @csrf
          <div class="col-lg-6">
          <div class="form-group">
            <label for="name" class="control-label mb-1">Nama lengkap</label>
            <input name="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror" value="{{ old('name') }}" autofocus>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="d-flex">
            <div class="form-group w-50 mb-0">
                <label for="kp" class="control-label mb-1">Kampung</label>
                <input name="kp" type="text" class="form-control mb-2 @error('kp') is-invalid @enderror" value="{{ old('kp') }}">
                @error('kp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group w-50 ml-2 mb-0 ">
                <label for="rt" class="control-label mb-1">RT</label>
                <input name="rt" type="text" class="form-control mb-2 @error('rt') is-invalid @enderror" value="{{ old('rt') }}">
                @error('rt')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group w-50 ml-2 mb-0">
                <label for="rw" class="control-label mb-1">RW</label>
                <input name="rw" type="text" class="form-control mb-2 @error('rw') is-invalid @enderror" value="{{ old('rw') }}">
                @error('rw')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Isi pesan</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary rounded">Kirim</button>
        </div>
        </form>
      </div>
    </section><!-- End F.A.Q Section -->

@endsection