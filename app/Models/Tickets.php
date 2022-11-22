<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class,'userid');
    }

    public function seat()
    {
        return $this->belongsTo(Seats::class,'seat_id');
    }

    public function bus()
    {
        return $this->belongsTo(Vehicles::class,'vehicle_id');
    }

    public function stationFrom()
    {
        return $this->belongsTo(Stations::class,'station_from');
    }

    public function stationTo()
    {
        return $this->belongsTo(Stations::class,'station_to');
    }

}
