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
        $genres = Genre::all();

        $movies = Movie::query();

        // Genre
        if ($request->filled('genre_id')) {
            $movies->whereHas('genres', function ($q) use ($request) {
                $q->where('genres.id', $request->genre_id);
            });
        }

        // Leeftijd (veilig)
        if ($request->filled('age_limit') && !in_array((int)$request->age_limit, [0, 18])) {
            $age = (int) $request->age_limit;

            $movies->where(function ($q) use ($age) {
                $q->where('age_limit', '<=', $age)
                    ->orWhereNull('age_limit');
            });
        }

        // Prijs (SQL-proof, geen relation magic)
        if ($request->filled('min_price') || $request->filled('max_price')) {
            $min = $request->min_price ?? 0;
            $max = $request->max_price ?? 10000;

            $movies->whereIn('id', function ($q) use ($min, $max) {
                $q->select('performances.movie_id')
                    ->from('tickets')
                    ->join('performances', 'tickets.performance_id', '=', 'performances.id')
                    ->whereBetween('tickets.price', [$min, $max]);
            });
        }

        $movies = $movies->get();

        return view('movies.index', compact('movies', 'genres'));
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
