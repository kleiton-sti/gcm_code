@props([
    'name' => 'foto',
    'label' => 'Foto',
    'preview' => null,
])

<div class="mb-3 text-center">
    <label for="{{ $name }}" class="form-label d-block">{{ $label }}</label>

    <div class="mb-2">
        <img
            id="{{ $name }}-preview"
            src="{{ $preview ?? asset('img/usuario-padrao.jpg') }}"
            alt="Pré-visualização da foto"
            class="rounded-circle border"
            style="width: 150px; height: 150px; object-fit: cover;"
        >
    </div>

    <input
        type="file"
        name="{{ $name }}"
        id="{{ $name }}"
        accept="image/*"
        class="form-control d-none"
        onchange="document.getElementById('{{ $name }}-preview').src = window.URL.createObjectURL(this.files[0])"
    >

    <div class="d-flex justify-content-center gap-2">
        <label for="{{ $name }}" class="btn btn-outline-primary btn-sm mb-0">
            <i class="fa-regular fa-image"></i>
            Enviar foto
        </label>

        <button
            type="button"
            class="btn btn-outline-danger btn-sm"
            onclick="document.getElementById('{{ $name }}').value = ''; document.getElementById('{{ $name }}-preview').src = '{{ asset('img/usuario-padrao.jpg') }}';"
        >
            <i class="fa-regular fa-trash-can"></i>
            Remover foto
        </button>
    </div>
</div>
