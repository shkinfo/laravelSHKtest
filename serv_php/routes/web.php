<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/my', function() {
    return 987698769876;
});

// Группа маршрутов API
Route::middleware('api')->prefix('api')->group(function () {
    Route::post('users', [UserController::class, 'store']);
});
