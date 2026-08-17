<?php

namespace App\Http\Requests;

use App\Rules\ValidadorDeCpf;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistroDeGCMRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->user()->tipo == 'terceirizado' ? false : true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'nome' => mb_convert_case(preg_replace('/\s+/', ' ', trim($this->nome)), MB_CASE_TITLE, 'UTF-8'),
            'cpf' => preg_replace('/\D/', '', $this->cpf),
            'rg' => preg_replace('/\D/', '', $this->rg),
            'data_nascimento' => date('Y-m-d', strtotime($this->data_nascimento)),
            'nome_mae' => mb_strtoupper(trim($this->nome_mae)),
            'nome_pai' => mb_strtoupper(trim($this->nome_pai)),
            'naturalidade' => preg_replace(
                '/[^a-zA-ZÀ-ÿ\s]/u',
                '',
                mb_strtoupper(trim($this->naturalidade))
            ),
            'estado' => mb_strtoupper(trim($this->estado)),
            'tipo_sanguineo' => mb_strtoupper(trim($this->tipo_sanguineo)),
            'cargo' => mb_strtoupper(trim($this->cargo)),
            'porte' => mb_strtoupper(trim($this->porte)),
            'afiliacao' => mb_strtoupper(trim($this->afiliacao)),
            'matricula' => trim($this->matricula),
            'admissao' => date('Y-m-d', strtotime($this->admissao)),
            'expedicao' => date('Y-m-d', strtotime($this->expedicao)),
            'validade' => date('Y-m-d', strtotime($this->validade)),
        ]);
    }

    public function rules(): array
    {

        return [
            'nome' => ['required', 'string', 'min:5', 'max:50', 'regex:/^[\pL\s\'-]+$/u'],
            'cpf' => ['required', 'string', 'max:11', 'unique:guardas_civil', new ValidadorDeCpf()],
            'rg' => ['required', 'string', 'max:9', 'unique:guardas_civil'],
            'data_nascimento' => ['required', 'date'],
            'nome_mae' => ['required', 'string', 'max:50', 'regex:/^[\pL\s\'-]+$/u'],
            'nome_pai' => ['required', 'string', 'max:50', 'regex:/^[\pL\s\'-]+$/u'],
            'naturalidade' => ['required', 'string', 'max:50', 'regex:/^[\pL\s\'-]+$/u'],
            'estado' => ['required', 'string', 'max:50', 'regex:/^[\pL\s\'-]+$/u'],
            'tipo_sanguineo' => ['required', Rule::in(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])],
            'cargo' => ['required', 'string', 'max:50', 'regex:/^[\pL\s\'-]+$/u'],
            'porte' => ['required', 'string', 'max:50'],
            'afiliacao' => ['required', 'string', 'max:50'],
            'matricula' => ['required', 'string', 'max:10', 'regex:/^\d+$/', 'unique:guardas_civil'],
            'admissao' => ['required', 'date'],
            'expedicao' => ['required', 'date'],
            'validade' => ['required', 'date'],
            'foto' => ['image', 'mimes:jpeg,png,jpg', 'max:10240'],
        ];

    }

    public function messages()
    {
        return [
            'nome.required' => 'O Nome é obrigatório.',
            'nome.min' => 'O Nome deve ter no mínimo 5 caracteres.',
            'nome.max' => 'O Nome deve ter no máximo 50 caracteres.',
            'nome.regex' => 'O campo Nome deve conter apenas letras.',

            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.max' => 'O CPF deve ter no máximo 11 caracteres.',
            'cpf.unique' => 'O CPF já está cadastrado.',
            'cpf.regex' => 'O CPF deve conter apenas números.',
            'cpf.validaCpf' => 'O CPF informado é inválido.',

            'rg.required' => 'O RG é obrigatório.',
            'rg.max' => 'O RG deve ter no máximo 9 caracteres.',
            'rg.unique' => 'O RG já está cadastrado.',

            'data_nascimento.required' => 'A Data de Nascimento é obrigatória.',

            'nome_mae.required' => 'O Nome da Mãe é obrigatório.',
            'nome_mae.max' => 'O Nome da Mãe deve ter no máximo 50 caracteres.',
            'nome_mae.regex' => 'O Nome da Mãe deve conter apenas letras.',

            'nome_pai.required' => 'O Nome do Pai é obrigatório.',
            'nome_pai.max' => 'O Nome do Pai deve ter no máximo 50 caracteres.',
            'nome_pai.regex' => 'O Nome do Pai deve conter apenas letras.',

            'naturalidade.required' => 'A Naturalidade é obrigatória.',
            'naturalidade.max' => 'A Naturalidade deve ter no máximo 50 caracteres.',
            'naturalidade.regex' => 'A Naturalidade deve conter apenas letras.',

            'estado.required' => 'O Estado é obrigatório.',
            'estado.max' => 'O Estado deve ter no máximo 50 caracteres.',
            'estado.regex' => 'O Estado deve conter apenas letras.',

            'tipo_sanguineo.required' => 'O Tipo Sanguíneo é obrigatório.',

            'cargo.required' => 'O Cargo é obrigatório.',
            'cargo.max' => 'O Cargo deve ter no máximo 50 caracteres.',
            'cargo.regex' => 'O Cargo deve conter apenas letras.',

            'porte.required' => 'O Porte é obrigatório.',
            'porte.max' => 'O Porte deve ter no máximo 50 caracteres.',

            'afiliacao.required' => 'A Afiliação é obrigatória.',
            'afiliacao.max' => 'A Afiliação deve ter no máximo 50 caracteres.',

            'matricula.required' => 'A Matrícula é obrigatória.',
            'matricula.max' => 'A Matrícula deve ter no máximo 10 caracteres.',
            'matricula.regex' => 'A Matrícula deve conter apenas números.',
            'matricula.unique' => 'A Matrícula já está cadastrada.',

            'admissao.required' => 'A Data de Admissão é obrigatória.',

            'expedicao.required' => 'A Data de Expedição é obrigatória.',

            'validade.required' => 'A Data de Validade é obrigatória.',

        ];
    }
}