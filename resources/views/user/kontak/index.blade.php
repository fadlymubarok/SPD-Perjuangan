@extends('user.layouts.master')

@section('content')
<section id="faq" class="faq content-center">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>KONTAK KAMI</h2>
          <p>AJUKAN PERTANYAAN?</p>
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nama</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="masukan nama anda..">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="masukan email anda..">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Perihal</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="masukan perihal...">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Isi pesan</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="button" class="btn btn-primary">Kirim</button>
      </div>
    </section><!-- End F.A.Q Section -->

@endsection