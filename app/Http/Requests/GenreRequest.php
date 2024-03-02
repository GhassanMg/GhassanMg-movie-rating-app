<?php

namespace App\Http\Requests;

use App\Http\Requests\Shared\MainRequest;

class GenreRequest extends MainRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $fullRules = [];

        switch ($this->method()) {
            case 'GET':
            case 'PATCH':
            case 'DELETE':
            case 'PUT':
            default:
                break;

            case 'POST':
                $fullRules = [
                    'name' => 'required|string|min:3|max:50'
                ];
                break;
        }

        return $fullRules;
    }
}
