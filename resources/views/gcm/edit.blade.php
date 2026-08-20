@extends('layouts.app')

@section('title', 'Detalhes do GCM')

@section('content')


    <div class="">
        <x-ui.page-header title="Detalhes do GCM" subtitle="Editar dados do GCM">
            <x-slot:actions>
                <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                    <i class="fa-regular fa-circle-left"></i> Voltar para a lista
                </a>
            </x-slot:actions>
        </x-ui.page-header>
        <div class="app-content">
            <div class="container-fluid">
                <x-ui.card class="gcm-form card-realce card-realce-warning">
                    <x-slot:header>
                        <h3 class="card-title mb-0">
                            <i class="fa-regular fa-pen-to-square"></i>
                            Dados do GCM
                        </h3>
                    </x-slot:header>
                    <form action="{{ route('post.atualizarGCM', ['id' => $guarda['id']]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3 py-5 text-center">
                                <x-form.photo-upload
                                    name="foto"
                                    label="Foto"
                                    :preview="$guarda['caminho_foto'] ? asset('storage/' . $guarda['caminho_foto']) : null"
                                />
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-8 mb-3">
                                        <x-form.input
                                            name="nome"
                                            label="Nome"
                                            placeholder="Nome completo"
                                            value="{{ old('nome', $guarda['nome']) }}"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <x-form.input
                                            name="cpf"
                                            class="cpf mascarado"
                                            label="CPF"
                                            placeholder="000.000.000-00"
                                            value="{{ old('cpf', $guarda['cpf']) }}"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <x-form.input
                                            name="rg"
                                            class="rg mascarado"
                                            label="RG"
                                            placeholder="00.000.000-0"
                                            value="{{ old('rg', $guarda['rg']) }}"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <x-form.input
                                            name="matricula"
                                            label="Matrícula"
                                            placeholder="Ex.: 123456"
                                            value="{{ old('matricula', $guarda['matricula']) }}"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <x-form.input
                                            name="data_nascimento"
                                            label="Data de nascimento"
                                            placeholder="Ex.: dd/mm/aaaa"
                                            type="date"
                                            value="{{ old('data_nascimento', $guarda['data_nascimento']) }}"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <x-form.input
                                            name="nome_mae"
                                            label="Nome da mãe"
                                            placeholder="Digite o nome completo"
                                            value="{{ old('nome_mae', $guarda['nome_mae']) }}"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <x-form.input
                                            name="nome_pai"
                                            label="Nome da pai"
                                            placeholder="Digite o nome completo"
                                            value="{{ old('nome_pai', $guarda['nome_pai']) }}"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <x-form.select
                                            name="tipo_sanguineo"
                                            label="Tipo sanguineo"
                                            placeholder="..."
                                            :options="[
                                                'A+' => 'A+',
                                                'A-' => 'A-',
                                                'B+' => 'B+',
                                                'B-' => 'B-',
                                                'AB+' => 'AB+',
                                                'AB-' => 'AB-',
                                                'O+' => 'O+',
                                                'O-' => 'O-',
                                            ]"
                                            value="{{ old('tipo_sanguineo', $guarda['tipo_sanguineo']) }}"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <x-form.select
                                            name="uf"
                                            label="UF"
                                            data-url="{{ route('get.enderecos') }}" id="uf"
                                            placeholder="UF" 
                                            value="{{ old('uf', $guarda['uf']) }}"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <x-form.select
                                            name="cidade"
                                            label="Cidade"
                                            data-url="{{  route('get.enderecoPorUf', ['uf' => ':uf']) }}" id="cidade"
                                            placeholder="Selecione uma cidade" 
                                            value="{{ old('cidade', $guarda['cidade']) }}"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <x-form.select
                                            name="cargo"
                                            label="Cargo"
                                            placeholder="Digite o cargo"
                                            value="{{ old('cargo', $guarda['cargo']) }}"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <x-form.select
                                            name="porte"
                                            label="Porte"
                                            value="{{ old('porte', $guarda['porte']) }}"
                                            placeholder="Digite o porte" 
                                            required
                                        />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <x-form.select
                                            name="afiliacao"
                                            label="Afiliação"
                                            value="{{ old('afiliacao', $guarda['afiliacao']) }}"
                                            placeholder="Digite sua afiliação" 
                                            required
                                        />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <x-form.select
                                            name="admissao"
                                            label="Data de admissão"
                                            type="date"
                                            value="{{ old('admissao', $guarda['admissao']) }}"
                                            placeholder="dd/mm/aaaa"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <x-form.select
                                            name="expedicao"
                                            label="Data de expedição"
                                            type="date"
                                            value="{{ old('expedicao', $guarda['expedicao']) }}"
                                            placeholder="dd/mm/aaaa"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <x-form.select
                                            name="validade"
                                            label="Validade"
                                            type="date"
                                            value="{{ old('validade', $guarda['validade']) }}"
                                            placeholder="dd/mm/aaaa"
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
                            <button type="submit" class="btn btn-primary">
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
