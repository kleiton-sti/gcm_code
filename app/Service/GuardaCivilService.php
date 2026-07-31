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


    public function atualizarGuardaEmDB($guarda, $id)
    {
        try {
            DB::beginTransaction();

            $caminhoFoto = null;

            $dadosAnteriorDoGCM = GuardaCivil::findOrFail($id);


            if (isset($guarda['foto']) && $guarda['foto'] != $dadosAnteriorDoGCM->first()->caminho_foto) {
                $this->guardarArquivoService->excluirArquivo($dadosAnteriorDoGCM->first()->caminho_foto);
                $caminhoFoto = $this->guardarArquivoService->guardarArquivo($guarda['foto'], 'guardas/fotos');
            }

            GuardaCivil::where('id', $id)->update([
                'nome' => $guarda['nome'],
                'matricula' => $guarda['matricula'],
                'cpf' => $guarda['cpf'],
                'caminho_foto' => $caminhoFoto,
            ]);

            DB::commit();

            Log::info('Guarda Civil atualizado com sucesso.');

        } catch (\Exception $e) {
            Log::error('Erro ao atualizar guarda civil em Banco de Dados: ' . $e->getMessage());

            if ($caminhoFoto) {
                $this->guardarArquivoService->excluirArquivo($caminhoFoto);
            }

            DB::rollBack();
            throw $e;
        }
    }


    public function excluirGuardaEmDB($motivo, $id)
    {
        try {

            DB::beginTransaction();

            $guarda = GuardaCivil::find($id);
            $caminhoFoto = $guarda->caminho_foto;

            GuardaCivil::where('id', $id)->update([
                'motivo_delete' => $motivo,
            ]);

            GuardaCivil::where('id', $id)->delete();

            DB::commit();

            if ($caminhoFoto != null)
                $this->guardarArquivoService->excluirArquivo($caminhoFoto);

            Log::info('Guarda Civil excluido com sucesso.');

        } catch (\Exception $e) {
            Log::error('Erro ao excluir guarda civil em Banco de Dados: ' . $e->getMessage());
            DB::rollBack();
            throw $e;
        }
    }

    public function obterGuardasDoDB()
    {
        return GuardaCivil::withTrashed()
            ->orderBy('nome')
            ->get();
    }


    public function obterGuardaPorIdComInativos(int $id): GuardaCivil
    {
        return GuardaCivil::withTrashed()->findOrFail($id);
    }

}