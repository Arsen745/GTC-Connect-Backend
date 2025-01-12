<?php

namespace app\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    public function rules(): array
    {


        $rules = [
            'name' => 'required',
            'surname' => 'required',
            'age' => 'required',
            'phone_number' => 'required',
            'profession' => 'required',
            'email' => 'nullable',
            'password' => 'nullable|min:6',
            'image' => 'nullable',
        ];
        return $rules;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages() {
        $messages = [
            'name.required' => 'Поле имя объязательно для заполнения',
            'surname.required' => 'Поле фамилия объязательно для заполнения',
            'age.required' => 'Поле возраст объязательно для заполнения',
            'phone_number.required' => 'Поле номер объязательно для заполнения',
            'email.unique' => 'Такое пользователь уже сущестует',
            'profession.required' => 'Поле профессия объязательно для заполнения',
            'password.min' => 'Пароль должен больше 6',
        ];

        return $messages;
    }
}
