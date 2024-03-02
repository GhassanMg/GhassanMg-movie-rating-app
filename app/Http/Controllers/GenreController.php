<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Shared\BaseController;
use App\Http\Requests\GenreRequest;
use App\Services\GenreService;

class GenreController extends BaseController
{
    /** @var string */
    protected string $request = GenreRequest::class;

    /**
     * GenreController constructor.
     * @param GenreService $service
     */
    public function __construct(GenreService $service)
    {
        parent::__construct($service);
    }
}
