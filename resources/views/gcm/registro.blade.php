@extends('layouts.app')

@section('title', 'Registro de GCM')

@section('content')

    <div class="conteudoDaPagina">
        <x-ui.page-header title="Registro de GCM" subtitle="Registro de Guarda Civil Municipal" />
        <div class="app-content">
            <div class="container-fluid">
                <x-ui.card class="gcm-form card-realce card-realce-primary">
                    <x-slot:header>
                        <h3 class="card-title mb-0">
                            <i class="fa-regular fa-id-card"></i>
                            Dados do GCM
                        </h3>
                    </x-slot:header>
                    <form action="{{ route('post.registroGCM') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 py-5">
                                <x-form.photo-upload name="foto" label="Foto" />
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <x-form.input name="nome" label="Nome" placeholder="Nome completo" required />
                                    </div>

                                    <div class="col-md-4">
                                        <x-form.input name="cpf" class="cpf" label="CPF" placeholder="Digite o CPF"
                                            required />
                                    </div>

                                    <div class="col-md-4">
                                        <x-form.input name="rg" class="rg" label="RG" placeholder="Digite o RG" required />
                                    </div>

                                    <div class="col-md-2">
                                        <x-form.input name="matricula" label="Matrícula" placeholder="Ex.: 123456"
                                            required />
                                    </div>

                                    <div class="col-md-2">
                                        <x-form.input name="data_nascimento" label="Data de nascimento" type="date"
                                            placeholder="Ex.: dd/mm/aaaa" required />
                                    </div>

                                    <div class="col-md-4">
                                        <x-form.input name="nome_mae" label="Nome da mãe"
                                            placeholder="Digite o nome completo" required />
                                    </div>

                                    <div class="col-md-4">
                                        <x-form.input name="nome_pai" label="Nome do pai"
                                            placeholder="Digite o nome completo" required />
                                    </div>

                                    <div class="col-md-4">
                                        <x-form.input name="cidade" label="Cidade"
                                            placeholder="Ex.: Caraguatatuba" required />
                                    </div>

                                    <div class="col-md-1">
                                        <x-form.select name="ufestado" label='UF' data-url="{{ route('get.endereco') }}" class="seletor-cidade-uf"
                                        placeholder="UF" required />
                                    </div>

                                    <div class="col-md-3">
                                        <x-form.input name="cargo" label="Cargo" placeholder="Digite o cargo" required />
                                    </div>

                                    <div class="col-md-3">
                                        <x-form.input name="porte" label="Porte" placeholder="Digite o porte" required />
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <x-form.input name="afiliacao" label="Afiliação" placeholder="Digite sua afiliação" required />
                                    </div>

                                    <div class="col-md-2">
                                        <x-form.input name="admissao" label="Data de admissão" type="date" placeholder="dd/mm/aaaa" required />
                                    </div>

                                    <div class="col-md-2">
                                        <x-form.input name="expedicao" label="Data de expedição" type="date" placeholder="dd/mm/aaaa" required />
                                    </div>

                                    <div class="col-md-2">
                                        <x-form.input name="validacao" label="Validade" type="date" placeholder="dd/mm/aaaa" required />
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-secondary me-2">
                                Limpar
                            </button>
                            <button type="submit" class="btn btn-primary" @cannot('terceirizado-nao-pode') disabled
                                @endcannot>
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