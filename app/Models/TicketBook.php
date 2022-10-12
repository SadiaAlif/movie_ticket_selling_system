<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketBook extends Model
{
    use HasFactory;
    protected $fillable = [
        'ticket_number',
        'movie_id',
        'movie_name',
        'user_id',
        'user_name',
        'price',
        'method',
        'tnx_id',
        'show_time',
        'show_date',
        'branch',
        'qty'
    ];
}
