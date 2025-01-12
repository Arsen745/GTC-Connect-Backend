<?php

namespace app\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
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
            'email' => 'required',
            'password' => 'required',
        ];
        return $rules;
    }

    public function messages() {
        $messages = [
            'email.required' => 'Поля email объязательно для заполнения',
            'password.required' => 'Поля пароль объязательно для заполнения'
        ];

        return $messages;
    }
}
