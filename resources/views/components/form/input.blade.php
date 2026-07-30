@props([
    'name',
    'label' => null,
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'icon' => null,
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

    <div class="{{ $icon ? 'input-group' : '' }}">
        @if ($icon)
            <span class="input-group-text">
                <i class="{{ $icon }}"></i>
            </span>
        @endif

        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            @if ($required) required @endif
            {{ $attributes->merge(['class' => 'form-control']) }}
        >
    </div>
</div>
