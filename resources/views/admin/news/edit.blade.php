@extends('admin.layouts.master')


@section('content')
<div class="breadcrumbs mt-3 p-0">
    <div class="col-sm-4 ml-0 pl-0">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Form Edit Berita</h1>
            </div>
        </div>
    </div>
</div>
<div class="card shadow p-3">
    <form action="/admin/news/{{ $news->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title" class="control-label mb-1">Judul berita</label>
            <input name="title" type="text" onchange="updateSlug();" class="form-control mb-2 @error('title') is-invalid @enderror" id="title" value="{{ old('title', $news->title) }}" autofocus>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="slug" class="control-label mb-1">Slug</label>
            <input name="slug" type="text" class="form-control mb-2 @error('slug') is-invalid @enderror" id="slug" value="{{ old('title', $news->slug) }}">
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="category_id" class=" form-control-label">Kategori</label>
            <select name="category" class="form-control @error('category') is-invalid @enderror">
                <option value="">Pilih kategori</option>
                <option value="Umum" @if(old('Umum', $news->category) =='Umum' ) selected @endif>Umum</option>
                <option value="Event" @if(old('Event', $news->category) =='Event' ) selected @endif>Event</option>
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
            <p class="text-secondary" style="font-size: 12px; margin-top: -5px;">* isi jika ingin ganti gambar</p>
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
            <input id="body" type="hidden" name="body" value="{{ old('body', $news->body) }}">
            <trix-editor input="body"></trix-editor>
        </div>
        <div class="form-group">
            <a href="/admin/news" class="btn btn-danger rounded">Back</a>
            <button type="submit" class="btn btn-warning rounded">Update</button>
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