@props(['active'])

@php
    $classes = $active ?? false ? 'nav-link active font-weight-bolder border-bottom border-primary border-3' : 'nav-link';
@endphp

<li class="nav-item">
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>
