@extends('layouts.app')

@section('title', 'Cadastro de Usuário')

@section('content')

    <x-ui.page-header
        title="Cadastro de Usuário"
        subtitle="Novo acesso ao sistema"
    />

    <div class="app-content">
        <div class="container-fluid">

            <x-ui.card title="Dados do usuário">

                <form action="{{ route('post.cadastroUsuario') }}" method="POST">

                    @csrf

                    <div class="row">

                        <div class="col-md-6">
                            <x-form.input
                                name="nome"
                                label="Nome"
                                placeholder="Nome completo"
                                required
                            />
                        </div>

                        <div class="col-md-6">
                            <x-form.input
                                name="matricula"
                                label="Matricula"
                                placeholder="Digite a matricula"
                                required
                            />
                        </div>

                         <div class="col-md-6">
                            <x-form.input
                                name="cpf"
                                label="CPF"
                                placeholder="Digite o CPF"
                                required
                            />
                        </div>

                        <div class="col-md-6">
                            <x-form.input
                                name="email"
                                type="email"
                                label="E-mail"
                                placeholder="nome@caraguatatuba.sp.gov.br"
                                required
                            />
                        </div>

                        <div class="col-md-6">
                            <x-form.input
                                name="password"
                                type="password"
                                label="Senha"
                                placeholder="Digite a senha"
                                required
                            />
                        </div>

                        <div class="col-md-6">
                            <x-form.input
                                name="password_confirmation"
                                type="password"
                                label="Confirmar senha"
                                placeholder="Repita a senha"
                                required
                            />
                        </div>

                        <div class="col-md-6">
                            <x-form.select
                                name="tipo"
                                label="Tipo de usuário"
                                :options="[
                                    'stii' => 'STII',
                                    'semob' => 'SEMOB',
                                    'terceirizado' => 'Terceirizado',
                                ]"
                                required
                            />
                        </div>

                    </div>

                    <hr>

                    <div class="d-flex justify-content-end">

                        <button type="reset" class="btn btn-secondary me-2">
                            Limpar
                        </button>

                        <button type="submit" class="btn btn-primary" @cannot('terceirizado-nao-pode') disabled @endcannot @cannot('semob-nao-pode') disabled @endcannot>
                            <i class="bi bi-check-lg"></i>
                            Cadastrar
                        </button>

                    </div>

                </form>

            </x-ui.card>

        </div>
    </div>

@endsection
