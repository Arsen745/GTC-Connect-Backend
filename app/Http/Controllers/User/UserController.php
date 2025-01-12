<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use app\Http\Requests\user\StoreUserRequest;
use app\Http\Requests\user\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return UserResource::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['token'] = Str::random(20);
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Проверяем, есть ли файл изображения в запросе
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $filePath = $request->file('image')->store('users', 'public');
            $validatedData['image'] = $filePath;
        }



        // Создаём пользователя с валидированными данными
        $user = User::create($validatedData);

        return response()->json([
            'message' => 'Успешно создано!',
            'token' => $user->token,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new UserResource(User::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validated();

        if ($request->has('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $filePath = $request->file('image')->store('users', 'public');
            $validatedData['image'] = $filePath;
        }

        $user->update($validatedData);

        return response()->json(['message' => 'Пользовател успешно обновлено!', $user->name]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Пользователь не найден.'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Пользователь удален успешно.', 'name' => $user->name], 200);
    }

}
