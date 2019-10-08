@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b>Menus List</b>
                    </div>

                    <div class="card-body">
                        <p>
                            <a href="{{ route('menus.create') }}">Create New Menu</a>
                        </p>
                        <ul>
                        @forelse ($menus as $menu)
                            <p>
                                <li><a href="{{ route('menus.show', ['menu' => $menu->id]) }}"> {{ $menu->name }} </a>
                                    <ul>
                                        @foreach($menu->submenus as $submenu)
                                            <li><a href="{{ route('menus.show', ['menu' => $submenu->id]) }}">{{ $submenu->name }}</a> </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </p>
                        @empty
                            No Menus!
                        @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection ('content')