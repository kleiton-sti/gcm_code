<?php

namespace App\Http\Controllers;

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


  public function encaminharParaIndex() {
    try{
      $guardasCivis = $this->obterGuardasDoDB();
      return view('gcm.index', compact('guardasCivis'));

    } catch (\Throwable $e) {
      Log::warning('Erro ao exibir guardas civis: ', ['error' => $e->getMessage()]);
      return redirect()->back()->with('error', 'Ocorreu um erro ao exibir os guardas civis.');
    }
  }

  //ações disparadas pelos botõem na lista de guardas civis
  public function visualizarDadosDoGCM($id) {
    try{
      $guarda = GuardaCivil::find($id);
      return view('gcm.show', compact('guarda'));
    }
    catch (\Throwable $e) {
      Log::warning('Erro ao exibir dados do GCM: ', ['error' => $e->getMessage()]);
      return redirect()->route('home')->with('error', 'Ocorreu um erro ao exibir os dados do GCM.');
    }
  }

  private function obterGuardasDoDB() {
    try{
      return GuardaCivil::orderBy('nome')->paginate(20);
    }
    catch (\Throwable $e) {
      Log::warning('Erro ao exibir guardas civis: ', ['error' => $e->getMessage()]);
    }
  }

  

}