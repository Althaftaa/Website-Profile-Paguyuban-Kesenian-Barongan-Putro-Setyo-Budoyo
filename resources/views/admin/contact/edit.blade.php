@extends('adminlte::page')

@section('title', 'Kontak')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <div>

        <h1 class="mb-0">Kontak</h1>

        <small class="text-muted">
            Kelola informasi kontak dan media sosial Kelompok Seni Barongan.
        </small>

    </div>

</div>

@stop


@section('content')

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif


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
    action="{{ route('contact.update') }}"
    method="POST">

    @csrf
    @method('PUT')

    <div class="card-body">

        <div class="form-group">

            <label>Alamat</label>

            <textarea
                name="address"
                rows="3"
                class="form-control">{{ old('address',$contact->address) }}</textarea>

        </div>


        <div class="form-group">

            <label>Nomor Telepon / WhatsApp</label>

            <input
                type="text"
                name="phone"
                class="form-control"
                value="{{ old('phone',$contact->phone) }}">

        </div>


        <div class="form-group">

            <label>Email</label>

            <input
                type="email"
                name="email"
                class="form-control"
                value="{{ old('email',$contact->email) }}">

        </div>


        <div class="form-group">

            <label>Google Maps (Embed)</label>

            <textarea
                name="google_maps"
                rows="5"
                class="form-control"
                placeholder="Tempelkan kode iframe Google Maps di sini">{{ old('google_maps',$contact->google_maps) }}</textarea>

        </div>


        <hr>

        <h5 class="mb-3">

            Media Sosial

        </h5>


        <div class="form-group">

            <label>Instagram</label>

            <input
                type="url"
                name="instagram"
                class="form-control"
                value="{{ old('instagram',$contact->instagram) }}">

        </div>


        <div class="form-group">

            <label>Facebook</label>

            <input
                type="url"
                name="facebook"
                class="form-control"
                value="{{ old('facebook',$contact->facebook) }}">

        </div>


        <div class="form-group">

            <label>YouTube</label>

            <input
                type="url"
                name="youtube"
                class="form-control"
                value="{{ old('youtube',$contact->youtube) }}">

        </div>


        <div class="form-group">

            <label>TikTok</label>

            <input
                type="url"
                name="tiktok"
                class="form-control"
                value="{{ old('tiktok',$contact->tiktok) }}">

        </div>

    </div>


    <div class="card-footer text-right">

        <button
            class="btn btn-warning">

            <i class="fas fa-save mr-1"></i>

            Simpan Perubahan

        </button>

    </div>

</form>

</div>

@stop