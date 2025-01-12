<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use app\Http\Requests\Login\LoginUserRequest;
use App\Models\User\User;
use Illuminate\Support\Facades\Hash;

class LoginUserController extends Controller
{
    public function login(LoginUserRequest $request): \Illuminate\Http\JsonResponse
    {

        $validatedData = $request->validated();

        $user = User::where('email', $validatedData['email'])->first();

        if ($user && Hash::check($validatedData['password'], $user->password)) {
            return response()->json([
                'message' => 'Авторизация успешна!',
                'token' => $user->token,
            ]);
        }

        return response()->json([
            'message' => 'Неверный email или пароль.',
        ], 401);
    }
}
