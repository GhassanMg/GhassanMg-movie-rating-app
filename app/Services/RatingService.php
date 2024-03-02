<?php

namespace App\Services;

use App\Services\Shared\BaseService;
use App\Repositories\Rating\Eloquent\RatingRepository;

class RatingService extends BaseService
{
    /**
     * RatingService constructor.
     * @param RatingRepository $repository
     */
    public function __construct(RatingRepository $repository)
    {
        parent::__construct($repository);
    }
}
