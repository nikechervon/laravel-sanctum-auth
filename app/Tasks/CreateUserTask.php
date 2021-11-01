<?php

namespace App\Tasks;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * @task CreateUserTask
 * @description Создание нового пользователя
 */
class CreateUserTask extends AbstractTask
{
    /**
     * @param string $email
     * @param string $password
     * @return User
     */
    public static function run(string $email, string $password): User
    {
        $credentials = [
            'email' => $email,
            'password' => Hash::make($password),
        ];

        return User::query()->create($credentials);
    }
}
