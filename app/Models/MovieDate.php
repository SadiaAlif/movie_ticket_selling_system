<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'date'
    ];

    public function movie(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    public function movieTimes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MovieTime::class);
    }
}
