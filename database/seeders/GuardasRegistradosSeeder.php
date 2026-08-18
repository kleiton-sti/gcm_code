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
        $guardasBase = [
            ['nome' => 'Carlos Eduardo Almeida', 'matricula' => 200001, 'cpf' => '12345678909'],
            ['nome' => 'Fernanda Cristina Souza', 'matricula' => 200002, 'cpf' => '98765432100'],
            ['nome' => 'Marcos Vinícius Pereira', 'matricula' => 200003, 'cpf' => '74185296300'],
            ['nome' => 'Patrícia Oliveira Santos', 'matricula' => 200004, 'cpf' => '36925814700'],
            ['nome' => 'Ricardo Henrique Lima', 'matricula' => 200005, 'cpf' => '25836914700'],
            ['nome' => 'Juliana Aparecida Costa', 'matricula' => 200006, 'cpf' => '11122233396'],
            ['nome' => 'Rafael Augusto Martins', 'matricula' => 200007, 'cpf' => '22233344407'],
            ['nome' => 'Camila Regina Ferreira', 'matricula' => 200008, 'cpf' => '33344455518'],
            ['nome' => 'Bruno César Rodrigues', 'matricula' => 200009, 'cpf' => '44455566629'],
            ['nome' => 'Larissa Fernandes Barbosa', 'matricula' => 200010, 'cpf' => '55566677730'],
            ['nome' => 'Thiago Alves Nogueira', 'matricula' => 200011, 'cpf' => '66677788841'],
            ['nome' => 'Vanessa Cristina Ribeiro', 'matricula' => 200012, 'cpf' => '77788899952'],
            ['nome' => 'Diego Fernando Carvalho', 'matricula' => 200013, 'cpf' => '88899900163'],
            ['nome' => 'Priscila Gomes Teixeira', 'matricula' => 200014, 'cpf' => '99900011274'],
            ['nome' => 'Gustavo Henrique Moreira', 'matricula' => 200015, 'cpf' => '10011122285'],
            ['nome' => 'Renata Aparecida Dias', 'matricula' => 200016, 'cpf' => '21122233396'],
            ['nome' => 'Leonardo Souza Cardoso', 'matricula' => 200017, 'cpf' => '32233344407'],
            ['nome' => 'Aline Beatriz Rocha', 'matricula' => 200018, 'cpf' => '43344455518'],
            ['nome' => 'Eduardo Machado Pinto', 'matricula' => 200019, 'cpf' => '54455566629'],
            ['nome' => 'Simone Cristina Araújo', 'matricula' => 200020, 'cpf' => '65566677730'],
            ['nome' => 'Felipe Augusto Correia', 'matricula' => 200021, 'cpf' => '76677788841'],
            ['nome' => 'Débora Regina Monteiro', 'matricula' => 200022, 'cpf' => '87788899952'],
            ['nome' => 'André Luiz Batista', 'matricula' => 200023, 'cpf' => '98899900163'],
            ['nome' => 'Tatiane Cristina Freitas', 'matricula' => 200024, 'cpf' => '09900011274'],
            ['nome' => 'Vinícius Rodrigues Melo', 'matricula' => 200025, 'cpf' => '19022133385'],
            ['nome' => 'Cristiane Aparecida Nunes', 'matricula' => 200026, 'cpf' => '29133244496'],
            ['nome' => 'Rodrigo César Farias', 'matricula' => 200027, 'cpf' => '39244355507'],
            ['nome' => 'Mariana Luiza Campos', 'matricula' => 200028, 'cpf' => '49355466618'],
            ['nome' => 'Anderson Paulo Vieira', 'matricula' => 200029, 'cpf' => '59466577729'],
            ['nome' => 'Bianca Fernanda Duarte', 'matricula' => 200030, 'cpf' => '69577688830'],
            ['nome' => 'Marcelo Antônio Xavier', 'matricula' => 200031, 'cpf' => '79688799941'],
            ['nome' => 'Suellen Kelly Andrade', 'matricula' => 200032, 'cpf' => '89799800052'],
            ['nome' => 'Wesley Roberto Guimarães', 'matricula' => 200033, 'cpf' => '99800911163'],
            ['nome' => 'Natália Cristina Lopes', 'matricula' => 200034, 'cpf' => '10911022274'],
            ['nome' => 'Everton José da Rosa', 'matricula' => 200035, 'cpf' => '21022133385'],
        ];

        $tiposSanguineos = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        $cargos = ['GUARDA CIVIL MUNICIPAL', 'GUARDA CIVIL MUNICIPAL 2ª CLASSE', 'INSPETOR DA GUARDA CIVIL', 'SUBINSPETOR DA GUARDA CIVIL'];
        $portes = ['PORTE DE ARMA FUNCIONAL', 'SEM PORTE DE ARMA'];
        $naturalidades = ['CARAGUATATUBA', 'SÃO SEBASTIÃO', 'UBATUBA', 'ILHABELA', 'SÃO PAULO'];

        $registros = [];

        foreach ($guardasBase as $indice => $guarda) {
            $rg = str_pad((string) (100000000 + $indice), 9, '0', STR_PAD_LEFT);
            $admissao = fake()->dateTimeBetween('-10 years', '-1 year');
            $expedicao = fake()->dateTimeBetween($admissao, 'now');
            $validade = (clone $expedicao)->modify('+5 years');

            $registros[] = [
                'token' => fake()->uuid(),
                'nome' => $guarda['nome'],
                'matricula' => $guarda['matricula'],
                'cpf' => $guarda['cpf'],
                'rg' => $rg,
                'data_nascimento' => fake()->dateTimeBetween('-55 years', '-20 years')->format('Y-m-d'),
                'nome_mae' => mb_strtoupper(fake()->name('female'), 'UTF-8'),
                'nome_pai' => mb_strtoupper(fake()->name('male'), 'UTF-8'),
                'tipo_sanguineo' => fake()->randomElement($tiposSanguineos),
                'cargo' => fake()->randomElement($cargos),
                'porte' => fake()->randomElement($portes),
                'afiliacao' => 'GCM CARAGUATATUBA',
                'admissao' => $admissao->format('Y-m-d'),
                'expedicao' => $expedicao->format('Y-m-d'),
                'validade' => $validade->format('Y-m-d'),
                'caminho_foto' => null,
                'motivo_delete' => fake()->sentence(),
            ];
        }

        GuardaCivil::insert($registros);
    }
}