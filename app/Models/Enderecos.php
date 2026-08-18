<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    use HasFactory;

    protected $table = 'enderecos';

    protected $fillable = ['codigo_ibge', 'cidade', 'uf'];


    public function scopePorUf($query, $uf) {
        return $query->where('uf', $uf);
    }


}