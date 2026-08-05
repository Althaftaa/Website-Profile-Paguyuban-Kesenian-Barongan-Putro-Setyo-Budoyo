@extends('adminlte::page')

@section('title', 'Jadwal Pertunjukan')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <div>

        <h1 class="mb-0">Jadwal Pertunjukan</h1>

        <small class="text-muted">

            Kelola jadwal pertunjukan Barongan

        </small>

    </div>

    <a href="{{ route('schedule.create') }}" class="btn btn-warning">

        <i class="fas fa-plus mr-1"></i>

        Tambah Jadwal

    </a>

</div>

@stop


@section('content')

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="card">

    <div class="card-body p-0">

        <table class="table table-hover">

            <thead>

                <tr>

                    <th>No</th>

                    <th>Nama Acara</th>

                    <th>Tanggal</th>

                    <th>Jam</th>

                    <th>Lokasi</th>

                    <th>Status</th>

                    <th width="170">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($schedules as $schedule)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $schedule->title }}</td>

                    <td>{{ $schedule->event_date->format('d M Y') }}</td>

                    <td>{{ $schedule->event_time ?? '-' }}</td>

                    <td>{{ $schedule->location }}</td>

                    <td>

                        <span class="badge badge-info">

                            {{ $schedule->status }}

                        </span>

                    </td>

                    <td>

                        <a
                            href="{{ route('schedule.edit',$schedule) }}"
                            class="btn btn-sm btn-warning">

                            Edit

                        </a>

                        <form
                            action="{{ route('schedule.destroy',$schedule) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Hapus jadwal ini?')"
                                class="btn btn-sm btn-danger">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="text-center">

                        Belum ada jadwal.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

{{ $schedules->links() }}

@stop