<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    use HasFactory;

    protected $table = 'auditoria_dados';

    protected $fillable = ['status', 'usuario', 'ip', 'descricao', 'objeto_alterado', 'objeto_id'];
}