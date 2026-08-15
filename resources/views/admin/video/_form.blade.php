<div class="card-body">

    {{-- Platform --}}
    <div class="form-group">

        <label>
            Platform
            <span class="text-danger">*</span>
        </label>

        <select
            name="platform"
            id="platform"
            class="form-control"
            required>

            <option value="youtube" {{ old('platform', $video->platform ?? 'youtube') === 'youtube' ? 'selected' : '' }}>
                YouTube
            </option>

            <option value="instagram" {{ old('platform', $video->platform ?? '') === 'instagram' ? 'selected' : '' }}>
                Instagram
            </option>

            <option value="tiktok" {{ old('platform', $video->platform ?? '') === 'tiktok' ? 'selected' : '' }}>
                TikTok
            </option>

        </select>

    </div>


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


    {{-- Link Video --}}
    <div class="form-group">

        <label>
            <span id="url_label">Link Video</span>
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

        <small class="form-text text-muted" id="url_hint">
            Tempel link video YouTube (contoh: https://youtu.be/xxxxx)
        </small>

    </div>


    {{-- Preview YouTube otomatis --}}
    <div
        id="youtube_preview"
        class="mb-3"
        style="{{ isset($video) && $video->platform === 'youtube' && $video->youtube_id ? '' : 'display:none;' }}">

        <img
            id="youtube_thumbnail"
            src="{{ isset($video) && $video->youtube_id ? 'https://img.youtube.com/vi/'.$video->youtube_id.'/hqdefault.jpg' : '' }}"
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


    {{-- Upload thumbnail manual, untuk Instagram / TikTok --}}
    <div class="form-group" id="thumbnail_group" style="{{ isset($video) && $video->platform === 'youtube' ? 'display:none;' : '' }}">

        <label>Thumbnail (untuk Instagram / TikTok)</label>

        @if(isset($video) && $video->thumbnail)
            <div class="mb-2">
                <img
                    src="{{ asset('storage/'.$video->thumbnail) }}"
                    class="img-thumbnail"
                    style="max-width:280px">
            </div>
        @endif

        <div class="custom-file">
            <input
                type="file"
                name="thumbnail"
                class="custom-file-input"
                id="thumbnail"
                accept="image/*">

            <label class="custom-file-label" for="thumbnail">
                Pilih gambar thumbnail...
            </label>
        </div>

        <small class="form-text text-muted">
            YouTube otomatis punya thumbnail, tapi Instagram & TikTok belum
            punya cara otomatis mengambil gambar sampul, jadi upload manual di sini.
            Kalau tidak diupload, akan ditampilkan ikon platform sebagai gantinya.
        </small>

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