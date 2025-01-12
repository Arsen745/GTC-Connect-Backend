<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /** @use HasFactory<\Database\Factories\User\UserFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'age',
        'phone_number',
        'profession',
        'email',
        'token',
        'password',
        'image',
    ];
}
