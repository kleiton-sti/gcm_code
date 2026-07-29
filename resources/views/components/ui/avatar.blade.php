@props([
    'src',
    'alt' => 'Foto',
    'size' => 40,
])

<img
    src="{{ $src }}"
    alt="{{ $alt }}"
    class="rounded-circle"
    style="width: {{ $size }}px; height: {{ $size }}px; object-fit: cover;"
>
