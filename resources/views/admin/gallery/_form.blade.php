<div class="card-body">

    {{-- Judul --}}
    <div class="form-group">
        <label>
            Judul Foto
            <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="title"
            class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title', $gallery->title ?? '') }}"
            required>

        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Tanggal --}}
    <div class="form-group">
        <label>Tanggal Kegiatan</label>

        <input
            type="date"
            name="activity_date"
            class="form-control @error('activity_date') is-invalid @enderror"
            value="{{ old('activity_date', isset($gallery) && $gallery->activity_date ? $gallery->activity_date->format('Y-m-d') : '') }}">

        @error('activity_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Deskripsi --}}
    <div class="form-group">
        <label>Deskripsi</label>

        <textarea
            name="description"
            rows="4"
            class="form-control @error('description') is-invalid @enderror">{{ old('description', $gallery->description ?? '') }}</textarea>

        @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Preview Gambar --}}
    <div class="form-group">
        <label>
            {{ isset($gallery) ? 'Ganti Foto' : 'Foto' }}

            @if(!isset($gallery))
                <span class="text-danger">*</span>
            @endif
        </label>

        <div class="mb-3">

            <img
                id="image_preview"
                src="{{ isset($gallery) && $gallery->image ? asset('storage/'.$gallery->image) : '' }}"
                class="img-thumbnail"
                style="max-height:250px; {{ isset($gallery) && $gallery->image ? '' : 'display:none;' }}">

        </div>

        <input
            type="file"
            name="image"
            id="image"
            class="form-control @error('image') is-invalid @enderror"
            accept="image/*"
            {{ isset($gallery) ? '' : 'required' }}>

        <small class="text-muted">
            @if(isset($gallery))
                Kosongkan jika tidak ingin mengganti foto.
            @else
                Format: JPG, JPEG, PNG, WEBP (maks. 5 MB)
            @endif
        </small>

        @error('image')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>

</div>