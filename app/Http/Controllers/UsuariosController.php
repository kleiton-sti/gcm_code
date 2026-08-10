<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroNovosUsuariosRequest;
use App\Service\UsuariosService;
use Illuminate\Support\Facades\Log;

class UsuariosController extends Controller
{
    private $usuariosService;

    public function __construct(UsuariosService $usuariosService)
    {
        $this->usuariosService = $usuariosService;
    }

    public function abrirPaginaDeCadastro()
    {
        return view('usuarios.create');
    }

    public function realizarCadastro(CadastroNovosUsuariosRequest $informacoesDoUsuario)
    {
        try {
            $informacoesDoUsuario = $informacoesDoUsuario->validated();
            $this->usuariosService->cadastrarNovosUsuarioEmDB($informacoesDoUsuario);
            return redirect()->route('paginaDeCadastro')->with('success', 'Usuário cadastrado com sucesso.');

        } catch (\Throwable $e) {
            Log::warning('Erro ao cadastrar novo usuário: ', ['error' => $e->getMessage()]);
            return redirect()->route('paginaDeCadastro')
                ->withInput()
                ->withErrors(['error', 'Ocorreu um erro ao registrar o GCM.']);
        }
    }
}