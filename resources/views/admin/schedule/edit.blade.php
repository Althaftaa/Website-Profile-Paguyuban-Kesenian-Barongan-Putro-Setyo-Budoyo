@extends('adminlte::page')

@section('title', 'Edit Jadwal')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <div>

        <h1 class="mb-0">Edit Jadwal</h1>

        <small class="text-muted">

            Perbarui jadwal pertunjukan

        </small>

    </div>

    <a
        href="{{ route('schedule.index') }}"
        class="btn btn-secondary">

        <i class="fas fa-arrow-left mr-1"></i>

        Kembali

    </a>

</div>

@stop


@section('content')

@if($errors->any())

<div class="alert alert-danger">

    <strong>Terjadi kesalahan.</strong>

    <ul class="mb-0 mt-2">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif


<div class="card card-outline card-warning">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-edit mr-2"></i>

            Edit Jadwal

        </h3>

    </div>

    <form
        action="{{ route('schedule.update', $schedule) }}"
        method="POST">

        @csrf
        @method('PUT')

        @include('admin.schedule._form')

        <div class="card-footer text-right">

            <a
                href="{{ route('schedule.index') }}"
                class="btn btn-secondary">

                Batal

            </a>

            <button
                type="submit"
                class="btn btn-warning">

                <i class="fas fa-save mr-1"></i>

                Simpan Perubahan

            </button>

        </div>

    </form>

</div>

@stop