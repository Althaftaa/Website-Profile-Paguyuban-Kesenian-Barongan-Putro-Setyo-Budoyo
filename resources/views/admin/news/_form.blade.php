<div class="card-body">

    {{-- Judul --}}
    <div class="form-group">

        <label>
            Judul Berita
            <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            id="title"
            name="title"
            class="form-control"
            value="{{ old('title', $news->title ?? '') }}"
            required>

    </div>


    {{-- Slug --}}
    <div class="form-group">

        <label>Slug</label>

        <input
            type="text"
            id="slug"
            class="form-control"
            value="{{ old('slug', $news->slug ?? '') }}"
            readonly>

        <small class="text-muted">
            Slug dibuat otomatis dari judul berita.
        </small>

    </div>


    {{-- Tanggal --}}
    <div class="form-group">

        <label>
            Tanggal Publikasi
        </label>

        <input
            type="date"
            name="published_at"
            class="form-control"
            value="{{ old(
                'published_at',
                isset($news)
                    ? $news->published_at->format('Y-m-d')
                    : date('Y-m-d')
            ) }}">

    </div>


    {{-- Thumbnail --}}
    <div class="form-group">

        <label>
            Thumbnail
        </label>

        @isset($news)

            @if($news->thumbnail)

                <div class="mb-3">

                    <img
                        id="thumbnail_preview"
                        src="{{ asset('storage/'.$news->thumbnail) }}"
                        class="img-thumbnail"
                        style="max-height:250px">

                </div>

            @endif

        @endisset


        <input
            type="file"
            id="thumbnail"
            name="thumbnail"
            class="form-control"
            accept="image/*">

    </div>


    {{-- Isi Berita --}}
    <div class="form-group">

        <label>
            Isi Berita
        </label>

        <textarea
            id="editor"
            name="content"
            rows="12"
            class="form-control">{{ old('content', $news->content ?? '') }}</textarea>

    </div>

</div>