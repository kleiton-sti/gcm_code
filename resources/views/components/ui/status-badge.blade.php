@props(['status'])

@php
    $classesPorStatus = [
        'ativo' => 'text-bg-success',
        'inativo' => 'text-bg-secondary',
        'pendente' => 'text-bg-warning',
    ];

    $classeBadge = $classesPorStatus[strtolower($status)] ?? 'text-bg-light';
@endphp

<span class="badge {{ $classeBadge }}">{{ $status }}</span>
