<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'movie_date_id',
        'start_time',
        'end_time'
    ];

    public function movie(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    public function movieDate(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(MovieDate::class);
    }
}
