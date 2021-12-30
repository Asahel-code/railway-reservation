<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassengerAge extends Model
{
    use HasFactory;

    protected $table = 'passenger_ages';

    protected $fillable = ['name', 'price'];

    function ticket(){
        return $this->hasMany(Ticket::class, 'passengerAge_id');
    }

    function passenger()
    {
        return $this->hasMany(Passenger::class, 'passengerAge_id');
    }
}
