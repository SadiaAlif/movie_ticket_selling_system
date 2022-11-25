<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'photo',
        'category_name',
        'branch_name',
        'description',
        'duration',
        'booking_status',
        'price',
        'show_time',
        'show_date',  
        
    ];
}
