<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    protected $table = 'passengers';

    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'passengerAge_id', 'ticket_id'];

    function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    function passengerAge()
    {
        return $this->belongsTo(PassengerAge::class);
    }
}
