<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class UsuariosCadastradosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          User::insert([
            [
                'nome' => 'Administrador do Sistema',
                'matricula' => 100001,
                'email' => 'admin@prefeitura.gov.br',
                'cpf' => '12345678909',
                'password' => Hash::make('Admin@123'),
                'motivo_delete' => fake()->sentence(),
                'tipo' => 'stii',
            ],
            [
                'nome' => 'João Carlos Ferreira',
                'matricula' => 100002,
                'email' => 'joao.ferreira@prefeitura.gov.br',
                'cpf' => '98765432100',
                'password' => Hash::make('Usuario@123'),
                'motivo_delete' => fake()->sentence(),
                'tipo' => 'semob',
            ],
            [
                'nome' => 'Maria Aparecida Souza',
                'matricula' => 100003,
                'email' => 'maria.souza@prefeitura.gov.br',
                'cpf' => '74185296300',
                'password' => Hash::make('Usuario@123'),
                'motivo_delete' => fake()->sentence(),
                'tipo' => 'terceirizado',
            ],
        ]);
    }
}