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
            [
                'nome' => 'Juliana Aparecida Costa',
                'matricula' => 200006,
                'cpf' => '11122233396',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Rafael Augusto Martins',
                'matricula' => 200007,
                'cpf' => '22233344407',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Camila Regina Ferreira',
                'matricula' => 200008,
                'cpf' => '33344455518',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Bruno César Rodrigues',
                'matricula' => 200009,
                'cpf' => '44455566629',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Larissa Fernandes Barbosa',
                'matricula' => 200010,
                'cpf' => '55566677730',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Thiago Alves Nogueira',
                'matricula' => 200011,
                'cpf' => '66677788841',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Vanessa Cristina Ribeiro',
                'matricula' => 200012,
                'cpf' => '77788899952',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Diego Fernando Carvalho',
                'matricula' => 200013,
                'cpf' => '88899900163',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Priscila Gomes Teixeira',
                'matricula' => 200014,
                'cpf' => '99900011274',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Gustavo Henrique Moreira',
                'matricula' => 200015,
                'cpf' => '10011122285',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Renata Aparecida Dias',
                'matricula' => 200016,
                'cpf' => '21122233396',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Leonardo Souza Cardoso',
                'matricula' => 200017,
                'cpf' => '32233344407',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Aline Beatriz Rocha',
                'matricula' => 200018,
                'cpf' => '43344455518',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Eduardo Machado Pinto',
                'matricula' => 200019,
                'cpf' => '54455566629',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Simone Cristina Araújo',
                'matricula' => 200020,
                'cpf' => '65566677730',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Felipe Augusto Correia',
                'matricula' => 200021,
                'cpf' => '76677788841',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Débora Regina Monteiro',
                'matricula' => 200022,
                'cpf' => '87788899952',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'André Luiz Batista',
                'matricula' => 200023,
                'cpf' => '98899900163',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Tatiane Cristina Freitas',
                'matricula' => 200024,
                'cpf' => '09900011274',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Vinícius Rodrigues Melo',
                'matricula' => 200025,
                'cpf' => '19022133385',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Cristiane Aparecida Nunes',
                'matricula' => 200026,
                'cpf' => '29133244496',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Rodrigo César Farias',
                'matricula' => 200027,
                'cpf' => '39244355507',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Mariana Luiza Campos',
                'matricula' => 200028,
                'cpf' => '49355466618',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Anderson Paulo Vieira',
                'matricula' => 200029,
                'cpf' => '59466577729',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Bianca Fernanda Duarte',
                'matricula' => 200030,
                'cpf' => '69577688830',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Marcelo Antônio Xavier',
                'matricula' => 200031,
                'cpf' => '79688799941',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Suellen Kelly Andrade',
                'matricula' => 200032,
                'cpf' => '89799800052',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Wesley Roberto Guimarães',
                'matricula' => 200033,
                'cpf' => '99800911163',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Natália Cristina Lopes',
                'matricula' => 200034,
                'cpf' => '10911022274',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
            [
                'nome' => 'Everton José da Rosa',
                'matricula' => 200035,
                'cpf' => '21022133385',
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ],
        ]);
    }
}