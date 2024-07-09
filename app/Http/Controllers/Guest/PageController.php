<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        // Ottengo la data odierna con carbon
        $today = \Carbon\Carbon::today()->toDateString();

        // Filtro i treni che partono oggi e ordino per departure_time
        $trains = Train::where('departure_date', $today)
            ->orderBy('departure_time')
            ->get();

        return view('home', compact('trains'));
    }
}
