@extends('layouts.main')
@section('title','Daftar Movie')
@section('navMovie','active')
@section('content')

<h1>Daftar Movie</h1>
<a href="{{ route('movie.create') }}" class="btn btn-primary mb-3">Input Data</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Slug</th>
        <th>Sinopsis</th>
        <th>Kategori ID</th>
        <th>Tahun</th>
        <th>Aktor</th>
        <th>Cover</th>
        <th>Aksi</th>
    </tr>
    @foreach ($movies as $movie)
    <tr>
        <td>{{ $movies->firstItem() + $loop->index }}</td>
        <td>{{ $movie->title }}</td>
        <td>{{ $movie->slug }}</td>
        <td>{{ \Illuminate\Support\Str::limit($movie->synopsis, 50) }}</td>
        <td>{{ $movie->category_id }}</td>
        <td>{{ $movie->year }}</td>
        <td>{{ $movie->actors }}</td>
        <td>
            @if($movie->cover_image)
                <img src="{{ $movie->cover_image }}" alt="cover" width="50">
            @else
                -
            @endif
        </td>

        <td>
            <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('movie.destroy', $movie->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<div class="d-flex justify-content-star mt-4">
    {{ $movies->links() }}
</div>

@endsection
