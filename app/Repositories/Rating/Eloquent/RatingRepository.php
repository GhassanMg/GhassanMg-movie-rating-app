<?php

namespace App\Repositories\Rating\Eloquent;

use App\Repositories\Shared\Eloquent\BaseRepository;
use App\Repositories\Rating\RatingRepositoryInterface;
use App\Models\Rating;

class RatingRepository extends BaseRepository implements RatingRepositoryInterface
{
    /**
     * RatingRepository constructor.
     * @param Rating $model
     */
    public function __construct(Rating $model)
    {
        parent::__construct($model);
    }
}
