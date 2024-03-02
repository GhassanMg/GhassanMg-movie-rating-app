<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
        'genre_id',
    ];

    protected $abbends = [
        'rating_avg'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function getRatingAvgAttribute()
    {
        return $this->ratings()->avg('rating') ?? 0;
    }

}
