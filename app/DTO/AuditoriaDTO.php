<?php

namespace App\DTO;

class AuditoriaDTO
{
    public function __construct(
        public $status,
        public $usuario,
        public $ip,
        public $descricao,
        public $objeto_alterado,
        public $objeto_id
    ){}
}