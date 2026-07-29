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
            src="{{ $preview ?? 'https://placehold.co/150x150?text=Foto' }}"
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
        class="form-control"
        onchange="document.getElementById('{{ $name }}-preview').src = window.URL.createObjectURL(this.files[0])"
    >
</div>
