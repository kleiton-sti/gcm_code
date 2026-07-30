@props(['title' => null])

<div {{ $attributes->merge(['class' => 'card']) }}>
    @if ($title || isset($header))

        <div class="card-header">
            @isset($header)
                {{ $header }}
            @else
                <h3 class="card-title mb-0">{{ $title }}</h3>
            @endisset
        </div>
        
    @endif

    <div class="card-body">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endisset
</div>
