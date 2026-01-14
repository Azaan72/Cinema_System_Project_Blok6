<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreStoreRequest;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Http\Requests\GenreUpdateRequest;



class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    public function show(Genre $genre)
    {
        $genre = Genre::findOrFail($genre->id);
        return view('genres.show', compact('genre'));
    }

    public function create()
    {
        return view('genres.create');
    }

    public function store(GenreStoreRequest $request, Genre $genre)
    {
        $genre = new Genre();
        $genre->name = $request->name;
        $genre->save();

        return redirect()->route('genres.index')->with('success', 'Genre successvol aangemaakt.');
    }

    public function edit(Genre $genre)
    {
        $genre = Genre::find($genre->id);
        return view('genres.edit', compact('genre'));
    }

    public function update(GenreUpdateRequest $request, Genre $genre)
    {
        $genre = Genre::find($genre->id);
        $genre->name = $request->name;
        $genre->save();

        return redirect()->route('genres.index')->with('success', 'Genre succesvol bijgewerkt.');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index')->with('success', 'Genre succesvol verwijderd.');
    }
}
