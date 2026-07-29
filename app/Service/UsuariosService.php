<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UsuariosService
{
    public function cadastrarNovosUsuarioEmDB($informacoesDoUsuario) {

        try{
            DB::beginTransaction();

            User::create([
                'nome' => $informacoesDoUsuario['nome'],
                'matricula' => $informacoesDoUsuario['matricula'],
                'email' => $informacoesDoUsuario['email'],
                'cpf' => $informacoesDoUsuario['cpf'],
                'password' => bcrypt($informacoesDoUsuario['password']),
                'tipo' => $informacoesDoUsuario['tipo'],
            ]);

            DB::commit();

            Log::info('Usuário cadastrado com sucesso.');
        }
        catch(\Exception $e){
            Log::error('Erro ao cadastrar novo usuário em Banco de Dados: ', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}