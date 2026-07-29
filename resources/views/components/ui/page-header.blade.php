@props([
    'title',
    'subtitle' => null,
])

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="mb-0">{{ $title }}</h3>

                @if ($subtitle)
                    <p class="text-muted mb-0">{{ $subtitle }}</p>
                @endif
            </div>

            @isset($actions)
                <div class="col-sm-6 text-sm-end">
                    {{ $actions }}
                </div>
            @endisset
        </div>
    </div>
</div>
