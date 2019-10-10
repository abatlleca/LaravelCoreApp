{{--{{ dd($item) }}--}}
@if ($item->getSubmenus() == [])
    <li>
        <a href="{{ route('menus.show', ['menu' => $item->id]) }}"> {{ $item->name }} </a>
    </li>
@else
    <li class="">
        <a href="{{ route('menus.show', ['menu' => $item->id]) }}"> {{ $item->name }} </a>
        <ul class="">
            @foreach ($item->getSubmenus() as $submenu)
                @if ($submenu->getSubmenus() == [])
                    <li><a href="{{ route('menus.show', ['menu' => $submenu->id]) }}">{{ $submenu->name }} </a></li>
                @else
                    @include('menus.partials.menu-item', [ 'item' => $submenu ])
                @endif
            @endforeach
        </ul>
    </li>
@endif
