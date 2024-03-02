<?php

namespace App\Traits;

use App\Common\SharedMessages\ApiSharedMessage;

trait MessageTrait
{
    /**
     * @param string $message
     * @param $data
     * @param int $statusCode
     * @return ApiSharedMessage
     */
    public function successMessage(string $message = '', $data = null, int $statusCode = 200): ApiSharedMessage
    {
        return new ApiSharedMessage($message, $data, true, null, $statusCode);
    }

    /**
     * @param string $message
     * @param int $statusCode
     * @return ApiSharedMessage
     */
    public function exceptionMessage(string $message = '', int $statusCode = 404): ApiSharedMessage
    {
        return new ApiSharedMessage($message, $message, false, $message, $statusCode);
    }

    /**
     * @param string $message
     * @param $data
     * @param int $statusCode
     * @return ApiSharedMessage
     */
    public function errorMessage(string $message = '', $data = null, int $statusCode = 404): ApiSharedMessage
    {
        return new ApiSharedMessage($message, $data, false, null, $statusCode);
    }
}
