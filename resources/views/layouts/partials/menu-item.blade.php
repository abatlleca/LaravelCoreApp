{{--{{ dd($item) }}--}}

@if ($item['submenu'] == [])
    @include('layouts.partials.menu-check', [ 'item' => $item, 'type' => 'single' ])
@else
    @if (empty($item['role']) || auth()->user()->hasRole($item['role']))
        @if (empty($item['permission']) || auth()->user()->hasDirectPermission($item['permission']))
            <li class="nav-item dropdown">
                <a href="#"
                   class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    {{ $item['name'] }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu sub-menu">
                    @foreach ($item['submenu'] as $submenu)
                        @if ($submenu['submenu'] == [])
                            @include('layouts.partials.menu-check', [ 'item' => $submenu ])
                        @else
                            @include('layouts.partials.menu-item', [ 'item' => $submenu ])
                        @endif
                    @endforeach
                </ul>
            </li>
        @endif
    @endif
@endif

