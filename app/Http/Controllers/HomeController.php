<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $flights = Flight::all();
        return view("index", compact('flights'));
    }

    public function buy($id_flight)
    {
        $flight = Flight::find($id_flight);
        if ($flight) {
            if ($flight->seat_available > 0) {
                $flight->seat_available -= 1;
                $newTravel = new Travel();

                $newTravel->flight_id = $id_flight;
                $newTravel->user_id = Auth::user()->getAuthIdentifier();

                $flight->save();
                $newTravel->save();

                return redirect()->route("index");
            }
        }
        return redirect()->route("index");
    }

    public function show()
    {
        $travels = Travel::join('flights', 'travels.flight_id', '=', 'flights.id')
            ->select('travels.id as travel_id', "travels.user_id", "travels.flight_id", "flights.*")
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->get();
        return view("show", compact('travels'));
    }

    public function remove($id_travel)
    {
        $travel = Travel::find($id_travel);
        if ($travel) {
            $flight = Flight::find($travel->flight_id);
            $flight->seat_available += 1;
            $flight->save();
            $travel->delete();
            return redirect()->route("show")->with("remove", true);
        }

        return redirect()->route("show")->with("remove", false);
    }
}
