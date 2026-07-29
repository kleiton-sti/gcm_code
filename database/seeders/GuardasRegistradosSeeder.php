<?php

namespace Database\Seeders;

use App\Models\GuardaCivil;
use Illuminate\Database\Seeder;

class GuardasRegistradosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GuardaCivil::insert([
            [
                'nome' => 'Carlos Eduardo Almeida',
                'matricula' => 200001,
                'cpf' => '12345678909',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Fernanda Cristina Souza',
                'matricula' => 200002,
                'cpf' => '98765432100',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
                
            ],
            [
                'nome' => 'Marcos Vinícius Pereira',
                'matricula' => 200003,
                'cpf' => '74185296300',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Patrícia Oliveira Santos',
                'matricula' => 200004,
                'cpf' => '36925814700',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Ricardo Henrique Lima',
                'matricula' => 200005,
                'cpf' => '25836914700',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
        ]);
    }
}