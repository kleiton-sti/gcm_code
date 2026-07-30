@extends('layouts.app')

@section('title', 'Lista de GCMs')

@section('content')

    <x-ui.page-header
        title="Guardas Civis Municipais"
        subtitle="Lista de colaboradores cadastrados"
    />

    <div class="app-content">
        <div class="container-fluid">

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
                            @foreach ($guardasCivis as $guarda)
                                <tr>
                                    <td>
                                        <x-ui.avatar
                                            :src="$guarda['caminho_foto']"
                                            :alt="$guarda['nome']"
                                        />
                                    </td>
                                    <td>{{ $guarda['nome'] }}</td>
                                    <td>{{ $guarda['matricula'] }}</td>
                                    <td>{{ $guarda['cpf'] }}</td>
                                    <td>
                                        <x-ui.status-badge :deletado="$guarda['deleted_at']" />
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
