@extends('adminlte::page')

@section('title', 'Galeri Video')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <div>

        <h1 class="mb-0">
            Galeri Video
        </h1>

        <small class="text-muted">
            Kelola video pertunjukan Barongan
        </small>

    </div>

    <a
        href="{{ route('video.create') }}"
        class="btn btn-warning">

        <i class="fas fa-plus mr-1"></i>

        Tambah Video

    </a>

</div>

@stop


@section('content')

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif


<div class="card card-outline card-warning">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-video mr-2"></i>

            Daftar Video

        </h3>

    </div>

    <div class="card-body">

        <div class="row">

            @forelse($videos as $video)

            <div class="col-lg-4 mb-4">

                <div class="card h-100 shadow-sm">

                    @if($video->thumbnail_url)

                        <img
                            src="{{ $video->thumbnail_url }}"
                            class="card-img-top"
                            style="height:220px;object-fit:cover;">

                    @else

                        <div
                            class="card-img-top d-flex align-items-center justify-content-center"
                            style="height:220px;background:#3d2817;">

                            <i class="{{ $video->platform_icon }} fa-3x text-white"></i>

                        </div>

                    @endif

                    <div class="card-body">

                        <span class="badge badge-warning mb-2">
                            <i class="{{ $video->platform_icon }} mr-1"></i>
                            {{ $video->platform_label }}
                        </span>

                        <h5>

                            {{ $video->title }}

                        </h5>

                        <small class="text-muted">

                            @if($video->activity_date)

                                {{ $video->activity_date->format('d M Y') }}

                            @endif

                        </small>

                        <p class="mt-2">

                            {{ Str::limit($video->description,100) }}

                        </p>

                    </div>

                    <div class="card-footer">

                        <a
                            href="{{ route('video.edit',$video) }}"
                            class="btn btn-warning btn-sm">

                            <i class="fas fa-edit"></i>

                            Edit

                        </a>

                        <form
                            action="{{ route('video.destroy',$video) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Hapus video?')"
                                class="btn btn-danger btn-sm">

                                <i class="fas fa-trash"></i>

                                Hapus

                            </button>

                        </form>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12">

                <div class="alert alert-info">

                    Belum ada video.

                </div>

            </div>

            @endforelse

        </div>

    </div>

</div>

@stop