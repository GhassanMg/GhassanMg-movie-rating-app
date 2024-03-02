<?php

namespace App\Services\Shared;

use App\Common\SharedMessages\ApiSharedMessage;
use Illuminate\Database\QueryException;
use App\Repositories\Shared\Eloquent\BaseRepository;
use App\Traits\{MessageTrait};

class BaseService
{
    use  MessageTrait;

    /** @var string */
    protected string $modelName = "Resource";

    /** @var BaseRepository */
    protected BaseRepository $repository;

    /**
     * BaseService constructor.
     * @param BaseRepository $repository
     */
    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return ApiSharedMessage
     */
    public function index(
        array  $relations = [],
        int    $length = 10,
        array  $appends = []
    ): ApiSharedMessage
    {
        $data = $this->repository->all($relations, $length, $appends);

        if ($data == "error") {
            return $this->errorMessage(__('core::errors.sort_key_not_allowed', ['model' => $this->modelName]));
        }

        return $this->successMessage(
            __('core::success.all', ['model' => $this->modelName]),
            $data
        );
    }

    /**
     * Get custom resource by id
     * @return ApiSharedMessage
     */
    public function view(int $id): ApiSharedMessage
    {
        return $this->successMessage(
            __('core::success.get', ['model' => $this->modelName]),
            $this->repository->findById($id)
        );
    }

    /**
     * @param $payload
     * @return ApiSharedMessage
     */
    public function store($payload): ApiSharedMessage
    {
        return $this->successMessage(
            __('core::success.store', ['model' => $this->modelName]),
            $this->repository->create($payload)
        );
    }

    /**
     * Update By ID
     * @return ApiSharedMessage
     */
    public function update(int $id, array $payload): ApiSharedMessage
    {
        $model = $this->repository->update($id, $payload);

        return $this->successMessage(
            __('core::success.update', ['model' => $this->modelName]),
            $model
        );
    }

    /**
     * Delete by id (soft delete or force delete).
     *
     * @param int $id
     * @param bool|false $wantSoftDelete
     * @return ApiSharedMessage
     */
    public function delete(int $id, bool $wantSoftDelete = false): ApiSharedMessage
    {
        try {
            $this->repository->deleteById($id);

            return $this->successMessage(__('core::success.delete', ['model' => $this->modelName]), $result);

        } catch (QueryException $e) {

        }
    }

    /**
     * @param int $id
     * @return ApiSharedMessage
     */
    public function applySoftDelete(int $id): ApiSharedMessage
    {
        $model = $this->repository->findById($id);

        return $this->delete($model->id);
    }
}
