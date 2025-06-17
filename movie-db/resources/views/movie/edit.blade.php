@extends('layouts.main')

@section('title', 'Edit Data Movie')
@section('navMovie', 'active')
@section('content')

<div class="row">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-12">
            <h1 class="h2">Edit Data Movie</h1>
            <form action="{{ route('movie.update', $movie->id) }}" method="post">
                @csrf
                @method("PUT")

                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $movie->title) }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug', $movie->slug) }}">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="synopsis" class="col-sm-2 col-form-label">Sinopsis</label>
                    <div class="col-sm-10">
                        <textarea name="synopsis" class="form-control @error('synopsis') is-invalid @enderror" id="synopsis" rows="5">{{ old('synopsis', $movie->synopsis) }}</textarea>
                        @error('synopsis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="category_id" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <input type="number" name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id" value="{{ old('category_id', $movie->category_id) }}">
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="year" class="col-sm-2 col-form-label">Tahun</label>
                    <div class="col-sm-10">
                        <input type="number" name="year" class="form-control @error('year') is-invalid @enderror" id="year" value="{{ old('year', $movie->year) }}">
                        @error('year')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="actors" class="col-sm-2 col-form-label">Pemeran</label>
                    <div class="col-sm-10">
                        <textarea name="actors" class="form-control @error('actors') is-invalid @enderror" id="actors" rows="4">{{ old('actors', $movie->actors) }}</textarea>
                        @error('actors')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="cover_image" class="col-sm-2 col-form-label">Gambar Sampul</label>
                    <div class="col-sm-10">
                        <input type="text" name="cover_image" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" value="{{ old('cover_image', $movie->cover_image) }}">
                        @error('cover_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>

@endsection
