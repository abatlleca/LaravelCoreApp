@if (empty($item['role']) || auth()->user()->hasRole($item['role']))
    @if (empty($item['permission']) || auth()->user()->hasDirectPermission($item['permission']))
        <li>
            <a class="nav-link" href="
            @if($item['route'] != '')
                {{ route($item['route']) }}
            @endif
            ">{{ $item['name'] }}</a>
        </li>
    @endif
@endif
