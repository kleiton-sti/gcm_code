<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroDeGCMRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GuardaCivilController extends Controller
{
  public function exibirRegistroGCMForm() {
    return view('formulario-de-registroGCM');
  }

  public function registrarGCM(RegistroDeGCMRequest $request) {
    // lógica para chamar o service
    return response()->json(['success' => true, 'message' => 'Guarda Civil cadastrado com sucesso!'], 200);
  }

}