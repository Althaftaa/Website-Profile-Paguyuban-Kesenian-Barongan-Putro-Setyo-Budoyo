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
        method="POST"
        enctype="multipart/form-data">

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
const platformSelect = document.getElementById('platform');
const urlHint = document.getElementById('url_hint');
const youtubePreview = document.getElementById('youtube_preview');
const thumbnailGroup = document.getElementById('thumbnail_group');

const placeholders = {
    youtube: 'https://youtu.be/xxxxx',
    instagram: 'https://www.instagram.com/reel/xxxxx',
    tiktok: 'https://www.tiktok.com/@namaakun/video/xxxxx',
};

const hints = {
    youtube: 'Tempel link video YouTube (contoh: https://youtu.be/xxxxx)',
    instagram: 'Tempel link Reel/Post Instagram (contoh: https://www.instagram.com/reel/xxxxx)',
    tiktok: 'Tempel link video TikTok (contoh: https://www.tiktok.com/@namaakun/video/xxxxx)',
};

function syncPlatformFields(){

    const platform = platformSelect.value;

    youtubeInput.placeholder = placeholders[platform];
    urlHint.textContent = hints[platform];

    if (platform === 'youtube') {
        thumbnailGroup.style.display = 'none';
    } else {
        thumbnailGroup.style.display = 'block';
        youtubePreview.style.display = 'none';
    }
}

platformSelect.addEventListener('change', syncPlatformFields);
syncPlatformFields();

youtubeInput.addEventListener('keyup', function(){

    if (platformSelect.value !== 'youtube') {
        return;
    }

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

document.querySelectorAll('.custom-file-input').forEach(function (input) {
    input.addEventListener('change', function () {
        if (this.files[0]) {
            this.nextElementSibling.innerText = this.files[0].name;
        }
    });
});

</script>

@stop