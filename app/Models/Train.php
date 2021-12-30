<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;

    protected $table = 'trains';

    function source()
    {
        return $this->belongsTo(Destination::class);
    }

    function destination()
    {
        return $this->belongsTo(Destination::class);
    } 
    
    function ticket(){
        return $this->hasMany(Ticket::class, 'train_id');
    }
        
    
}
