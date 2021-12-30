<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatType extends Model
{
    use HasFactory;

    protected $table = 'seat_types';

    protected $fillable = ['name', 'price'];

    function ticket()
    {
        return $this->hasMany(Ticket::class, 'seat_id');
    }
}
