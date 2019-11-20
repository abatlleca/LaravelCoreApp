@foreach ($menus_list as $key => $item)
    @if ($item['parent_id'] != 0)
        @break
    @endif
    @include('layouts.partials.menu-item', ['item' => $item])
@endforeach

<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>
    <ul class="dropdown-menu sub-menu">
        <li class="nav-item dropdown">
{{--            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                <a class="nav-link" href="{{ route('profile.show') }}">Profile</a>
{{--            </div>--}}
        </li>
        <li class="nav-item dropdown">
{{--            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
{{--            </div>--}}
        </li>
    </ul>
</li>
