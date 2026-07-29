<?php

namespace App\Service;

class GuardarArquivoService
{
     public function guardarArquivo($file, $path) {
        $file->move($path, $file->getClientOriginalName());
        return $path . '/' . $file->getClientOriginalName();
    }

    public function excluirArquivo($path) {
        if (file_exists($path)) {
            unlink($path);
        }
    }
}