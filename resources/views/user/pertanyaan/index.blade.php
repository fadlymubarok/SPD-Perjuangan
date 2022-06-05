@extends('user.layouts.master')

@section('form')
<form class="d-flex" action="/pertanyaan" method="get">
    <input class="form-control me-1" type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-light" type="submit">Cari</button>
</form>
@endsection

@section('content')
<div class="text-center my-3">
    <h1>Pertanyaan Masyarakat</h1>
    
</div>

<div class="container">
    @if($pertanyaan->count())
    <div class="row mt-3">
        @foreach($pertanyaan as $col)
        <div class="col-md-4 mb-3 mr-2">
            <div class="card" style="max-width: 21rem; height: auto;">
                <div class="card-body">
                    <h5 class="card-title">Penanya: {{ $col->name }}</h5>
                    <p class="card-text">{{ $col->body }}</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-modal" data-bs-toggle="modal" data-bs-target="#modalQuestion" data-id="{{ $col->id }}">
                        Tanggapan
                    </button>

                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalQuestion" tabindex="-1" aria-labelledby="modalQuestionLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalQuestionLabel">Pertanyaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="alert alert-info text-center" role="alert">
        <h4>Belum ada yang bertanya</h4>
    </div>
    @endif
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <a class="btn btn-info mx-auto" href="kontak">Ajukan pertanyaan</a>
        </div>
    </div>
    @if ($pertanyaan->hasPages())
    <div class="container mb-5 mt-3 border-end border-bottom border-2">
        <div class="d-flex justify-content-center">
            {{ $pertanyaan->links() }}
        </div>
    </div>
    @endif
</div>
@endsection

@section('js')
<script>
    $('.btn-modal').on('click', function() {
        const btn = $(this).data('id');
        // console.log(btn)
        $.ajax({
            "url": "{{ url('') }}/get_question/" + btn,
            "data": $(this).data('id'),
            "success": function(res) {
                $('.modal-body').html(`<h5>` + res.name + ` - penanya</h5>
                    <p>` + res.body + `</p>
                    <hr>
                    <h5>Admin - Penjawab</h5>
                    <p>` + res.opinion + `</p>`)
            }
        })
        // $('#modalQuestion').modal('show');
    });

    $('#modalQuestion').on('hidden.bs.modal', function (event) {
        $('.modal-body').html('');
	})
</script>
@endsection