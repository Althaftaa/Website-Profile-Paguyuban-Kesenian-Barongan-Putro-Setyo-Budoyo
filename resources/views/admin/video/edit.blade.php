@extends('adminlte::page')

@section('title', 'Edit Video')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <div>

        <h1 class="mb-0">Edit Video</h1>

        <small class="text-muted">
            Perbarui video pertunjukan Barongan
        </small>

    </div>

    <a
        href="{{ route('video.index') }}"
        class="btn btn-secondary">

        <i class="fas fa-arrow-left mr-1"></i>

        Kembali

    </a>

</div>

@stop


@section('content')

@if($errors->any())

<div class="alert alert-danger">

    <strong>Terjadi kesalahan.</strong>

    <ul class="mb-0 mt-2">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif


<div class="card card-outline card-warning">

    <form
        action="{{ route('video.update', $video) }}"
        method="POST">

        @csrf
        @method('PUT')

        @include('admin.video._form')

        <div class="card-footer text-right">

            <a
                href="{{ route('video.index') }}"
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

<script>

function getYoutubeId(url){

    const regExp = /(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/))([^&?/]+)/;

    const match = url.match(regExp);

    return match ? match[1] : null;

}

const youtubeInput = document.getElementById('youtube_url');

youtubeInput.addEventListener('keyup', function(){

    let id = getYoutubeId(this.value);

    if(!id){

        document.getElementById('youtube_preview').style.display='none';

        return;

    }

    document.getElementById('youtube_preview').style.display='block';

    document.getElementById('youtube_thumbnail').src =
        'https://img.youtube.com/vi/'+id+'/hqdefault.jpg';

    document.getElementById('youtube_watch').href = this.value;

});

</script>

@stop