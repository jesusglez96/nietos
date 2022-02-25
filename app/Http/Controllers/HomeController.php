<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function show()
    {
        // $flights = Flight::select('select * from users where active = ?', [1])();
        $flights = Flight::table('flights')
            ->join('airports', 'flights.origin_id', '=', 'airports.id')
            ->join('airports', 'flights.destiny_id', '=', 'airports.id')
            ->select('flights.*', 'airports.name', 'flights.city', 'flights.country')
            ->get();

        // return view("show", compact('flights'));
        return $flights;
    }
}
