<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;

class TrainsController extends Controller
{
    public function index()
    {
        // Ottengo la data odierna con carbon
        $today = \Carbon\Carbon::today()->toDateString();

        // Filtro i treni che partono oggi e ordino per departure_time
        $trains = Train::where('departure_date', '>=', $today)
            ->orderBy('departure_date')
            ->orderBy('departure_time')
            ->get();

        return view('trains', compact('trains'));
    }
    public function show($id)
    {

        $train = Train::find($id);

        return view('train-details', compact('train'));
    }
}
