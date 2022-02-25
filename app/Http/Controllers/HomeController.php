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
        $flights = Flight::select('select * from users where active = ?', [1])();
    }
}
