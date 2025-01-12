<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAdminStore extends FormRequest
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
            'email.required' => 'Поле email обьзательно для заполнени',
            'password.required' => 'Поле email обьзательно для заполнени'
        ];

        return $messages;
    }
}
