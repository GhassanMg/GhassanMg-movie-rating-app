<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseAPI
{
    /**
     * Core of response
     *
     * @param string $message
     * @param mixed $data
     * @param integer $statusCode
     * @param boolean $isSuccess
     * @param array $errors
     * @return JsonResponse
     */
    private function coreResponse(string $message, mixed $data, int $statusCode, array $errors, bool $isSuccess = true): JsonResponse
    {
        // Check the params
        if (!$message && !$errors) return response()->json(['message' => 'Message is required'], 500);

        // Send the response
        if ($isSuccess)
            return response()->json([
                'message' => $message,
                'status' => true,
                'data' => $data,
                'status_code' => $statusCode
            ], $statusCode);

        return response()->json([
            'message' => $message,
            'status' => false,
            'data' => null,
            'errors' => $errors,
            'status_code' => $statusCode
        ], $statusCode);
    }

    /**
     * Send any success response
     *
     * @param $data
     * @param string|null $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public function success($data, string $message = null, int $statusCode = 200): JsonResponse
    {
        $message = $message ?: __('core::success.success');
        return $this->coreResponse($message, $data, $statusCode, []);
    }

    /**
     * Send any error response
     *
     * @param array $messages
     * @param string|null $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public function error(array $messages, string $message = null, int $statusCode = 500): JsonResponse
    {
        $message = $message ?: __('core::errors.general_error');
        return $this->coreResponse($message, null, $statusCode, $messages, false);
    }
}
