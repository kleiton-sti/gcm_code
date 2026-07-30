@props([
    'id',
    'nome' => 'este registro',
])

<div class="btn-group" role="group" aria-label="Ações">

    <a href="{{ url("/gcms/{$id}") }}" class="btn btn-sm btn-outline-primary" title="Visualizar">
        <i class="fa-regular fa-eye color-secondary"></i>
    </a>

    <a href="#" class="btn btn-sm btn-outline-warning" title="Editar">
        <i class="fa-regular fa-pen-to-square color-warnming"></i>
    </a>

    <button
        type="button"
        class="btn btn-sm btn-outline-danger"
        title="Excluir"
        onclick="return confirm('Deseja realmente excluir {{ $nome }}?')"
    >
        <i class="fa-regular fa-trash-can color-danger"></i>

    </button>
</div>
