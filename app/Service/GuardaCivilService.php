<?php

namespace App\Service;

use App\DTO\AuditoriaDTO;
use App\Models\GuardaCivil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;




class GuardaCivilService
{

    private $guardarArquivoService;
    private $auditoriaService;

    public function __construct(GuardarArquivoService $guardarArquivoService, AuditoriaService $auditoriaService)
    {
        $this->guardarArquivoService = $guardarArquivoService;
        $this->auditoriaService = $auditoriaService;
    }


    public function criarGuardaEmDB($dadosDoGCM)
    {
        try {
            $caminhoFoto = null;

            DB::beginTransaction();

            if (isset($dadosDoGCM['foto'])) {
                $caminhoFoto = $this->guardarArquivoService->guardarArquivo('guardas/fotos', $dadosDoGCM['foto']);
            }

            $NovoRegistro = GuardaCivil::create([
                'token' => hash('sha256', $dadosDoGCM['cpf']),
                'nome' => $dadosDoGCM['nome'],
                'cpf' => $dadosDoGCM['cpf'],
                'rg' => $dadosDoGCM['rg'],
                'data_nascimento' => $dadosDoGCM['data_nascimento'],
                'nome_mae' => $dadosDoGCM['nome_mae'],
                'nome_pai' => $dadosDoGCM['nome_pai'],
                'cidade' => $dadosDoGCM['cidade'],
                'uf' => $dadosDoGCM['uf'],
                'tipo_sanguineo' => $dadosDoGCM['tipo_sanguineo'],
                'cargo' => $dadosDoGCM['cargo'],
                'porte' => $dadosDoGCM['porte'],
                'afiliacao' => $dadosDoGCM['afiliacao'],
                'matricula' => $dadosDoGCM['matricula'],
                'admissao' => $dadosDoGCM['admissao'],
                'expedicao' => $dadosDoGCM['expedicao'],
                'validade' => $dadosDoGCM['validade'],
                'caminho_foto' => $caminhoFoto,
            ]);
            
            $dto = new AuditoriaDTO(
                'sucesso',
                auth()->user()->nome,
                request()->ip(),
                'Tentativa de registro de Guarda Civil',
                json_encode($dadosDoGCM),
                $NovoRegistro->id ?? null
            );

            $this->auditoriaService->registrarAcao($dto);

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
            $caminhoFoto = null;

            DB::beginTransaction();

            $dadosAnteriorDoGCM = GuardaCivil::findOrFail($id);


            if (isset($guarda['foto']) && $guarda['foto'] != $dadosAnteriorDoGCM->caminho_foto) {
                $this->guardarArquivoService->excluirArquivo($dadosAnteriorDoGCM->caminho_foto);
                $caminhoFoto = $this->guardarArquivoService->guardarArquivo('guardas/fotos', $guarda['foto']);
            }

            GuardaCivil::where('id', $id)->update([
                'token' => hash('sha256', $guarda['cpf']),
                'nome' => $guarda['nome'],
                'cpf' => $guarda['cpf'],
                'rg' => $guarda['rg'],
                'data_nascimento' => $guarda['data_nascimento'],
                'nome_mae' => $guarda['nome_mae'],
                'nome_pai' => $guarda['nome_pai'],
                'cidade' => $guarda['cidade'],
                'uf' => $guarda['uf'],
                'tipo_sanguineo' => $guarda['tipo_sanguineo'],
                'cargo' => $guarda['cargo'],
                'porte' => $guarda['porte'],
                'afiliacao' => $guarda['afiliacao'],
                'matricula' => $guarda['matricula'],
                'admissao' => $guarda['admissao'],
                'expedicao' => $guarda['expedicao'],
                'validade' => $guarda['validade'],
                'caminho_foto' => $caminhoFoto ?? $dadosAnteriorDoGCM->caminho_foto,
            ]);

            $dto = new AuditoriaDTO(
                'sucesso',
                auth()->user()->nome,
                request()->ip(),
                'Tentativa de atualização de Guarda Civil',
                json_encode($guarda),
                $dadosAnteriorDoGCM->id ?? null
            );

            $this->auditoriaService->registrarAcao($dto);

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

            $dto = new AuditoriaDTO(
                'sucesso',
                auth()->user()->nome,
                request()->ip(),
                'Tentativa de exclusão de Guarda Civil',
                json_encode($guarda),
                $id ?? null
            );

            $this->auditoriaService->registrarAcao($dto);

            DB::commit();

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

    public function obterGuardasAtivosDoDB()
    {
        return GuardaCivil::orderBy('nome')
            ->get();
    }

    public function obterGuardaPorTokenComInativos($token): GuardaCivil
    {
        return GuardaCivil::withTrashed()->where('token', $token)
            ->firstOrFail();
    }

    public function obterGuardaPorIdComInativos($id): GuardaCivil
    {
        return GuardaCivil::withTrashed()->findOrFail($id);
    }

}