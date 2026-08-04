<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtualizarRegistroGCMRequest;
use App\Http\Requests\InativacaoDeGCMRequest;
use App\Http\Requests\RegistroDeGCMRequest;
use App\Models\GuardaCivil;
use App\Service\GuardaCivilService;
use Illuminate\Support\Facades\Log;


class GuardaCivilController extends Controller
{

  private $guardaCivilService;

  public function __construct(GuardaCivilService $guardaCivilService)
  {
    $this->guardaCivilService = $guardaCivilService;
  }



  public function encaminharParaIndex()
  {
    try {
      $guardasCivis = $this->guardaCivilService->obterGuardasDoDB();

      return view('gcm.index', compact('guardasCivis'));

    } catch (\Throwable $e) {
      Log::warning('Erro ao exibir guardas civis: ', ['error' => $e->getMessage()]);
      return redirect()->back()->with('error', 'Ocorreu um erro ao exibir os guardas civis.');
    }
  }


  public function registrarGCM(RegistroDeGCMRequest $informacoesDoGCM)
  {
    try {
      $dados = $informacoesDoGCM->validated();
      $this->guardaCivilService->CriarGuardaEmDB($dados);
      return redirect()->route('regsitroGCM')->with('success', 'Guarda Civil cadastrado com sucesso.');

    } catch (\Throwable $e) {
      Log::warning('Erro ao registrar GCM: ', ['error' => $e->getMessage()]);
      return back()
        ->withInput()
        ->withErrors(['error', 'Ocorreu um erro ao registrar o GCM.']);
    }
  }


  //ações disparadas pelos botõem na lista de guardas civis


  public function visualizarDadosDoGCM($token)
  {

    try {
      $guarda = $this->guardaCivilService->obterGuardaPorTokenComInativos($token);
      return view('gcm.show', compact('guarda'));

    } catch (\Throwable $e) {
      Log::warning('Erro ao exibir dados do GCM: ', ['error' => $e->getMessage()]);
      return redirect()->route('home')->with('error', 'Ocorreu um erro ao exibir os dados do GCM.');
    }
  }

  public function exibirBladeDeEdicao($id)
  {
    try {
      $guarda = $this->guardaCivilService->obterGuardaPorIdComInativos($id);
      return view('gcm.edit', compact('guarda'));

    } catch (\Throwable $e) {
      Log::warning('Erro ao exibir dados do GCM: ', ['error' => $e->getMessage()]);
      return redirect()->route('home')->with('error', 'Ocorreu um erro ao exibir os dados do GCM.');
    }
  }

  public function atualizarDadosDoGCM(AtualizarRegistroGCMRequest $informacoesDoGCM, $id)
  {
    try {
      $guarda = $informacoesDoGCM->validated();
      $this->guardaCivilService->atualizarGuardaEmDB($guarda, $id);
      return redirect()->route('home')->with('success', 'Guarda Civil atualizado com sucesso.');

    } catch (\Throwable $e) {
      Log::warning('Erro ao atualizar GCM: ', ['error' => $e->getMessage()]);
      return redirect()->route('home')->with('error', 'Ocorreu um erro ao atualizar o GCM. Verifique se ja existe um GCM com o mesmo dado.');
    }
  }


  public function inativarGCM(InativacaoDeGCMRequest $request, $id)
  {
    try {
      $motivo = $request->validated()['motivo_delete'];
      $this->guardaCivilService->excluirGuardaEmDB($motivo, $id);
      return redirect()->route('home')->with('success', 'Guarda Civil excluido com sucesso.');

    } catch (\Throwable $e) {
      Log::warning('Erro ao excluir GCM: ', ['error' => $e->getMessage()]);
      return redirect()->route('home')->with('error', 'Ocorreu um erro ao excluir o GCM.');
    }
  }



}