@extends('user.layouts.master')

@section('content')
<div class="d-flex mt-2">
    <a href="/" class="text-danger">Home</a>
    <span>&nbsp; >> Pertanyaan</span>
</div>
<div class="text-center mt-3">
    <h1>Pertanyaan Masyarakat</h1>
</div>

<div class="container">
    @if($pertanyaan->count())
    <div class="row mt-3">
        @foreach($pertanyaan as $col)
        <div class="col-md-4 mb-3 mr-2">
            <div class="card" style="width: 21rem; height: 10rem;">
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
    <div class="alert alert-info" role="alert">
        <h4>Belum ada yang bertanya</h4>
    </div>
    @endif
    {{ $pertanyaan->links() }}
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
        $('#modalQuestion').modal('show');
    });

    $('#modalQuestion').on('hidden.bs.modal', function (event) {
        $('.modal-body').html('');
	})
</script>
@endsection