<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

/** Авторизация пользователя */
Route::post('/login', [AuthController::class, 'login']);

/** Регистрация нового пользователя */
Route::post('/register', [AuthController::class, 'register']);

/** Обновление токена авторизации */
Route::post('/refresh', [AuthController::class, 'refresh']);

/** Метод проверки авторизации */
Route::get('/check', [AuthController::class, 'check']);
