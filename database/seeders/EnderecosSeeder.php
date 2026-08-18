<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnderecosSeeder extends Seeder
{
    /**
     * Caminho do CSV, relativo à raiz do projeto.
     * Coloque o arquivo em: database/seeders/data/municipios.csv
     */
    private string $csvPath = 'database/seeders/Data/municipios.csv';

    /**
     * Quantidade de registros por insert em lote.
     */
    private int $RegistrosInseridoPorVez = 500;

    public function run(): void
    {
        $fullPath = base_path($this->csvPath);

        if (!file_exists($fullPath)) {
            $this->command->error("Arquivo não encontrado: {$fullPath}");
            return;
        }

        $LeituraLinhaPorLinha = fopen($fullPath, 'r');

        $delimitador = ';';

        $cabecalho = fgetcsv($LeituraLinhaPorLinha, 0, $delimitador);
        $cabecalho = array_map(
            fn($col) => strtolower(trim($col)),
            $cabecalho
        );

        $idxCodigoIbge = array_search('codigo_ibge', $cabecalho);
        $idxCidade = array_search('cidade', $cabecalho);
        $idxUf = array_search('uf', $cabecalho);

        if ($idxCodigoIbge === false || $idxCidade === false || $idxUf === false) {
            $this->command->error('CSV precisa conter as colunas: codigo_ibge, cidade, uf.');
            fclose($LeituraLinhaPorLinha);
            return;
        }

        // limpa a tabela em caso de rodar o seeder novamente
        DB::table('enderecos')->truncate();

        $buffer = [];
        $total = 0;
        $now = now();


        while (($cadaLinha = fgetcsv($LeituraLinhaPorLinha, 0, $delimitador)) !== false) {

            if (!isset($cadaLinha[$idxCidade])) {
                continue;
            }

            $buffer[] = [
                'codigo_ibge' => (int) $cadaLinha[$idxCodigoIbge],
                'cidade' => trim($cadaLinha[$idxCidade]),
                'uf' => strtoupper(trim($cadaLinha[$idxUf])),
                'created_at' => $now,
                'updated_at' => $now,
            ];

            if (count($buffer) >= $this->RegistrosInseridoPorVez) {
                DB::table('enderecos')->insert($buffer);
                $total += count($buffer);
                $buffer = [];
            }
        }

        if (!empty($buffer)) {
            DB::table('enderecos')->insert($buffer);
            $total += count($buffer);
        }

        fclose($LeituraLinhaPorLinha);

        $this->command->info("Seeder concluído: {$total} cidades inseridas.");
    }
}