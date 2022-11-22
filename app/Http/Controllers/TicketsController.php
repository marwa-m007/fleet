<?php

namespace App\Http\Controllers;

use App\Models\Seats;
use App\Models\Stations;
use App\Models\Tickets;
use Carbon\Carbon;
use Illuminate\Http\Request;


class TicketsController extends Controller
{

    public function index(Request $request)
    {
        return view('tickets', [
            'tickets' => Tickets::with(['seat', 'user', 'bus', 'stationFrom', 'stationTo'])->get()
        ]);
    }

    public function add()
    {
        return view('dashboard', [
            'stations' => Stations::get()
        ]);
    }

    public function seats(Request $request)
    {
        $msg = "All Tickets has been booked .";
        $request->validate([
            'day' => 'required|after:' . Carbon::now()->format('m/d/Y'),
            'station_from' => 'required',
            'station_to' => 'required|gt:station_from',
        ]);
        $from = $request->station_from;
        $to = $request->station_to;
        $seats = (new Seats())->getSeats();
        if ($seats->count()) {
            $seat = $seats->first();
            Tickets::create([
                'seat_id' => $seat->id,
                'vehicle_id' => $seat->vehicle_id,
                'number' => $seat->number . '[' . $from . '-' . $to . ']',
                'station_from' => $from,
                'station_to' => $to,
                'day' => $request->day,
                'userid' => Auth()->user()->id
            ]);

            $msg = "Tickets created successfully";
        }
        session()->flash('message', $msg);
        return back();
    }
}
