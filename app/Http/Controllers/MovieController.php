<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Shared\BaseController;
use App\Http\Requests\MovieRequest;
use App\Services\MovieService;

class MovieController extends BaseController
{
    /** @var string */
    protected string $request = MovieRequest::class;

    /**
     * MovieController constructor.
     * @param MovieService $service
     */
    public function __construct(MovieService $service)
    {
        parent::__construct($service);
    }
}
