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


    public function CriarGuardaEmDB($informacoesDoGCM)
    {
        try {
            $caminhoFoto = null;

            if($informacoesDoGCM->foto){
                $caminhoFoto = $this->guardarArquivoService->guardarArquivo($informacoesDoGCM->foto, 'guardas/fotos');
            }

            DB::beginTransaction();

            GuardaCivil::create([
                'nome' => $informacoesDoGCM->nome,
                'matricula' => $informacoesDoGCM->matricula,
                'cpf' => $informacoesDoGCM->cpf,
                'foto' => $caminhoFoto,
            ]);

            DB::commit();

            Log::info('Guarda Civil criado com sucesso.');

        } catch (\Exception $e) {
            Log::error('Erro ao criar guarda civil em Banco de Dados: ' . $e->getMessage());

            if($caminhoFoto){
                $this->guardarArquivoService->excluirArquivo($caminhoFoto);
            }

            DB::rollBack();
            throw $e;
        }
    }
}