@extends('adminlte::page')

@section('title', 'Edit Berita')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <div>

        <h1 class="mb-0">
            Edit Berita
        </h1>

        <small class="text-muted">
            Perbarui informasi berita
        </small>

    </div>

    <a
        href="{{ route('news.index') }}"
        class="btn btn-secondary">

        <i class="fas fa-arrow-left mr-1"></i>

        Kembali

    </a>

</div>

@stop


@section('content')

@if ($errors->any())

<div class="alert alert-danger">

    <strong>Terjadi kesalahan.</strong>

    <ul class="mb-0 mt-2">

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<div class="card card-outline card-warning">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-edit mr-2"></i>

            Edit Berita

        </h3>

    </div>

    <form
        action="{{ route('news.update',$news) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('admin.news._form')

        <div class="card-footer text-right">

            <a
                href="{{ route('news.index') }}"
                class="btn btn-secondary">

                Batal

            </a>

            <button
                type="submit"
                class="btn btn-warning">

                <i class="fas fa-save mr-1"></i>

                Simpan Perubahan

            </button>

        </div>

    </form>

</div>

@stop


@section('js')

<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<script>

ClassicEditor
.create(document.querySelector('#editor'))
.catch(error=>{
    console.error(error);
});

// Preview Thumbnail

document.getElementById('thumbnail')
.addEventListener('change',function(){

    const file=this.files[0];

    if(!file) return;

    let preview=document.getElementById('thumbnail_preview');

    if(!preview){

        preview=document.createElement('img');

        preview.id='thumbnail_preview';

        preview.className='img-thumbnail mt-3';

        preview.style.maxHeight='250px';

        this.parentNode.insertBefore(preview,this);

    }

    preview.src=URL.createObjectURL(file);

});

// Slug otomatis

document
.getElementById('title')
.addEventListener('keyup',function(){

    let slug=this.value
        .toLowerCase()
        .trim()
        .replace(/[^\w\s-]/g,'')
        .replace(/\s+/g,'-')
        .replace(/--+/g,'-');

    document.getElementById('slug').value=slug;

});

</script>

@stop