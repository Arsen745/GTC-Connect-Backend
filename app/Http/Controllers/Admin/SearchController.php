<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User\User;

class SearchController extends Controller
{
    public function search($name)
    {
        $users = User::where('name', 'like', '%' . $name . '%')->get();

        if ($users->isEmpty()) {
            return response()->json([
                'message' => 'Пользователи не найдены по запросу: ' . $name
            ], 404);
        }

        return UserResource::collection($users);

    }




}
