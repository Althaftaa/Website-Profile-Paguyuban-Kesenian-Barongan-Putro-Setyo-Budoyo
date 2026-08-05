@extends('layouts.frontend')

@section('title', 'Berita')

@section('content')

<section class="py-5">

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

            @forelse($news as $item)

                <div class="col-lg-4 mb-4">

                    <div class="card shadow-sm h-100">

                        @if($item->thumbnail)

                            <img
                                src="{{ asset('storage/'.$item->thumbnail) }}"
                                class="card-img-top"
                                style="height:220px;object-fit:cover;">

                        @endif

                        <div class="card-body d-flex flex-column">

                            <small class="text-muted">

                                {{ $item->published_at->format('d F Y') }}

                            </small>

                            <h5 class="mt-2">

                                {{ $item->title }}

                            </h5>

                            <p class="text-muted">

                                {{ Str::limit(strip_tags($item->content),120) }}

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

                    <div class="alert alert-info">

                        Belum ada berita.

                    </div>

                </div>

            @endforelse

        </div>

        <div class="mt-4">

            {{ $news->links() }}

        </div>

    </div>

</section>

@endsection