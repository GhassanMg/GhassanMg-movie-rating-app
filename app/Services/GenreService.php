<?php

namespace App\Services;

use App\Services\Shared\BaseService;
use App\Repositories\Genre\Eloquent\GenreRepository;

class GenreService extends BaseService
{
    /**
     * GenreService constructor.
     * @param GenreRepository $repository
     */
    public function __construct(GenreRepository $repository)
    {
        parent::__construct($repository);
    }
}
