<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $table = 'destinations';

    protected $fillable = ['name', 'image'];

    function outgoingTrain(){
        return $this->hasMany(Train::class, 'source_id');
    }

    function incomingTrain(){
        return $this->hasMany(Train::class, 'destination_id');
    }
}
