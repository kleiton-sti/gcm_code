<?php

namespace App\Http\Requests;


use App\Rules\ValidadorDeCpf;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class CadastroNovosUsuariosRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->user()->tipo == 'stii' ? true : false;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'nome' => mb_convert_case(preg_replace('/\s+/', ' ', trim($this->nome)), MB_CASE_TITLE, 'UTF-8'),
            'matricula' => trim($this->matricula),
            'email' => mb_strtolower(trim($this->email), 'UTF-8'),
            'cpf' => preg_replace('/\D/', '', $this->cpf),
            'motivo_delete' => trim($this->motivo_delete),
        ]);

    }


    public function rules(): array
    {    

        return [
            'nome' => ['required', 'string', 'min:5', 'max:50', 'regex:/^[\pL\s\'-]+$/u'],
            'matricula' => ['string', 'max:10', 'regex:/^\d+$/', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'cpf' => [
                'required',
                'string',
                'max:11',
                'unique:users',
                new ValidadorDeCpf(),
            ],
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()], // Have I Been Pwned
            'motivo_delete' => ['string', 'min:5', 'max:255'],
            'tipo' => ['required', Rule::in(['stii', 'semob', 'terceirizado'])],
        ];

    }


    public function messages(): array
    {

        return [
            'nome.required' => 'O Nome é obrigatório.',
            'nome.min' => 'O Nome deve ter no mínimo 5 caracteres.',
            'nome.max' => 'O Nome deve ter no máximo 50 caracteres.',
            'nome.regex' => 'O campo Nome deve conter apenas letras',
            'matricula.max' => 'O campo Matrícula deve ter no máximo 10 caracteres.',
            'matricula.regex' => 'O campo Matrícula deve conter apenas números.',
            'email.required' => 'O E-mail é obrigatório.',
            'email.email' => 'O E-mail deve ser um endereço de e-mail válido.',
            'email.unique' => 'O E-mail já está cadastrado.',
            'email.max' => 'O E-mail deve ter no máximo 50 caracteres.',
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.max' => 'O CPF deve ter no máximo 11 caracteres.',
            'cpf.unique' => 'O CPF já está cadastrado.',
            'cpf.regex' => 'O CPF deve conter apenas números.',
            'cpf.validaCpf' => 'O CPF informado é inválido.',
            'password.required' => 'A Senha é obrigatória.',
            'password.confirmed' => 'As Senhas devem ser iguais.',
            'password.min' => 'A Senha deve ter no mínimo 8 caracteres.'
        ];
    }
}