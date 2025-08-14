{{-- <li class=" app-sidebar nav-item {{ $item['class'] }}" @isset($item['id']) id="{{ $item['id'] }}" @endisset>
    <a class="nav-link " @isset($item['target']) target="{{ $item['target'] }}" @endisset
    {!! $item['data-compiled'] ?? '' !!}
    href="{{ $item['href'] }}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
              @if(isset($item['icon']))
                            <i class="{{ $item['icon'] ?? '' }} {{
                isset($item['icon_color']) ? 'text-' . $item['icon_color'] : ''
            }}"></i>
                        @else
                            <i class="ti ti-brand-tabler"></i>
                        @endif
                    </span>
        <span class="nav-link-title">
                            {{ $item['text'] }}
        </span>
    </a>
</li> --}}

<li class="app-sidebar nav-item {{ $item['class'] }} {{ request()->is(ltrim(parse_url($item['href'], PHP_URL_PATH), '/')) ? 'active' : '' }}"
    @isset($item['id']) id="{{ $item['id'] }}" @endisset>

    <a class="nav-link {{ request()->is(ltrim(parse_url($item['href'], PHP_URL_PATH), '/')) ? 'active' : '' }}"
       @isset($item['target']) target="{{ $item['target'] }}" @endisset
       {!! $item['data-compiled'] ?? '' !!}
       href="{{ $item['href'] }}">
       
        <span class="nav-link-icon d-md-none d-lg-inline-block">
            @if(isset($item['icon']))
                <i class="{{ $item['icon'] ?? '' }} {{ isset($item['icon_color']) ? 'text-' . $item['icon_color'] : '' }}"></i>
            @else
                <i class="ti ti-brand-tabler"></i>
            @endif
        </span>

        <span class="nav-link-title">
            {{ $item['text'] }}
        </span>
    </a>
</li>

