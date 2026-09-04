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

    .about-section {
        position: relative;
        overflow: hidden;
        background: #ffffff;
    }

    .about-section::before {
        content: "";
        position: absolute;
        width: 280px;
        height: 280px;
        border-radius: 50%;
        background: rgba(201,151,46,0.06);
        top: -120px;
        right: -100px;
    }

    .about-wrapper {
        position: relative;
        z-index: 1;
    }

    .about-image-wrapper {
        position: relative;
        padding-right: 25px;
        padding-bottom: 25px;
    }

    .about-image {
        width: 100%;
        height: 470px;
        object-fit: cover;
        border-radius: 20px;
        display: block;
        box-shadow: 0 20px 45px rgba(61,40,23,0.15);
    }

    .about-image-wrapper::after {
        content: "";
        position: absolute;
        right: 0;
        bottom: 0;
        width: 75%;
        height: 75%;
        border: 2px solid var(--gold);
        border-radius: 20px;
        z-index: -1;
    }

    .about-content {
        padding-left: 15px;
    }

    .about-eyebrow {
        display: inline-block;
        color: var(--gold-dark);
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .about-title {
        font-family: 'Playfair Display', serif;
        font-size: 38px;
        line-height: 1.2;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 20px;
    }

    .about-title span {
        color: var(--gold-dark);
    }

    .about-text {
        color: var(--text-muted);
        font-size: 14px;
        line-height: 1.9;
        margin-bottom: 25px;
    }

    .about-philosophy {
        border-left: 3px solid var(--gold);
        padding: 5px 0 5px 20px;
        margin-top: 28px;
    }

    .about-philosophy h5 {
        font-family: 'Playfair Display', serif;
        font-size: 20px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 10px;
    }

    .about-philosophy p {
        color: var(--text-muted);
        font-size: 13.5px;
        line-height: 1.8;
        margin-bottom: 0;
    }

    .about-values {
        display: flex;
        gap: 14px;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    .about-value {
        flex: 1;
        min-width: 130px;
        padding: 16px;
        background: #faf7f0;
        border-radius: 12px;
        border: 1px solid #eee7da;
    }

    .about-value i {
        color: var(--gold-dark);
        font-size: 20px;
        margin-bottom: 10px;
    }

    .about-value strong {
        display: block;
        color: var(--text-dark);
        font-size: 13px;
        margin-bottom: 4px;
    }

    .about-value span {
        color: var(--text-muted);
        font-size: 11.5px;
        line-height: 1.5;
    }

    @media (max-width: 991px) {

        .about-image {
            height: 400px;
        }

        .about-content {
            padding-left: 0;
        }

    }

    @media (max-width: 767px) {

        .about-image-wrapper {
            padding-right: 12px;
            padding-bottom: 12px;
        }

        .about-image {
            height: 360px;
            border-radius: 16px;
        }

        .about-image-wrapper::after {
            border-radius: 16px;
        }

        .about-title {
            font-size: 31px;
        }

        .about-values {
            flex-direction: column;
        }

    }

    /* GALLERY */

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-auto-rows: 220px;
        gap: 16px;
        margin-bottom: 60px;
    }

    .gallery-item {
        min-width: 0;
    }

    .gallery-item.gallery-featured {
        grid-column: span 2;
        grid-row: span 2;
    }

    .gallery-photo {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
        border-radius: 18px;
        background: #1d1712;
        box-shadow: 0 10px 30px rgba(50, 35, 20, 0.10);
    }

    .gallery-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.6s ease;
    }

    .gallery-photo:hover img {
        transform: scale(1.07);
    }


    /* OVERLAY */

    .gallery-overlay {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;

        padding: 24px;

        background:
            linear-gradient(
                180deg,
                rgba(20, 12, 6, 0) 35%,
                rgba(20, 12, 6, 0.82) 100%
            );

        color: #fff;
        opacity: 0;
        transition: opacity 0.35s ease;
    }

    .gallery-photo:hover .gallery-overlay {
        opacity: 1;
    }


    .gallery-overlay-content {
        max-width: calc(100% - 55px);
        transform: translateY(15px);
        transition: transform 0.35s ease;
    }

    .gallery-photo:hover .gallery-overlay-content {
        transform: translateY(0);
    }


    /* LABEL */

    .gallery-category {
        display: inline-block;

        padding: 5px 10px;

        margin-bottom: 8px;

        border: 1px solid rgba(255,255,255,0.35);
        border-radius: 30px;

        font-size: 10px;
        font-weight: 600;

        letter-spacing: 1px;
        text-transform: uppercase;

        color: #fff;

        background: rgba(255,255,255,0.10);
        backdrop-filter: blur(5px);
    }


    /* JUDUL */

    .gallery-overlay h3 {
        margin: 0 0 7px;

        color: #fff;

        font-family: 'Playfair Display', serif;

        font-size: 22px;
        line-height: 1.25;

        font-weight: 700;
    }


    /* TANGGAL */

    .gallery-date {
        display: flex;
        align-items: center;
        gap: 7px;

        margin-bottom: 7px;

        color: rgba(255,255,255,0.85);

        font-size: 12px;
    }

    .gallery-date i {
        color: var(--gold);
    }


    /* DESKRIPSI */

    .gallery-overlay p {
        margin: 0;

        color: rgba(255,255,255,0.78);

        font-size: 12px;
        line-height: 1.6;
    }

    /* =========================================
    GALERI KOSONG
    ========================================= */

    .gallery-empty {
        padding: 70px 20px;

        text-align: center;

        border: 1px dashed #d8cfbf;
        border-radius: 18px;

        background: rgba(255,255,255,0.45);
    }

    .gallery-empty-icon {
        width: 65px;
        height: 65px;

        margin: 0 auto 18px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #eee7da;

        color: var(--gold-dark);

        font-size: 25px;
    }

    .gallery-empty h4 {
        margin-bottom: 8px;

        font-family: 'Playfair Display', serif;

        color: var(--text-dark);

        font-size: 21px;
    }

    .gallery-empty p {
        max-width: 420px;

        margin: 0 auto;

        color: var(--text-muted);

        font-size: 13px;
        line-height: 1.7;
    }


    /* =========================================
    TABLET
    ========================================= */

    @media (max-width: 991px) {

        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
            grid-auto-rows: 230px;
        }

        .gallery-item.gallery-featured {
            grid-column: span 2;
            grid-row: span 2;
        }

    }


    /* =========================================
    MOBILE
    ========================================= */

    @media (max-width: 767px) {

        .gallery-grid {
            grid-template-columns: 1fr;
            grid-auto-rows: 260px;
            gap: 12px;
        }

        .gallery-item.gallery-featured {
            grid-column: span 1;
            grid-row: span 1;
        }

        .gallery-overlay {
            opacity: 1;

            padding: 18px;

            background:
                linear-gradient(
                    180deg,
                    rgba(20, 12, 6, 0) 25%,
                    rgba(20, 12, 6, 0.85) 100%
                );
        }

        .gallery-overlay-content {
            transform: translateY(0);
        }

    }

        /* =========================================
        LIGHTBOX
        ========================================= */

        .gallery-lightbox {
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 10, 6, 0.94);

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 40px;

            opacity: 0;
            visibility: hidden;
            pointer-events: none;

            z-index: 99999;

            transition:
                opacity 0.25s ease,
                visibility 0.25s ease;
        }


        .gallery-lightbox.active {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }


        /* KONTEN FOTO */

        .gallery-lightbox-content {
            position: relative;

            max-width: 1100px;
            max-height: 90vh;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }


        /* FOTO */

        .gallery-lightbox-content img {
            display: block;

            max-width: 90vw;
            max-height: 78vh;

            width: auto;
            height: auto;

            object-fit: contain;

            border-radius: 10px;

            box-shadow:
                0 25px 70px rgba(0, 0, 0, 0.45);
        }


        /* JUDUL */

        .gallery-lightbox-title {
            margin-top: 18px;

            color: #ffffff;

            font-family: 'Playfair Display', serif;

            font-size: 18px;
            font-weight: 600;

            text-align: center;

            max-width: 800px;
        }


        /* TOMBOL CLOSE */

        .gallery-lightbox-close {
            position: absolute;

            top: 25px;
            right: 30px;

            width: 44px;
            height: 44px;

            border: 1px solid rgba(255,255,255,0.5);

            border-radius: 50%;

            background: rgba(0,0,0,0.35);

            color: #ffffff;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 18px;

            cursor: pointer;

            z-index: 100000;

            transition:
                background 0.2s ease,
                transform 0.2s ease;
        }


        .gallery-lightbox-close:hover {
            background: var(--gold);

            transform: rotate(90deg);
        }


        /* ICON EXPAND */

        .gallery-view-icon {
            position: absolute;

            right: 20px;
            bottom: 20px;

            width: 46px;
            height: 46px;

            border-radius: 50%;

            border: 1px solid rgba(255,255,255,0.7);

            background: rgba(20,12,6,0.45);

            color: #ffffff;

            display: flex;
            align-items: center;
            justify-content: center;

            cursor: pointer;

            z-index: 5;

            transition:
                background 0.2s ease,
                transform 0.2s ease;
        }


        .gallery-view-icon:hover {
            background: var(--gold);

            transform: scale(1.08);
        }


        /* MOBILE */

        @media (max-width: 767px) {

            .gallery-lightbox {
                padding: 20px;
            }

            .gallery-lightbox-content img {
                max-width: 94vw;
                max-height: 75vh;
                border-radius: 8px;
            }

            .gallery-lightbox-title {
                font-size: 16px;
                padding: 0 15px;
            }

            .gallery-lightbox-close {
                top: 15px;
                right: 15px;

                width: 40px;
                height: 40px;
            }

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
        .hero {
            min-height: 620px;
            background-position: center;
        }

        .hero-video {
            object-position: center center;
        }
    }
    /* ==== PAKET PEMENTASAN - REDESIGN ==== */
    .package-section {
        position: relative;
        overflow: hidden;
    }

    .package-section::before {
        content: "";
        position: absolute;
        width: 320px;
        height: 320px;
        border-radius: 50%;
        background: rgba(201,151,46,0.07);
        top: -150px;
        left: -110px;
    }

    .package-section::after {
        content: "";
        position: absolute;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        border: 2px solid rgba(201,151,46,0.15);
        bottom: -70px;
        right: -50px;
    }

    .package-header {
        position: relative;
        z-index: 1;
        max-width: 620px;
        margin: 0 auto 55px;
        text-align: center;
    }

    .package-eyebrow {
        display: inline-block;
        color: var(--gold-dark);
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .package-header h2 {
        font-family: 'Playfair Display', serif;
        font-size: 36px;
        font-weight: 700;
        line-height: 1.25;
        color: var(--text-dark);
        margin-bottom: 14px;
    }

    .package-header h2 span {
        color: var(--gold-dark);
    }

    .package-header p {
        color: var(--text-muted);
        font-size: 14.5px;
        margin: 0;
    }

    .package-grid {
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }

    @media (max-width: 991px) {
        .package-grid { grid-template-columns: 1fr; }
    }

    .ticket-card {
        position: relative;
        background: #ffffff;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 14px 34px rgba(61,40,23,0.10);
        transition: transform .35s ease, box-shadow .35s ease;
    }

    .ticket-card:hover {
        transform: translateY(-8px) rotate(-0.4deg);
        box-shadow: 0 24px 50px rgba(61,40,23,0.16);
    }

    .ticket-card.premium {
        transform: translateY(-14px);
        border: 2px solid var(--gold);
    }

    .ticket-card.premium:hover {
        transform: translateY(-20px) rotate(0.4deg);
    }

    @media (max-width: 991px) {
        .ticket-card.premium { transform: none; }
        .ticket-card.premium:hover { transform: translateY(-8px); }
    }

    .ticket-ribbon {
        position: absolute;
        top: 16px;
        right: -34px;
        background: var(--gold);
        color: #ffffff;
        font-size: 10.5px;
        font-weight: 700;
        letter-spacing: .5px;
        padding: 5px 40px;
        transform: rotate(40deg);
        box-shadow: 0 3px 8px rgba(0,0,0,0.15);
    }

    .ticket-top {
        padding: 30px 30px 24px;
        display: flex;
        gap: 16px;
        align-items: flex-start;
    }

    .ticket-icon {
        flex-shrink: 0;
        width: 54px;
        height: 54px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #faf7f0;
        border: 1.5px solid var(--gold);
        color: var(--gold-dark);
        font-size: 20px;
    }

    .ticket-card.premium .ticket-icon {
        background: var(--gold);
        color: #ffffff;
    }

    .ticket-name {
        font-family: 'Playfair Display', serif;
        font-size: 23px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 4px;
    }

    .ticket-desc {
        color: var(--text-muted);
        font-size: 12.5px;
        line-height: 1.6;
        margin: 0;
    }

    .ticket-divider {
        border-top: 2px dashed #e6ddc9;
        margin: 0 30px;
    }

    .ticket-body {
        padding: 24px 30px 30px;
    }

    .ticket-price-label {
        display: block;
        color: var(--text-muted);
        font-size: 11.5px;
        margin-bottom: 2px;
    }

    .ticket-price {
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        font-weight: 700;
        color: var(--gold-dark);
        margin-bottom: 20px;
    }

    .ticket-price small {
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        font-weight: 400;
        color: var(--text-muted);
    }

    .ticket-facilities {
        list-style: none;
        padding: 0;
        margin: 0 0 24px;
    }

    .ticket-facilities li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 8px 0;
        font-size: 13.5px;
        color: var(--text-muted);
    }

    .ticket-facilities .check { color: var(--gold-dark); font-size: 13px; margin-top: 2px; }
    .ticket-facilities .cross { color: #bbb; font-size: 13px; margin-top: 2px; }

    .ticket-btn {
        width: 100%;
        border: 1.5px solid var(--gold);
        background: transparent;
        color: var(--gold-dark);
        border-radius: 30px;
        padding: 11px 20px;
        font-size: 13px;
        font-weight: 600;
        transition: all .25s ease;
    }

    .ticket-btn:hover {
        background: var(--gold);
        color: #ffffff;
    }

    /* Kalkulator */
    .package-calculator {
        position: relative;
        z-index: 1;
        border-radius: 26px;
    }

    .package-option {
        border-radius: 16px;
        transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
    }

    .package-option:hover {
        transform: translateY(-2px);
    }

    .package-option.selected {
        box-shadow: 0 8px 18px rgba(201,151,46,0.14);
    }

    .order-summary {
        border-radius: 18px;
    }

    /* ==== JADWAL PERTUNJUKAN - REDESIGN ==== */
    #jadwal.section {
        position: relative;
        overflow: hidden;
    }

    #jadwal .section-header-wrap {
        max-width: 620px;
        margin: 0 auto 55px;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .jadwal-eyebrow {
        display: inline-block;
        color: var(--gold-dark);
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .jadwal-timeline {
        position: relative;
        z-index: 1;
        max-width: 760px;
        margin: 0 auto;
    }

    .jadwal-timeline::before {
        content: "";
        position: absolute;
        left: 44px;
        top: 6px;
        bottom: 6px;
        width: 2px;
        background: repeating-linear-gradient(
            180deg,
            var(--gold) 0 8px,
            transparent 8px 16px
        );
    }

    @media (max-width: 575px) {
        .jadwal-timeline::before { left: 34px; }
    }

    .jadwal-entry {
        position: relative;
        display: flex;
        gap: 24px;
        align-items: flex-start;
        margin-bottom: 26px;
    }

    .jadwal-entry:last-child {
        margin-bottom: 0;
    }

    .jadwal-date {
        position: relative;
        z-index: 1;
        flex-shrink: 0;
        width: 88px;
        height: 88px;
        border-radius: 50%;
        background: #ffffff;
        border: 2px solid var(--gold);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 20px rgba(61,40,23,0.08);
    }

    @media (max-width: 575px) {
        .jadwal-date { width: 68px; height: 68px; }
    }

    .jadwal-date .day {
        font-family: 'Playfair Display', serif;
        font-size: 24px;
        font-weight: 700;
        color: var(--text-dark);
        line-height: 1;
    }

    @media (max-width: 575px) {
        .jadwal-date .day { font-size: 19px; }
    }

    .jadwal-date .month {
        font-size: 10.5px;
        font-weight: 600;
        letter-spacing: .5px;
        text-transform: uppercase;
        color: var(--gold-dark);
        margin-top: 3px;
    }

    .jadwal-card {
        flex: 1;
        background: #ffffff;
        border-radius: 16px;
        padding: 20px 26px;
        box-shadow: 0 6px 18px rgba(61,40,23,0.07);
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .jadwal-card:hover {
        transform: translateX(4px);
        box-shadow: 0 12px 28px rgba(61,40,23,0.12);
    }

    .jadwal-card h5 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 18px;
        color: var(--text-dark);
        margin-bottom: 8px;
    }

    .jadwal-card .meta {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        font-size: 13px;
        color: var(--text-muted);
    }

    .jadwal-card .meta span {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .jadwal-card .meta i {
        color: var(--gold-dark);
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

<section id="tentang" class="section about-section">

    <div class="container">

        <div class="row align-items-center g-5 about-wrapper">

            {{-- FOTO --}}

            <div class="col-lg-5">

                <div class="about-image-wrapper">

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

                                <i class="fas fa-mask fa-3x mb-3"></i>

                                <p class="mb-0">
                                    Foto sanggar belum tersedia
                                </p>

                            </div>

                        </div>

                    @endif

                </div>

            </div>


            {{-- KONTEN --}}

            <div class="col-lg-7">

                <div class="about-content">

                    <span class="about-eyebrow">
                        Mengenal Kami
                    </span>

                    <h2 class="about-title">
                        Melestarikan Seni,
                        <span>Merawat Budaya</span>
                    </h2>


                    @if($profile?->history)

                        <p class="about-text">
                            {!! nl2br(e($profile->history)) !!}
                        </p>

                    @else

                        <p class="about-text">
                            Putro Setyo Budoyo merupakan kelompok seni
                            Barongan yang hadir untuk menjaga, mengembangkan,
                            dan memperkenalkan seni budaya Jawa kepada
                            masyarakat melalui seni pertunjukan.
                        </p>

                    @endif


                    {{-- FILOSOFI --}}

                    @if($profile?->philosophy)

                        <div class="about-philosophy">

                            <h5>
                                Filosofi Kami
                            </h5>

                            <p>
                                {!! nl2br(e($profile->philosophy)) !!}
                            </p>

                        </div>

                    @endif


                    {{-- NILAI --}}

                    <div class="about-values">

                        <div class="about-value">

                            <i class="fas fa-masks-theater d-block"></i>

                            <strong>
                                Seni Pertunjukan
                            </strong>

                            <span>
                                Menghidupkan seni Barongan melalui
                                pertunjukan yang autentik dan berkarakter.
                            </span>

                        </div>


                        <div class="about-value">

                            <i class="fas fa-landmark d-block"></i>

                            <strong>
                                Budaya Jawa
                            </strong>

                            <span>
                                Menjaga nilai dan tradisi budaya Jawa
                                agar tetap dikenal lintas generasi.
                            </span>

                        </div>


                        <div class="about-value">

                            <i class="fas fa-people-group d-block"></i>

                            <strong>
                                Kolaborasi
                            </strong>

                            <span>
                                Membuka ruang kolaborasi melalui seni,
                                komunitas, pendidikan, dan kegiatan budaya.
                            </span>

                        </div>

                    </div>

                </div>

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

            <div class="gallery-grid">

                @foreach($galleries as $gallery)

                    <div class="gallery-item {{ $loop->first ? 'gallery-featured' : '' }}">

                        <div class="gallery-photo">

                            <img
                                src="{{ asset('storage/' . $gallery->image) }}"
                                alt="{{ $gallery->title }}"
                                loading="lazy"
                            >

                            <div class="gallery-overlay">

                                <div class="gallery-overlay-content">

                                    <span class="gallery-category">
                                        Dokumentasi
                                    </span>

                                    <h3>
                                        {{ $gallery->title }}
                                    </h3>

                                    @if($gallery->activity_date)

                                        <div class="gallery-date">

                                            <i class="far fa-calendar-alt"></i>

                                            {{ $gallery->activity_date->format('d F Y') }}

                                        </div>

                                    @endif

                                    @if($gallery->description)

                                        <p>
                                            {{ Str::limit($gallery->description, 100) }}
                                        </p>

                                    @endif

                                </div>

                                {{-- TOMBOL BUKA FOTO --}}

                                <button
                                    type="button"
                                    class="gallery-view-icon"
                                    onclick="openGalleryLightbox(
                                        @js(asset('storage/' . $gallery->image)),
                                        @js($gallery->title)
                                    )"
                                    aria-label="Lihat foto {{ $gallery->title }}"
                                >
                                    <i class="fas fa-expand"></i>
                                </button>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="gallery-empty">

                <div class="gallery-empty-icon">
                    <i class="fas fa-images"></i>
                </div>

                <h4>Galeri Foto Belum Tersedia</h4>

                <p>
                    Dokumentasi kegiatan dan pertunjukan
                    Putro Setyo Budoyo akan ditampilkan di sini.
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

{{-- GALLERY LIGHTBOX --}}

<div
    id="galleryLightbox"
    class="gallery-lightbox"
>

    <button
        type="button"
        class="gallery-lightbox-close"
        id="galleryLightboxClose"
        aria-label="Tutup foto"
    >
        <i class="fas fa-times"></i>
    </button>


    <div class="gallery-lightbox-content">

        <img
            id="galleryLightboxImage"
            src=""
            alt=""
        >

        <div
            id="galleryLightboxTitle"
            class="gallery-lightbox-title"
        ></div>

    </div>

</div>

{{-- PAKET PEMENTASAN --}}

<section id="paket" class="section package-section">

    <div class="container">

        <div class="package-header">
            <span class="package-eyebrow">Paket Pementasan</span>
            <h2>Satu Panggung, <span>Banyak Pilihan Cerita</span></h2>
            <p>
                Pilih paket pementasan Barongan Putro Setyo Budoyo
                sesuai kebutuhan dan suasana acara Anda.
            </p>
        </div>

        {{-- PERBANDINGAN PAKET (GAYA TIKET) --}}

        <div class="package-grid">

            {{-- CLASSIC --}}

            <div class="ticket-card">

                <div class="ticket-top">
                    <span class="ticket-icon"><i class="fas fa-masks-theater"></i></span>
                    <div>
                        <h3 class="ticket-name">Classic</h3>
                        <p class="ticket-desc">
                            Fasilitas utama untuk memeriahkan acara Anda.
                        </p>
                    </div>
                </div>

                <div class="ticket-divider"></div>

                <div class="ticket-body">

                    <span class="ticket-price-label">Mulai dari</span>
                    <div class="ticket-price">
                        Rp7.000.000 <small>/ pementasan</small>
                    </div>

                    <ul class="ticket-facilities">
                        <li><i class="fas fa-check check"></i><span>Honor pemain dan kru</span></li>
                        <li><i class="fas fa-check check"></i><span>Transportasi</span></li>
                        <li><i class="fas fa-check check"></i><span>Konsumsi</span></li>
                        <li><i class="fas fa-check check"></i><span>Sewa sound system</span></li>
                        <li><i class="fas fa-times cross"></i><span>Bintang tamu belum termasuk</span></li>
                    </ul>

                    <button type="button" class="ticket-btn" onclick="selectPackage('classic')">
                        Pilih Paket Classic
                    </button>

                </div>

            </div>

            {{-- PREMIUM --}}

            <div class="ticket-card premium">

                <span class="ticket-ribbon">REKOMENDASI</span>

                <div class="ticket-top">
                    <span class="ticket-icon"><i class="fas fa-star"></i></span>
                    <div>
                        <h3 class="ticket-name">Premium</h3>
                        <p class="ticket-desc">
                            Pengalaman pementasan yang lebih lengkap dan maksimal.
                        </p>
                    </div>
                </div>

                <div class="ticket-divider"></div>

                <div class="ticket-body">

                    <span class="ticket-price-label">Mulai dari</span>
                    <div class="ticket-price">
                        Rp9.000.000 <small>/ pementasan</small>
                    </div>

                    <ul class="ticket-facilities">
                        <li><i class="fas fa-check check"></i><span>Honor pemain dan kru</span></li>
                        <li><i class="fas fa-check check"></i><span>Transportasi</span></li>
                        <li><i class="fas fa-check check"></i><span>Konsumsi</span></li>
                        <li><i class="fas fa-check check"></i><span>Sewa sound system</span></li>
                        <li><i class="fas fa-plus check"></i><span>Bisa menambahkan bintang tamu</span></li>
                    </ul>

                    <button type="button" class="ticket-btn" onclick="selectPackage('premium')">
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

                    <label class="package-option" id="option-classic">
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

                    <label class="package-option" id="option-premium">
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

                    <label class="addon-option" id="addon-star">
                        <input
                            type="checkbox"
                            id="starAddon"
                            onchange="updatePackageCalculator()"
                        >
                        <span class="addon-text">
                            <strong>Tambahkan Bintang Tamu</strong>
                            <span>Khusus paket Premium · +Rp2.500.000</span>
                        </span>
                    </label>

                </div>

                <div class="col-lg-6">

                    <h6 class="subheading mb-3">
                        Ringkasan Pesanan
                    </h6>

                    <div class="order-summary">

                        <div class="summary-row">
                            <span>Paket Terpilih</span>
                            <strong id="summaryPackage">Classic</strong>
                        </div>

                        <div class="summary-row">
                            <span>Harga Paket</span>
                            <span id="summaryPackagePrice">Rp7.000.000</span>
                        </div>

                        <div class="summary-row">
                            <span>Bintang Tamu</span>
                            <span id="summaryAddon">Rp0</span>
                        </div>

                        <div class="summary-row total">
                            <span>TOTAL</span>
                            <span id="summaryTotal">Rp7.000.000</span>
                        </div>

                        @if($contact?->phone)
                            <a href="#" id="packageWhatsappButton" class="package-order-btn" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-whatsapp"></i> Pesan Paket Ini
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

        <div class="section-header-wrap">
            <span class="jadwal-eyebrow">Agenda Kami</span>
            <h2 class="section-eyebrow" style="margin-bottom:8px;">Jadwal Pertunjukan</h2>
            <p class="section-sub" style="margin-bottom:0;">
                Informasi jadwal pertunjukan Kelompok Seni Barongan Putro Setyo Budoyo
            </p>
        </div>

        @if($schedules->count())

            <div class="jadwal-timeline">

                @foreach($schedules as $schedule)
                    <div class="jadwal-entry">

                        <div class="jadwal-date">
                            <span class="day">{{ $schedule->event_date->format('d') }}</span>
                            <span class="month">{{ $schedule->event_date->translatedFormat('M') }}</span>
                        </div>

                        <div class="jadwal-card">
                            <h5>{{ $schedule->title }}</h5>
                            <div class="meta">
                                <span><i class="far fa-calendar-alt"></i>{{ $schedule->event_date->format('d F Y') }}</span>
                                <span><i class="fas fa-map-marker-alt"></i>{{ $schedule->location }}</span>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>

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

/* =========================================
   GALLERY LIGHTBOX
========================================= */

function openGalleryLightbox(image, title) {

    const lightbox =
        document.getElementById('galleryLightbox');

    const lightboxImage =
        document.getElementById('galleryLightboxImage');

    const lightboxTitle =
        document.getElementById('galleryLightboxTitle');


    if (!lightbox || !lightboxImage) {
        return;
    }


    lightboxImage.src = image;

    lightboxImage.alt = title || 'Foto galeri';

    lightboxTitle.textContent = title || '';


    lightbox.classList.add('active');

}


/* TUTUP LIGHTBOX */

function closeGalleryLightbox() {

    const lightbox =
        document.getElementById('galleryLightbox');

    const lightboxImage =
        document.getElementById('galleryLightboxImage');


    if (!lightbox) {
        return;
    }


    lightbox.classList.remove('active');


    /*
     * Bersihkan gambar setelah animasi
     */

    setTimeout(function () {

        if (lightboxImage) {
            lightboxImage.src = '';
        }

    }, 250);

}


/* TOMBOL CLOSE */

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const closeButton =
            document.getElementById(
                'galleryLightboxClose'
            );


        if (closeButton) {

            closeButton.addEventListener(
                'click',
                function (event) {

                    event.stopPropagation();

                    closeGalleryLightbox();

                }
            );

        }


        /*
         * Klik background untuk menutup
         */

        const lightbox =
            document.getElementById(
                'galleryLightbox'
            );


        if (lightbox) {

            lightbox.addEventListener(
                'click',
                function (event) {

                    if (
                        event.target === lightbox
                    ) {

                        closeGalleryLightbox();

                    }

                }
            );

        }


        /*
         * Tombol ESC
         */

        document.addEventListener(
            'keydown',
            function (event) {

                if (
                    event.key === 'Escape'
                ) {

                    closeGalleryLightbox();

                }

            }
        );

    }
);
</script>

@endpush

@endsection