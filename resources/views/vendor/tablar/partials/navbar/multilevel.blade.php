@inject('navbarItemHelper', 'TakiElias\Tablar\Helpers\NavbarItemHelper')

@if ($navbarItemHelper->isSubmenu($item))
    <div class="app-sidebar dropend {{ collect($item['submenu'])->contains(fn($sub) => request()->is(ltrim(parse_url($sub['url'] ?? '', PHP_URL_PATH), '/'))) ? 'show' : '' }}">
        <a class="dropdown-item dropdown-toggle {{ collect($item['submenu'])->contains(fn($sub) => request()->is(ltrim(parse_url($sub['url'] ?? '', PHP_URL_PATH), '/'))) ? '' : '' }}"
           href=""
           data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
           aria-expanded="{{ collect($item['submenu'])->contains(fn($sub) => request()->is(ltrim(parse_url($sub['url'] ?? '', PHP_URL_PATH), '/'))) ? 'true' : 'false' }}">

            @if(isset($item['icon']))
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <i class="{{ $item['icon'] ?? '' }} {{ isset($item['icon_color']) ? 'text-' . $item['icon_color'] : '' }}"></i>
                </span>
            @endif

            {{ $item['text'] }}
            
            @isset($item['label'])
                <span class="badge badge-sm bg-{{ $item['label_color'] ?? 'primary' }} text-uppercase ms-2">{{ $item['label'] }}</span>
            @endisset
        </a>

        <div class="dropdown-menu {{ collect($item['submenu'])->contains(fn($sub) => request()->is(ltrim(parse_url($sub['url'] ?? '', PHP_URL_PATH), '/'))) ? 'show' : '' }}">
            @each('tablar::partials.navbar.dropend', $item['submenu'], 'item')
        </div>
    </div>

@elseif ($navbarItemHelper->isLink($item))
    @php
        $isActive = request()->is(ltrim(parse_url($item['url'] ?? '', PHP_URL_PATH), '/'));
    @endphp
    <a href="{{ $item['url'] ?? '#' }}" 
       class="app-sidebar dropdown-item {{ $isActive ? 'active' : '' }}">
        @if(isset($item['icon']))
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <i class="{{ $item['icon'] ?? '' }} {{ isset($item['icon_color']) ? 'text-' . $item['icon_color'] : '' }}"></i>
            </span>
        @endif

        {{ $item['text'] }}
    </a>
@endif

