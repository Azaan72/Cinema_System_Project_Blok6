<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hall;

class HallController extends Controller
{
    public function index()
    {
        $halls = Hall::all();
        return view('halls.index', compact('halls'));
    }

    public function show(Hall $hall)
    {
        return view('halls.show', compact('hall'));
    }

    public function create()
    {
        return view('halls.create');
    }

    public function store(Request $request)
    {
        $performance = new Hall();
        $performance->name = $request->name;
        $performance->capacity = $request->capacity;
        $performance->screen_size = $request->screen_size;
        $performance->save();

        return redirect()->route('halls.index')->with('success', 'Hall succesvol aangemaakt.');
    }

    public function edit(Hall $hall)
    {
        return view('halls.edit', compact('hall'));
    }

    public function update(Request $request, Hall $hall)
    {
        $hall->name = $request->name;
        $hall->capacity = $request->capacity;
        $hall->screen_size = $request->screen_size;
        $hall->save();

        return redirect()->route('halls.index')->with('success', 'Hall succesvol bijgewerkt.');
    }

    public function destroy(Hall $hall)
    {
        // Oude performances verwijderen
        $hall->performances()->delete();

        // Daarna hall verwijderen
        $hall->delete();

        return redirect()->route('halls.index')->with('success', 'Hall succesvol verwijderd.');
    }
}
