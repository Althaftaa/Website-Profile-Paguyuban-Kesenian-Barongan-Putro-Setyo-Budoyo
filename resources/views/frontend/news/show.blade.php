@extends('layouts.frontend')

@section('title',$news->title)

@section('content')

<section class="py-5">

<div class="container">

<div class="row">

<div class="col-lg-8">

<h2 class="fw-bold">

{{ $news->title }}

</h2>

<p class="text-muted">

{{ $news->published_at->format('d F Y') }}

</p>

@if($news->thumbnail)

<img
src="{{ asset('storage/'.$news->thumbnail) }}"
class="img-fluid rounded shadow mb-4">

@endif

{!! $news->content !!}

</div>


<div class="col-lg-4">

<div class="card">

<div class="card-header">

Berita Terbaru

</div>

<div class="list-group list-group-flush">

@foreach($latestNews as $item)

<a
href="{{ route('frontend.news.show',$item->slug) }}"
class="list-group-item list-group-item-action">

{{ $item->title }}

</a>

@endforeach

</div>

</div>

</div>

</div>

</div>

</section>

@endsection