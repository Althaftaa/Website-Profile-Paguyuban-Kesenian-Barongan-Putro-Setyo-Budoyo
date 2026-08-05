@php
use Illuminate\Support\Str;
@endphp

@extends('layouts.frontend')

@section('title', 'Putro Setyo Budoyo')

@push('styles')

<style>

    body {
        background: #faf7f2;
        color: #2e2e2e;
    }

    /* NAVBAR */

    .navbar {
        background: white;
    }

    .navbar-brand {
        font-weight: 600;
    }

    .navbar-nav .nav-link {
        color: #333;
        font-size: 14px;
    }

    .navbar-nav .nav-link:hover {
        color: #c89b3c;
    }


    /* HERO */

    .hero {
        min-height: 600px;

        display: flex;
        align-items: center;
        justify-content: center;

        text-align: center;

        background: #4b2e1e;

        color: white;
    }

    .hero h1 {
        font-size: 48px;
        font-weight: 700;
    }

    .hero-title {
        color: #d4af37;
    }

    .hero-description {
        max-width: 700px;
        margin: 20px auto;
    }

    .btn-gold {
        background: #c89b3c;
        color: white;

        border-radius: 30px;

        padding: 10px 28px;

        border: none;
    }

    .btn-gold:hover {
        background: #a77d2d;
        color: white;
    }


    /* SECTION */

    .section {
        padding: 80px 0;
    }

    .section-title {
        color: #4b2e1e;
        font-weight: 600;
        margin-bottom: 30px;
    }


    /* ABOUT */

    .about-image {
        width: 100%;
        height: 400px;

        object-fit: cover;

        border-radius: 12px;
    }


    /* FOOTER */

    footer {
        background: #4b2e1e;
        color: white;

        padding: 40px 0;
    }

</style>

@endpush


@section('content')


{{-- NAVBAR --}}

<nav class="navbar navbar-expand-lg navbar-light shadow-sm">

    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">

            @if($profile?->logo)

                <img
                    src="{{ asset('storage/' . $profile->logo) }}"
                    height="40"
                    class="me-2"
                    alt="Logo"
                >

            @endif

            {{ $profile?->name ?? 'Putro Setyo Budoyo' }}

        </a>


        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMain"
        >
            <span class="navbar-toggler-icon"></span>
        </button>


        <div
            class="collapse navbar-collapse"
            id="navbarMain"
        >

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link" href="#beranda">
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#tentang">
                        Tentang Kami
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#galeri">
                        Galeri
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#video">
                        Vidio
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#jadwal">
                        Jadwal
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#berita">
                        Berita
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#kontak">
                        Kontak
                    </a>
                </li>

                @if($profile?->phone)

                    <li class="nav-item ms-lg-3">

                        <a
                            class="btn btn-gold"
                            href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->phone) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            Hubungi
                        </a>

                    </li>

                @endif

            </ul>

        </div>

    </div>

</nav>



{{-- HERO --}}

<section
    id="beranda"
    class="hero"
>

    <div class="container">

        <p class="mb-2">
            Selamat Datang di
        </p>

        <h1>
            Kelompok Seni Barongan
            <br>

            <span class="hero-title">
                {{ $profile?->name ?? 'Putro Setyo Budoyo' }}
            </span>
        </h1>


        @if($profile?->description)

            <p class="hero-description">
                {{ $profile->description }}
            </p>

        @endif


        <a
            href="#tentang"
            class="btn btn-outline-light rounded-pill px-4 me-2"
        >
            Tentang Kami
        </a>


        @if($profile?->phone)

            <a
                href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->phone) }}"
                class="btn btn-gold"
                target="_blank"
                rel="noopener noreferrer"
            >
                Hubungi Kami
            </a>

        @endif

    </div>

</section>



{{-- TENTANG KAMI --}}

<section
    id="tentang"
    class="section bg-white"
