@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b>Roles List</b>
                    </div>

                    <div class="card-body">
                        <p>
                            <a href="{{ route('permissions.create') }}">Create New Permission</a>
                        </p>
                        @forelse ($permissions as $permission)
                            <p>
                            <a href="{{ route('permissions.show', ['permission' => $permission->id]) }}"> {{ $permission->name }} </a>
                            </p>
                        @empty
                            No Permissions!
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection ('content')
