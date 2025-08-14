@php
    $isActive = request()->is(ltrim(parse_url($item['href'] ?? '', PHP_URL_PATH), '/'));
@endphp

<a class="dropdown-item {{ $isActive ? 'active' : '' }}" href="{{ $item['href'] ?? '' }}">
    @if(isset($item['icon']))
        <span class=" app-sidebar nav-link-icon d-md-none d-lg-inline-block">
            <i class="{{ $item['icon'] ?? '' }} {{ isset($item['icon_color']) ? 'text-' . $item['icon_color'] : '' }}"></i>
        </span>
    @endif
    {{ $item['text'] ?? '' }}
</a>

