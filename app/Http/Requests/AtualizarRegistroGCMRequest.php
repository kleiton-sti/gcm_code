<?php

namespace App\Http\Requests;

use App\Rules\ValidadorDeCpf;
use Illuminate\Foundation\Http\FormRequest; 

class AtualizarRegistroGCMRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->tipo == 'terceirizado' ? false : true;
    }

    public function prepareForValidation(): void
    {
         $this->merge([
            'nome' => mb_convert_case(preg_replace('/\s+/', ' ', trim($this->nome)), MB_CASE_TITLE, 'UTF-8'),
            'matricula' => trim($this->matricula),
            'cpf' => preg_replace('/\D/', '', $this->cpf),
        ]);
    }

    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'min:5', 'max:50', 'regex:/^[\pL\s\'-]+$/u'],
            'matricula' => ['required','string', 'max:10', 'regex:/^\d+$/'],
            'cpf' => ['required','string', 'max:11', new ValidadorDeCpf()],
            'foto' => ['image', 'mimes:jpeg,png,jpg', 'max:10240'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O Nome é obrigatório.',
            'nome.min' => 'O Nome deve ter no mínimo 5 caracteres.',
            'nome.max' => 'O Nome deve ter no máximo 50 caracteres.',
            'nome.regex' => 'O campo Nome deve conter apenas letras.',
            'matricula.required' => 'A Matrícula é obrigatória.',
            'matricula.max' => 'A Matrícula deve ter no máximo 10 caracteres.',
            'matricula.regex' => 'A Matrícula deve conter apenas números.',
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.max' => 'O CPF deve ter no máximo 11 caracteres.',
            'cpf.unique' => 'O CPF já está cadastrado.',
            'cpf.regex' => 'O CPF deve conter apenas números.',
            'cpf.validaCpf' => 'O CPF informado é inválido.',
            'foto.image' => 'A Foto deve ser uma imagem.',
            'foto.mimes' => 'A Foto deve ser no formato JPEG, PNG ou JPG.',
            'foto.max' => 'A Foto deve ter no máximo 2MB.', 
        ];
    }
}