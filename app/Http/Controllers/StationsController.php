<?php

namespace App\Http\Controllers;

use App\Models\Stations;
use Illuminate\Http\Request;

class StationsController extends Controller
{
    public function index(Request $request)
    {
        return view('stations', [
            'stations' => Stations::get()]);
    }
}
