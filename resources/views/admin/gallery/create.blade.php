@extends('adminlte::page')

@section('title', 'Tambah Foto Galeri')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <div>
        <h1 class="mb-0">Tambah Foto</h1>

        <small class="text-muted">
            Tambahkan dokumentasi kegiatan atau pertunjukan Barongan
        </small>
    </div>

    <a
        href="{{ route('gallery.index') }}"
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

            <i class="fas fa-image mr-2"></i>

            Informasi Foto

        </h3>

    </div>

    <form
        action="{{ route('gallery.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        @include('admin.gallery._form')

        <div class="card-footer text-right">

            <a
                href="{{ route('gallery.index') }}"
                class="btn btn-secondary">

                Batal

            </a>

            <button
                type="submit"
                class="btn btn-warning">

                <i class="fas fa-save mr-1"></i>

                Simpan Foto

            </button>

        </div>

    </form>

</div>

@stop


@section('js')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const input = document.getElementById('image');
    const preview = document.getElementById('image_preview');

    if (!input || !preview) return;

    input.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {

            preview.src = '';
            preview.style.display = 'none';

            return;
        }

        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';

    });

});

</script>

@stop