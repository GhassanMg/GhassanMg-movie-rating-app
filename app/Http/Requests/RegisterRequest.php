<?php

namespace App\Http\Requests;

use App\Http\Requests\Shared\MainRequest;
use App\Models\User;


class RegisterRequest extends MainRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        $model = User::where('id', $this->route('id'))->first();
        if ($model)
            switch ($this->method()) {
                case 'GET':
                case 'POST':
                case 'PUT':
                case 'PATCH':
                case 'DELETE':
                    break;
            }
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
                    'name'              => 'required',
                    'email'             => ['required', 'email', 'unique:users'],
                    'password'          => 'required|string',
                    'confirm_password'  => 'required_with:password|same:password',
                ];
                break;

        }

        return $fullRules;
    }
}
