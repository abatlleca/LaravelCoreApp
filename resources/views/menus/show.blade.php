@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Menu: {{ $menu->name }}</div>

                    <div class="card-body">
                        @if(session()->has('status'))
                            <p style="color: green">
                                {{ session()->get('status') }}
                            </p>
                        @endif
                        <p>
                            <a href="{{ route('menus.edit', ['menu' => $menu->id]) }}">Edit</a>
                            @if($menu->parent_id != 0)
                                <a href="{{ route('menus.show', ['menu' => $menu->parent_id]) }}">Go To Parent</a>
                            @endif
                        </p>
                        <p>Id: {{ $menu->id }}</p>
                        <p>Name: {{ $menu->name }} </p>
                        <p>Route: {{ $menu->route }}</p>
                        <p>Icon: {{ $menu->icon }}</p>
                        <p>Order: {{ $menu->order }} </p>
                        <p>Parent Menu:
                            @if($menu->parent_id != null)
                                {{ $menu->parent->name }}</p>
                            @else
                                No parent
                            @endif
                        <p>Role Required: {{ $menu->role_name }} </p>

                        <ul>Submenus:
                        @forelse($menu->submenus as $submenu)
                            <li><a href="{{ route('menus.show', ['menu' => $submenu->id]) }}">{{ $submenu->name }}</a> </li>
                        @empty
                                No Submenus
                        @endforelse
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection ('content')
