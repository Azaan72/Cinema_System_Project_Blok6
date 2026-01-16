<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerformanceStoreRequest;
use App\Http\Requests\PerformanceUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Performance;
use App\Models\Hall;

class PerformanceController extends Controller
{
    public function index(Request $request)
    {
        $performances = Performance::all();


        
        $performances = Performance::query();
        if ($request->filled('time')) {
            $time = $request->time; // bv. "21:00"

            // filter op HH:MM met SQLite strftime
            $performances->whereRaw("strftime('%H:%M', datetime) = ?", [$time]);
        }

        $performances = $performances->get();
        return view('performances.index', compact('performances'));
    }

    public function show(Performance $performance)
    {
        return view('performances.show', compact('performance'));
    }

    public function create()
    {
        $performances = Performance::all();
        $halls = Hall::all();
        return view('performances.create', compact('performances', 'halls'));
    }

    public function store(PerformanceStoreRequest $request)
    {
        $performance = new Performance();
        $performance->datetime = $request->datetime;
        $performance->available_seats = $request->available_seats;


        $performance->hall_id = $request->hall_id;
        $performance->movie_id = $request->movie_id;
        $performance->save();

        return redirect()->route('performances.index')->with('success', 'Performance succesvol aangemaakt.');
    }

    public function edit(Performance $performance)
    {
        $halls = Hall::all();
        return view('performances.edit', compact('performance', 'halls'));
    }

    public function update(PerformanceUpdateRequest $request, Performance $performance)
    {
        $performance->datetime = $request->datetime;
        $performance->available_seats = $request->available_seats;
        $performance->hall_id = $request->hall_id;
        $performance->movie_id = $request->movie_id;
        $performance->save();

        return redirect()->route('performances.index')->with('success', 'Performance succesvol bijgewerkt.');
    }

    public function destroy(Performance $performance)
    {
        $performance->delete();
        return redirect()->route('performances.index')->with('success', 'Performance succesvol verwijderd.');
    }
}
