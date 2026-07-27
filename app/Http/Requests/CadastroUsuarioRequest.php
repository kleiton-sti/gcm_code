<?php

namespace App\Http\Requests;

use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;

class CadastroRequest extends FormRequest
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
        return [
            'nome' => ['required', 'string', 'min:5'],
            'matricula' => ['required', 'integer', 'unique:users,matricula'],
            'email' => ['required', 'email', 'unique:users,email'],
            'cpf' => ['required', 'string', 'unique:users,cpf'],
            'senha' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W)\S+$/', // Ao menos uma letra minúscula, uma letra maiúscula, um número e um caractere especial que não seja espaço
            ],
            'admin' => ['nullable', 'boolean'],
            'dpo' => ['nullable', 'boolean'],
        ];
    }

  
    protected function prepareForValidation()
    {
        $nome = $this->nome;

        // 1. Remover acentos
        $nome = iconv('UTF-8', 'ASCII//TRANSLIT', $nome);

        // 2. Remover tudo que não seja letra ou espaço
        $nome = preg_replace('/[^a-zA-Z\s]/', '', $nome);

        // 3. Remover espaços duplicados e trim
        $nome = preg_replace('/\s+/', ' ', $nome); 
        $nome = trim($nome);

        $cpf = $this->cpf;

        if (!$this->validaCpf($cpf)) {
            throw ValidationException::withMessages([
                'cpf' => 'O CPF é inválido.',
            ]);
        };

        $this->merge([
            'nome' => $nome,
        ]);
    }

      public function validaCpf($cpf) {
    
        // Remove tudo que não for número
        $cpf = preg_replace('/\D/', '', $cpf);

        // Verifica se tem 11 dígitos
        if (strlen($cpf) != 11) return false;

        // Elimina CPFs inválidos conhecidos
        if ($cpf === "00000000000") return false;

        // Cálculo do primeiro dígito
        $soma = 0;
        for ($i = 1; $i <= 9; $i++) {
            $soma += intval(substr($cpf, $i - 1, 1)) * (11 - $i);
        }
        $resto = ($soma * 10) % 11;
        if ($resto == 10 || $resto == 11) $resto = 0;
        if ($resto != intval(substr($cpf, 9, 1))) return false;

        // Cálculo do segundo dígito
        $soma = 0;
        for ($i = 1; $i <= 10; $i++) {
            $soma += intval(substr($cpf, $i - 1, 1)) * (12 - $i);
        }
        $resto = ($soma * 10) % 11;
        if ($resto == 10 || $resto == 11) $resto = 0;
        if ($resto != intval(substr($cpf, 10, 1))) return false;

        return true;    
    }



    public function messages(): array
    {
        return [
            'secretaria_responsavel.required' => 'O campo Secretaria Responsável é obrigatório.',
            'nome.min' => 'O campo Nome deve ter pelo menos 5 caracteres e conter apenas letras.',
            'nome.regex' => 'O campo Nome deve conter apenas letras.',
            'nome.required' => 'O campo Nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.unique' => 'O CPF já está cadastrado.',
            'cpf.validaCpf' => 'O CPF é inválido.',
            'senha.required' => 'O campo senha é obrigatório.',
            'senha.min' => 'A senha deve ter pelo menos 8 caracteres.',
            'confirmar_senha.same' => 'A confirmação de senha não coincide.',
            'senha.regex' => 'A senha deve conter letras maiúsculas, minúsculas, números e caracteres especiais.',
        ];
    }
}