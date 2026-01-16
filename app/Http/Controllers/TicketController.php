<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Performance;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    public function create()
    {
        $performances = Performance::all();
        return view('tickets.create', compact('performances'));
    }

    public function store(Request $request)
    {
        $ticket = new Ticket();
        $ticket->price = $request->price;
        $ticket->seat = $request->seat;
        $ticket->performance_id = $request->performance_id;
        $ticket->save();

        return redirect()->route('tickets.index');
    }

    public function edit(Ticket $ticket)
    {
        $performances = Performance::all();
        return view('tickets.edit', compact('ticket', 'performances'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $ticket->price = $request->price;
        $ticket->seat = $request->seat;
        $ticket->performance_id = $request->performance_id;
        $ticket->save();

        return redirect()->route('tickets.index');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index');
    }

}
