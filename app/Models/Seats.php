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
        return $this->hasMany(Tickets::class);
    }


}
