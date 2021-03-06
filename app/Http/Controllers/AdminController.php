<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Requests\validacionCiudad;

class AdminController extends Controller
{
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'city_origin' => 'required',
            'city_destiny' => 'required|different:city_origin',
            'country_origin' => 'required',
            'country_destiny' => 'required',
            'date' => 'required|date|after:tomorrow',
            'seat_total' => 'required',
            'price' => 'required|numeric|min:0',
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

        if ($newFlight->save())
            return redirect()->route("create")->with("creado", true);
        return redirect()->route("create")->with("creado", false);
    }

    public function modify($id_flight)
    {
        $flight = Flight::find($id_flight);

        if ($flight) return view("modify", compact('flight'));
        else return redirect()->route("index");
    }

    public function edit(validacionCiudad $request)
    {

        $flight = Flight::find($request->id_flight);

        if ($flight) {
            $flight->city_origin = $request->city_origin;
            $flight->country_origin = $request->country_origin;
            $flight->city_destiny = $request->city_destiny;
            $flight->country_destiny = $request->country_destiny;
            $flight->date = $request->date;
            $flight->seat_total = $request->seat_total;
            $flight->seat_available = $request->seat_available;
            $flight->price = $request->price;

            $flight->save();
            // echo "Si";
            return redirect()->route("modify", ['id_flight' => $flight->id])->with("modificado", true);
        }
        // echo "No";
        return redirect()->route("modify", ['id_flight' => $flight->id])->with("modificado", false);
    }
    public function delete($id_flight)
    {
        $flight = Flight::find($id_flight);
        if ($flight) {
            if ($flight->delete()) {
                return redirect()->route('index')->with("borrado", true);
            }
            return redirect()->route('index')->with("borrado", false);
        }
    }
}
