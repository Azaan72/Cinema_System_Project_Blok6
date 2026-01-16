<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieStoreRequest;
use App\Http\Requests\MovieUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Ticket;

use App\Models\Performance;
use Database\Seeders\TicketSeeder;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::all();
        $genres = Genre::all();
        $tickets = Ticket::all();


        $movies = Movie::query();
        // Filter op genre als er één geselecteerd is
        if ($request->filled('genre_id')) {
            $movies->whereHas('genres', function ($q) use ($request) {
                $q->where('genres.id', $request->genre_id);
            });
        }

        // Filter op leeftijdsgrens
        if ($request->filled('age_limit')) {
            $movies->where('age_limit', '<=', $request->age_limit);
        }

        // Filter op ticketprijs (optioneel)
        if ($request->filled('min_price') || $request->filled('max_price')) {
            $minPrice = $request->input('min_price', 0); // standaard 0
            $maxPrice = $request->input('max_price', PHP_INT_MAX); // standaard oneindig

            $movies->whereHas('performances.tickets', function ($q) use ($minPrice, $maxPrice) {
                $q->whereBetween('price', [$minPrice, $maxPrice]);
            });
        }

        $movies = $movies->get();


        return view('movies.index', compact('movies', 'genres', 'tickets'));
    }

    public function show(Movie $movie)
    {
        $performances = Performance::all();

        return view('movies.show', compact('movie', 'performances'));
    }

    public function create()
    {
        $genres = Genre::all();
        $performances = Performance::all();
        return view('movies.create', compact('genres', 'performances'));
    }

    public function store(MovieStoreRequest $request, Movie $movie)
    {
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->duration = $request->duration;
        $movie->age_limit = $request->age_limit;
        $movie->save();

        $movie->genres()->sync($request->genres);

        if ($request->filled('performance_id')) {
            Performance::where('id', $request->performance_id)
                ->update(['movie_id' => $movie->id]);
        }

        return redirect()->route('movies.index')->with('success', 'Movie succesvol aangemaakt.');
    }

    public function edit(Movie $movie)
    {
        $movie = Movie::find($movie->id);
        $genres = Genre::all();
        $performances = Performance::all();
        return view('movies.edit', compact('movie', 'genres', 'performances'));
    }

    public function update(MovieUpdateRequest $request, Movie $movie)
    {
        $movie = Movie::find($movie->id);

        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->duration = $request->duration;
        $movie->age_limit = $request->age_limit;

        $movie->save();

        $movie->genres()->sync($request->genres);

        // Oude performance loskoppelen
        $movie->performances()->update(['movie_id' => null]);

        // Nieuwe performance koppelen
        if ($request->filled('performance_id')) {
            Performance::where('id', $request->performance_id)
                ->update(['movie_id' => $movie->id]);
        }


        return redirect()->route('movies.show', $movie->id)->with('success', 'Movie succesvol bijgewerkt.');
    }

    public function destroy(Movie $movie)
    {
        $movie->genres()->detach();
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie succesvol verwijderd.');
    }
}
