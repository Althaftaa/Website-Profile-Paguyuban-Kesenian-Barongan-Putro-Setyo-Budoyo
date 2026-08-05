<div class="card-body">

    <div class="form-group">

        <label>Nama Acara</label>

        <input
            type="text"
            name="title"
            class="form-control"
            value="{{ old('title', $schedule->title ?? '') }}"
            required>

    </div>

    <div class="form-group">

        <label>Tanggal</label>

        <input
            type="date"
            name="event_date"
            class="form-control"
            value="{{ old('event_date', isset($schedule) && $schedule->event_date ? $schedule->event_date->format('Y-m-d') : '') }}"
            required>

    </div>

    <div class="form-group">

        <label>Jam</label>

        <input
            type="time"
            name="event_time"
            class="form-control"
            value="{{ old('event_time', $schedule->event_time ?? '') }}">

    </div>

    <div class="form-group">

        <label>Lokasi</label>

        <input
            type="text"
            name="location"
            class="form-control"
            value="{{ old('location', $schedule->location ?? '') }}"
            required>

    </div>

    <div class="form-group">

        <label>Status</label>

        <select
            name="status"
            class="form-control">

            @foreach([
                'Akan Datang',
                'Berlangsung',
                'Selesai',
                'Dibatalkan'
            ] as $status)

                <option
                    value="{{ $status }}"
                    @selected(old('status', $schedule->status ?? 'Akan Datang') == $status)>

                    {{ $status }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="form-group">

        <label>Deskripsi</label>

        <textarea
            name="description"
            rows="4"
            class="form-control">{{ old('description', $schedule->description ?? '') }}</textarea>

    </div>

</div>