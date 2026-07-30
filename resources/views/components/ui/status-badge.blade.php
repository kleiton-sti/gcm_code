@props(['deletado' => false])

@php
    $classesPorStatus = $deletado ? 'text-bg-danger' : 'text-bg-success';
    $status = $deletado ? 'Inativo' : 'Ativo';
@endphp

<span class="badge {{ $classesPorStatus }}">{{ $status }}</span>
