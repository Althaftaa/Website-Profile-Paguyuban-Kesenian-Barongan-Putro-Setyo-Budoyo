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
    .hero-video {
        position: absolute;
        inset: 0;

        width: 100%;
        height: 100%;

        object-fit: cover;

        z-index: 0;
    }
.hero::before {
    content: "";
    position: absolute;
    inset: 0;

    background: linear-gradient(
        180deg,
        rgba(20,12,6,0.45) 0%,
        rgba(20,12,6,0.72) 100%
    );

    z-index: 1;
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

    .gallery-card {
        background: #ffffff;
        border-radius: 16px;
        overflow: hidden;
        height: 100%;
        box-shadow: 0 8px 22px rgba(61,40,23,0.08);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 14px 30px rgba(61,40,23,0.14);
    }

    .gallery-card-image {
        width: 100%;
        height: 230px;
        object-fit: cover;
        display: block;
    }

    .gallery-card-body {
        padding: 20px;
    }

    .gallery-card-title {
        font-family: 'Playfair Display', serif;
        font-size: 19px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 8px;
    }

    .gallery-card-date {
        display: flex;
        align-items: center;
        gap: 6px;
        color: var(--gold-dark);
        font-size: 12.5px;
        margin-bottom: 12px;
    }

    .gallery-card-date i {
        font-size: 12px;
    }

    .gallery-card-description {
        color: var(--text-muted);
        font-size: 13.5px;
        line-height: 1.7;
        margin-bottom: 0;
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
        gap: 35px;
        margin-top: 26px;
        flex-wrap: wrap;
    }

    .social-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        min-width: 110px;
        color: var(--text-dark);
    }

    .social-icon {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        border: 1.5px solid var(--gold);
        color: var(--gold-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin-bottom: 12px;
        transition: all 0.25s ease;
    }

    .social-item:hover .social-icon {
        background: var(--gold);
        color: #ffffff;
        transform: translateY(-3px);
    }

    .social-platform {
        font-size: 14px;
        font-weight: 600;
        color: var(--gold-dark);
        margin-bottom: 4px;
    }

    .social-username {
        font-size: 12px;
        color: var(--text-muted);
        white-space: nowrap;
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
    /* =========================================
    PAKET PEMENTASAN
    ========================================= */

    .package-section {
        background: #f4f0e7;
    }

    .package-card {
        position: relative;
        background: #ffffff;
        border-radius: 20px;
        padding: 32px;
        height: 100%;
        border: 1px solid #eee8dc;
        box-shadow: 0 10px 30px rgba(61, 40, 23, 0.08);
        transition: all 0.3s ease;
    }

    .package-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 40px rgba(61, 40, 23, 0.13);
    }

    .package-card.premium {
        border: 2px solid var(--gold);
    }

    .package-badge {
        position: absolute;
        top: -13px;
        right: 25px;
        background: var(--gold);
        color: #ffffff;
        padding: 6px 16px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    .package-name {
        font-family: 'Playfair Display', serif;
        font-size: 25px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 8px;
    }

    .package-description {
        color: var(--text-muted);
        font-size: 13px;
        margin-bottom: 24px;
    }

    .package-price-label {
        color: var(--text-muted);
        font-size: 12px;
        margin-bottom: 3px;
    }

    .package-price {
        color: var(--gold-dark);
        font-family: 'Playfair Display', serif;
        font-size: 30px;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .package-price small {
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        font-weight: 400;
        color: var(--text-muted);
    }

    .package-facilities {
        list-style: none;
        padding: 0;
        margin: 0 0 25px;
    }

    .package-facilities li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 9px 0;
        border-bottom: 1px solid #f0ece4;
        font-size: 13.5px;
        color: var(--text-muted);
    }

    .package-facilities li:last-child {
        border-bottom: none;
    }

    .package-facilities .check {
        color: var(--gold-dark);
        font-size: 13px;
        margin-top: 2px;
    }

    .package-facilities .cross {
        color: #aaa;
        font-size: 13px;
        margin-top: 2px;
    }

    .package-select-btn {
        width: 100%;
        border: 1.5px solid var(--gold);
        background: transparent;
        color: var(--gold-dark);
        border-radius: 30px;
        padding: 11px 20px;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.25s ease;
    }

    .package-select-btn:hover,
    .package-select-btn.active {
        background: var(--gold);
        color: #ffffff;
    }


    /* CALCULATOR */

    .package-calculator {
        background: #ffffff;
        border-radius: 20px;
        padding: 32px;
        margin-top: 45px;
        box-shadow: 0 10px 30px rgba(61, 40, 23, 0.08);
    }

    .calculator-title {
        font-family: 'Playfair Display', serif;
        font-size: 22px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 5px;
    }

    .calculator-subtitle {
        color: var(--text-muted);
        font-size: 13px;
        margin-bottom: 25px;
    }

    .package-option {
        border: 1.5px solid #e5dfd3;
        border-radius: 14px;
        padding: 16px 18px;
        margin-bottom: 12px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .package-option:hover {
        border-color: var(--gold);
    }

    .package-option.selected {
        border-color: var(--gold);
        background: #fcf8ef;
    }

    .package-option input {
        accent-color: var(--gold);
        margin-right: 8px;
    }

    .package-option-title {
        font-weight: 600;
        font-size: 14px;
        color: var(--text-dark);
    }

    .package-option-price {
        float: right;
        color: var(--gold-dark);
        font-weight: 600;
        font-size: 14px;
    }

    .addon-option {
        display: flex;
        align-items: center;
        gap: 12px;
        border: 1.5px solid #e5dfd3;
        border-radius: 14px;
        padding: 15px 18px;
        margin-top: 12px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .addon-option:hover {
        border-color: var(--gold);
    }

    .addon-option.disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .addon-option input {
        width: 17px;
        height: 17px;
        accent-color: var(--gold);
    }

    .addon-text strong {
        display: block;
        font-size: 13.5px;
        color: var(--text-dark);
    }

    .addon-text span {
        font-size: 12px;
        color: var(--text-muted);
    }

    .order-summary {
        background: #f8f4ec;
        border-radius: 16px;
        padding: 22px;
        margin-top: 25px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        font-size: 13px;
        color: var(--text-muted);
        margin-bottom: 10px;
    }

    .summary-row.total {
        border-top: 1px solid #ddd5c7;
        padding-top: 15px;
        margin-top: 14px;
        margin-bottom: 0;
        font-size: 17px;
        font-weight: 700;
        color: var(--text-dark);
    }

    .summary-row.total span:last-child {
        color: var(--gold-dark);
    }

    .package-order-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        background: var(--gold);
        color: #ffffff;
        border: none;
        border-radius: 30px;
        padding: 12px 20px;
        margin-top: 18px;
        font-size: 13.5px;
        font-weight: 600;
        transition: all 0.25s ease;
    }

    .package-order-btn:hover {
        background: var(--gold-dark);
        color: #ffffff;
    }

    .package-note {
        text-align: center;
        color: var(--text-muted);
        font-size: 11.5px;
        margin-top: 18px;
        margin-bottom: 0;
    }

    @media (max-width: 767px) {

        .package-card {
            padding: 25px;
        }

        .package-calculator {
            padding: 22px;
        }

        .package-price {
            font-size: 26px;
        }

        .package-option-price {
            float: none;
            display: block;
            margin-top: 4px;
        }
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
                    <a class="nav-link" href="#paket">Paket</a>
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

    @if(($profile?->hero_media_type ?? 'image') !== 'video')

        @if($profile?->cover_image)

            style="background-image: url('{{ asset('storage/' . $profile->cover_image) }}');"

        @elseif($profile?->profile_image)

            style="background-image: url('{{ asset('storage/' . $profile->profile_image) }}');"

        @endif

    @endif
>

    {{-- VIDEO HERO --}}
    @if(
        ($profile?->hero_media_type ?? 'image') === 'video'
        && $profile?->hero_video
    )

        <video
            class="hero-video"
            autoplay
            muted
            loop
            playsinline
            preload="metadata"

            @if($profile?->cover_image)
                poster="{{ asset('storage/' . $profile->cover_image) }}"
            @endif
        >

            <source
                src="{{ asset('storage/' . $profile->hero_video) }}"
                type="video/mp4"
            >

        </video>

    @endif

    <div class="container">

        <p class="hero-eyebrow">Selamat Datang di</p>

        <h1>
            Paguyuban Seni Barongan
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

                        <div class="gallery-card">

                            {{-- FOTO --}}

                            <img
                                src="{{ asset('storage/'.$gallery->image) }}"
                                class="gallery-card-image"
                                alt="{{ $gallery->title }}"
                            >

                            {{-- INFORMASI FOTO --}}

                            <div class="gallery-card-body">

                                {{-- JUDUL --}}

                                <h5 class="gallery-card-title">
                                    {{ $gallery->title }}
                                </h5>


                                {{-- TANGGAL --}}

                                @if($gallery->activity_date)

                                    <div class="gallery-card-date">

                                        <i class="far fa-calendar-alt"></i>

                                        <span>
                                            {{ $gallery->activity_date->format('d F Y') }}
                                        </span>

                                    </div>

                                @endif


                                {{-- DESKRIPSI --}}

                                @if($gallery->description)

                                    <p class="gallery-card-description">

                                        {{ Str::limit($gallery->description, 120) }}

                                    </p>

                                @else

                                    <p class="gallery-card-description">

                                        Dokumentasi kegiatan dan pertunjukan
                                        Kelompok Seni Barongan Putro Setyo Budoyo.

                                    </p>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="text-center py-4 mb-5">

                <i class="fas fa-images fa-2x text-muted mb-2"></i>

                <p class="text-muted mb-0">
                    Galeri foto masih kosong
                </p>

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

{{-- PAKET PEMENTASAN --}}

<section id="paket" class="section package-section">

    <div class="container">

        <h2 class="section-eyebrow">
            Paket Pementasan
        </h2>

        <p class="section-sub">
            Pilih paket pementasan Barongan Putro Setyo Budoyo
            sesuai kebutuhan acara Anda.
        </p>


        {{-- PERBANDINGAN PAKET --}}

        <div class="row g-4">

            {{-- CLASSIC --}}

            <div class="col-lg-6">

                <div class="package-card">

                    <h3 class="package-name">
                        Classic
                    </h3>

                    <p class="package-description">
                        Pilihan paket pementasan dengan fasilitas
                        utama untuk memeriahkan acara Anda.
                    </p>

                    <div class="package-price-label">
                        Mulai dari
                    </div>

                    <div class="package-price">
                        Rp7.000.000
                        <small>/ pementasan</small>
                    </div>

                    <ul class="package-facilities">

                        <li>
                            <i class="fas fa-check check"></i>
                            <span>Honor pemain dan kru</span>
                        </li>

                        <li>
                            <i class="fas fa-check check"></i>
                            <span>Transportasi</span>
                        </li>

                        <li>
                            <i class="fas fa-check check"></i>
                            <span>Konsumsi</span>
                        </li>

                        <li>
                            <i class="fas fa-check check"></i>
                            <span>Sewa sound system</span>
                        </li>

                        <li>
                            <i class="fas fa-times cross"></i>
                            <span>Bintang tamu belum termasuk</span>
                        </li>

                    </ul>

                    <button
                        type="button"
                        class="package-select-btn"
                        onclick="selectPackage('classic')"
                    >
                        Pilih Paket Classic
                    </button>

                </div>

            </div>


            {{-- PREMIUM --}}

            <div class="col-lg-6">

                <div class="package-card premium">

                    <span class="package-badge">
                        REKOMENDASI
                    </span>

                    <h3 class="package-name">
                        Premium
                    </h3>

                    <p class="package-description">
                        Paket lebih lengkap untuk memberikan pengalaman
                        pementasan yang lebih maksimal.
                    </p>

                    <div class="package-price-label">
                        Mulai dari
                    </div>

                    <div class="package-price">
                        Rp9.000.000
                        <small>/ pementasan</small>
                    </div>

                    <ul class="package-facilities">

                        <li>
                            <i class="fas fa-check check"></i>
                            <span>Honor pemain dan kru</span>
                        </li>

                        <li>
                            <i class="fas fa-check check"></i>
                            <span>Transportasi</span>
                        </li>

                        <li>
                            <i class="fas fa-check check"></i>
                            <span>Konsumsi</span>
                        </li>

                        <li>
                            <i class="fas fa-check check"></i>
                            <span>Sewa sound system</span>
                        </li>

                        <li>
                            <i class="fas fa-plus check"></i>
                            <span>Bisa menambahkan bintang tamu</span>
                        </li>

                    </ul>

                    <button
                        type="button"
                        class="package-select-btn"
                        onclick="selectPackage('premium')"
                    >
                        Pilih Paket Premium
                    </button>

                </div>

            </div>

        </div>


        {{-- KALKULATOR PESANAN --}}

        <div class="package-calculator" id="paket-pementasan">

            <h3 class="calculator-title">
                Tentukan Paket Pementasan
            </h3>

            <p class="calculator-subtitle">
                Pilih paket dan tambahan bintang tamu untuk melihat
                estimasi total harga secara langsung.
            </p>


            <div class="row g-4">

                <div class="col-lg-6">

                    <h6 class="subheading mb-3">
                        Pilih Paket
                    </h6>


                    {{-- CLASSIC --}}

                    <label
                        class="package-option"
                        id="option-classic"
                    >

                        <input
                            type="radio"
                            name="selected_package"
                            value="classic"
                            onchange="updatePackageCalculator()"
                            checked
                        >

                        <span class="package-option-title">
                            Classic
                        </span>
                    </label>


                    {{-- PREMIUM --}}

                    <label
                        class="package-option"
                        id="option-premium"
                    >

                        <input
                            type="radio"
                            name="selected_package"
                            value="premium"
                            onchange="updatePackageCalculator()"
                        >

                        <span class="package-option-title">
                            Premium
                        </span>
                    </label>


                    <h6 class="subheading mt-4 mb-2">
                        Tambahan
                    </h6>


                    {{-- ADD ON BINTANG TAMU --}}

                    <label
                        class="addon-option"
                        id="addon-star"
                    >

                        <input
                            type="checkbox"
                            id="starAddon"
                            onchange="updatePackageCalculator()"
                        >

                        <span class="addon-text">

                            <strong>
                                Tambahkan Bintang Tamu
                            </strong>

                            <span>
                                Khusus paket Premium · +Rp2.500.000
                            </span>

                        </span>

                    </label>

                </div>


                {{-- RINGKASAN --}}

                <div class="col-lg-6">

                    <h6 class="subheading mb-3">
                        Ringkasan Pesanan
                    </h6>

                    <div class="order-summary">

                        <div class="summary-row">

                            <span>
                                Paket Terpilih
                            </span>

                            <strong id="summaryPackage">
                                Classic
                            </strong>

                        </div>


                        <div class="summary-row">

                            <span>
                                Harga Paket
                            </span>

                            <span id="summaryPackagePrice">
                                Rp7.000.000
                            </span>

                        </div>


                        <div class="summary-row">

                            <span>
                                Bintang Tamu
                            </span>

                            <span id="summaryAddon">
                                Rp0
                            </span>

                        </div>


                        <div class="summary-row total">

                            <span>
                                TOTAL
                            </span>

                            <span id="summaryTotal">
                                Rp7.000.000
                            </span>

                        </div>


                        @if($contact?->phone)

                            <a
                                href="#"
                                id="packageWhatsappButton"
                                class="package-order-btn"
                                target="_blank"
                                rel="noopener noreferrer"
                            >

                                <i class="fab fa-whatsapp"></i>

                                Pesan Paket Ini

                            </a>

                        @endif

                    </div>

                    <p class="package-note">
                        Harga dapat berbeda untuk lokasi luar kota
                        atau permintaan khusus.
                    </p>

                </div>

            </div>

        </div>

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

                    <p class="subheading mt-4 mb-3" style="font-size:18px;">
                        Ikuti Kami
                    </p>

                    <div class="social-row">

                        {{-- INSTAGRAM --}}
                        @if($contact?->instagram)
                            <a
                                href="{{ $contact->instagram }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="social-item"
                            >
                                <span class="social-icon">
                                    <i class="fab fa-instagram"></i>
                                </span>

                                <span class="social-platform">
                                    Instagram
                                </span>

                                <span class="social-username">
                                    @putrosetyobudoyo
                                </span>
                            </a>
                        @endif


                        {{-- YOUTUBE --}}
                        @if($contact?->youtube)
                            <a
                                href="{{ $contact->youtube }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="social-item"
                            >
                                <span class="social-icon">
                                    <i class="fab fa-youtube"></i>
                                </span>

                                <span class="social-platform">
                                    YouTube
                                </span>

                                <span class="social-username">
                                    Putro Setyo Budoyo
                                </span>
                            </a>
                        @endif


                        {{-- TIKTOK --}}
                        @if($contact?->tiktok)
                            <a
                                href="{{ $contact->tiktok }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="social-item"
                            >
                                <span class="social-icon">
                                    <i class="fab fa-tiktok"></i>
                                </span>

                                <span class="social-platform">
                                    TikTok
                                </span>

                                <span class="social-username">
                                    @putrosetyobudoyo
                                </span>
                            </a>
                        @endif


                        {{-- FACEBOOK --}}
                        @if($contact?->facebook)
                            <a
                                href="{{ $contact->facebook }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="social-item"
                            >
                                <span class="social-icon">
                                    <i class="fab fa-facebook-f"></i>
                                </span>

                                <span class="social-platform">
                                    Facebook
                                </span>

                                <span class="social-username">
                                    Putro Setyo Budoyo
                                </span>
                            </a>
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

@push('scripts')

<script>

    const packagePrices = {
        classic: 7000000,
        premium: 9000000
    };

    const starAddonPrice = 2500000;


    function formatRupiah(number) {

        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(number);

    }


    function selectPackage(packageName) {

        const radio = document.querySelector(
            'input[name="selected_package"][value="' +
            packageName +
            '"]'
        );

        if (radio) {

            radio.checked = true;

            updatePackageCalculator();

            document
                .getElementById('paket-pementasan')
                .scrollIntoView({
                    behavior: 'smooth'
                });

        }

    }


    function updatePackageCalculator() {

        const selectedPackage =
            document.querySelector(
                'input[name="selected_package"]:checked'
            ).value;


        const packagePrice =
            packagePrices[selectedPackage];


        const starAddon =
            document.getElementById('starAddon');


        /*
         * Bintang tamu hanya tersedia
         * untuk paket Premium.
         */

        if (selectedPackage === 'classic') {

            starAddon.checked = false;

            starAddon.disabled = true;

            document
                .getElementById('addon-star')
                .classList.add('disabled');

        } else {

            starAddon.disabled = false;

            document
                .getElementById('addon-star')
                .classList.remove('disabled');

        }


        const addonPrice =
            (
                selectedPackage === 'premium'
                && starAddon.checked
            )
                ? starAddonPrice
                : 0;


        const total =
            packagePrice + addonPrice;


        /*
         * Update ringkasan
         */

        document.getElementById(
            'summaryPackage'
        ).textContent =
            selectedPackage === 'premium'
                ? 'Premium'
                : 'Classic';


        document.getElementById(
            'summaryPackagePrice'
        ).textContent =
            formatRupiah(packagePrice);


        document.getElementById(
            'summaryAddon'
        ).textContent =
            formatRupiah(addonPrice);


        document.getElementById(
            'summaryTotal'
        ).textContent =
            formatRupiah(total);


        /*
         * Update tombol WhatsApp
         */

        const whatsappButton =
            document.getElementById(
                'packageWhatsappButton'
            );


        if (whatsappButton) {

            const phone =
                "{{ preg_replace('/[^0-9]/', '', $contact?->phone ?? '') }}";


            const packageLabel =
                selectedPackage === 'premium'
                    ? 'Premium'
                    : 'Classic';


            const addonLabel =
                addonPrice > 0
                    ? 'Ya (+Rp2.500.000)'
                    : 'Tidak';


            const message =
                "Halo Putro Setyo Budoyo,%0A%0A" +
                "Saya tertarik untuk memesan paket pementasan.%0A%0A" +
                "Paket: " + packageLabel + "%0A" +
                "Harga Paket: " +
                formatRupiah(packagePrice) + "%0A" +
                "Bintang Tamu: " + addonLabel + "%0A" +
                "Total Estimasi: " +
                formatRupiah(total) +
                "%0A%0A" +
                "Mohon informasi lebih lanjut mengenai jadwal dan pemesanan.";


            whatsappButton.href =
                "https://wa.me/" +
                phone +
                "?text=" +
                message;

        }


        /*
         * Highlight pilihan paket
         */

        document
            .getElementById('option-classic')
            .classList.toggle(
                'selected',
                selectedPackage === 'classic'
            );


        document
            .getElementById('option-premium')
            .classList.toggle(
                'selected',
                selectedPackage === 'premium'
            );

    }

    /*
     * Jalankan ketika halaman pertama kali dibuka
     */

    document.addEventListener(
        'DOMContentLoaded',
        function () {

            updatePackageCalculator();

        }
    );

</script>

@endpush

@endsection