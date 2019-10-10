{{--{{ dd($item) }}--}}
@if ($item['submenu'] == [])
    <li>
        <a href="{{ route('menus.show', ['menu' => $item['id']]) }}"> {{ $item['name'] }} </a>
    </li>
@else
    <li class="">
        <a href="{{ route('menus.show', ['menu' => $item['id']]) }}"> {{ $item['name'] }} </a>
        <ul class="">
            @foreach ($item['submenu'] as $submenu)
                @if ($submenu['submenu'] == [])
                    <li><a href="{{ route('menus.show', ['menu' => $submenu['id']]) }}">{{ $submenu['name'] }} </a></li>
                @else
                    @include('partials.menu-item', [ 'item' => $submenu ])
                @endif
            @endforeach
        </ul>
    </li>
@endif