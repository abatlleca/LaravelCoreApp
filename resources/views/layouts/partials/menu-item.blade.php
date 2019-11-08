{{--{{ dd($item) }}--}}
@if (empty($item['role']) || auth()->user()->hasRole($item['role']))
    @if (empty($item['permission']) || auth()->user()->can($item['permission']))
        @if ($item['submenu'] == [])
            <li>
                <a class="nav-link" href="
                @if($item['route'] != '')
                    {{ route($item['route']) }}
                @endif
                ">{{ $item['name'] }}</a>
            </li>
        @else
            <li class="dropdown">
                <a href="#"
                   class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    {{ $item['name'] }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu sub-menu">
                    @foreach ($item['submenu'] as $submenu)
                        @if ($submenu['submenu'] == [])
                            <li><a class="nav-link" href="
                            @if($submenu['route'] != '')
                                {{ route($submenu['route']) }}
                            @endif
                            ">{{ $submenu['name'] }} </a></li>
                        @else
                            @include('partials.menu-item', [ 'item' => $submenu ])
                        @endif
                    @endforeach
                </ul>
            </li>
        @endif
    @endif
@endif
