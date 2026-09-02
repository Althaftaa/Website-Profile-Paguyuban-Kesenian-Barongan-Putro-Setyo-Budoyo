@extends('adminlte::page')

@section('title', 'Profil Sanggar')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="mb-0">Profil Paguyuban</h1>
            <small class="text-muted">
                Kelola informasi utama Paguyuban Seni Barongan Putro Setyo Budoyo
            </small>
        </div>
    </div>
@stop

@section('content')

    {{-- Notifikasi berhasil --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    {{-- Error validasi --}}
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

    <form action="{{ route('admin.profile.update') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- IDENTITAS --}}
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-landmark mr-2"></i>
                    Identitas Sanggar
                </h3>
            </div>

            <div class="card-body">

                <div class="form-group">
                    <label>Nama Kelompok Seni <span class="text-danger">*</span></label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $profile?->name) }}"
                        placeholder="Contoh: Putro Setyo Budoyo"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Deskripsi Singkat</label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="3"
                        placeholder="Deskripsi singkat mengenai kelompok seni..."
                    >{{ old('description', $profile?->description) }}</textarea>
                </div>

            </div>
        </div>


        {{-- PROFIL & SEJARAH --}}
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-book-open mr-2"></i>
                    Profil & Sejarah
                </h3>
            </div>

            <div class="card-body">

                <div class="form-group">
                    <label>Sejarah</label>

                    <textarea
                        name="history"
                        class="form-control"
                        rows="6"
                        placeholder="Tuliskan sejarah kelompok seni..."
                    >{{ old('history', $profile?->history) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Filosofi</label>

                    <textarea
                        name="philosophy"
                        class="form-control"
                        rows="5"
                        placeholder="Tuliskan filosofi Barongan..."
                    >{{ old('philosophy', $profile?->philosophy) }}</textarea>
                </div>

            </div>
        </div>


        {{-- GAMBAR --}}
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-images mr-2"></i>
                    Logo & Foto
                </h3>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Logo</label>
                        <img
                            id="logo_preview"
                            src=""
                            class="img-thumbnail mb-3"
                            style="max-height: 150px; display: none;"
                            alt="Preview Logo"
                        >        
                            @if($profile?->logo)
                                <div class="mb-3">
                                    <img
                                        src="{{ asset('storage/' . $profile->logo) }}"
                                        alt="Logo Barongan"
                                        class="img-thumbnail"
                                        style="max-height: 150px;"
                                    >
                                </div>
                            @endif                            
                            <div class="custom-file">
                                <input
                                    type="file"
                                    name="logo"
                                    class="custom-file-input"
                                    id="logo"
                                    accept="image/*"
                                >

                                <label class="custom-file-label" for="logo">
                                    Pilih logo...
                                </label>
                            </div>

                            <small class="form-text text-muted">
                                Format JPG, JPEG, PNG, atau WEBP.
                            </small>
                        </div>
                    </div>


                    <div class="col-md-4">
                            <div class="form-group">
                                <label>Foto Profil Sanggar</label>
                                <small class="d-block text-muted mb-2">Dipakai di section "Tentang Kami"</small>
                                <img
                                    id="profile_image_preview"
                                    src=""
                                    class="img-thumbnail mb-3"
                                    style="max-height: 150px; display: none;"
                                    alt="Preview Foto"
                                >
                                @if($profile?->profile_image)
                                    <div class="mb-3">
                                        <img
                                            src="{{ asset('storage/' . $profile->profile_image) }}"
                                            alt="Foto Profil Sanggar"
                                            class="img-thumbnail"
                                            style="max-height: 150px;"
                                        >
                                    </div>
                                @endif

                                <div class="custom-file">
                                    <input
                                        type="file"
                                        name="profile_image"
                                        class="custom-file-input"
                                        id="profile_image"
                                        accept="image/*"
                                    >

                                    <label class="custom-file-label" for="profile_image">
                                        Pilih foto...
                                    </label>
                                </div>

                                <small class="form-text text-muted">
                                    JPG, JPEG, PNG, atau WEBP. Maksimal 5 MB.
                                </small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">

                                <label>Media Sampul Beranda</label>

                                <small class="d-block text-muted mb-3">
                                    Media yang digunakan sebagai background Hero di halaman utama.
                                </small>


                                {{-- PILIH MEDIA --}}
                                <div class="mb-3">

                                    <div class="custom-control custom-radio">
                                        <input
                                            type="radio"
                                            id="hero_image"
                                            name="hero_media_type"
                                            value="image"
                                            class="custom-control-input"
                                            {{ old('hero_media_type', $profile?->hero_media_type ?? 'image') === 'image' ? 'checked' : '' }}
                                        >

                                        <label
                                            class="custom-control-label"
                                            for="hero_image"
                                        >
                                            <i class="fas fa-image mr-1"></i>
                                            Foto
                                        </label>
                                    </div>


                                    <div class="custom-control custom-radio mt-2">
                                        <input
                                            type="radio"
                                            id="hero_video"
                                            name="hero_media_type"
                                            value="video"
                                            class="custom-control-input"
                                            {{ old('hero_media_type', $profile?->hero_media_type ?? 'image') === 'video' ? 'checked' : '' }}
                                        >

                                        <label
                                            class="custom-control-label"
                                            for="hero_video"
                                        >
                                            <i class="fas fa-video mr-1"></i>
                                            Video
                                        </label>
                                    </div>

                                </div>


                                {{-- FOTO --}}
                                <div
                                    id="hero-image-section"
                                    style="
                                        {{ old('hero_media_type', $profile?->hero_media_type ?? 'image') === 'video'
                                            ? 'display:none;'
                                            : ''
                                        }}
                                    "
                                >

                                    <div class="mb-3">

                                        @if($profile?->cover_image)

                                            <img
                                                id="cover_image_current"
                                                src="{{ asset('storage/' . $profile->cover_image) }}"
                                                alt="Foto Sampul Beranda"
                                                class="img-thumbnail"
                                                style="width:100%; max-height:180px; object-fit:cover;"
                                            >

                                        @endif

                                    </div>


                                    <div class="custom-file">

                                        <input
                                            type="file"
                                            name="cover_image"
                                            class="custom-file-input"
                                            id="cover_image"
                                            accept="image/jpeg,image/png,image/webp"
                                        >

                                        <label
                                            class="custom-file-label"
                                            for="cover_image"
                                        >
                                            Pilih foto sampul...
                                        </label>

                                    </div>

                                    <small class="form-text text-muted">
                                        JPG, JPEG, PNG, atau WEBP.
                                        Sebaiknya foto lanskap (horizontal).
                                        Maksimal 5 MB.
                                    </small>

                                    <img
                                        id="cover_image_preview"
                                        src=""
                                        class="img-thumbnail mt-3"
                                        style="width:100%; max-height:180px; object-fit:cover; display:none;"
                                        alt="Preview Foto Sampul"
                                    >

                                </div>


                                {{-- VIDEO --}}
                                <div
                                    id="hero-video-section"
                                    style="
                                        {{ old('hero_media_type', $profile?->hero_media_type ?? 'image') === 'video'
                                            ? ''
                                            : 'display:none;'
                                        }}
                                    "
                                >

                                    @if($profile?->hero_video)

                                        <div class="mb-3">

                                            <video
                                                id="hero_video_current"
                                                controls
                                                muted
                                                preload="metadata"
                                                style="
                                                    width:100%;
                                                    max-height:180px;
                                                    object-fit:cover;
                                                    border-radius:6px;
                                                    background:#000;
                                                "
                                            >
                                                <source
                                                    src="{{ asset('storage/' . $profile->hero_video) }}"
                                                >
                                            </video>

                                        </div>

                                    @endif


                                    <div class="custom-file">

                                        <input
                                            type="file"
                                            name="hero_video"
                                            class="custom-file-input"
                                            id="hero_video_file"
                                            accept="video/mp4,video/webm"
                                        >

                                        <label
                                            class="custom-file-label"
                                            for="hero_video_file"
                                        >
                                            Pilih video sampul...
                                        </label>

                                    </div>

                                    <small class="form-text text-muted">
                                        Format MP4 atau WEBM.
                                        Sebaiknya video lanskap (horizontal).
                                        Maksimal 50 MB.
                                    </small>


                                    <video
                                        id="hero_video_preview"
                                        controls
                                        muted
                                        style="
                                            width:100%;
                                            max-height:180px;
                                            object-fit:cover;
                                            border-radius:6px;
                                            background:#000;
                                            display:none;
                                            margin-top:15px;
                                        "
                                    ></video>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>


        <div class="text-right pb-4">
            <button type="submit" class="btn btn-warning px-4">
                <i class="fas fa-save mr-1"></i>
                Simpan Profil
            </button>
        </div>

    </form>

@stop

@section('js')

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | PILIH MEDIA HERO
    |--------------------------------------------------------------------------
    */

    const heroImageRadio = document.getElementById('hero_image');
    const heroVideoRadio = document.getElementById('hero_video');

    const heroImageSection = document.getElementById('hero-image-section');
    const heroVideoSection = document.getElementById('hero-video-section');


    function updateHeroMediaType() {

        if (heroVideoRadio.checked) {

            heroImageSection.style.display = 'none';
            heroVideoSection.style.display = 'block';

        } else {

            heroImageSection.style.display = 'block';
            heroVideoSection.style.display = 'none';

        }

    }


    heroImageRadio.addEventListener(
        'change',
        updateHeroMediaType
    );

    heroVideoRadio.addEventListener(
        'change',
        updateHeroMediaType
    );


    /*
    |--------------------------------------------------------------------------
    | PREVIEW GAMBAR
    |--------------------------------------------------------------------------
    */

    const coverInput = document.getElementById('cover_image');
    const coverPreview = document.getElementById('cover_image_preview');


    if (coverInput) {

        coverInput.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) {
                return;
            }

            this.nextElementSibling.innerText = file.name;

            if (coverPreview) {

                coverPreview.src =
                    URL.createObjectURL(file);

                coverPreview.style.display = 'block';

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | PREVIEW VIDEO
    |--------------------------------------------------------------------------
    */

    const videoInput =
        document.getElementById('hero_video_file');

    const videoPreview =
        document.getElementById('hero_video_preview');


    if (videoInput) {

        videoInput.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) {
                return;
            }

            this.nextElementSibling.innerText = file.name;

            if (videoPreview) {

                videoPreview.src =
                    URL.createObjectURL(file);

                videoPreview.style.display = 'block';

                videoPreview.load();

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | CUSTOM FILE NAME
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll('.custom-file-input')
        .forEach(function (input) {

            input.addEventListener('change', function () {

                const file = this.files[0];

                if (!file) {
                    return;
                }

                this.nextElementSibling.innerText =
                    file.name;

            });

        });

});

</script>

@stop