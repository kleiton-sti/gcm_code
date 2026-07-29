@props([
    'name',
    'label' => null,
    'options' => [],
    'selected' => null,
    'required' => false,
    'placeholder' => 'Selecione...',
])

<div class="mb-3">
    @if ($label)
        <label for="{{ $name }}" class="form-label">
            {{ $label }}
            @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    <select
        name="{{ $name }}"
        id="{{ $name }}"
        @if ($required) required @endif
        {{ $attributes->merge(['class' => 'form-select']) }}
    >
        <option value="" disabled {{ $selected ? '' : 'selected' }}>
            {{ $placeholder }}
        </option>

        @foreach ($options as $valorOpcao => $rotuloOpcao)
            <option value="{{ $valorOpcao }}" @selected($selected == $valorOpcao)>
                {{ $rotuloOpcao }}
            </option>
        @endforeach
    </select>
</div>
