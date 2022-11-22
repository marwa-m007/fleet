<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    protected $fillable = ['number',"model"];

    public function seats()
    {
        return $this->hasMany(Seats::class);
    }


    public function generateSeats()
    {
        # code...
    }
}
