<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $fillable = ['name', 'ticket_type', 'passenger_id', 'seat_id', 'container_id', 'train_id', 'source_id', 'destination_id'];

    function train()
    {
        return $this->belongsTo(Train::class);
    }
    
    function age()
    {
        return $this->belongsTo(PassengerAge::class);
    }

    function seat()
    {
        return $this->belongsTo(SeatType::class);
    }

    function container()
    {
        return $this->belongsTo(ContainerSize::class);
    }

    

    function passenger()
    {
        return $this->hasMany(Passenger::class, 'ticket_id');
    }
    
    function payment()
    {
        return $this->hasMany(PaymentInfo::class, 'ticket_id');
    }
}
