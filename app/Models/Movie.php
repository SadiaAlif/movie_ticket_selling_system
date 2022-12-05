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

    public function bookedTickets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TicketBook::class);
    }

    public function movieDates(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MovieDate::class);
    }

    public function movieTimes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MovieTime::class);
    }
}
