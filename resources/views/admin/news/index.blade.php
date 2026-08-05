@extends('adminlte::page')

@section('title', 'Berita')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <div>

        <h1 class="mb-0">
            Berita Kegiatan
        </h1>

        <small class="text-muted">

            Kelola berita dan kegiatan Kelompok Seni Barongan Putro Setyo Budoyo

        </small>

    </div>

    <a
        href="{{ route('news.create') }}"
        class="btn btn-warning">

        <i class="fas fa-plus mr-1"></i>

        Tambah Berita

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

    <div class="card-body p-0">

        <table class="table table-hover align-middle mb-0">

            <thead class="bg-light">

                <tr>

                    <th width="70">
                        No
                    </th>

                    <th width="120">
                        Thumbnail
                    </th>

                    <th>
                        Judul Berita
                    </th>

                    <th width="150">
                        Tanggal
                    </th>

                    <th width="170">
                        Dibuat
                    </th>

                    <th width="170">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($news as $item)

                <tr>

                    <td>

                        {{ $loop->iteration }}

                    </td>

                    <td>

                        @if($item->thumbnail)

                            <img
                                src="{{ asset('storage/'.$item->thumbnail) }}"
                                class="img-thumbnail"
                                style="
                                    width:90px;
                                    height:60px;
                                    object-fit:cover;
                                ">

                        @else

                            <span class="text-muted">

                                Tidak ada

                            </span>

                        @endif

                    </td>

                    <td>

                        <strong>

                            {{ $item->title }}

                        </strong>

                    </td>

                    <td>

                        {{ $item->published_at->format('d M Y') }}

                    </td>

                    <td>

                        {{ $item->created_at->diffForHumans() }}

                    </td>

                    <td>

                        <a
                            href="{{ route('news.edit',$item) }}"
                            class="btn btn-sm btn-warning">

                            <i class="fas fa-edit"></i>

                        </a>

                        <form
                            action="{{ route('news.destroy',$item) }}"
                            method="POST"
                            class="d-inline">

                            @csrf

                            @method('DELETE')

                            <button
                                onclick="return confirm('Hapus berita ini?')"
                                class="btn btn-sm btn-danger">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="6"
                        class="text-center py-4">

                        <i
                            class="fas fa-newspaper fa-2x text-muted mb-3">
                        </i>

                        <br>

                        Belum ada berita.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<div class="mt-3">

    {{ $news->links() }}

</div>

@stop