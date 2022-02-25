<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function index()
    {
        $flights = Flight::all();
        return view("index", compact('flights'));
    }

    public function show()
    {
        $travels = Travel::join('flights', 'travels.flight_id', '=', 'flights.id')
            ->select('travels.*')
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->get();
        return view("show", compact('travels'));
    }
    public function create()
    {
    }
}
