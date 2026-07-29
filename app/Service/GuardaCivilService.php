<?php

namespace App\Service;

use App\Models\GuardaCivil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;




class GuardaCivilService
{

    private $guardarArquivoService;

    public function __construct(GuardarArquivoService $guardarArquivoService)
    {
        $this->guardarArquivoService = $guardarArquivoService;
    }


    public function CriarGuardaEmDB($dadosDoGCM)
    {
        try {
            DB::beginTransaction();

            $caminhoFoto = null;

            if (isset($dadosDoGCM['foto'])) {
                $caminhoFoto = $this->guardarArquivoService->guardarArquivo($dadosDoGCM['foto'], 'guardas/fotos');
            }

            GuardaCivil::create([
                'nome' => $dadosDoGCM['nome'],
                'matricula' => $dadosDoGCM['matricula'],
                'cpf' => $dadosDoGCM['cpf'],
                'caminho_foto' => $caminhoFoto,
            ]);

            DB::commit();

            Log::info('Guarda Civil criado com sucesso.');

        } catch (\Exception $e) {
            Log::error('Erro ao criar guarda civil em Banco de Dados: ' . $e->getMessage());

            if ($caminhoFoto) {
                $this->guardarArquivoService->excluirArquivo($caminhoFoto);
            }

            DB::rollBack();
            throw $e;
        }
    }
}