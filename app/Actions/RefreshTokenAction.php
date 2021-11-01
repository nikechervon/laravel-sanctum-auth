<?php

namespace App\Actions;

use App\DTO\TokenDTO;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

/**
 * @action RefreshTokenAction
 * @description Обновление токена авторизации
 */
class RefreshTokenAction extends AbstractAction
{
    /**
     * @param Request $request
     * @return TokenDTO
     */
    public static function run(Request $request): TokenDTO
    {
        $user = $request->user();
        self::deleteTokens($user);
        return new TokenDTO($user, $user->createToken($user->email));
    }

    /**
     * Удаление старых токенов
     *
     * @param Authenticatable|User $user
     */
    private static function deleteTokens(Authenticatable|User $user): void
    {
        $user->tokens()->delete();
    }
}
