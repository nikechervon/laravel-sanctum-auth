<?php

namespace App\Http\Requests;

/**
 * @request LoginRequest
 * @property string $email
 * @property string $password
 */
class LoginRequest extends ApiRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6',
        ];
    }
}
