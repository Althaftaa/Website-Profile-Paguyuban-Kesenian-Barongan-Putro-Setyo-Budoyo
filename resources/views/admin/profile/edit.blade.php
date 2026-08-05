@extends('adminlte::page')

@section('title', 'Profil Sanggar')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="mb-0">Profil Sanggar</h1>
            <small class="text-muted">
                Kelola informasi utama Kelompok Seni Barongan Putro Setyo Budoyo
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


        {{-- VISI MISI --}}
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-bullseye mr-2"></i>
                    Visi & Misi
                </h3>
            </div>

            <div class="card-body">

                <div class="form-group">
                    <label>Visi</label>

                    <textarea
                        name="vision"
                        class="form-control"
                        rows="4"
                        placeholder="Tuliskan visi kelompok..."
                    >{{ old('vision', $profile?->vision) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Misi</label>

                    <textarea
                        name="mission"
                        class="form-control"
                        rows="6"
                        placeholder="Tuliskan misi kelompok..."
                    >{{ old('mission', $profile?->mission) }}</textarea>
                </div>

            </div>
        </div>


        {{-- KONTAK --}}
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-address-book mr-2"></i>
                    Kontak & Lokasi
                </h3>
            </div>

            <div class="card-body">

                <div class="form-group">
                    <label>Alamat</label>

                    <textarea
                        name="address"
                        class="form-control"
                        rows="3"
                        placeholder="Alamat lengkap..."
                    >{{ old('address', $profile?->address) }}</textarea>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>WhatsApp</label>

                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                value="{{ old('phone', $profile?->phone) }}"
                                placeholder="Contoh: 628123456789"
                            >
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email', $profile?->email) }}"
                                placeholder="contoh@email.com"
                            >
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label>Google Maps</label>

                    <textarea
                        name="google_maps"
                        class="form-control"
                        rows="3"
                        placeholder="Masukkan link atau embed Google Maps"
                    >{{ old('google_maps', $profile?->google_maps) }}</textarea>
                </div>

            </div>
        </div>


        {{-- MEDIA SOSIAL --}}
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-share-alt mr-2"></i>
                    Media Sosial
                </h3>
            </div>

            <div class="card-body">

                <div class="form-group">
                    <label>Instagram</label>

                    <input
                        type="url"
                        name="instagram"
                        class="form-control"
                        value="{{ old('instagram', $profile?->instagram) }}"
                        placeholder="https://instagram.com/..."
                    >
                </div>

                <div class="form-group">
                    <label>Facebook</label>

                    <input
                        type="url"
                        name="facebook"
                        class="form-control"
                        value="{{ old('facebook', $profile?->facebook) }}"
                        placeholder="https://facebook.com/..."
                    >
                </div>

                <div class="form-group">
                    <label>YouTube</label>

                    <input
                        type="url"
                        name="youtube"
                        class="form-control"
                        value="{{ old('youtube', $profile?->youtube) }}"
                        placeholder="https://youtube.com/..."
                    >
                </div>

            </div>
        </div>


        {{-- GAMBAR --}}
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-images mr-2"></i>
                    Logo & Foto Profil
                </h3>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">
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


                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto Profil Sanggar</label>
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
    document.querySelectorAll('.custom-file-input').forEach(function(input) {
        input.addEventListener('change', function() {
            const file = this.files[0];

            if (!file) {
                return;
            }

            this.nextElementSibling.innerText = file.name;

            const previewId = this.id + '_preview';
            const preview = document.getElementById(previewId);

            if (preview) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            }
        });
    });
</script>
@stop