<?php

namespace App\Repositories\Genre\Eloquent;

use App\Repositories\Shared\Eloquent\BaseRepository;
use App\Repositories\Genre\GenreRepositoryInterface;
use App\Models\Genre;

class GenreRepository extends BaseRepository implements GenreRepositoryInterface
{
    /**
     * GenreRepository constructor.
     * @param Genre $model
     */
    public function __construct(Genre $model)
    {
        parent::__construct($model);
    }
}
