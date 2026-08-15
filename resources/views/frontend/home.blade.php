@php
use Illuminate\Support\Str;
@endphp

@extends('layouts.frontend')

@section('title', 'Putro Setyo Budoyo')

@push('styles')

<style>

    :root {
        --brown: #3d2817;
        --gold: #c9972e;
        --gold-dark: #a97b20;
        --cream: #faf6ef;
        --text-dark: #2b2620;
        --text-muted: #6b6459;
    }

    body {
        background: var(--cream);
        color: var(--text-dark);
        font-family: 'Poppins', sans-serif;
    }

    h1, h2, h3, h4, h5,
    .font-display {
        font-family: 'Playfair Display', serif;
    }

    a { text-decoration: none; }

    /* NAVBAR */

    .navbar {
        background: #ffffff;
        padding: 14px 0;
    }

    .navbar-brand {
        font-weight: 700;
        color: var(--text-dark) !important;
        display: flex;
        align-items: center;
        font-size: 18px;
    }

    .navbar-brand img,
    .navbar-brand .brand-fallback {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 10px;
    }

    .navbar-brand .brand-fallback {
        background: var(--cream);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gold-dark);
        font-size: 16px;
    }

    .navbar-nav .nav-link {
        color: var(--text-dark);
        font-size: 14.5px;
        font-weight: 500;
        margin: 0 4px;
        padding-bottom: 4px !important;
        border-bottom: 2px solid transparent;
    }

    .navbar-nav .nav-link.active {
        color: var(--gold-dark);
        border-bottom-color: var(--gold);
    }

    .navbar-nav .nav-link:hover {
        color: var(--gold-dark);
    }

    .btn-gold {
        background: var(--gold);
        color: #ffffff;
        border-radius: 30px;
        padding: 10px 26px;
        border: none;
        font-weight: 500;
        font-size: 14px;
        display: inline-block;
    }

    .btn-gold:hover {
        background: var(--gold-dark);
        color: #ffffff;
    }

    .btn-outline-cream {
        border: 1.5px solid rgba(255,255,255,0.7);
        color: #ffffff;
        border-radius: 30px;
        padding: 10px 26px;
        font-weight: 500;
        font-size: 14px;
        display: inline-block;
    }

    .btn-outline-cream:hover {
        background: rgba(255,255,255,0.12);
        color: #ffffff;
    }

    /* HERO */

    .hero {
        position: relative;
        min-height: 640px;
        display: flex;
        align-items: center;
        color: #ffffff;
        background-color: var(--brown);
        background-size: cover;
        background-position: center;
    }

    .hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(20,12,6,0.55) 0%, rgba(20,12,6,0.75) 100%);
    }

    .hero .container {
        position: relative;
        z-index: 2;
    }

    .hero-eyebrow {
        font-size: 14px;
        color: rgba(255,255,255,0.85);
        margin-bottom: 8px;
    }

    .hero h1 {
        font-size: 46px;
        font-weight: 700;
        line-height: 1.25;
        margin-bottom: 18px;
    }

    .hero-title {
        display: block;
        color: var(--gold);
    }

    .hero-description {
        max-width: 600px;
        color: rgba(255,255,255,0.85);
        font-size: 15.5px;
        margin-bottom: 30px;
    }

    .hero-info {
        margin-top: 48px;
        display: flex;
        flex-wrap: wrap;
        gap: 28px;
    }

    .hero-info div {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 13.5px;
    }

    .hero-info i {
        width: 34px;
        height: 34px;
        border: 1px solid rgba(255,255,255,0.4);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
    }

    .hero-info strong {
        display: block;
        font-weight: 600;
        margin-bottom: 2px;
    }

    .hero-info span {
        color: rgba(255,255,255,0.75);
    }

    /* SECTION */

    .section {
        padding: 90px 0;
    }

    .section-eyebrow {
        text-align: center;
        color: var(--gold-dark);
        font-weight: 600;
        font-size: 32px;
        margin-bottom: 8px;
    }

    .section-sub {
        text-align: center;
        color: var(--text-muted);
        font-size: 14.5px;
        max-width: 560px;
        margin: 0 auto 50px;
    }

    .subheading {
        font-weight: 600;
        font-size: 17px;
        color: var(--text-dark);
        margin-bottom: 18px;
    }

    /* ABOUT */

    .about-image {
        width: 100%;
        height: 420px;
        object-fit: cover;
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(61,40,23,0.15);
    }

    /* GALLERY */

    .gallery-photo {
        width: 100%;
        height: 220px;
        object-fit: cover;
        border-radius: 14px;
        box-shadow: 0 8px 20px rgba(61,40,23,0.08);
    }

    .video-card {
        position: relative;
        border-radius: 14px;
        overflow: hidden;
        height: 240px;
        display: block;
        box-shadow: 0 8px 20px rgba(61,40,23,0.1);
    }

    .video-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .video-card::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(0deg, rgba(20,12,6,0.75) 0%, rgba(20,12,6,0.1) 55%);
    }

    .video-card .play-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 56px;
        height: 56px;
        border: 1.5px solid rgba(255,255,255,0.8);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        z-index: 2;
    }

    .video-fallback {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--brown);
    }

    .video-fallback i {
        font-size: 46px;
        color: rgba(255,255,255,0.5);
    }

    .video-card .platform-badge {
        position: absolute;
        top: 14px;
        left: 14px;
        z-index: 2;
        background: rgba(0,0,0,0.55);
        color: #ffffff;
        font-size: 11.5px;
        padding: 4px 12px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .video-card .video-label {
        position: absolute;
        left: 18px;
        bottom: 16px;
        right: 18px;
        color: #ffffff;
        font-weight: 700;
        font-size: 15px;
        z-index: 2;
        line-height: 1.3;
    }

    /* JADWAL */

    .jadwal-row {
        background: #ffffff;
        border-radius: 14px;
        padding: 20px 26px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 14px;
        box-shadow: 0 4px 14px rgba(61,40,23,0.06);
        flex-wrap: wrap;
        gap: 12px;
    }

    .jadwal-row h5 {
        font-weight: 600;
        font-size: 16px;
        margin-bottom: 6px;
        color: var(--text-dark);
    }

    .jadwal-row .meta {
        font-size: 13px;
        color: var(--text-muted);
        display: flex;
        gap: 18px;
        flex-wrap: wrap;
    }

    .btn-detail {
        border: 1.5px solid var(--gold);
        color: var(--gold-dark);
        border-radius: 30px;
        padding: 6px 20px;
        font-size: 13px;
        font-weight: 500;
        white-space: nowrap;
    }

    .btn-detail:hover {
        background: var(--gold);
        color: #ffffff;
    }

    /* BERITA */

    .news-card {
        background: #ffffff;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 6px 20px rgba(61,40,23,0.08);
        height: 100%;
    }

    .news-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .news-card .news-body {
        padding: 22px;
    }

    .news-card .news-date {
        font-size: 12.5px;
        color: var(--text-muted);
    }

    .news-card h5 {
        font-size: 17px;
        font-weight: 600;
        margin: 8px 0 10px;
        color: var(--text-dark);
    }

    .news-card p {
        font-size: 13.5px;
        color: var(--text-muted);
    }

    .news-link {
        color: var(--gold-dark);
        font-weight: 600;
        font-size: 13.5px;
    }

    .news-link:hover {
        color: var(--brown);
    }

    /* KONTAK */

    .contact-icon {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        border: 1.5px solid var(--gold);
        color: var(--gold-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 14px;
    }

    .contact-item {
        display: flex;
        gap: 14px;
        margin-bottom: 20px;
        align-items: flex-start;
    }

    .contact-item strong {
        display: block;
        font-size: 14px;
        margin-bottom: 3px;
        color: var(--text-dark);
    }

    .contact-item span {
        font-size: 13.5px;
        color: var(--text-muted);
    }

    .social-row {
        display: flex;
        gap: 12px;
        margin-top: 26px;
    }

    .social-row a {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        border: 1.5px solid var(--gold);
        color: var(--gold-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }

    .social-row a:hover {
        background: var(--gold);
        color: #ffffff;
    }

    .map-card {
        border-radius: 16px;
        overflow: hidden;
        min-height: 340px;
        position: relative;
        background: var(--brown);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .map-card iframe {
        width: 100%;
        height: 100%;
        min-height: 340px;
        border: 0;
    }

    .map-placeholder {
        background: rgba(255,255,255,0.92);
        border-radius: 14px;
        padding: 26px 34px;
        text-align: center;
        color: var(--text-dark);
    }

    .map-placeholder i {
        font-size: 26px;
        color: var(--gold-dark);
        margin-bottom: 10px;
        display: block;
    }

    .map-placeholder small {
        color: var(--text-muted);
    }

    /* FOOTER */

    footer {
        background: #efece4;
        color: var(--text-dark);
        padding: 60px 0 24px;
    }

    footer h5 {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 16px;
    }

    footer p, footer a {
        color: var(--text-muted);
        font-size: 13.5px;
    }

    footer ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    footer ul li {
        margin-bottom: 10px;
    }

    footer ul li a:hover {
        color: var(--gold-dark);
    }

    footer .footer-social a {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        border: 1px solid #cfc9ba;
        color: var(--text-dark);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-right: 8px;
        font-size: 13px;
    }

    footer hr {
        border-color: #dcd6c8;
        margin: 36px 0 20px;
    }

</style>

@endpush


@section('content')


{{-- NAVBAR --}}

<nav class="navbar navbar-expand-lg shadow-sm sticky-top">

    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">

            @if($profile?->logo)
                <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo">
            @else
                <span class="brand-fallback"><i class="fas fa-mask"></i></span>
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

        <div class="collapse navbar-collapse" id="navbarMain">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link active" href="#beranda">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#tentang">Tentang Kami</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#galeri">Galeri</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#jadwal">Pertunjukan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#berita">Berita</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#kontak">Kontak</a>
                </li>

                @if($contact?->phone)
                    <li class="nav-item ms-lg-3">
                        <a
                            class="btn-gold"
                            href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            Pesan
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
    @if($profile?->cover_image)
        style="background-image: url('{{ asset('storage/' . $profile->cover_image) }}');"
    @elseif($profile?->profile_image)
        style="background-image: url('{{ asset('storage/' . $profile->profile_image) }}');"
    @endif
>

    <div class="container">

        <p class="hero-eyebrow">Selamat Datang di</p>

        <h1>
            Kelompok Seni Barongan
            <span class="hero-title">{{ $profile?->name ?? 'Putro Setyo Budoyo' }}</span>
        </h1>

        <p class="hero-description">
            {{ $profile?->description ?? 'Media Informasi, Promosi, dan Pelestarian Budaya Jawa' }}
        </p>

        <div class="d-flex flex-wrap gap-3">

            <a href="#tentang" class="btn-outline-cream">Tentang Kami</a>

            @if($contact?->phone)
                <a
                    href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}"
                    class="btn-gold"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Hubungi Kami
                </a>
            @endif

        </div>

        @if($contact?->phone || $contact?->email)
            <div class="hero-info">

                @if($contact?->phone)
                    <div>
                        <i class="fas fa-phone"></i>
                        <div>
                            <strong>Telepon / WhatsApp</strong>
                            <span>{{ $contact->phone }}</span>
                        </div>
                    </div>
                @endif

                @if($contact?->email)
                    <div>
                        <i class="fas fa-envelope"></i>
                        <div>
                            <strong>Email</strong>
                            <span>{{ $contact->email }}</span>
                        </div>
                    </div>
                @endif

            </div>
        @endif

    </div>

</section>


{{-- TENTANG KAMI --}}

<section id="tentang" class="section bg-white">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-7">

                <h2 class="mb-4" style="color: var(--gold-dark); font-weight: 700;">Tentang Kami</h2>

                @if($profile?->history)
                    <p class="text-muted mb-4">{!! nl2br(e($profile->history)) !!}</p>
                @endif

                @if($profile?->philosophy)
                    <h5 class="subheading">Filosofi</h5>
                    <p class="text-muted">{!! nl2br(e($profile->philosophy)) !!}</p>
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
                    <div class="about-image d-flex align-items-center justify-content-center bg-light">
                        <div class="text-center text-muted">
                            <i class="fas fa-image fa-3x mb-3"></i>
                            <p>Foto profil belum tersedia</p>
                        </div>
                    </div>
                @endif

            </div>

        </div>

    </div>

</section>


{{-- GALERI (FOTO + VIDEO) --}}

<section id="galeri" class="section" style="background:#f4f0e7;">

    <div class="container">

        <h2 class="section-eyebrow">Galeri</h2>
        <p class="section-sub">Dokumentasi kegiatan dan pertunjukan Kelompok Seni Barongan</p>

        <p class="subheading">Foto</p>

        @if($galleries->count())

            <div class="row mb-5">

                @foreach($galleries as $gallery)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <img
                            src="{{ asset('storage/'.$gallery->image) }}"
                            class="gallery-photo"
                            alt="{{ $gallery->title }}"
                        >
                    </div>
                @endforeach

            </div>

        @else

            <div class="text-center py-4 mb-5">
                <i class="fas fa-images fa-2x text-muted mb-2"></i>
                <p class="text-muted mb-0">Galeri foto masih kosong</p>
            </div>

        @endif

        <p class="subheading">Video</p>

        @if($videos->count())

            <div class="row">

                @foreach($videos as $video)
                    <div class="col-lg-6 mb-4">
                        <a
                            href="{{ $video->youtube_url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="video-card"
                        >
                            @if($video->thumbnail_url)
                                <img
                                    src="{{ $video->thumbnail_url }}"
                                    alt="{{ $video->title }}"
                                >
                            @else
                                <div class="video-fallback">
                                    <i class="{{ $video->platform_icon }}"></i>
                                </div>
                            @endif
                            <span class="platform-badge">
                                <i class="{{ $video->platform_icon }}"></i>
                                {{ $video->platform_label }}
                            </span>
                            <span class="play-btn"><i class="fas fa-play"></i></span>
                            <span class="video-label">{{ $video->title }}</span>
                        </a>
                    </div>
                @endforeach

            </div>

        @else

            <div class="text-center py-4">
                <i class="fab fa-youtube fa-2x text-muted mb-2"></i>
                <p class="text-muted mb-0">Belum ada video</p>
            </div>

        @endif

    </div>

</section>


{{-- JADWAL PERTUNJUKAN --}}

<section id="jadwal" class="section bg-white">

    <div class="container" style="max-width:820px;">

        <h2 class="section-eyebrow">Jadwal Pertunjukan</h2>
        <p class="section-sub">Informasi jadwal pertunjukan Kelompok Seni Barongan Putro Setyo Budoyo</p>

        @if($schedules->count())

            @foreach($schedules as $schedule)
                <div class="jadwal-row">
                    <div>
                        <h5>{{ $schedule->title }}</h5>
                        <div class="meta">
                            <span><i class="far fa-calendar-alt me-1"></i>{{ $schedule->event_date->format('d F Y') }}</span>
                            <span><i class="fas fa-map-marker-alt me-1"></i>{{ $schedule->location }}</span>
                        </div>
                    </div>
                    <a href="#{{ $schedule->id }}" class="btn-detail">Detail</a>
                </div>
            @endforeach

        @else

            <div class="text-center py-4">
                <p class="text-muted mb-0">Belum ada jadwal pertunjukan yang tersedia.</p>
            </div>

        @endif

    </div>

</section>


{{-- BERITA & KEGIATAN --}}

<section id="berita" class="section" style="background:#f4f0e7;">

    <div class="container">

        <h2 class="section-eyebrow">Berita & Kegiatan</h2>
        <p class="section-sub">Informasi terbaru mengenai kegiatan Kelompok Seni Barongan Putro Setyo Budoyo</p>

        <div class="row">

            @forelse($latestNews as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="news-card">

                        @if($item->thumbnail)
                            <img src="{{ asset('storage/'.$item->thumbnail) }}" alt="{{ $item->title }}">
                        @endif

                        <div class="news-body">
                            <span class="news-date">{{ $item->published_at->format('d F Y') }}</span>
                            <h5>{{ $item->title }}</h5>
                            <p>{{ Str::limit(strip_tags($item->content), 110) }}</p>
                            <a href="{{ route('frontend.news.show', $item->slug) }}" class="news-link">
                                Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-light text-center border-0">Belum ada berita yang dipublikasikan.</div>
                </div>
            @endforelse

        </div>

        @if($latestNews->count())
            <div class="text-center mt-3">
                <a href="{{ route('frontend.news.index') }}" class="btn-detail">Lihat Semua Berita</a>
            </div>
        @endif

    </div>

</section>


{{-- KONTAK & LOKASI --}}

<section id="kontak" class="section bg-white">

    <div class="container">

        <h2 class="section-eyebrow">Kontak & Lokasi</h2>
        <p class="section-sub">Hubungi kami untuk informasi pertunjukan maupun kerja sama</p>

        <div class="row g-5 align-items-start">

            <div class="col-lg-6">

                <h5 class="subheading">Hubungi Kami</h5>
                <p class="text-muted mb-4">
                    Untuk informasi lebih lanjut mengenai pertunjukan, kolaborasi, atau sekadar
                    ingin mengenal kami lebih dekat, silakan hubungi kami melalui kontak di bawah ini.
                </p>

                @if($contact?->address)
                    <div class="contact-item">
                        <span class="contact-icon"><i class="fas fa-map-marker-alt"></i></span>
                        <div>
                            <strong>Alamat</strong>
                            <span>{{ $contact->address }}</span>
                        </div>
                    </div>
                @endif

                @if($contact?->phone)
                    <div class="contact-item">
                        <span class="contact-icon"><i class="fas fa-phone"></i></span>
                        <div>
                            <strong>Telepon / WhatsApp</strong>
                            <span>{{ $contact->phone }}</span>
                        </div>
                    </div>
                @endif

                @if($contact?->email)
                    <div class="contact-item">
                        <span class="contact-icon"><i class="fas fa-envelope"></i></span>
                        <div>
                            <strong>Email</strong>
                            <span>{{ $contact->email }}</span>
                        </div>
                    </div>
                @endif

                @if($contact?->instagram || $contact?->facebook || $contact?->youtube || $contact?->tiktok)
                    <p class="subheading mt-4 mb-2" style="font-size:14px;">Ikuti Kami</p>
                    <div class="social-row">

                        @if($contact?->instagram)
                            <a href="{{ $contact->instagram }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
                        @endif

                        @if($contact?->facebook)
                            <a href="{{ $contact->facebook }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a>
                        @endif

                        @if($contact?->youtube)
                            <a href="{{ $contact->youtube }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube"></i></a>
                        @endif

                        @if($contact?->tiktok)
                            <a href="{{ $contact->tiktok }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-tiktok"></i></a>
                        @endif

                    </div>
                @endif

            </div>

            <div class="col-lg-6">

                <div class="map-card">

                    @if($contact?->google_maps)
                        {!! $contact->google_maps !!}
                    @else
                        <div class="map-placeholder">
                            <i class="fas fa-map-location-dot"></i>
                            <strong>Integrasi Google Maps</strong><br>
                            <small>Peta lokasi markas/sanggar</small>
                        </div>
                    @endif

                </div>

            </div>

        </div>

    </div>

</section>


{{-- FOOTER --}}

<footer>

    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-4">
                <h5>{{ $profile?->name ?? 'Putro Setyo Budoyo' }}</h5>
                <p class="mb-0">
                    Media Informasi, Promosi, dan Pelestarian Budaya Jawa melalui
                    seni pertunjukan Barongan yang autentik dan mendunia.
                </p>
            </div>

            <div class="col-lg-4">
                <h5>Tautan Cepat</h5>
                <ul>
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#tentang">Tentang Kami</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </div>

            <div class="col-lg-4">
                <h5>Sosial Media</h5>
                <div class="footer-social mb-3">

                    @if($contact?->instagram)
                        <a href="{{ $contact->instagram }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
                    @endif

                    @if($contact?->facebook)
                        <a href="{{ $contact->facebook }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a>
                    @endif

                    @if($contact?->youtube)
                        <a href="{{ $contact->youtube }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube"></i></a>
                    @endif

                    @if($contact?->tiktok)
                        <a href="{{ $contact->tiktok }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-tiktok"></i></a>
                    @endif

                </div>
            </div>

        </div>

        <hr>

        <div class="text-center">
            <small>© {{ date('Y') }} {{ $profile?->name ?? 'Putro Setyo Budoyo' }}. Hak Cipta Dilindungi.</small>
        </div>

    </div>

</footer>

@endsection