{{--{{ dd($item) }}--}}
@if ($item->submenus == [])
    <li>
        <a href="{{ route('menus.show', ['menu' => $item->id]) }}"> {{ $item->name }} </a>
    </li>
@else
    <li class="">
        <a href="{{ route('menus.show', ['menu' => $item->id]) }}"> {{ $item->name }} </a>
        <ul class="">
            @foreach ($item->submenus as $submenu)
                @if ($submenu->submenus == [])
                    <li><a href="{{ route('menus.show', ['menu' => $submenu->id]) }}">{{ $submenu->name }} </a></li>
                @else
                    @include('adminPanel.menus.partials.menu-item', [ 'item' => $submenu ])
                @endif
            @endforeach
        </ul>
    </li>
@endif
