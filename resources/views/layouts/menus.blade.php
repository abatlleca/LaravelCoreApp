@foreach ($menus_list as $key => $item)
    @if ($item['parent_id'] != 0)
        @break
    @endif
    @include('layouts.partials.menu-item', ['item' => $item])
@endforeach


{{--<li>--}}
{{--    <a class="nav-link" href="{{ route('menus.index') }}">Menus</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--    <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--    <a class="nav-link" href="{{ route('contact') }}">Contact</a>--}}
{{--</li>--}}


<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>
