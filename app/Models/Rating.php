<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'movie_id',
        'rating',
    ];

    protected $with = [
        'movie'
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
