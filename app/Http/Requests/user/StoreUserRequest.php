<?php

namespace app\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required',
            'surname' => 'required',
            'image' => 'nullable|file|image',
            'age' => 'required',
            'phone_number' => 'required',
            'profession' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
        ];
        return $rules;
    }

    public function messages() {
        $messages = [
            'name.required' => 'Поле имя объязательно для заполнения',
            'surname.required' => 'Поле фамилия объязательно для заполнения',
            'age.required' => 'Поле возраст объязательно для заполнения',
            'phone_number.required' => 'Поле номер объязательно для заполнения',
            'email.required' => 'Поле Email объязательно для заполнения',
            'email.unique' => 'Такое пользователь уже сущестует',
            'profession.required' => 'Поле профессия объязательно для заполнения',
            'email.email' => 'Не корректный Email',
            'password.required' => 'Поле пароль объязательно для заполнения',
            'password.min' => 'Пароль должен больше 6',
            'image.file' => 'Поле должно быть файлом.',
            'image.image' => 'Поле должно быть изображением',
        ];

        return $messages;
    }
}
