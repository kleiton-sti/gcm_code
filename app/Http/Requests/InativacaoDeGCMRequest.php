<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InativacaoDeGCMRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->tipo == 'terceirizado' ? false : true;
    }

    public function rules(): array
    {
       return [
        'motivo_delete' => ['required', 'string', 'min:10', 'max:255'],
       ];
    }

    public function messages() {
        return [
            'motivo_delete.required' => 'O motivo da inativação é obrigatório.',
            'motivo_delete.min' => 'O motivo da inativação deve ter no mínimo 10 caracteres.',
            'motivo_delete.max' => 'O motivo da inativação deve ter no máximo 255 caracteres.',
        ];
    }
}