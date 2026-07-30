<?php

namespace App\Service;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class GuardarArquivoService
{
    public function guardarArquivo($caminho, $arquivo)
    {
        try {
            $novoNome = $this->renomearArquivo($arquivo);
            return $arquivo->storeAs($caminho,$novoNome, 'public');
        } catch (\Exception $e) {
            Log::error('Erro ao salvar o arquivo: ', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
 

    public function excluirArquivo($caminho)
    {
        try {
            if (Storage::disk('public')->exists($caminho)) {
                Storage::disk('public')->delete($caminho);
            }
        } catch (\Exception $e) {
            Log::error('Erro ao excluir o arquivo: ', ['error' => $e->getMessage()]);
            throw $e;
        }
    }



    private function renomearArquivo($arquivo) {
        $novoNome = now()->format('Y-m-d') . '-' . $arquivo->getClientOriginalName();
        return $novoNome;
    }
}