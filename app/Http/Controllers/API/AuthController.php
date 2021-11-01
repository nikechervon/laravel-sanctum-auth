<?php

namespace App\Http\Controllers\API;

use App\Actions\LoginAction;
use App\Actions\RefreshTokenAction;
use App\Actions\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\TokenResource;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * @controller AuthController
 * @description Контроллер отвечает за аутентификацию пользоватля
 */
class AuthController extends Controller
{
    /**
     * @constructor AuthController
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('refresh', 'check');
    }

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

    /**
     * Обновление токена авторизации
     *
     * @param Request $request
     * @return TokenResource
     */
    public function refresh(Request $request): TokenResource
    {
        $token = RefreshTokenAction::run($request);
        return new TokenResource($token);
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
