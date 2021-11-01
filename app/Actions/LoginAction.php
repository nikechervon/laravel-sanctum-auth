<?php

namespace App\Actions;

use App\DTO\TokenDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * @action LoginAction
 * @description Авторизация пользователя
 */
class LoginAction extends AbstractAction
{
    /**
     * @param string $email
     * @param string $password
     * @return TokenDTO
     * @throws ValidationException
     */
    public static function run(string $email, string $password): TokenDTO
    {
        /** @var User $user */
        $user = self::getUser($email, $password);
        return new TokenDTO($user, $user->createToken($email));
    }

    /**
     * @param string $email
     * @param string $password
     * @return User|null
     * @throws ValidationException
     */
    private static function getUser(string $email, string $password): ?User
    {
        /** @var User $user */
        $user = User::query()->where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Неверный логин или пароль.'],
                'password' => ['Неверный логин или пароль.'],
            ]);
        }

        return $user;
    }
}
