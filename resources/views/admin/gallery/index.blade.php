@extends('adminlte::page')

@section('title', 'Galeri')

@section('content_header')

    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h1 class="mb-0">Galeri</h1>

            <small class="text-muted">
                Kelola dokumentasi kegiatan dan pertunjukan Barongan
            </small>
        </div>

        <a
            href="{{ route('gallery.create') }}"
            class="btn btn-warning"
        >
            <i class="fas fa-plus mr-1"></i>
            Tambah Foto
        </a>

    </div>

@stop


@section('content')

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button
                type="button"
                class="close"
                data-dismiss="alert"
            >
                <span>&times;</span>
            </button>

        </div>

    @endif


    <div class="card card-outline card-warning">

        <div class="card-header">

            <h3 class="card-title">
                <i class="fas fa-images mr-2"></i>
                Daftar Foto
            </h3>

        </div>


        <div class="card-body">

            @if($galleries->isEmpty())

                <div class="text-center py-5 text-muted">

                    <i class="fas fa-images fa-3x mb-3"></i>

                    <h5>Belum ada foto</h5>

                    <p>
                        Tambahkan dokumentasi pertama ke galeri.
                    </p>

                    <a
                        href="{{ route('gallery.create') }}"
                        class="btn btn-warning"
                    >
                        <i class="fas fa-plus mr-1"></i>
                        Tambah Foto
                    </a>

                </div>

            @else

                <div class="row">

                    @foreach($galleries as $gallery)

                        <div class="col-md-4 col-lg-3 mb-4">

                            <div class="card h-100">

                                <img
                                    src="{{ asset('storage/' . $gallery->image) }}"
                                    class="card-img-top"
                                    style="height: 180px; object-fit: cover;"
                                    alt="{{ $gallery->title }}"
                                >

                                <div class="card-body">

                                    <h5 class="card-title">
                                        {{ $gallery->title }}
                                    </h5>

                                    @if($gallery->activity_date)

                                        <p class="text-muted small">
                                            <i class="far fa-calendar-alt mr-1"></i>

                                            {{ $gallery->activity_date->format('d M Y') }}
                                        </p>

                                    @endif

                                </div>


                                <div class="card-footer">

                                    <a
                                        href="{{ route('gallery.edit', $gallery) }}"
                                        class="btn btn-sm btn-outline-warning"
                                    >
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>


                                    <form
                                        action="{{ route('gallery.destroy', $gallery) }}"
                                        method="POST"
                                        class="d-inline"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Hapus foto ini?')"
                                        >
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @endif

        </div>

    </div>

@stop