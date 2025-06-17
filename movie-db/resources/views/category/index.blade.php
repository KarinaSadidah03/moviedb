@extends('layouts.main')
@section('title','Daftar Kategori')
@section('navCategory','active')
@section('content')

<h1>Daftar Kategori</h1>
<a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Input Kategori</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>
    @foreach ($categories as $category)
    <tr>
        <td>{{ $categories->firstItem() + $loop->index }}</td>
        <td>{{ $category->category_name }}</td>
        <td>{{ \Illuminate\Support\Str::limit($category->description, 50) }}</td>
        <td>
            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<div class="d-flex justify-content-start mt-4">
    {{ $categories->links() }}
</div>

@endsection