>

    <div class="container">

        <div class="row align-items-center g-5">


            <div class="col-lg-7">

                <h2 class="section-title">
                    Tentang Kami
                </h2>


                @if($profile?->history)

                    <h5>Sejarah</h5>

                    <p class="text-muted">
                        {!! nl2br(e($profile->history)) !!}
                    </p>

                @endif


                @if($profile?->philosophy)

                    <h5 class="mt-4">
                        Filosofi
                    </h5>

                    <p class="text-muted">
                        {!! nl2br(e($profile->philosophy)) !!}
                    </p>

                @endif

            </div>


            <div class="col-lg-5">

                @if($profile?->profile_image)

                    <img
                        src="{{ asset('storage/' . $profile->profile_image) }}"
                        class="about-image"
                        alt="Kelompok Seni {{ $profile->name }}"
                    >

                @else

                    <div
                        class="about-image d-flex align-items-center justify-content-center bg-light"
                    >

                        <div class="text-center text-muted">

                            <i class="fas fa-image fa-3x mb-3"></i>

                            <p>
                                Foto profil belum tersedia
                            </p>

                        </div>

                    </div>

                @endif

            </div>

        </div>

    </div>

</section>



{{-- VISI MISI --}}

@if($profile?->vision || $profile?->mission)

<section class="section">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Visi & Misi
            </h2>

        </div>


        <div class="row g-4">


            @if($profile?->vision)

                <div class="col-md-6">

                    <div class="card h-100 border-0 shadow-sm">

                        <div class="card-body p-4">

                            <h4>
                                <i class="fas fa-eye me-2"></i>
                                Visi
                            </h4>

                            <p class="text-muted mb-0">
                                {!! nl2br(e($profile->vision)) !!}
                            </p>

                        </div>

                    </div>

                </div>

            @endif


            @if($profile?->mission)

                <div class="col-md-6">

                    <div class="card h-100 border-0 shadow-sm">

                        <div class="card-body p-4">

                            <h4>
                                <i class="fas fa-bullseye me-2"></i>
                                Misi
                            </h4>

                            <p class="text-muted mb-0">
                                {!! nl2br(e($profile->mission)) !!}
                            </p>

                        </div>

                    </div>

                </div>

            @endif


        </div>

    </div>

</section>

@endif



{{-- TEMPORARY SECTIONS --}}

<section
    id="galeri"
    class="section bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Galeri
            </h2>

            <p class="text-muted">
                Dokumentasi kegiatan dan pertunjukan
                Kelompok Seni Barongan
            </p>

        </div>


        @if($galleries->count())

            <div class="row">

                @foreach($galleries as $gallery)

                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="card border-0 shadow-sm h-100">

                            <img
                                src="{{ asset('storage/'.$gallery->image) }}"
                                class="card-img-top"
                                style="
                                    height:260px;
                                    object-fit:cover;
                                "
                                alt="{{ $gallery->title }}"
                            >

                            <div class="card-body">

                                <h5 class="card-title">

                                    {{ $gallery->title }}

                                </h5>


                                @if($gallery->activity_date)

                                    <small class="text-muted">

                                        <i class="far fa-calendar-alt mr-1"></i>

                                        {{ $gallery->activity_date->format('d F Y') }}

                                    </small>

                                @endif


                                @if($gallery->description)

                                    <p class="mt-3 text-muted">

                                        {{ Str::limit($gallery->description,100) }}

                                    </p>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="text-center py-5">

                <i
                    class="fas fa-images fa-3x text-muted mb-3">
                </i>

                <h5>

                    Galeri masih kosong

                </h5>

            </div>

        @endif

    </div>

</section>

