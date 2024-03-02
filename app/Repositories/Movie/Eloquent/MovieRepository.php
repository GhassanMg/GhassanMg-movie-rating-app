<?php

namespace App\Repositories\Movie\Eloquent;

use App\Repositories\Shared\Eloquent\BaseRepository;
use App\Repositories\Movie\MovieRepositoryInterface;
use App\Models\Movie;

class MovieRepository extends BaseRepository implements MovieRepositoryInterface
{
    /**
     * MovieRepository constructor.
     * @param Movie $model
     */
    public function __construct(Movie $model)
    {
        parent::__construct($model);
    }
}
