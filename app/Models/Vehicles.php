<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    protected $fillable = ['number', "model"];

    public function seats()
    {
        return $this->hasMany(Seats::class);
    }


    public function generateSeats()
    {
        $id = $this->id;
        if ($id) {
            $seat = ['vehicle_id' => $id];
            for ($i = 1; $i <= 12; $i++) {
                $seat['number'] = $this->number .'-'.$i;
                Seats::create($seat);
            }
        }
    }
}
