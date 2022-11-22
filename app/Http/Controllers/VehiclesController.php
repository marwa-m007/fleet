<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    public function index(Request $request)
    {
        return view('buses', [
            'buses' => Vehicles::get(),
        ]);
    }

    public function add(Request $request)
    {
        return view('addBus', [
            'buses' => Vehicles::get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|unique:vehicles|string|max:255'
        ]);

        $bus = Vehicles::create([
            'number' => $request->number,
            'model' => $request->model,
        ]);

        return redirect()->route('vehicles');
    }
}
