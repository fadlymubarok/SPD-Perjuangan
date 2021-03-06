@extends('admin.layouts.master')


@section('content')
<div class="breadcrumbs mt-3 p-0">
    <div class="col-sm-4 ml-0 pl-0">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Form Tambah Berita</h1>
            </div>
        </div>
    </div>
</div>
<div class="card shadow p-3">
    <form action="/admin/news" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title" class="control-label mb-1">Judul berita</label>
            <input name="title" type="text" onchange="updateSlug();" class="form-control mb-2 @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" autofocus>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="slug" class="control-label mb-1">Slug</label>
            <input name="slug" type="text" class="form-control mb-2 @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug') }}">
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="category" class=" form-control-label">Kategori</label>
            <select name="category" class="form-control @error('category') is-invalid @enderror">
                <option value="">Pilih kategori</option>
                <option value="berita" @if(old('category')=='Berita' ) selected @endif>Berita</option>
                <option value="Keuangan" @if(old('category')=='Keuangan' ) selected @endif>Keuangan desa</option>
                <option value="event" @if(old('category')=='Event' ) selected @endif>Event</option>
            </select>
            @error('category')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="picture" class="control-label mb-0">Gambar</label>
            <input name="picture" type="file" class="form-control border-0 pl-0 mb-2 @error('picture') is-invalid @enderror">
            @error('picture')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="body" class="control-label mb-1">Penjelasan</label>
            @error('body')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
            <trix-editor input="body"></trix-editor>
        </div>
        <div class="form-group">
            <a href="/admin/news" class="btn btn-danger rounded">Back</a>
            <button type="submit" class="btn btn-primary rounded">Submit</button>
        </div>
    </form>
</div>
<script>
    function updateSlug() {
        let title = $('#title').val()
        let slug = $('#slug')

        slug.val('')
        if (title != '') {
            $.ajax({
                url: "{{ url('') }}/getSlug?title=" + title,
                success: function(res) {
                    slug.val(res.data)
                }
            })
        }
    }
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>
@endsection