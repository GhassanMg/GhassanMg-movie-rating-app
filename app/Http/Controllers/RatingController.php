<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Shared\BaseController;
use App\Http\Requests\RatingRequest;
use App\Services\RatingService;

class RatingController extends BaseController
{
    /** @var string */
    protected string $request = RatingRequest::class;

    /**
     * RatingController constructor.
     * @param RatingService $service
     */
    public function __construct(RatingService $service)
    {
        parent::__construct($service);
    }
}
