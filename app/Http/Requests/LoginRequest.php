<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'email' => mb_strtolower(trim($this->email), 'UTF-8'),
        ]);
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'O E-mail é obrigatório.',
            'email.email' => 'O E-mail deve ser um endereço de e-mail válido.',
            'email.unique' => 'O E-mail já está cadastrado.',
            'email.max' => 'O E-mail deve ter no máximo 50 caracteres.',
            'password.required' => 'A Senha é obrigatória.',
            'password.min' => 'A Senha deve ter no mínimo 8 caracteres.',
        ];
    }
}