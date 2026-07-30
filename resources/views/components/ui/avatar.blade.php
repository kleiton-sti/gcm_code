@props([
    'src',
    'alt' => 'Foto',
    'size' => 40,
])
    

<img
    src="{{ $src ? asset('storage/' . $src) : asset('img/usuario-padrao.jpg')  }}"
    
    alt="foto de perfil do usuário {{ $alt }}"
    class="rounded-circle"
    style="width: {{ $size }}px; height: {{ $size }}px; object-fit: cover;"
>
