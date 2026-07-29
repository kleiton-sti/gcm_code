@extends('layouts.app')

@section('title', 'Lista de GCMs')

@section('content')

    <x-ui.page-header
        title="Guardas Civis Municipais"
        subtitle="Lista de colaboradores cadastrados"
    />

    <div class="app-content">
        <div class="container-fluid">

            @php
                // Dados fictícios exibidos apenas para fins de demonstração da interface
                $guardas = [
                    [
                        'id' => 1,
                        'foto' => 'https://i.pravatar.cc/80?img=12',
                        'nome' => 'Carlos Eduardo Silva',
                        'matricula' => '000123',
                        'cpf' => '123.456.789-00',
                        'status' => 'Ativo',
                    ],
                    [
                        'id' => 2,
                        'foto' => 'https://i.pravatar.cc/80?img=32',
                        'nome' => 'Fernanda Souza Lima',
                        'matricula' => '000124',
                        'cpf' => '987.654.321-00',
                        'status' => 'Ativo',
                    ],
                    [
                        'id' => 3,
                        'foto' => 'https://i.pravatar.cc/80?img=45',
                        'nome' => 'João Pedro Almeida',
                        'matricula' => '000125',
                        'cpf' => '456.789.123-00',
                        'status' => 'Pendente',
                    ],
                    [
                        'id' => 4,
                        'foto' => 'https://i.pravatar.cc/80?img=5',
                        'nome' => 'Mariana Costa Ribeiro',
                        'matricula' => '000126',
                        'cpf' => '321.654.987-00',
                        'status' => 'Inativo',
                    ],
                ];
            @endphp

            <x-ui.card title="Guardas cadastrados">

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Foto</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Matrícula</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guardas as $guarda)
                                <tr>
                                    <td>
                                        <x-ui.avatar
                                            :src="$guarda['foto']"
                                            :alt="$guarda['nome']"
                                        />
                                    </td>
                                    <td>{{ $guarda['nome'] }}</td>
                                    <td>{{ $guarda['matricula'] }}</td>
                                    <td>{{ $guarda['cpf'] }}</td>
                                    <td>
                                        <x-ui.status-badge :status="$guarda['status']" />
                                    </td>
                                    <td class="text-end">
                                        <x-ui.action-buttons
                                            :id="$guarda['id']"
                                            :nome="$guarda['nome']"
                                        />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </x-ui.card>

        </div>
    </div>

@endsection
