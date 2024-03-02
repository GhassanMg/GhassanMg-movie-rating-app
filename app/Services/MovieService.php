<?php

namespace App\Services;

use App\Repositories\Movie\Eloquent\MovieRepository;
use App\Services\Shared\BaseService;

class MovieService extends BaseService
{
    /**
     * CategoryService constructor.
     * @param MovieRepository $repository
     */
    public function __construct(MovieRepository $repository)
    {
        parent::__construct($repository);
    }
}
