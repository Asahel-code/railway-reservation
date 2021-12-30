<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    use HasFactory;

    protected $table = 'payment_infos';

    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'email', 'gender', 'payment_number', 'ticket_id'];

    function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
