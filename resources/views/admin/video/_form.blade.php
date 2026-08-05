<div class="card-body">

    {{-- Judul Video --}}
    <div class="form-group">

        <label>
            Judul Video
            <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="title"
            class="form-control"
            value="{{ old('title', $video->title ?? '') }}"
            required>

    </div>


    {{-- Tanggal --}}
    <div class="form-group">

        <label>Tanggal Kegiatan</label>

        <input
            type="date"
            name="activity_date"
            class="form-control"
            value="{{ old(
                'activity_date',
                isset($video) && $video->activity_date
                    ? $video->activity_date->format('Y-m-d')
                    : ''
            ) }}">

    </div>


    {{-- Link Youtube --}}
    <div class="form-group">

        <label>
            Link YouTube
            <span class="text-danger">*</span>
        </label>

        <input
            type="url"
            id="youtube_url"
            name="youtube_url"
            class="form-control"
            placeholder="https://youtu.be/xxxxx"
            value="{{ old('youtube_url', $video->youtube_url ?? '') }}"
            required>

    </div>


    {{-- Preview --}}
    <div
        id="youtube_preview"
        class="mb-3"
        style="{{ isset($video) ? '' : 'display:none;' }}">

        <img
            id="youtube_thumbnail"
            src="{{ isset($video) ? 'https://img.youtube.com/vi/'.$video->youtube_id.'/hqdefault.jpg' : '' }}"
            class="img-thumbnail"
            style="max-width:420px">

        <div class="mt-2">

            <a
                id="youtube_watch"
                href="{{ $video->youtube_url ?? '#' }}"
                target="_blank"
                class="btn btn-danger">

                <i class="fab fa-youtube mr-1"></i>

                Tonton di YouTube

            </a>

        </div>

    </div>


    {{-- Deskripsi --}}
    <div class="form-group">

        <label>Deskripsi</label>

        <textarea
            name="description"
            rows="5"
            class="form-control">{{ old('description', $video->description ?? '') }}</textarea>

    </div>

</div>