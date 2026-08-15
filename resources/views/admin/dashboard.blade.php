@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard Admin</h1>
    <small class="text-muted">
        Ringkasan konten website {{ $profile?->name ?? 'Putro Setyo Budoyo' }}
    </small>
@stop

@section('content')

    <div class="alert alert-warning border-0" style="background:#fbf1de;color:#7a5a1a;border-radius:12px;">
        <i class="fas fa-hand-sparkles mr-2"></i>
        Selamat datang kembali! Kelola profil, galeri, jadwal, dan berita website dari sini.
    </div>

    {{-- STAT CARDS --}}
    <div class="row">

        <div class="col-lg-3 col-6">
            <div class="small-box" style="background:#3d2817;color:#fff;">
                <div class="inner">
                    <h3>{{ $stats['gallery'] }}</h3>
                    <p>Foto Galeri</p>
                </div>
                <div class="icon">
                    <i class="fas fa-images"></i>
                </div>
                <a href="{{ route('gallery.index') }}" class="small-box-footer" style="color:#fff;">
                    Kelola Galeri <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box" style="background:#c9972e;color:#fff;">
                <div class="inner">
                    <h3>{{ $stats['video'] }}</h3>
                    <p>Video</p>
                </div>
                <div class="icon">
                    <i class="fab fa-youtube"></i>
                </div>
                <a href="{{ route('video.index') }}" class="small-box-footer" style="color:#fff;">
                    Kelola Video <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box" style="background:#6b4a2f;color:#fff;">
                <div class="inner">
                    <h3>{{ $stats['schedule'] }}</h3>
                    <p>Jadwal Pertunjukan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <a href="{{ route('schedule.index') }}" class="small-box-footer" style="color:#fff;">
                    Kelola Jadwal <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box" style="background:#a97b20;color:#fff;">
                <div class="inner">
                    <h3>{{ $stats['news'] }}</h3>
                    <p>Berita</p>
                </div>
                <div class="icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <a href="{{ route('news.index') }}" class="small-box-footer" style="color:#fff;">
                    Kelola Berita <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

    </div>

    {{-- RINGKASAN --}}
    <div class="row">

        <div class="col-lg-6">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-check mr-2"></i>
                        Jadwal Terdekat
                    </h3>
                </div>
                <div class="card-body p-0">
                    @forelse($upcomingSchedules as $schedule)
                        <div class="d-flex justify-content-between align-items-center px-3 py-2 border-bottom">
                            <div>
                                <strong>{{ $schedule->title }}</strong><br>
                                <small class="text-muted">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    {{ $schedule->event_date->format('d F Y') }}
                                    &middot; {{ $schedule->location }}
                                </small>
                            </div>
                            <a href="{{ route('schedule.edit', $schedule->id) }}" class="btn btn-sm btn-outline-warning">
                                Edit
                            </a>
                        </div>
                    @empty
                        <p class="text-muted p-3 mb-0">Belum ada jadwal mendatang.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-newspaper mr-2"></i>
                        Berita Terbaru
                    </h3>
                </div>
                <div class="card-body p-0">
                    @forelse($latestNews as $item)
                        <div class="d-flex justify-content-between align-items-center px-3 py-2 border-bottom">
                            <div>
                                <strong>{{ \Illuminate\Support\Str::limit($item->title, 40) }}</strong><br>
                                <small class="text-muted">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    {{ $item->published_at?->format('d F Y') }}
                                </small>
                            </div>
                            <a href="{{ route('news.edit', $item->id) }}" class="btn btn-sm btn-outline-warning">
                                Edit
                            </a>
                        </div>
                    @empty
                        <p class="text-muted p-3 mb-0">Belum ada berita.</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>

@stop