<section id="video" class="section bg-white">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Video
            </h2>

            <p class="text-muted">
                Dokumentasi video pertunjukan Kelompok Seni Barongan.
            </p>

        </div>

        @if($videos->count())

            <div class="row">

                @foreach($videos as $video)

                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="card border-0 shadow-sm h-100">

                            <img
                                src="https://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg"
                                class="card-img-top"
                                style="height:250px;object-fit:cover;"
                                alt="{{ $video->title }}">

                            <div class="card-body">

                                <h5>

                                    {{ $video->title }}

                                </h5>

                                @if($video->activity_date)

                                    <small class="text-muted">

                                        <i class="far fa-calendar-alt mr-1"></i>

                                        {{ $video->activity_date->format('d F Y') }}

                                    </small>

                                @endif

                                @if($video->description)

                                    <p class="mt-3 text-muted">

                                        {{ Str::limit($video->description,100) }}

                                    </p>

                                @endif

                            </div>

                            <div class="card-footer bg-white border-0">

                                <a
                                    href="{{ $video->youtube_url }}"
                                    target="_blank"
                                    class="btn btn-danger w-100">

                                    <i class="fab fa-youtube mr-2"></i>

                                    Tonton Video

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="text-center py-5">

                <i class="fab fa-youtube fa-3x text-muted mb-3"></i>

                <h5>

                    Belum ada video.

                </h5>

            </div>

        @endif

    </div>

</section>

<section id="jadwal" class="section">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">

                Jadwal Pertunjukan

            </h2>

            <p class="text-muted">

                Informasi jadwal pertunjukan Kelompok Seni Barongan Putro Setyo Budoyo.

            </p>

        </div>

        @if($schedules->count())

            <div class="row">

                @foreach($schedules as $schedule)

                    <div class="col-md-6 col-lg-4 mb-4">

                        <div class="card shadow-sm h-100">

                            <div class="card-body">

                                <span class="badge badge-warning mb-3">

                                    {{ $schedule->status }}

                                </span>

                                <h5 class="card-title">

                                    {{ $schedule->title }}

                                </h5>

                                <p class="mb-2">

                                    <i class="fas fa-calendar-alt mr-2"></i>

                                    {{ $schedule->event_date->format('d F Y') }}

                                </p>

                                @if($schedule->event_time)

                                <p class="mb-2">

                                    <i class="fas fa-clock mr-2"></i>

                                    {{ $schedule->event_time }}

                                </p>

                                @endif

                                <p class="mb-2">

                                    <i class="fas fa-map-marker-alt mr-2"></i>

                                    {{ $schedule->location }}

                                </p>

                                @if($schedule->description)

                                <p class="text-muted">

                                    {{ \Illuminate\Support\Str::limit($schedule->description, 120) }}

                                </p>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="text-center">

                <p class="text-muted">

                    Belum ada jadwal pertunjukan yang tersedia.

                </p>

            </div>

        @endif

    </div>

</section>

<section id="berita" class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">

                Berita & Kegiatan

            </h2>

            <p class="text-muted">

                Informasi terbaru mengenai kegiatan
                Kelompok Seni Barongan Putro Setyo Budoyo.

            </p>

        </div>

        <div class="row">

            @forelse($latestNews as $item)

                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="card shadow-sm border-0 h-100">

                        @if($item->thumbnail)

                            <img
                                src="{{ asset('storage/'.$item->thumbnail) }}"
                                class="card-img-top"
                                style="height:220px;object-fit:cover;">

                        @endif

                        <div class="card-body d-flex flex-column">

                            <small class="text-muted">

                                <i class="fas fa-calendar-alt"></i>

                                {{ $item->published_at->format('d F Y') }}

                            </small>

                            <h5 class="mt-2 fw-bold">

                                {{ $item->title }}

                            </h5>

                            <p class="text-muted">

                                {{ \Illuminate\Support\Str::limit(strip_tags($item->content),120) }}

                            </p>

                            <a
                                href="{{ route('frontend.news.show',$item->slug) }}"
                                class="btn btn-warning mt-auto">

                                Baca Selengkapnya

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-info text-center">

                        Belum ada berita yang dipublikasikan.

                    </div>

                </div>

            @endforelse

        </div>

        @if($latestNews->count())

            <div class="text-center mt-4">

                <a
                    href="{{ route('frontend.news.index') }}"
                    class="btn btn-outline-warning">

                    Lihat Semua Berita

                </a>

            </div>

        @endif

    </div>

</section>

{{-- KONTAK --}}

