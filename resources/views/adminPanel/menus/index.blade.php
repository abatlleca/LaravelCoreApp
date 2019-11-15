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
                            @include('adminPanel.menus.partials.menu-item', ['item' => $menu])
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
