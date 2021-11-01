<?php

namespace App\Http\Controllers\API;

use App\Actions\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\TokenResource;

/**
 * @controller AuthController
 * @description Контроллер отвечает за аутентификацию пользоватля
 */
class AuthController extends Controller
{
    public function login()
    {
        //
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
