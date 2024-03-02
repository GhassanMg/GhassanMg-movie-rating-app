<?php

namespace App\Repositories\Shared\Eloquent;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /**
     * The model instance.
     *
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model The model instance.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all records.
     * @param array $relations
     * @param int $length
     *
     * @return array
     */
    public function all(
        array  $relations = [],
        int    $length = 10,
        array  $appends = []
    )
    {
        // Prepare basic query instance.
        $query = $this->prepareQuery();

        $this->applySelectWithQuery($query, $relations);

        $results = $query->paginate($length);

        // Append the specified attributes to each model instance.
        foreach ($results->items() as &$result) {
            $result = $result->append($appends);
        }

        return $results;
    }

    /**
     * Find a record by its primary key.
     *
     * @param int $id The primary key value.
     *
     * @return Model|null
     */
    public function findById($modelId): ?BaseModel
    {
        return $this->model->findOrFail($modelId);
    }

    /**
     * Create a new record.
     *
     * @param array $attributes The attributes to create.
     *
     * @return Model
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update a record.
     *
     * @param int   $id         The primary key value.
     * @param array $attributes The attributes to update.
     *
     * @return bool
     */
    public function update($id, array $attributes)
    {
        $model = $this->findById($id);

        if ($model) {
            return $model->update($attributes);
        }

        return false;
    }

    /**
     * Delete a record.
     *
     * @param int $id The primary key value.
     *
     * @return bool
     */
    public function deleteById($id)
    {
        $model = $this->findById($id);

        if ($model) {
            return $model->delete();
        }

        return false;
    }

    /**
     *
     * @return Builder
     */
    protected function prepareQuery(): Builder
    {
        return $this->model->query();
    }

    /**
     * @param $query
     * @param $selectedModelAttributes
     * @param $relations
     * @return mixed
     */
    protected function applySelectWithQuery(&$query, $relations): mixed
    {
        return $query = $query->with($relations);
    }
}
