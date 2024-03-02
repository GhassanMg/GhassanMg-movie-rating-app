<?php

namespace App\Http\Requests\Shared;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\FormRequest;

class MainRequest extends FormRequest
{
    /** @var array */
    protected array $translationMessages = [
        'required_unless',
        'after_or_equal',
        'required_if',
        'date_format',
        'max_digits',
        'sometimes',
        'required',
        'uploaded',
        'numeric',
        'integer',
        'boolean',
        'unique',
        'string',
        'exists',
        'digits',
        'image',
        'mimes',
        'array',
        'date',
        'same',
        'max',
        'min',
        'gt',
        'in',
    ];

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return void
     *
     * @throws ValidationException
     */
    public function failedValidation(Validator $validator): void
    {
        // Check on accept key in the header of the request.
        if (request()->header('accept') !== 'application/json') {
            // Call on parent logic.
            parent::failedValidation($validator);

        } else {
            throw new HttpResponseException(
                response()->json([
                    'message' => '',
                    'status' => false,
                    'data' => [],
                    'errors' => $validator->messages()->all(),
                    'status_code' => Response::HTTP_BAD_REQUEST
                ], 422)
            );
        }
    }

    /**
     * Throws a Json response with unauthorized error.
     *
     * @throws AuthorizationException
     */
    public function failedAuthorization(): void
    {
        // Check on accept key in the header of the request.
        if (request()->header('accept') !== 'application/json') {
            // Call on parent logic.
            parent::failedAuthorization();

        } else {
            // Throw exceptions.
            throw new HttpResponseException(
                response()->json([
                    'message' => '',
                    'status' => false,
                    'data' => [],
                    'errors' => __('core::errors.unauthorized'),
                    'status_code' => Response::HTTP_UNAUTHORIZED
                ], 401)
            );
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        $messages = [];

        // we should import translations file to active this
        // foreach ($this->translationMessages as $translation) {
        //     $messages[$translation] = trans("product::validation.$translation");
        // }

        return $messages;
    }
}
