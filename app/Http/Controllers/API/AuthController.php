<?php

namespace App\Http\Controllers\API;

use App\Actions\LoginAction;
use App\Actions\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\TokenResource;
use Illuminate\Validation\ValidationException;

/**
 * @controller AuthController
 * @description Контроллер отвечает за аутентификацию пользоватля
 */
class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return TokenResource
     * @throws ValidationException
     */
    public function login(LoginRequest $request): TokenResource
    {
        $token = LoginAction::run($request->email, $request->password);
        return new TokenResource($token);
    }

    /**
     * Регистрация нового пользователя
     *
     * @param RegisterRequest $request
     * @return TokenResource
     */
    public function register(RegisterRequest $request): TokenResource
    {
        $token = RegisterAction::run($request->email, $request->password);
        return new TokenResource($token);
    }

    public function refresh()
    {
        //
    }

    public function reset()
    {
        //
    }

    public function resetCheck()
    {
        //
    }

    public function check()
    {
        //
    }
}
