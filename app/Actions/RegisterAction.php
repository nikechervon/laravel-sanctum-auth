<?php

namespace App\Actions;

use App\DTO\TokenDTO;
use App\Tasks\CreateUserTask;

/**
 * @action RegisterAction
 * @description Регистрация нового пользователя
 */
class RegisterAction extends AbstractAction
{
    /**
     * @param string $email
     * @param string $password
     * @return TokenDTO
     */
    public static function run(string $email, string $password): TokenDTO
    {
        $user = CreateUserTask::run($email, $password);
        return new TokenDTO($user, $user->createToken($email));
    }
}
