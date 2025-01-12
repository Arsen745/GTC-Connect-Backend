<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResources(['admin' => AdminController::class]);
Route::apiResources(['users' => UserController::class]);
Route::post('users/login', [LoginUserController::class, 'login']);
Route::get('users/search/{name}', [SearchController::class, 'search']);



