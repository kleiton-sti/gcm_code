<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuardaCivil extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'guardas_civil';

    protected $fillable = [
        'token',
        'nome',
        'cpf',
        'rg',
        'data_nascimento',
        'nome_mae',
        'nome_pai',
        'cidade',
        'uf',
        'tipo_sanguineo',
        'cargo',
        'porte',
        'afiliacao',
        'matricula',
        'admissao',
        'expedicao',
        'validade',
        'caminho_foto',
        'motivo_delete',
    ];

    protected function cast(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }


    public function getCpfFormatadoAttribute()
    {
        $cpf = preg_replace('/\D/', '', $this->cpf);

        $cpf_formatado = substr($cpf, 0, 3) . '.***.***-' . substr($cpf, -2);

        return $cpf_formatado;
    }

    public function getRgFormatadoAttribute()
    {
        $rg = preg_replace('/\D/', '', $this->rg);

        $rg_formatado = substr($rg, 0, 2) . '.***.***-' . substr($rg, -1);

        return $rg_formatado;
    }

    public function getDataNascimentoFormatadaAttribute()
    {
        return date('d/m/Y', strtotime($this->data_nascimento));
    }
}