@extends('layouts.app')

@section('title', 'Registro de GCM')

@section('content')

    <div class="conteudoDaPagina">
        <x-ui.page-header
            title="Registro de GCM"
            subtitle="Registro de Guarda Civil Municipal"
        />
        <div class="app-content">
            <div class="container-fluid">
                <x-ui.card title="Dados do GCM">
                    <form action="{{ route('post.registroGCM') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <x-form.photo-upload name="foto" label="Foto" />
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-8">
                                        <x-form.input
                                            name="nome"
                                            label="Nome"
                                            placeholder="Nome completo"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-4">
                                        <x-form.input
                                            name="matricula"
                                            label="Matrícula"
                                            placeholder="Ex.: 123456"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-6">
                                        <x-form.input
                                            name="cpf"
                                            class="cpf"
                                            label="CPF"
                                            placeholder="Digite o CPF"
                                            required
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-secondary me-2">
                                Limpar
                            </button>
                            <button type="submit" class="btn btn-primary" @cannot('terceirizado-nao-pode') disabled @endcannot>
                                <i class="fa-regular fa-circle-check"></i>
                                Salvar
                            </button>
                        </div>
                    </form>
                </x-ui.card>
            </div>
        </div>
    </div>

@endsection