<section
    id="kontak"
    class="section bg-white">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">

                Kontak

            </h2>

            <p class="text-muted">

                Hubungi kami untuk informasi pertunjukan maupun kerja sama.

            </p>

        </div>

        <div class="row">

            <div class="col-lg-6">

                @if($contact?->address)

                    <p>

                        <i class="fas fa-map-marker-alt mr-2"></i>

                        {{ $contact->address }}

                    </p>

                @endif


                @if($contact?->phone)

                    <p>

                        <i class="fab fa-whatsapp mr-2"></i>

                        {{ $contact->phone }}

                    </p>

                @endif


                @if($contact?->email)

                    <p>

                        <i class="fas fa-envelope mr-2"></i>

                        {{ $contact->email }}

                    </p>

                @endif

            </div>


            <div class="col-lg-6">

                @if($contact?->google_maps)

                    {!! $contact->google_maps !!}

                @endif

            </div>

        </div>

    </div>

</section>
{{-- FOOTER --}}

{{-- FOOTER --}}

<footer>

    <div class="container">

        <div class="row gy-4">

            {{-- Informasi Sanggar --}}
            <div class="col-lg-4">

                <h5 class="mb-3">

                    {{ $profile?->name ?? 'Putro Setyo Budoyo' }}

                </h5>

                <p class="mb-0 text-light">

                    Media informasi, promosi, dan pelestarian budaya
                    Kelompok Seni Barongan Putro Setyo Budoyo.

                </p>

            </div>


            {{-- Kontak --}}
            <div class="col-lg-4">

                <h5 class="mb-3">

                    Kontak

                </h5>

                @if($contact?->address)

                    <p class="mb-2">

                        <i class="fas fa-map-marker-alt me-2"></i>

                        {{ $contact->address }}

                    </p>

                @endif


                @if($contact?->phone)

                    <p class="mb-2">

                        <i class="fas fa-phone-alt me-2"></i>

                        {{ $contact->phone }}

                    </p>

                @endif


                @if($contact?->email)

                    <p class="mb-0">

                        <i class="fas fa-envelope me-2"></i>

                        {{ $contact->email }}

                    </p>

                @endif

            </div>


            {{-- Media Sosial --}}
            <div class="col-lg-4 text-lg-end">

                <h5 class="mb-3">

                    Ikuti Kami

                </h5>

                @if($contact?->instagram)

                    <a
                        href="{{ $contact->instagram }}"
                        class="text-white me-3"
                        target="_blank"
                        rel="noopener noreferrer">

                        <i class="fab fa-instagram fa-lg"></i>

                    </a>

                @endif


                @if($contact?->facebook)

                    <a
                        href="{{ $contact->facebook }}"
                        class="text-white me-3"
                        target="_blank"
                        rel="noopener noreferrer">

                        <i class="fab fa-facebook fa-lg"></i>

                    </a>

                @endif


                @if($contact?->youtube)

                    <a
                        href="{{ $contact->youtube }}"
                        class="text-white me-3"
                        target="_blank"
                        rel="noopener noreferrer">

                        <i class="fab fa-youtube fa-lg"></i>

                    </a>

                @endif


                @if($contact?->tiktok)

                    <a
                        href="{{ $contact->tiktok }}"
                        class="text-white"
                        target="_blank"
                        rel="noopener noreferrer">

                        <i class="fab fa-tiktok fa-lg"></i>

                    </a>

                @endif

                <div class="mt-4">

                    @if($contact?->phone)

                        <a
                            href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}"
                            class="btn btn-gold"
                            target="_blank"
                            rel="noopener noreferrer">

                            <i class="fab fa-whatsapp me-2"></i>

                            Hubungi Kami

                        </a>

                    @endif

                </div>

            </div>

        </div>


        <hr class="border-light my-4">


        <div class="text-center">

            <small>

                © {{ date('Y') }}
                {{ $profile?->name ?? 'Putro Setyo Budoyo' }}.

                Seluruh Hak Cipta Dilindungi.

            </small>

        </div>

    </div>

</footer>


@endsection