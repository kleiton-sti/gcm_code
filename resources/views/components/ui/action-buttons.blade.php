@props([
    'id',
    'nome' => 'este registro',
    'guarda'
])

@php
 $classeBgColorBtn;

 if ($guarda->trashed()) {
     $classeBgColorBtn = 'btn-danger';
 }
 else {
     $classeBgColorBtn = 'btn-outline-danger';
 }
@endphp

<div class="btn-group" role="group" aria-label="Ações">

    <a href="{{ route('get.visualizarGCM', ['id' => $id]) }}" class="btn btn-sm btn-outline-primary" title="Visualizar">
        <i class="fa-regular fa-eye color-secondary"></i>
    </a>

    @if($guarda->trashed() || Gate::denies('terceirizado-nao-pode'))
    <button
        type="button"
        class="btn btn-sm btn-warning"
        title="Editar"
        Disabled
    >
    <i class="fa-regular fa-pen-to-square color-warnming"></i>
    </button>
    @else
    <a href="{{ route('get.editarGCM', ['id' => $id]) }}" class="btn btn-sm btn-outline-warning" title="Editar">
        <i class="fa-regular fa-pen-to-square color-warnming"></i>
    </a>
    @endif


    <button
        type="button"
        class="btn btn-sm {{ $classeBgColorBtn }}"
        title="Excluir"
        @if($guarda->trashed()) Disabled @endif
        @cannot('terceirizado-nao-pode') Disabled @endcannot
        data-bs-toggle="modal"
        data-bs-target="#modalInativarGCM"
        data-id="{{ $id }}"
        data-nome="{{ $nome }}"
    >
        <i class="fa-regular fa-trash-can color-danger"></i>

    </button>
</div>
