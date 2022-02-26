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

    public function buy()
    {
        #TODO: implement this method
    }

    public function show()
    {
        $travels = Travel::join('flights', 'travels.flight_id', '=', 'flights.id')
            ->select('travels.*', "flights.*")
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->get();
        return view("show", compact('travels'));
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        // tocado por er capi
        $request->validate([
            'origin'=>'required',
            'destiny'=>'required',
            'country_origin'=>'required',
            'country_destiny'=>'required',
            'date'=>'required',
            'seat_total'=>'required',
            // 'seat_available'=>'required',
            'price'=>'required',

        ]);

        $newFlight = new Flight();

        $newFlight->city_origin = $request->city_origin;
        $newFlight->country_origin = $request->country_origin;
        $newFlight->city_destiny = $request->city_destiny;
        $newFlight->country_destiny = $request->country_destiny;
        $newFlight->date = $request->date;
        $newFlight->seat_total = $request->seat_total;
        $newFlight->seat_available = $request->seat_total;
        $newFlight->price = $request->price;

        $newFlight->save();

        return redirect()->route("create");
    }
}
