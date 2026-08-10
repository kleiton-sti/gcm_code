<?php

namespace App\Service;

use App\DTO\AuditoriaDTO;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class UsuariosService
{
    private $auditoriaService;

    public function __construct(AuditoriaService $auditoriaService)
    {
        $this->auditoriaService = $auditoriaService;
    }

    public function cadastrarNovosUsuarioEmDB($informacoesDoUsuario)
    {
        try {

            DB::beginTransaction();

            $novoUsuario = User::create([
                'nome' => $informacoesDoUsuario['nome'],
                'matricula' => $informacoesDoUsuario['matricula'],
                'email' => $informacoesDoUsuario['email'],
                'cpf' => $informacoesDoUsuario['cpf'],
                'password' => bcrypt($informacoesDoUsuario['password']),
                'tipo' => $informacoesDoUsuario['tipo'],
            ]);

            $dto = new AuditoriaDTO(
                'sucesso',
                Auth()->user()->nome,
                request()->ip(),
                'Tentou cadastrar um novo usuário',
                json_encode($informacoesDoUsuario),
                $novoUsuario->id ?? null
            );

            $this->auditoriaService->registrarAcao($dto);

            DB::commit();

            Log::info('Usuário cadastrado com sucesso.');
        } catch (\Exception $e) {
            Log::error('Erro ao cadastrar novo usuário em Banco de Dados: ', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}