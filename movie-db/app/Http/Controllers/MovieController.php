<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;



class MovieController extends Controller
{
    public function homepage()
    {
        $movies = Movie::latest()->paginate(6);
        return view('homepage',compact('movies'));
    }

   public function detailmovie($id, $slug)
   {
        $movie = Movie::find($id);
        return view('detailmovie', compact('movie'));
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'synopsis' => 'nullable|string',
        'category_id' => 'required|exists:categories,id',
        'year' => 'required|integer|min:1950|max:' . date('Y'),
        'actors' => 'nullable|string',
        'cover_image' => 'nullable|image|mimes:jpg,jpeg,webp',
    ]);

    $slug = Str::slug($validated['title']);

    // Jika ada file cover image, simpan dan dapatkan path-nya
    $cover = null;
    if ($request->hasFile('cover_image')) {
        $cover = $request->file('cover_image')->store('covers', 'public');
    }

    // Simpan movie ke database
    Movie::create([
        'title' => $validated['title'],
        'slug' => $slug,
        'year' => $validated['year'],
        'synopsis' => $validated['synopsis'] ?? null,
        'category_id' => $validated['category_id'],
        'actors' => $validated['actors'] ?? null,
        'cover_image' => $cover,
    ]);

    return redirect('/')->with('success', 'Movie saved successfully');
}


    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        $categories = Category::all();
        return view('editmovie', compact('movie', 'categories'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'actors' => 'nullable|string',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $movie->update($validated);

        return redirect()->route('datamovie')->with('success', 'Movie updated successfully.');
    }

    public function delete(Movie $movie)
    {
        if(Gate::allows('delete')){
        $movie->delete();
        return redirect()->route('datamovie')->with('success', 'Movie deleted successfully.');
        }
        abort(403);
    }

    public function create()
{
    $categories = Category::all();
    return view('create_movie', compact('categories')); // ✅ BENAR
}
    public function datamovie()
    {
        $movies = Movie::latest()->paginate(6);
        return view('datamovie',compact('movies'));
    }

}
