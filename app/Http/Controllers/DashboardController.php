<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\User;
use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    public function films()
    {
        $moviesCount = Movie::count();
        $usersCount = User::count();
        $ticketsCount = Ticket::count();

        return view('dashboard.films', compact('moviesCount', 'usersCount', 'ticketsCount'));
    }

    public function filmsPdf()
    {
        $moviesCount = Movie::count();
        $usersCount = User::count();
        $ticketsCount = Ticket::count();

        // Laad de Blade view voor de PDF
        $pdf = PDF::loadView('dashboard.films-pdf', compact('moviesCount', 'usersCount', 'ticketsCount'));

        // Download de PDF
        return $pdf->download('films-dashboard.pdf');
    }
}
