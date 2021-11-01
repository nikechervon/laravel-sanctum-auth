<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * @request ApiRequest
 */
class ApiRequest extends FormRequest
{
    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $response = [
            'message' => 'Ошибка валидации',
            'errors' => [],
        ];

        foreach ($validator->errors()->messages() as $field => $message) {
            $response['errors'][] = ['field' => $field, 'message' => $message[0]];
        }

        throw new HttpResponseException(response()->json($response));
    }
}
