<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class ValidadorDeCpf implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $cpf = preg_replace('/\D/', '', $value);

        if (!$this->validarCpf($cpf)) {
            $fail('O CPF informado é inválido.');
        }
    }

   private function validarCpf(string $cpf): bool
{
    // Remove tudo que não for número
    $cpf = preg_replace('/\D/', '', $cpf);

    // Verifica se possui 11 dígitos
    if (strlen($cpf) !== 11) {
        return false;
    }

    // Elimina CPFs inválidos conhecidos
    if ($cpf === '00000000000') {
        return false;
    }

    // Calcula primeiro dígito verificador
    $somaPrimeiroDigito = 0;

    for ($posicao = 1; $posicao <= 9; $posicao++) {
        $somaPrimeiroDigito += intval(substr($cpf, $posicao - 1, 1)) * (11 - $posicao);
    }

    $restoPrimeiroDigito = ($somaPrimeiroDigito * 10) % 11;

    if ($restoPrimeiroDigito >= 10) {
        $restoPrimeiroDigito = 0;
    }

    $primeiroDigitoInformado = intval(substr($cpf, 9, 1));

    if ($restoPrimeiroDigito !== $primeiroDigitoInformado) {
        return false;
    }


    // Calcula segundo dígito verificador
    $somaSegundoDigito = 0;

    for ($posicao = 1; $posicao <= 10; $posicao++) {
        $somaSegundoDigito += intval(substr($cpf, $posicao - 1, 1)) * (12 - $posicao);
    }

    $restoSegundoDigito = ($somaSegundoDigito * 10) % 11;

    if ($restoSegundoDigito >= 10) {
        $restoSegundoDigito = 0;
    }

    $segundoDigitoInformado = intval(substr($cpf, 10, 1));

    if ($restoSegundoDigito !== $segundoDigitoInformado) {
        return false;
    }

    return true;
}

}
