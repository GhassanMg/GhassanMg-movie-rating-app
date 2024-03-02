<?php

namespace App\Http\Requests;

use App\Http\Requests\Shared\MainRequest;

class LoginRequest extends MainRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
}
