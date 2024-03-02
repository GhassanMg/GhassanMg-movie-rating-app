<?php

namespace App\Http\Controllers\Shared;

use App\Common\SharedMessages\ApiSharedMessage;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Services\Shared\BaseService;
use Illuminate\Http\JsonResponse;
use App\Traits\ResponseAPI;

/**
 * Class BaseCrudController
 * @package Trillion\Http\Controllers
 */
class BaseController extends Controller
{
    use ResponseAPI;

    /** @var bool */
    protected bool $wantSoftDelete = false;

    /** @var array */
    protected array $appendsAttributes = [];

    /** @var BaseService */
    protected BaseService $service;

    /** @var int */
    protected int $length = 500;

    /** @var string[] */
    protected array $with = [];

    /** @var string */
    protected string $request;

    /**
     * BaseController constructor
     * @param $service
     */
    public function __construct($service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $request = resolve($this->request);

        return $this->handleSharedMessage(
            $this->service->index(
                $this->with,
                $request->per_page ?? $this->length,
                $this->appendsAttributes
            )
        );
    }

    /**
     * Store a newly created resource in storage
     *
     * @return JsonResponse
     */
    public function store(): JsonResponse
    {
        $request = resolve($this->request);

        return $this->handleSharedMessage($this->service->store($request->all()));
    }

    /**
     * Display the specified resource
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->handleSharedMessage($this->service->view($id));
    }

    /**
     * Update the specified resource in storage
     *
     * @param int $id
     * @return JsonResponse
     */
    public function update(int $id): JsonResponse
    {
        $request = resolve($this->request);

        return $this->handleSharedMessage($this->service->update($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->handleSharedMessage($this->service->delete($id, $this->wantSoftDelete));
    }

    /**
     * Handle manager messages.
     * @param ApiSharedMessage $message
     * @return JsonResponse
     */
    protected function handleSharedMessage(ApiSharedMessage $message): JsonResponse
    {
        // Check on message status.
        if ($message->status) {
            // Return success response.
            return $this->success(
                $message->data,
                $message->message,
                $message->statusCode ?? Response::HTTP_OK
            );
        }

        // Handle error of this message.
        return $this->error(
            [$message->message],
            $message->message,
            $message->statusCode ?? Response::HTTP_BAD_REQUEST
        );
    }
}
