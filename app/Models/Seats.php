<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seats extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicles::class);
    }

    public function tickets()
    {
        return $this->hasMany(Tickets::class,'seat_id');
    }


    public function getSeats()
    {
        $unbooked = $this->getUnbookedSeats();
        $availableBooked = $this->getAvailableBookedSeats();
        //return $availableBooked;
        return $unbooked->merge($availableBooked);

    }

    // seats all stations available
    public function getUnbookedSeats()
    {
        return Self::whereNotIn('id', function ($query) {
            $query->select('seat_id')
                ->from(with(new Tickets())->getTable())
                ->where('tickets.day', request('day'));
        })->get();
    }

    public function getTickets()
    {
        return Tickets::join('seats', 'seats.id', '=', 'tickets.seat_id')
            ->where('tickets.day', '=', request('day'))
            ->get();
    }

    // booked seats availablity
    public function getAvailableBookedSeats()
    {
        $available = collect();
        foreach($this->getTickets() as $ticket){
            if($this->isRouteAvailable($ticket)){
                $available->add(Seats::find($ticket->seat_id));
            }

        }
        return  $available;
    }

    public function isRouteAvailable($ticket)
    {
        $stations = range(request('station_from'),request('station_to'));
        array_pop($stations);
        $ticketStations = range($ticket->station_from ,$ticket->station_to);
        array_pop($ticketStations);
        return empty(array_intersect($stations,$ticketStations));

    }

}
