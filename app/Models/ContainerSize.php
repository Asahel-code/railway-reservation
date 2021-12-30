<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContainerSize extends Model
{
    use HasFactory;

    protected $table = 'container_sizes';

    protected $fillable = ['name', 'price'];

    function ticket(){
        return $this->hasMany(Ticket::class, 'container_id');
    }
}
