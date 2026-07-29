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
        'nome',
        'matricula',
        'cpf',
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
}